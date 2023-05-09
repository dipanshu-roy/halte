@extends('layouts.superadmin.app')
@section('content')
<style>
.smaall_table>thead>tr>th, .smaall_table>tbody>tr>th, .smaall_table>tfoot>tr>th, .smaall_table>thead>tr>td, .smaall_table>tbody>tr>td, .smaall_table>tfoot>tr>td {
    padding: 2px 1px;
    vertical-align: middle;
    border-color: #ddd;
}
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary card-header-text">
              <div class="card-text">
                  <h4 class="card-title">Home Page</h4>
              </div>
          </div>
          <div class="card-body">
            <form method="post" action="" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Main Banner Video</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="banner_video" id="banner_video" class="form-control" type="text" maxlength="150" value="@if(!empty($update->banner_video)){{$update->banner_video}}@else{{old('banner_video')}}@endif" required>
                            <p class="small">Size (w x h) 1920px x 1080px</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="logo" id="main_image" class="form-control" type="file">
                            <p class="small">Size (w x h) 235px x 278px</p>
                            <a href="#" class="img-remove-thumb"> @if(!empty($update->logo))<i class="fa fa-times" onclick="romeve_image()"></i><img id="blah" src="{{asset($update->logo)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
                        </div>
                    </div>
                </div>

                <p><br></p>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Vision Innovation Section</label>
                    <div class="col-sm-10">
                        <p class="small">Size (w x h) 422px x 600px</p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="100">S. No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Upload</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($vision_innovation)) @foreach($vision_innovation as $vision)
                                    <tr class="tac">
                                        <td><input type="hidden" name="v_id[]" id="v_id" value="{{$vision->id}}">{{$vision->title}}</td>
                                        <td><input name="v_sr[]" id="v_sr" class="form-control text-center" type="number" value="{{$vision->sr_no}}" max="4"></td>
                                        <td>
                                            <a href="{{asset($vision->main_image)}}" target="_blank" class="">
                                            <img src="{{asset($vision->main_image)}}" alt="" width="50"></a>
                                        </td>
                                        <td><input name="v_image[]" id="v_image" class="form-control" type="file"></td>
                                        <td><input name="v_link[]" id="v_link" value="{{$vision->link}}" class="form-control" type="text" placeholder="Link"></td>
                                    </tr>
                                    @endforeach @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Our Brand Main Text</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <textarea name="brand_text_desc" id="brand_text_desc" class="form-control" rows="4">@if(!empty($update->brand_text)){{$update->brand_text}}@else{{old('brand_text')}}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>Our Brands</b></label>
                    <div class="col-sm-12">
                        <p class="small">Only for Home</p>
                        <div class="table-responsive">
                            <table class="table table-hover home_brand">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="100">#</th>
                                        <th width="100">S. No.</th>
                                        <th>Title</th>
                                        <th>Main Image<p class="small">w x h: 235 x 278</p></th>
                                        <th>Logo</th>
                                        <th>Sub Image1</th>
                                        <th>Sub Image2</th>
                                        <th>Text</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                    @if(!empty($our_brand_count)) 
                                    <tbody>
                                    @foreach($our_brand as $barns)
                                    <tr class="tac">
                                        <td><a href="{{url('admin/our-brand-delete',$barns->id)}}" onclick="return confirm('Are you sure you want to delete this ?');"><i class="fa fa-times"></i></a></td>
                                        <td><input name="brnd_id[]" id="brnd_id" type="hidden" value="{{$barns->id}}">
                                            <input name="sr_no[]" id="sr_no" class="form-control text-center" type="number" value="{{$barns->sr_no}}"></td>
                                        <td><input name="brand_title[]" id="brand_title" class="form-control" type="text" value="{{$barns->title}}"></td>
                                        <td>
                                          <a href="{{asset($barns->main_image)}}" target="_blank" class=""><img src="{{asset($barns->main_image)}}" alt="" style="height: 50px; width: auto;"></a>
                                          <input name="main_image[]" id="main_image" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td>
                                          <a href="{{asset($barns->logo)}}" target="_blank" class=""><img src="{{asset($barns->logo)}}" alt="" style="height: 50px; width: auto;"></a>
                                          <input name="brand_logo[]" id="brand_logo" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td>
                                          <a href="{{asset($barns->sub_img_1)}}" target="_blank" class=""><img src="{{asset($barns->sub_img_1)}}" alt="" style="height: 50px; width: auto;"></a>
                                          <input name="sub_img_1[]" id="sub_img_1" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td>
                                          <a href="{{asset($barns->sub_img_2)}}" target="_blank" class=""><img src="{{asset($barns->sub_img_2)}}" alt="" style="height: 50px; width: auto;"></a>
                                          <input name="sub_img_2[]" id="sub_img_2" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td><input name="brand_text[]" id="brand_text" class="form-control" type="text" placeholder="Text" value="{{$barns->text}}"></td>
                                        <td><input name="brand_link[]" id="brand_link" class="form-control" type="text" placeholder="Link" value="{{$barns->link}}"></td>
                                    </tr>
                                    @endforeach 
                                    </tbody>
                                    <tbody id="tab_logic" class="after-add-more axyz">
                                        
                                    </tbody>
                                    @else
                                    <tbody id="tab_logic" class="after-add-more">
                                        <tr class="tac">
                                            <td class="change"></td>
                                            <td><input name="sr_no[]" id="sr_no" class="form-control text-center" type="number" value="1" max="4"></td>
                                            <td><input name="brand_title[]" id="brand_title" class="form-control" type="text" value=""></td>
                                            <td><input name="main_image[]" id="main_image" class="form-control" type="file" style="width: 90px"></td>
                                            <td><input name="brand_logo[]" id="brand_logo" class="form-control" type="file" style="width: 90px"></td>
                                            <td><input name="sub_img_1[]" id="sub_img_1" class="form-control" type="file" style="width: 90px"></td>
                                            <td><input name="sub_img_2[]" id="sub_img_2" class="form-control" type="file" style="width: 90px"></td>
                                            <td><input name="brand_text[]" id="brand_text" class="form-control" type="text" placeholder="Text"></td>
                                            <td><input name="brand_link[]" id="brand_link" class="form-control" type="text" placeholder="Link"></td>
                                        </tr>
                                    </tbody>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group bmd-form-group">
                                    <a href="#" class="btn btn-link2 btn-sm add-more">+ Add More Brand Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p><br></p>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>THE FUTURE IS SUSTAINABLE</b></label>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Image <p class="small">w x h: 730 x 432</p></th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tac">
                                        <td>
                                          @if(!empty($update->future_image))
                                            <a href="{{$update->future_image}}" target="_blank" class="">
                                              <img src="{{asset($update->future_image)}}" alt="" style="height: 50px; width: auto;">
                                            </a>
                                          @endif
                                          <input name="future_image" id="future_image" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td><input name="future_title" id="future_title" class="form-control" type="text" value="@if(!empty($update->future_title)){{$update->future_title}}@else{{old('future_title')}}@endif"></td>
                                        <td><input name="future_text" id="future_text" class="form-control" type="text" placeholder="Enter Text" value="@if(!empty($update->future_text)){{$update->future_text}}@else{{old('future_text')}}@endif"></td>
                                        <td><input name="future_link" id="future_link" class="form-control" type="text" placeholder="Enter Link" value="@if(!empty($update->future_link)){{$update->future_link}}@else{{old('future_link')}}@endif"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p><br></p>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>Products We Think You'll Like</b></label>
                    <div class="col-sm-12">
                        <p class="small">Only for Home</p>
                        <div class="table-responsive">
                            <table class="table table-hover product_similar">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>S. No.</th>
                                        <th>Label</th>
                                        <th>Products (SKU)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @if($suggestion_product_count>0) 
                                    <tbody>
                                    @foreach($suggestion_product as $suggestion)
                                        <tr class="tac">
                                            <td><a href="{{url('admin/delete-sku',$suggestion->id)}}" onclick="return confirm('Are you sure you want to delete this ?');"><i class="fa fa-times"></i></a></td>
                                            <td>
                                                <input name="sugg_id[]" id="sugg_id" class="form-control text-center" type="hidden" value="{{$suggestion->id}}">
                                                <input name="sugg_sr_no[]" class="form-control text-center" type="number" value="{{$suggestion->sr_no}}" max="4">
                                            </td>
                                            <td><input name="sugg_title[]" id="sugg_title" class="form-control" type="text" value="{{$suggestion->title}}"></td>
                                            <td id="all_datas{{$suggestion->id}}"><input type="hidden" name="product_id[]" value="{{$suggestion->product_id}}"><input type="hidden" name="sku[]" value="{{$suggestion->sku}}"><a href="#">{{$suggestion->sku}}</td>
                                            <td><a href="#" onclick="get_popup({{$suggestion->id}})" data-toggle="modal" data-target="#add_product">+ Add More Product</a><td>
                                        </tr>
                                    @endforeach
                                    <tbody>
                                    <tbody id="tab_logic1" class="after-add-more1">
                                        
                                    </tbody>
                                @else
                                    <tbody id="tab_logic1" class="after-add-more1">
                                        <tr class="tac">
                                            <td class="change1"></td>
                                            <td><input name="sugg_sr_no[]" class="form-control text-center" type="number" value="1" max="4"></td>
                                            <td><input name="sugg_title[]" id="sugg_title" class="form-control" type="text" value="Top Picks"></td>
                                            <td id="all_datas1"></td>
                                            <td><a href="#" onclick="get_popup(1)" data-toggle="modal" data-target="#add_product">+ Add More Product</a></td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group bmd-form-group">
                                    <a href="#" class="add-more-similar btn btn-link2 btn-sm">+ Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p><br></p>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>Service Spare &amp; Demo</b></label>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="100">S. No.</th>
                                        <th>Image <p class="small">w x h: 600 x 516</p>
                                        </th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($service_spare)) @foreach($service_spare as $service)
                                    <tr class="tac">
                                        <td>
                                            <input name="s_id[]" id="s_id" type="hidden" value="{{$service->id}}">
                                            <input name="s_sr[]" id="s_sr" class="form-control text-center" type="number" value="{{$service->sr_no}}"></td>
                                        <td>
                                            <a href="{{asset($service->main_image)}}" target="_blank" class=""><img src="{{asset($service->main_image)}}" alt="" style="height: 50px; width: auto;"></a>
                                            <input name="s_image[]" id="s_image" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td><input name="s_title[]" id="s_title" class="form-control" type="text" value="{{$service->title}}"></td>
                                        <td><input name="s_description[]" id="s_description" class="form-control" type="text" placeholder="Text" value="{{$service->description}}"></td>
                                        <td><input name="s_link[]" id="s_link" class="form-control" type="text" placeholder="Link" value="{{$service->link}}"></td>
                                    </tr>
                                    @endforeach @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p><br></p>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>OUR HERITAGE</b></label>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                      <th>Image <p class="small">w x h: 1600 x 1086</p></th>
                                      <th>Title</th>
                                      <th>Text</th>
                                      <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tac">
                                        <td>
                                          @if(!empty($update->heritage_image))
                                            <a href="{{$update->heritage_image}}" target="_blank" class="">
                                              <img src="{{asset($update->heritage_image)}}" alt="" style="height: 50px; width: auto;">
                                            </a>
                                          @endif
                                          <input name="heritage_image" id="heritage_image" class="form-control" type="file" style="width: 90px">
                                        </td>
                                        <td>
                                          <input name="heritage_tile" id="heritage_tile" class="form-control" type="text" value="@if(!empty($update->heritage_tile)){{$update->heritage_tile}}@else{{old('heritage_tile')}}@endif"></td>
                                        <td>
                                          <input name="heritage_text" id="heritage_text" class="form-control" type="text" placeholder="Text" value="@if(!empty($update->heritage_text)){{$update->heritage_text}}@else{{old('heritage_text')}}@endif">
                                        </td>
                                        <td>
                                          <input name="heritage_link" id="heritage_link" class="form-control" type="text" placeholder="Link" value="@if(!empty($update->heritage_link)){{$update->heritage_link}}@else{{old('heritage_link')}}@endif">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p><br></p>
                <div class="row">
                    <label class="col-sm-12 col-form-label"><b>Social Links</b></label>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="100">S. No.</th>
                                        <th>Type</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tac">
                                        <td><input name="facebook_sr" id="facebook_sr" class="form-control text-center"type="number" value="@if(!empty($update->facebook_sr)){{$update->facebook_sr}}@else{{old('facebook_sr')}}@endif" max="6"></td>
                                        <td><i class="fa fa-facebook"></i></td>
                                        <td><input name="facebook" id="facebook" class="form-control" type="text" value="@if(!empty($update->facebook)){{$update->facebook}}@else{{old('facebook')}}@endif"></td>
                                    </tr>
                                    <tr class="tac">
                                        <td><input name="insta_sr" id="insta_sr" class="form-control text-center" type="number" value="@if(!empty($update->insta_sr)){{$update->insta_sr}}@else{{old('insta_sr')}}@endif" max="6"></td>
                                        <td><i class="fa fa-instagram"></i></td>
                                        <td><input name="insta" id="insta" class="form-control" type="text" value="@if(!empty($update->insta)){{$update->insta}}@else{{old('insta')}}@endif"></td>
                                    </tr>
                                    <tr class="tac">
                                        <td><input name="twitter_sr" id="twitter_sr" class="form-control text-center" type="number" value="@if(!empty($update->twitter_sr)){{$update->twitter_sr}}@else{{old('twitter_sr')}}@endif" max="6"></td>
                                        <td><i class="fa fa-twitter"></i></td>
                                        <td><input name="twitter" id="twitter" class="form-control" type="text" value="@if(!empty($update->twitter)){{$update->twitter}}@else{{old('twitter')}}@endif"></td>
                                    </tr>
                                    <tr class="tac">
                                        <td><input name="youtube_sr" id="youtube_sr" class="form-control text-center" type="number" value="@if(!empty($update->youtube_sr)){{$update->youtube_sr}}@else{{old('youtube_sr')}}@endif" max="6"></td>
                                        <td><i class="fa fa-youtube-play"></i></td>
                                        <td><input name="youtube" id="youtube" class="form-control" type="text" value="@if(!empty($update->youtube)){{$update->youtube}}@else{{old('youtube')}}@endif"></td>
                                    </tr>
                                    <tr class="tac">
                                        <td><input name="linkdin_sr" id="linkdin_sr" class="form-control text-center" type="number" value="@if(!empty($update->linkdin_sr)){{$update->linkdin_sr}}@else{{old('linkdin_sr')}}@endif" max="6"></td>
                                        <td><i class="fa fa-linkedin"></i></td>
                                        <td><input name="linkdin" id="linkdin" class="form-control" type="text" value="@if(!empty($update->linkdin)){{$update->linkdin}}@else{{old('linkdin')}}@endif"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Whatsapp No.</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="whatsapp_no" id="whatsapp_no" class="form-control" type="text" value="@if(!empty($update->whatsapp_no)){{$update->whatsapp_no}}@else{{old('whatsapp_no')}}@endif">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Page Title</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="page_title" id="page_title" class="form-control" type="text" value="@if(!empty($update->page_title)){{$update->page_title}}@else{{old('page_title')}}@endif">
                            <p class="small">For SEO</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="page_description" id="page_description" class="form-control" type="text" value="@if(!empty($update->page_description)){{$update->page_description}}@else{{old('page_description')}}@endif">
                            <p class="small">For SEO</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Keywords</label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group textarea">
                            <input name="page_keywords" id="page_keywords" class="form-control" type="text" value="@if(!empty($update->page_keywords)){{$update->page_keywords}}@else{{old('page_keywords')}}@endif">
                            <p class="small">For SEO</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                          <button class="btn btn-primary btn-lg" type="submit">Submit<div class="ripple-container"></div></button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add More Product</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-sm-3 col-form-label">Select Subcategory</label>
                    <div class="col-sm-9">
                        <div class="form-group bmd-form-group textarea">
                            <select name="sub_cat" onchange="get_subcategory(this.value)" class="form-control">
                                <option value="">Select </option>
                                @if(!empty($subcategory)) @foreach($subcategory as $subc)
                                <option value="{{$subc->id}}">{{$subc->subcategory_name}}</option>
                                @endforeach @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table smaall_table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>SKU</th>
                                    <th>Product</th>
                                </tr>
                            </thead>
                            <tbody id="sub_cat_product">
                            </tbody>
                        </table>
                        <span class="addToPopUp"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="add-pr-button btn btn-primary" data-dismiss="modal">+ Add</a>
                <button type="button" class="btn btn-link2" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
