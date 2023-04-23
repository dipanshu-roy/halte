@extends('layouts.superadmin.app')
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
      <form method="post" action="{{url('admin/news-media')}}" class="form-horizontal" enctype="multipart/form-data">
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
      <input class="form-control" type="file" name="image_certificate" value="">
      <p class="small">Size (w x h) 668px x 484px</p>

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Market Place Logos</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="" class="form-control" type="file" name="market_place_logos" value="">
      <p class="small">Size (w x h) 528px x 448px</p>

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Vendor Logos</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="" class="form-control" type="file" name="vendor_logos" value="">
      <p class="small">Size (w x h) 528px x 448px</p>

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Media Image Normal</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="" class="form-control" type="file" name="media_image_normal" value="">
      <p class="small">Size (w x h) 600px x 469px</p>

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Media Image Enlarge</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input id="" class="form-control" type="file" name="media_image_enlarge" value="">
      <p class="small">Size (w x h) 600px x max:1000px</p>

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
      <input name="page_title" id="" class="form-control" type="text" value="">
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
      <input name="keywords" id="" class="form-control" type="text" value="">
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

@endsection('content')