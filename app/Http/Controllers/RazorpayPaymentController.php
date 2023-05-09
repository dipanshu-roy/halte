<?php
  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Creadit;
use Razorpay\Api\Api;
use Auth;
use Session;
use Exception;
  
class RazorpayPaymentController extends Controller
{
    private $razorpayId = "-- Your razorpay Id --";
    private $razorpayKey = "-- Your razorpay key --";

    public function index(){        
        return view('admin/razorpay');
    }
    public function store(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try{
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
            }catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
    public function razorPaySuccess(Request $request){
        $user_id = Auth::user();
        $creadit = new Creadit();
        $creadit->user_id = $user_id->id;
        $creadit->transactin_id = strtoupper(Str::random(5)).time();
        $creadit->r_payment_id = $request->payment_id;
        $creadit->amount = $request->amount;
        $creadit->save();
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
    public function Initiate(Request $request){
        $receiptId = Str::random(20);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['amount'] * 100,
            'currency' => 'INR'
            )
        );
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'] * 100,
            'name' => $request->all()['name'],
            'currency' => 'INR',
            'email' => $request->all()['email'],
            'contactNumber' => $request->all()['contactNumber'],
            'address' => $request->all()['address'],
            'description' => 'Testing description',
        ];
        return view('cart',compact('response'));
    }
    public function Complete(Request $request){
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );
        if($signatureStatus == true){
            return view('payment-success-page');
        }
        else{
            return view('payment-failed-page');
        }
    }
    private function SignatureVerify($_signature,$_paymentId,$_orderId){
        try{
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes = array('razorpay_signature' => $_signature, 'razorpay_payment_id' => $_paymentId , 'razorpay_order_id' => $_orderId);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }
}