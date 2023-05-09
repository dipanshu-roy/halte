@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Orders Reports</h4>
                        </div>
                    </div>
                    <div class="card-header card-header-primary card-header-text"></div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table id="example" class="display" style="width:100%">
                                <thead class="text-primary">
                                <tr> 
                                    <th>S. No.</th>
                                    <th>OrderID</th>
                                    <th>On</th>
                                    <th>Client Name</th>
                                    <th>Email/Mobile</th>
                                    <th>City</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($result))
                                    @foreach($result as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($row->status==1)
                                                <a href="{{url('admin/reviews-unapprove',$row->id)}}" class="text-danger">Approved</a></td>
                                            @else
                                                <a href="{{url('admin/reviews-approve',$row->id)}}" class="text-success">Unapprove</a></td>
                                            @endif
                                        <td>
                                            @for($i=0;$i < $row->rating;$i++)
                                                <i class="fa fa-star" style="color:#ffcc00"><i>
                                            @endfor
                                        </td>
                                        <td>{{$row->name}}<br/>{{$row->email}}</td>
                                        <td>{{$row->product_name}} <img src="{{asset($row->main_image)}}" style="width:30px;height:30px"></td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->description}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('admin/delete-reviews',$row->id)}}">Delete</a>
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