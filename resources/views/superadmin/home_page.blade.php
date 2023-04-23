@extends('layouts.superadmin.app')
@section('content')
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
      <form method="get" action="/" class="form-horizontal">

<div class="row">
  <label class="col-sm-2 col-form-label">Main Banner Video</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" value="">
      <p class="small">Size (w x h) 1920px x 1080px</p>
      <!-- <a href="#" class="img-remove-thumb"><img src="../assets/img/logo.png" alt="" width="100" class=""></a> -->

    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Logo</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="file" value="">
      <p class="small">Size (w x h) 235px x 278px</p>
      <a href="#" class="img-remove-thumb"><img src="../assets/img/logo.png" alt="" width="100" class=""></a>

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
<tr class="tac">
<td>Vision &amp; Innovation</td>
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="4"></td>
<td><a href="../assets/img/vsn-1.jpg" target="_blank" class=""><img src="../assets/img/vsn-1.jpg" alt="" width="50" ></a></td>
<td><input name="" id="" class="form-control" type="file" ></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>
<tr class="tac">
<td>The Halte Way</td>
<td><input name="" id="" class="form-control text-center" type="number" value="2" max="4"></td>
<td><a href="../assets/img/vsn-3.jpg" target="_blank" class=""><img src="../assets/img/vsn-2.jpg" alt="" width="50" ></a></td>
<td><input name="" id="" class="form-control" type="file" ></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>
<tr class="tac">
<td>Smart Living</td>
<td><input name="" id="" class="form-control text-center" type="number" value="3" max="4"></td>
<td><a href="../assets/img/vsn-3.jpg" target="_blank" class=""><img src="../assets/img/vsn-3.jpg" alt="" width="50" ></a></td>
<td><input name="" id="" class="form-control" type="file" ></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>
<tr class="tac">
<td>In focus</td>
<td><input name="" id="" class="form-control text-center" type="number" value="4" max="4"></td>
<td><a href="../assets/img/vsn-4.jpg" target="_blank" class=""><img src="../assets/img/vsn-4.jpg" alt="" width="50" ></a></td>
<td><input name="" id="" class="form-control" type="file" ></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>


</tbody>
</table>
</div>



  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Our Brand Main Text</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <textarea name="" id="" class="form-control" rows="4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi officia ipsa fugiat vero rem, laborum cumque quae nobis, incidunt dolorum corporis expedita. Nesciunt quis animi ipsa adipisci, doloribus fuga quia.</textarea>
    </div>
  </div>
</div>


<div class="row">
  <label class="col-sm-12 col-form-label"><b>Our Brands</b></label>
  <div class="col-sm-12">
      <p class="small">Only for Home</p>
    
<div class="table-responsive">
<table class="table table-hover">
<thead class="text-primary">
<tr> 
<th width="100">S. No.</th>
<th>Title</th>
<th>Main Image 
<p class="small">w x h: 235 x 278</p>

</th>
<th>Logo</th>
<th>Sub Image1</th>
<th>Sub Image2</th>
<th>Text</th>
<th>Link</th>
</tr>
</thead>

<tbody>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="4"></td>
<td><input name="" id="" class="form-control" type="text" value="Equipments with industrial quality"></td>
<td><a href="../assets/img/brand-bkr.jpg" target="_blank" class=""><img src="../assets/img/brand-bkr.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/bkr-logo-home.png" target="_blank" class=""><img src="../assets/img/bkr-logo-home.png" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/bkr-product-hm1.jpg" target="_blank" class=""><img src="../assets/img/bkr-product-hm1.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/bkr-product-hm2.jpg" target="_blank" class=""><img src="../assets/img/bkr-product-hm2.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>



<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="2" max="4"></td>
<td><input name="" id="" class="form-control" type="text" value="Equipments with industrial quality"></td>
<td><a href="../assets/img/brand-bkr.jpg" target="_blank" class=""><img src="../assets/img/brand-bkr.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/gorilla-logo.png" target="_blank" class=""><img src="../assets/img/gorilla-logo.png" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/bkr-product-hm1.jpg" target="_blank" class=""><img src="../assets/img/bkr-product-hm1.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><a href="../assets/img/bkr-product-hm2.jpg" target="_blank" class=""><img src="../assets/img/bkr-product-hm2.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>



</tbody>
</table>
</div>

<div class="row">
  <!-- <label class="col-sm-2 col-form-label"></label> -->
  <div class="col-sm-12">
    <div class="form-group bmd-form-group">
      <a href="#" class="btn btn-link2 btn-sm">+ Add More Brand Home</a>
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
<th width="100">S. No.</th>
<th>Image 
<p class="small">w x h: 730 x 432</p>

</th>
<th>Title</th>
<th>Text</th>
<th>Link</th>
</tr>
</thead>

<tbody>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="4"></td>

<td><a href="../assets/img/about-sustainable.jpg" target="_blank" class=""><img src="../assets/img/about-sustainable.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><input name="" id="" class="form-control" type="text" value="THE FUTURE IS SUSTAINABLE"></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
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
<table class="table table-hover">
<thead class="text-primary">
<tr> 
<th width="100">S. No.</th>
<th>Label</th>
<th>Products (SKU)</th>
<th></th>
</tr>
</thead>

