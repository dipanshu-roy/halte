@extends('layouts.admin.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
<div class="col-md-12">
  <div class="card ">
    <div class="card-header card-header-primary card-header-text">
      <div class="card-text">
        <h4 class="card-title">News Media</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="post" action="{{url('news-media')}}" class="form-horizontal" enctype="multipart/form-data">
      @csrf
<div class="row">
  <label class="col-sm-2 col-form-label">Text</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <textarea name="text" id="" class="form-control" rows="10" value=""></textarea>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Image Certificate</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input class="form-control" type="file" name="image_certificate" id="image_certificate" value="">
      <p class="small">Size (w x h) 668px x 484px</p>
      <div class="row">
          <div class="col-sm-12">
              <a href="#" class="img-remove-thumb1"> @if(!empty($resultNewsMe->image_certificate))<i class="fa fa-times" onclick="romeve_image1()"></i><img src="{{asset($resultNewsMe->image_certificate)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Market Place Logos</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="market_place_logos" class="form-control" type="file" name="market_place_logos" value="">
      <p class="small">Size (w x h) 528px x 448px</p>
      <a href="#" class="img-remove-thumb2"> @if(!empty($resultNewsMe->market_place_logos))<i class="fa fa-times" onclick="romeve_image2()"></i><img src="{{asset($resultNewsMe->market_place_logos)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Vendor Logos</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="vendor_logos" class="form-control" type="file" name="vendor_logos" value="">
      <p class="small">Size (w x h) 528px x 448px</p>
      <a href="#" class="img-remove-thumb3"> @if(!empty($resultNewsMe->vendor_logos))<i class="fa fa-times" onclick="romeve_image3()"></i><img src="{{asset($resultNewsMe->vendor_logos)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Media Image Normal</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="media_image_normal" class="form-control" type="file" name="media_image_normal" value="">
      <p class="small">Size (w x h) 600px x 469px</p>
      <a href="#" class="img-remove-thumb4"> @if(!empty($resultNewsMe->media_image_normal))<i class="fa fa-times" onclick="romeve_image4()"></i><img src="{{asset($resultNewsMe->media_image_normal)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Media Image Enlarge</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="media_image_enlarge" class="form-control" type="file" name="media_image_enlarge" value="">
      <p class="small">Size (w x h) 600px x max:1000px</p>
      <a href="#" class="img-remove-thumb5"> @if(!empty($resultNewsMe->media_image_enlarge))<i class="fa fa-times" onclick="romeve_image5()"></i><img src="{{asset($resultNewsMe->media_image_enlarge)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      
      <a href="#" class="btn btn-link2">+ Add More Media</a>
      

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Page Title</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="page_title" id="" maxlength="100" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Description</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="description" id="" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Keywords</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="keywords" id="" maxlength="100" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>


<div class="row">
  <label class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group">
      <button class="btn btn-primary btn-lg" type="submit">Submit</button>
    </div>
  </div>
</div>
      </form>
    </div>
  </div>
</div>

@push('script')
    <script>
        function romeve_image1(){
            $(".img-remove-thumb1").empty();
            $("#image_certificate").val('');
        }
        function romeve_image2(){
            $(".img-remove-thumb2").empty();
            $("#market_place_logos").val('');
        }
        function romeve_image3(){
            $(".img-remove-thumb3").empty();
            $("#vendor_logos").val('');
        }
        function romeve_image4(){
            $(".img-remove-thumb4").empty();
            $("#media_image_normal").val('');
        }
        function romeve_image5(){
            $(".img-remove-thumb5").empty();
            $("#media_image_enlarge").val('');
        }
    </script>
    <script>
        $(document).ready(() => {
            $("#image_certificate").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb1").html('<i class="fa fa-times" onclick="romeve_image1()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $("#market_place_logos").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb2").html('<i class="fa fa-times" onclick="romeve_image2()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $("#vendor_logos").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb3").html('<i class="fa fa-times" onclick="romeve_image3()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $("#media_image_normal").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb4").html('<i class="fa fa-times" onclick="romeve_image4()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        $(document).ready(() => {
            $("#media_image_enlarge").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb5").html('<i class="fa fa-times" onclick="romeve_image5()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush

@endsection('content')