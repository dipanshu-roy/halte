@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Dealer Form Queries</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('admin/dealer-query')}}" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Search</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">From</label>
                                        <div class="col-sm-8">
                                            <div class="form-group bmd-form-group textarea">
                                                <input type="text" class="form-control datepicker" name="start_date"
                                                    value="">
                                                <span class="material-input"></span>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">To</label>
                                        <div class="col-sm-8">
                                            <div class="form-group bmd-form-group textarea">
                                                <input type="text" class="form-control datepicker" name="end_date"
                                                    value="">
                                                <span class="material-input"></span>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
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
                                <table id="example" class="display" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($dealerQuery))
                                        @foreach($dealerQuery as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->city}}</td>
                                            <td>{{$row->message}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')