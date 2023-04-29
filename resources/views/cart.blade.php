@extends('layouts.web.app')
@section('content')
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
                    @if(!empty($cart_data)) @foreach($cart_data as $rows)
                    @php $cart = session()->get('cart'); $quantity  = $cart[$rows->id]['quantity']; @endphp
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
                <form action="" method="post" class="">
                    <div class="col-sm-5 plr0">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Coupon Code">
                        </div>
                    </div>
                    <div class="col-sm-5 plr0">
                        <div class="form-group">
                            <button class="btn btn-secondary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="offer-prod">
                        <div class="col-sm-12 plr0">
                            <div class="ofr-bx">
                                <h3 class="h3ofr-tl">Summer Offer</h3>
                                <p class="ofr-lead">
                                    10% Instant Discount up to INR 500 on Prepaid Trxns. Min purchase value INR 2000
                                    Use <b>Coupon Code: SUMMER10</b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="offer-prod">
                        <div class="col-sm-12 plr0">
                            <div class="ofr-bx">
                                <h3 class="h3ofr-tl">Summer Offer</h3>
                                <p class="ofr-lead">
                                    10% Instant Discount up to INR 500 on Prepaid Trxns. Min purchase value INR 2000
                                    Use <b>Coupon Code: SUMMER10</b>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>149</p>
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

                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml">Discount/Coupon </span></p>
                            </td>
                            <td>
                                <p class="tlprc">- <span class="sml"><i class="fa fa-inr"></i></span>200</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="tlprc"><span class="sml">GST </span> <span class="vsml">@ 18%</span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>149</p>
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <p class="tlprc"><span class="">Total</span></p>
                            </td>
                            <td>
                                <p class="tlprc"><span class="sml"><i class="fa fa-inr"></i></span>149</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><a href="login.html" class="btn btn-primary btn-block "> PROCEED TO
                                    CHECKOUT <i class="fa fa-angle-right"></i></a>
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
                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm1.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>

                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm2.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>

                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm3.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>

                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm4.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>
                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 0;" aria-label=""></div>
                            <span class="nb-rw"></span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>

                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm5.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>


                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm6.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>


                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm7.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>

                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>

                <div class="prd-cntr">
                    <a href="#">
                        <div class="pro-im">
                            <img src="images/product-hm8.jpg" class="">
                        </div>
                        <div class="prod-card-price">
                            <div class="bndl-prod-price-sale"><i class="fa fa-inr"></i> 3,349</div>
                            <div class="bndl-prod-price-mrps"><i class="fa fa-inr"></i> <span>3,800</span> Save 28%
                            </div>
                        </div>

                        <div class="prod-card-rating">
                            <div class="Stars" style="--rating: 4.2;" aria-label=""></div>
                            <span class="nb-rw">856</span>
                        </div>
                        <h3 class="prod-nm"><span class="brand">BRK</span> Electric Lawn Mower 12 Inches With 1200
                            Watt</h3>
                    </a>
                    <a href="#" class="btn btn-atcr">ADD TO CART</a>
                </div>
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
@endpush
@endsection('content')