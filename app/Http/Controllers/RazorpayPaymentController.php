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
}