function romeve_image(){
    $(".img-remove-thumb").empty();
    $("#main_image").val('');
}
$(document).ready(() => {
    $("#main_image").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $(".img-remove-thumb").html('<i class="fa fa-times" onclick="romeve_image()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
<script>
    $(document).ready(function() {
        $(".add-more").click(function(){ 
            var tdlen = $('.home_brand tbody tr').length;
            var html = '';
            var sn=1;
            for(var i=1;i <= tdlen;i++){
                var sr = sn++;
                html = `<tr class="tac dtlen remove_`+(sr+1)+`">
                          <td class="change"><a href='#' onclick='remove_element(`+(sr+1)+`)'><i class='fa fa-times'></i></a></td>
                          <td><input name="sr_no[]" id="sr_no" class="form-control text-center" type="number" value="`+(sr+1)+`" max="4"></td>
                          <td><input name="brand_title[]" id="brand_title" class="form-control" type="text"></td>
                          <td><input name="main_image[]" id="main_image" class="form-control" type="file" style="width: 90px"></td>
                          <td><input name="brand_logo[]" id="brand_logo" class="form-control" type="file" style="width: 90px"></td>
                          <td><input name="sub_img_1[]" id="sub_img_1" class="form-control" type="file" style="width: 90px"></td>
                          <td><input name="sub_img_2[]" id="sub_img_2" class="form-control" type="file" style="width: 90px"></td>
                          <td><input name="brand_text[]" id="brand_text" class="form-control" type="text" placeholder="Text"></td>
                          <td><input name="brand_link[]" id="brand_text" class="form-control" type="text" placeholder="Link"></td>
                      </tr>`;
            }
            $(".after-add-more").append(html);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".add-more-similar").click(function(){ 
            var tdlen = $('.product_similar tbody tr').length;
            var html = '';
            var sn=1;
            for(var i=1;i <= tdlen;i++){
                var sr = sn++;
                var please = sr+1;
                html = `<tr class="tac removepr_`+(sr+1)+`">
                            <td class="change"><a href='#' onclick='remove_element1(`+(sr+1)+`)'><i class='fa fa-times'></i></a></td>
                            <td><input name="sugg_sr_no[]" class="form-control text-center" type="number" value="`+please+`" max="4"></td>
                            <td><input name="sugg_title[]" class="form-control" type="text" value="Top Picks"></td>
                            <td id="all_datas`+(sr+1)+`"></td>
                            <td><a href="#" onclick=get_popup(`+please+`) data-toggle="modal" data-target="#add_product">+ Add More Product</a></td>
                      </tr>`;
            }
            $(".after-add-more1").append(html);
        });
    });
</script>
<script>
    function get_popup(id){
        $('.addToPopUp').html(`<input type="hidden" name="pop_click_id" id="pop_click_id" value="`+id+`">`);
    }
    function remove_element(id){
        if(confirm('Are you sure you want to delete this ?')){
            $('.remove_'+id).empty();
        }
    }
    function remove_element1(id){
        if(confirm('Are you sure you want to delete this ?')){
            $('.removepr_'+id).empty();
        }
    }
    function get_subcategory(id) {
        $('#sub_cat_product').empty();
        $.ajax({
            type: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('ajax/get-product-by-subcat')}}",
            data: {sub_cat: id},
            success: function(xhr) {
                var datas = xhr.data;
                for (var i = 0; i < datas.length; i++) {
                    $('#sub_cat_product').append(`<tr>
                        <td>
                            <input type="checkbox" value="`+datas[i].id+`" data-sku=" `+datas[i].sku+`" onchange="checkbox_change()" class="add-pr-checkbox" name="products_select" id="products_select`+datas[i].id+`"/>
                        </td>
                        <td>
                            <img src="{{asset('/')}}/`+datas[i].main_image+`" style="width:30px;height:20px">
                        </td>
                        <td>
                            `+datas[i].sku+`
                        </td>
                        <td>
                            `+datas[i].product_name+`
                        </td>
                    </tr>`);
                }
            }
        });
    }
</script>
<script>
$('.add-pr-button').on('click', function(event) {
    if($('.add-pr-checkbox:checked').length>0){
        data = new Array();
        sku = new Array();
        $('.add-pr-checkbox:checked').each(function() {
            if (this.checked){
                data.push($(this).val());
                sku.push($(this).data("sku"));
            }
        });
        var click_id = $('#pop_click_id').val();
        $('#all_datas'+click_id).html(`<input type="hidden" name="product_id[]" value="`+data+`"><input type="hidden" name="sku[]" value="`+sku+`"><a href="#">`+sku+`</a>`);
    }
});
</script>
<script>
function checkbox_change(){
    var checked = $('.add-pr-checkbox:checked').length;
        $('.add-pr-button').text('+ Add ('+checked+')');
    if(checked>0){
        $('.add-pr-button').addClass('add-product');
    }else{
        $('.add-pr-button').removeClass('add-product');
    }
}
</script>
@endpush
@endsection('content')