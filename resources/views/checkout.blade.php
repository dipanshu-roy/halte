@extends('layouts.web.app')
@section('content')
<style>
.razorpay-payment-button {
    display: none;
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
                                    <li><a href="#">Checkout</a></li>
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
        <div class="clearfix"></div>
        <div class="spacer20"></div>
        <form method="post" action="{{url('proceed-to-pay')}}" autocomplete="off">
        @csrf
        <div class="col-sm-6">
            <div class="hlfpg2"></div>
            <div class="total-wrapper">
                <h4 class="h3-primary">Billing Details</h4>
                <div class="form-bl">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">First name *</label>
                                <input type="text" name="first_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Last name *</label>
                                <input type="text" name="last_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Company name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Country / Region *</label>
                                <select type="text" name="country" class="form-control" placeholder="" required>
                                    <option value="India" selected="">India</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Street address *</label>
                                <input type="text" name="street_address" class="form-control" placeholder="House No./ Street Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="apartment" class="form-control" placeholder="Apartment, Suit etc (Optional)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Town / City *</label>
                                <input type="text" name="city" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">State</label>
                                <select type="text" name="state" class="form-control" placeholder="">
                                    <option value="">Select</option>
                                    <option value="AP">Andhra Pradesh</option>
                                    <option value="AR">Arunachal Pradesh</option>
                                    <option value="AS">Assam</option>
                                    <option value="BR">Bihar</option>
                                    <option value="CT">Chhattisgarh</option>
                                    <option value="GA">Goa</option>
                                    <option value="GJ">Gujarat</option>
                                    <option value="HR">Haryana</option>
                                    <option value="HP">Himachal Pradesh</option>
                                    <option value="JK">Jammu and Kashmir</option>
                                    <option value="JH">Jharkhand</option>
                                    <option value="KA">Karnataka</option>
                                    <option value="KL">Kerala</option>
                                    <option value="LA">Ladakh</option>
                                    <option value="MP">Madhya Pradesh</option>
                                    <option value="MH">Maharashtra</option>
                                    <option value="MN">Manipur</option>
                                    <option value="ML">Meghalaya</option>
                                    <option value="MZ">Mizoram</option>
                                    <option value="NL">Nagaland</option>
                                    <option value="OR">Odisha</option>
                                    <option value="PB">Punjab</option>
                                    <option value="RJ">Rajasthan</option>
                                    <option value="SK">Sikkim</option>
                                    <option value="TN">Tamil Nadu</option>
                                    <option value="TS">Telangana</option>
                                    <option value="TR">Tripura</option>
                                    <option value="UK">Uttarakhand</option>
                                    <option value="UP">Uttar Pradesh</option>
                                    <option value="WB">West Bengal</option>
                                    <option value="AN">Andaman and Nicobar Islands</option>
                                    <option value="CH">Chandigarh</option>
                                    <option value="DN">Dadra and Nagar Haveli</option>
                                    <option value="DD">Daman and Diu</option>
                                    <option value="DL">Delhi</option>
                                    <option value="LD">Lakshadeep</option>
                                    <option value="PY">Pondicherry (Puducherry)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">PIN Code*</label>
                                <input type="text" name="pincode" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Phone*</label>
                                <input type="text" name="phone" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="text" name="email"  class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="total-wrapper">
                <h4 class="h3-primary"><label for="shipd" class="ship-label">
                    <input type="checkbox" name="shipping_address" id="shipd"> <span data-toggle="collapse" data-target="#shpadrs">Ship to a different address?</span></label>
                </h4>	
                <div class="form-bl">
                    <div id="shpadrs" class="collapse"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="">Order notes (optional)</label>
                                <textarea type="text" name="order_note" class="form-control" placeholder="" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="total-wrapper">
                <h4 class="cart-total">Your order</h4>
                <table class="table iyg_tblcr">
                    <tbody>
                        <tr>
                            <td width="70%">
                                <p class="tlprc"><span class="sml"><b>Product</b></span></p>
                            </td>
                            <td width="30%">
                                <p class="tlprc"><span class="sml"><b>Subtotal</b></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml">Electric Lawn Mower 12 Inches With 1200 Watt <b>x 1</b></span> </p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml nwsp"><i class="fa fa-inr"></i>249</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml">Lawn Mower Accessories <b>x 1</b></span> </p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml nwsp"><i class="fa fa-inr"></i>100</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc "><span class="sml">Shipping</span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml"> Express Shipping <br> <i class="fa fa-inr"></i>89</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml"><b>Subtotal</b></span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml nwsp"><i class="fa fa-inr"></i>349</span></p>
                            </td>
                        </tr>

                        <tr>
                            <td width="40%"><p class="tlprc"><span class="sml">GST </span> <span class="vsml">@ 18%</span></p></td>
                            <td width="60%"><p class="tlprc"><span class="sml nwsp"><i class="fa fa-inr"></i>149</span></p></td>
                        </tr>
                        <tr>
                            <td width="40%">
                                <p class="tlprc"><span class="">Total</span></p>
                            </td>
                            <td width="60%">
                                <p class="tlprc nwsp"><span class="sml"><i class="fa fa-inr"></i></span>149</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn btn-primary btn-block"> PLACE ORDER <i class="fa fa-angle-right"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <div class="clearfix"></div>
    </div>
</section>
@push('script')
<script type="text/javascript">

</script>
@endpush
@endsection('content')