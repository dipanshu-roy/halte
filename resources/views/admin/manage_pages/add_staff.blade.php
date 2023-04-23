@extends('layouts.admin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Add Staff</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('add-staff')}}" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="hidden" name="id" value="@if(!empty($update->id)){{$update->id}}@endif">
                                        <input type="text" name="name" class="form-control" value="@if(!empty($update->name)){{$update->name}} @else {{old('name')}}@endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="password" name="password" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="email" name="email" class="form-control" value="@if(!empty($update->email)){{$update->email}}@else{{old('email')}}@endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="text" name="mobile" class="form-control" value="@if(!empty($update->mobile)){{$update->mobile}}@else{{old('mobile')}}@endif" pattern="[0-9]*" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <select name="type" class="form-control" required>
                                            <option value="0" @if(!empty($update->type)) @if($update->type=='admin') selected @endif @endif>Admin</option>
                                            <option value="1" @if(!empty($update->type)) @if($update->type=='staff') selected @endif @endif>Staff</option>
                                        </select>
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
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($result))
                                    @foreach($result as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->mobile}}</td>
                                        <td>{{$row->type}}</td>
                                        <td><a href="{{url('update-staff',$row->id)}}">Edit</a> @if($row->id!=1)/ <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('delete-staff',$row->id)}}">Delete</a>@endif</td>
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