@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">View Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('admin/product/view-product')}}" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Seach SKU</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                        <input name="sku" id="sku" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">Seach By Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                        <input name="name" id="name" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <select name="barnd_name" id="barnd_name" class="form-control">
                                                <option value="">Select </option>
                                                @if(!empty($brand)) @foreach($brand as $brnd)                                                    
                                                    <option value="{{$brnd->id}}">{{$brnd->barnd_name}} </option>
                                                @endforeach @endif
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <select name="category_name" id="category_name" class="form-control">
                                            <option value="">Select </option>
                                            category
                                            @if(!empty($category)) @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach @endif
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group">
                                            <button class="btn btn-primary btn-lg" type="submit">View</button>
                                        </div>
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
                                    <th>SKU</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>M.R.P</th>
                                    <th>Sale Price</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($viewProduct))
                                    @foreach($viewProduct as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->sku}}</td>
                                        <td>{{$row->barnd_name}}</td>
                                        <td>{{$row->category_name}}</td>
                                        <td>{{$row->product_name}}</td>
                                        <td><img src="{{asset($row->main_image)}}" style="width:120px;height:30px;object-fit:cover"></td>
                                        <td>{{$row->mrps}}</td>
                                        <td>{{$row->sale_price}}</td>
                                        <td>
                                            <a href="{{url('admin/product/update-product',$row->id)}}">Edit</a> / <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('admin/product/delete-product',$row->id)}}">Delete</a>
                                        </td>
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