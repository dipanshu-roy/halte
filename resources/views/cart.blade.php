@extends('layouts.web.app')
@section('content')
<style>
    .razorpay-payment-button{
        display:none;
    }
</style>
<section id="prod-insldr" class="no-margin nsdbn">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="container-fluid xl:w-auto">
                <div class="item active"
                    style="background-image: url({{asset('web/images/banner1.jpg')}}); background-position: top center;">
                    <div class="carousel-content">
                        <div class="container plr0md fw xs-plr60">
                            <div class="col-sm-12">
                                <!-- <h1 class="pgtl">OUR PRODUCTS</h1> -->
                                <ul class="breadcrumb">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section id="prod-cntr" class="product-sn">
    <div class="container-fluid xl:w-auto plr0md fw xs-plr60">
        <div class="col-sm-12">
            <p class="txa_r txa_mbl">
            </p>
        </div>
        <div class="col-sm-12">
            <div class="hlfpg"></div>
            <table class="table table-hover iyg_tblcr">
                <thead>
                    <tr>
                        <th class="iyg_pln">Product</th>
                        <th class="iyg_prd"></th>
                        <th clsss="iyg_prz">Price</th>
                        <th class="iyg_qty">Quantity</th>
                        <th class="iyg_sbtl">Subtotal</th>
                        <th class="iyg_blk"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total=0; @endphp
                    @if(!empty($cart_data)) @foreach($cart_data as $rows)
                    @php 
                        $cart = session()->get('cart'); 
                        if(!empty($cart)){
                            $quantity  = $cart[$rows->id]['quantity'];
                        }else{
                            $select = App\Models\Cart::select('quantity')->where('user_id',Auth::user()->id)->where('product_id',$rows->id)->first();
                            $quantity = $select->quantity;
                        }
                        $total += $rows->sale_price*$quantity;
                    @endphp
                    <tr class="prod-cart-tr" data-id="{{$rows->id}}">
                        <td data-th="Product" valign="middle" class="cart-prod-img">
                            <img src="{{asset($rows->main_image)}}" alt="{{$rows->product_name}}" width="80">
                        </td>
                        <td data-th="" valign="middle" class="cart-prod-name">
                            <h4 class="cart-prod">{{$rows->product_name}}</h4>
                        </td>
                        <td data-th="Price" class="prd_sub_prz cart-prod-price"> 
                            <span class="cart-mrps"><i class="fa fa-inr"></i>{{number_format($rows->mrps)}}</span> 
                            <span class="nwsp"> <i class="fa fa-inr"></i>{{number_format($rows->sale_price)}}</span> 
                        </td>
                        <td data-th="Quantity" class="cart-prod-qty">
                            <input type="number" name="quantity" class="form-control qty update-cart" value="{{$quantity}}" min="1">
                        </td>
                        <td data-th="Subtotal" class="text-center prd_sub_prz cart-prod-subtotal">
                            <span class="nwsp"><i class="fa fa-inr"></i>
                            {{number_format($rows->sale_price*$quantity)}}
                            </span>
                        </td>
                        <td class="actions iyg_btnc iyg_blk_tblcr cart-prod-action" data-th="">
                            <a href="#" class="btn btn-save"><i class="fa fa-bookmark-o"></i> Save for Later</a>
                            <button class="btn bt_iyg_sb btn-sm remove-from-cart"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    @endforeach @endif
                </tbody>
            </table>
            <hr class="hrmb-nv">
            <div class="spacer20"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <h4 class="cart-total">HAVE A COUPON?</h4>
            <div class="coupon-form">
                <form action="@php echo !empty(session()->get('coupon')['coupon'])? url('remove-coupon'):url('apply-coupon');@endphp" method="post" class="">
                    @csrf
                    <div class="col-sm-5 plr0">
                        <div class="form-group">
                            <input type="text" class="form-control" name="coupon" placeholder="Coupon Code" value="@php echo !empty(session()->get('coupon')['coupon'])? session()->get('coupon')['coupon']:'';@endphp" @php echo !empty(session()->get('coupon')['coupon'])? 'readonly':'';@endphp>
                            <input type="hidden" class="form-control" name="min_booking" value="{{$total}}">
                        </div>
                    </div>
                    <div class="col-sm-5 plr0">
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">@php echo !empty(session()->get('coupon')['coupon'])? 'Remove Coupon':'Apply Coupon';@endphp</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                @if(!empty($offer_coupn)) @foreach($offer_coupn as $offer)
                <div class="col-sm-6">
                    <div class="offer-prod">
                        <div class="col-sm-12 plr0">
                            <div class="ofr-bx">
                                <h3 class="h3ofr-tl">{{$offer->title}}</h3>
                                <p class="ofr-lead">
                                    @if($offer->offer_type==2) {{$offer->offer_value}}% @else RS {{$offer->offer_value}} @endif
                                    Instant Discount up to INR @php
                                    if($offer->offer_type==2){
                                        echo round($offer->min_booking/100*$offer->offer_value);
                                    }else{
                                        echo $offer->offer_value;
                                    }
                                    @endphp. Min purchase value INR {{$offer->min_booking}}
                                    Use <b>Coupon Code: {{$offer->code}}</b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="total-wrapper">
                <h4 class="cart-total">CART TOTALS</h4>

                <table class="table iyg_tblcr">
                    <tbody>
                        <tr>
                            <td width="40%">
                                <p class="tlprc"><span class="sml">Subtotal</span></p>
                            </td>
                            <td width="60%">
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>{{number_format($total,2)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc "><span class="sml">Shipping</span></p>
                            </td>
                            <td>
                                <p class="shpng">Free Shipping <span class="ship-to">Chandigarh</span></p>
                                <div class="normal-delevery nsl pdt0">
                                    <div class="form-group">
                                        <label><input type="checkbox" name="radio[1]" id="radio2"> Express Delivery
                                        </label>
                                    </div>
                                </div>

                                <div class="shpng">
                                    <a data-toggle="collapse" data-target="#chnadrs"
                                        href="javascript:void(0);">Change address</a>
                                    <div id="chnadrs" class="collapse">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Pincode">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-secondary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php 
                        $discounted = 0;
                        $percent = 0;
                        $amount = 0;
                        if(!empty(session()->get('coupon')['offer_type'])){ @endphp
                        <tr>
                            <td><p class="tlprc"><span class="sml">Discount/Coupon </span></p></td>
                            <td>
                                <p class="tlprc">- <span class="sml"><i class="fa fa-inr"></i></span>
                                @php $offer_type = session()->get('coupon')['offer_type'];
                                    $offer_value = session()->get('coupon')['offer_value'];
                                    if($offer_type==2){
                                        $off = $total/100*$offer_value;
                                        echo number_format($off,2);
                                        $percent =  $total - $off;
                                        $discounted = $percent;
                                    }else{
                                        echo $offer_value;
                                        $amount = $offer_value;
                                        $discounted = $total-$amount;
                                    }
                                @endphp</p>
                            </td>
                        </tr>
                        <tr>
                            <td><p class="tlprc"><span class="sml">Discounted Amount </span></p></td>
                            <td>
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>{{$discounted}}</p>
                            </td>
                        </tr>
                        @php } @endphp
                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml">GST </span> <span class="vsml">@ 18%</span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>
                                @php if(!empty($percent)){
                                    $gst = $percent/100*18;
                                    echo number_format($gst,2);
                                }else{
                                    $totals = $total-$amount;
                                    $gst = $totals/100*18;
                                    echo number_format($gst,2);
                                }@endphp</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc"><span class="">Total</span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>@if(!empty($discounted)){{number_format($discounted+$gst,2)}}@else{{number_format($total+$gst,2)}}@endif </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if(!empty(Auth::user()))
                                <a href="{{url('checkout')}}" class="btn btn-primary btn-block "> PROCEED TO CHECKOUT <i class="fa fa-angle-right"></i></a>
                                <form action="{{url('/payment-complete')}}" method="POST" hidden>
                                    @csrf
                                    <input type="text" class="form-control" id="rzp_paymentid" name="rzp_paymentid">
                                    <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
                                    <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
                                    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
                                </form>
                                <a id="rzp-button1" class="btn btn-primary btn-block "> PROCEED TO CHECKOUT <i class="fa fa-angle-right"></i></a>
                                @else
                                <a href="{{url('account/login')}}" class="btn btn-primary btn-block "> PROCEED TO CHECKOUT <i class="fa fa-angle-right"></i></a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-12">
            <h3 class="h3nsd"><span>PRODUCTS WE THINK YOU'LL LIKE</span></h3>
            <hr class="hr-vcntr">


            <div class="prodhmsldr">
                @if(!empty($similar_pr)) @foreach($similar_pr as $rows)
                <div class="prd-cntr">
                    <a href="{{url('pr')}}/{{$rows->subcategory_slug}}/{{$rows->product_slug}}">
                        <div class="pro-im">
                            <img src="{{asset($rows->main_image)}}" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> {{number_format($rows->mrps)}}</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>{{number_format($rows->sale_price)}}</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">{{$rows->barnd_name}}</span> {{$rows->product_name}}</h3>
                    </a>
                    <a href="{{url('add-to-cart,$rows->id')}}" class="btn btn-atcr">ADD TO CART</a>
                </div>
                @endforeach @endif
            </div>
        </div>
    </div>
</section>
@push('script')
<script type="text/javascript">
    var spinner = $('#loader');
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{route('update.cart')}}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".qty").val()
            },
            beforeSend: function(xhr){
                spinner.show();
            },
            success: function (response) {
                spinner.show();
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                beforeSend: function(xhr){
                    spinner.show();
                },
                success: function (response) {
                    spinner.show();
                    window.location.reload();
                }
            });
        }
    });
