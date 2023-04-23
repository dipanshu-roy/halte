@extends('layouts.superadmin.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Blog</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{url('admin/blog')}}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="title" class="form-control" type="text" value="@if(!empty($updateBlog->title)){{$updateBlog->title}}@endif">
                                            <input type="hidden" name="id" value="@if(!empty($updateBlog->id)){{$updateBlog->id}}@endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Text</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <textarea name="text" id="" class="form-control" rows="10">@if(!empty($updateBlog->text)){{$updateBlog->text}}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="image" id="" class="form-control" type="file" value="@if(!empty($updateBlog->image)){{$updateBlog->image}}@endif">
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
                                <table id="example" class="display" style="width:100%">
                                        <thead class="text-primary">
                                            <tr> 
                                                <th>S. No.</th>
                                                <th>Title</th>
                                                <th>Text</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(!empty($resultBlog))
                                            @foreach($resultBlog as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->text}}</td>
                                                <td>@if(!empty($row->image))<img src="{{asset($row->image)}}" style="width:50px;height:30px;object-fit:cover">@endif</td>
                                                <td><a href="{{url('admin/update-blog',$row->id)}}">Edit</a> / <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('admin/delete-blog',$row->id)}}">Delete</a></td>
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