<tbody>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="4"></td>
<td><input name="" id="" class="form-control" type="text" value="Top Picks"></td>
<td>
<a href="#">SKU12313</a>,  
<a href="#">SKU12314</a>,  
<a href="#">SKU12316</a>,  
<a href="#">SKU12358</a>,  
<a href="#">SKU12365</a>
</td>
<td><a href="#" data-toggle="modal" data-target="#add-product">+ Add More Product</a></td>
</tr>



</tbody>
</table>
</div>

<div class="modal fade" id="issue-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add More Product</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="material-icons">clear</i>
      </button>
    </div>
    <div class="modal-body">


<div class="row">
  <div class="col-sm-3">
         <p class="mb-0 text-right"> Link</p>
  </div>
  <div class="col-sm-9">
    <p class="mb-0"><b>Top Pick</b></p>
  </div>
</div>

<div class="row">
  <label class="col-sm-3 col-form-label">SKU</label>
  <div class="col-sm-9">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" placeholder="">
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <div class="form-group bmd-form-group textarea">
      <a href="#" data-toggle="modal" data-target="#add-product">+ Add</a>
    </div>
  </div>
</div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary">Update</button>
      <button type="button" class="btn btn-link2" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>


<div class="row">
  <!-- <label class="col-sm-2 col-form-label"></label> -->
  <div class="col-sm-12">
    <div class="form-group bmd-form-group">
      <a href="#" class="btn btn-link2 btn-sm">+ Add More</a>
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
<th>Image 
<p class="small">w x h: 600 x 516</p>

</th>
<th>Title</th>
<th>Text</th>
<th>Link</th>
</tr>
</thead>

<tbody>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="2"></td>

<td><a href="../assets/img/srvs1.jpg" target="_blank" class=""><img src="../assets/img/srvs1.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><input name="" id="" class="form-control" type="text" value="SERVICE & SPARES"></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="2" max="2"></td>

<td><a href="../assets/img/srvs2.jpg" target="_blank" class=""><img src="../assets/img/srvs2.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><input name="" id="" class="form-control" type="text" value="DEMO INSTALLATION"></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
</td>
</tr>


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
<!-- <th width="100">S. No.</th> -->
<th>Image 
<p class="small">w x h: 1600 x 1086</p>

</th>
<th>Title</th>
<th>Text</th>
<th>Link</th>
</tr>
</thead>

<tbody>
<tr class="tac">
<!-- <td><input name="" id="" class="form-control text-center" type="number" value="1" max="2"></td> -->

<td><a href="../assets/img/heritage.jpg" target="_blank" class=""><img src="../assets/img/heritage.jpg" alt="" style="height: 50px; width: auto;" ></a>
<input name="" id="" class="form-control" type="file" style="width: 90px">
</td>
<td><input name="" id="" class="form-control" type="text" value="OUR HERITAGE"></td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Text">
</td>
<td>
<input name="" id="" class="form-control" type="text" placeholder="Link">
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
<td><input name="" id="" class="form-control text-center" type="number" value="1" max="6"></td>
<td><i class="fa fa-facebook"></i></td>
<td><input name="" id="" class="form-control" type="text" value="#"></td>
</tr>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="2" max="6"></td>
<td><i class="fa fa-instagram"></i></td>
<td><input name="" id="" class="form-control" type="text" value="#"></td>
</tr>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="3" max="6"></td>
<td><i class="fa fa-twitter"></i></td>
<td><input name="" id="" class="form-control" type="text" value="#"></td>
</tr>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="4" max="6"></td>
<td><i class="fa fa-youtube-play"></i></td>
<td><input name="" id="" class="form-control" type="text" value="#"></td>
</tr>
<tr class="tac">
<td><input name="" id="" class="form-control text-center" type="number" value="5" max="6"></td>
<td><i class="fa fa-linkedin"></i></td>
<td><input name="" id="" class="form-control" type="text" value="#"></td>
</tr>


</tbody>
</table>
</div>


  </div>
</div>


<!-- <div class="row">
  <label class="col-sm-2 col-form-label">State</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <select name="" id="" class="form-control">
        <option value="">Select </option>
        <option value="">Punjab</option>
        <option value="">Haryana</option>
      </select>
    </div>
  </div>
</div> -->
<div class="row">
  <label class="col-sm-2 col-form-label">Whatsapp No.</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" value="">
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Page Title</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Description</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label">Keywords</label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group textarea">
      <input name="" id="" class="form-control" type="text" value="">
      <p class="small">For SEO</p>
    </div>
  </div>
</div>

<div class="row">
  <label class="col-sm-2 col-form-label"></label>
  <div class="col-sm-10">
    <div class="form-group bmd-form-group">
      <a href="#" class="btn btn-primary btn-lg">Save</a>
    </div>
  </div>
</div>
      </form>
    </div>
  </div>
</div>


@endsection('content')