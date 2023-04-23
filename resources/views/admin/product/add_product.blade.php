@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('product/save-product')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <label class="col-sm-2 col-form-label">Main Category</label>
                            <div class="col-sm-10">
                                <div class="form-group bmd-form-group textarea">
                                <input type="hidden" name="id" value="@if(!empty($update->id)){{$update->id}}@endif">
                                <select name="category_id" class="form-control">
                                    <option value="">Select </option>
                                    @if(!empty($category)) 
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}" @if(!empty($update->category_id)) @if($update->category_id==$cat->id) selected @endif @endif>{{$cat->category_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="subcategory_name" maxlength="100" class="form-control" type="text" value="@if(!empty($update->subcategory_name)){{$update->subcategory_name}}@else{{old('subcategory_name')}}@endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Banner Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="banner_image" class="form-control" type="file">
                                        <p class="small">Size (w x h) 1600px x 450px</p>
                                        @if(!empty($update->banner_image))
                                            <img src="{{asset($update->banner_image)}}" style="width:80px;height:30px;object-fit:cover">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Page Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_title" class="form-control" maxlength="150" type="text" value="@if(!empty($update->page_title)){{$update->page_title}}@else{{old('page_title')}}@endif">
                                        <p class="small">For SEO</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_description" class="form-control" maxlength="255" type="text" value="@if(!empty($update->page_description)){{$update->page_description}}@else{{old('page_description')}}@endif">
                                        <p class="small">For SEO</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Keywords</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_keywords" class="form-control" maxlength="255" type="text" value="@if(!empty($update->page_keywords)){{$update->page_keywords}}@else{{old('page_keywords')}}@endif">
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


            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text"></div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table id="example" class="display" style="width:100%">
                                <thead class="text-primary">
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Main Category</th>
                                        <th>Sub Category Name</th>
                                        <th>Banner Image</th>
                                        <th>Page Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($result))
                                    @foreach($result as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->category_name}}</td>
                                        <td>{{$row->subcategory_name}}</td>
                                        <td>@if(!empty($row->banner_image))<img src="{{asset($row->banner_image)}}" style="width:50px;height:30px;object-fit:cover">@endif</td>
                                        <td>{{$row->page_title}}</td>
                                        <td><a href="{{url('product/update-product-sub-category',$row->id)}}">Edit</a> / <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('product/delete-product-sub-category',$row->id)}}">Delete</a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')