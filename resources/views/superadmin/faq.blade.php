@extends('layouts.superadmin.app')
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-primary card-header-text">
                <div class="card-text">
                    <h4 class="card-title">FAQs</h4>
                </div>
                </div>
                <div class="card-body">
                <form method="post" action="{{url('admin/faq')}}" class="form-horizontal">
                @csrf

            <div class="row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <div class="form-group bmd-form-group textarea">
                <select name="category" id="" class="form-control">
                    <option value="Category1">Category 1</option>
                    <option value="Category2">Category 2</option>
                </select>
                </div>
            </div>
            </div>

            <div class="row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <div class="form-group bmd-form-group textarea">
                <input class="form-control" type="text" name="title" value="">
                </div>
            </div>
            </div>

            <div class="row">
            <label class="col-sm-2 col-form-label">Text</label>
            <div class="col-sm-10">
                <div class="form-group bmd-form-group textarea">
                <textarea name="text" id="" class="form-control" rows="10" value=""></textarea>
                </div>
            </div>
            </div>

            <div class="row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <div class="form-group bmd-form-group textarea">
                <a href="#" class="btn btn-link2">+ Add More</a>
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


            <div class="col-md-12">
            <div class="card ">
            <div class="card-header card-header-primary card-header-text">
            </div>
            <div class="card-body">
            <p><br></p>
            <div class="col-md-12">

            <div class="table-responsive">
            <table class="table">
            <thead class="text-primary">
            <tr> 
            <th>S. No.</th>
            <th>Category</th>
            <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <tr class="tac">
            <td>1</td>
            <td>Lawn & Mowers</td>
            <td><a href="#" target="_blank">View</a> / <a href="#" target="_blank">Edit</a> / <a href="#" target="_blank">Delete</a></td>
            </tr>

            </tbody>
            </table>
            </div>
            </div>

            <br>
            <br>




            </div>
            </div>
            </div>

@endsection('content')