</script>
<button id="rzp-button1" hidden>Pay</button> 
<script src = "https://checkout.razorpay.com/v1/checkout.js" ></script> <script>
    var options = {
        "key": "{{env('RAZORPAY_KEY')}}",
        "amount": "{{$discounted}}",
        "currency": "INR",
        "name": "{{config('app.name')}}",
        "description": "Rozerpay",
        "image": "{{asset('web/images/logo.png')}}",
        "order_id": "{{$initiate['orderId']}}",
        "handler": function(response) {
            document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
            document.getElementById('rzp_orderid').value = response.razorpay_order_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;
            document.getElementById('rzp-paymentresponse').click();
        },
        "prefill": {
            "name": "@if(!empty(Auth::user())){{Auth::user()->name}}@endif",
            "email": "@if(!empty(Auth::user())){{Auth::user()->email}}@endif",
            "contact": "@if(!empty(Auth::user())){{Auth::user()->mobile}}@endif"
        },
        "notes": {
            "address": "@if(!empty(Auth::user())){{Auth::user()->address}}@endif"
        },
        "theme": {
            "color": "#F37254"
        }
    };
var rzp1 = new Razorpay(options);
window.onload = function() {
    // document.getElementById('rzp-button1').click();
};
document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
} 
</script>
@endpush
@endsection('content')