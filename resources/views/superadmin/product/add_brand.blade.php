@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Add Brand</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('admin/product/save-brand')}}" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="hidden" name="id" value="@if(!empty($update->id)){{$update->id}}@endif">
                                        <input type="text" name="barnd_name" class="form-control" value="@if(!empty($update->barnd_name)){{$update->barnd_name}}@else{{old('barnd_name')}}@endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="file" name="logo" class="form-control" value="">
                                        @if(!empty($update->logo))
                                            <img src="{{asset($update->logo)}}" style="width:50px;height:30px;object-fit:cover">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Whatsapp No.</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="text" name="whatsapp" class="form-control" value="@if(!empty($update->whatsapp)){{$update->whatsapp}}@else{{old('whatsapp')}}@endif" pattern="[0-9]*" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
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
                                        <th>Barnd Name</th>
                                        <th>Logo</th>
                                        <th>Whats App</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($result))
                                    @foreach($result as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->barnd_name}}</td>
                                        <td style="background: #d1d1d1;">@if(!empty($row->logo))<img src="{{asset($row->logo)}}" style="width:120px;height:30px;object-fit:cover">@endif</td>
                                        <td>{{$row->whatsapp}}</td>
                                        <td><a href="{{url('admin/product/update-brand',$row->id)}}">Edit</a> / <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('admin/product/delete-brand',$row->id)}}">Delete</a></td>
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