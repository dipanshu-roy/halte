@extends('layouts.admin.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Offers</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{url('offers')}}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Text</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <textarea name="text" id="" class="form-control" rows="10">@if(!empty($updateOffer->text)){{$updateOffer->text}}@endif</textarea>
                                            <input name="id" type="hidden" value="@if(!empty($updateOffer->id)){{$updateOffer->id}}@endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="image" id="" class="form-control" type="file" value="">
                                            @if(isset($updateOffer->image))
                                            <img src="{{asset($updateOffer->image)}}" height="100" width="100"></img>
                                            @else
                                            <img src="{{ asset('admin/img/vue.png') }}" height="100" width="100"></img>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="link" class="form-control" type="text" value="@if(!empty($updateOffer->link)){{$updateOffer->link}}@endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Page Title</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="page_title" class="form-control" type="text" value="@if(!empty($updateOffer->page_title)){{$updateOffer->page_title}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="description" class="form-control" type="text" value="@if(!empty($updateOffer->description)){{$updateOffer->description}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Keywords</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="keyword" class="form-control" type="text" value="@if(!empty($updateOffer->keyword)){{$updateOffer->keyword}}@endif">
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
                                        <th>Text</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            @if(!empty($resultOffers))
                                            @foreach($resultOffers as $row)
                                            <tr class="tac">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->text}}</td>
                                                <td>@if(!empty($row->image))<img src="{{asset($row->image)}}" style="width:50px;height:30px;object-fit:cover">@endif</td>
                                                <td><a href="{{$row->link}}">View</a></td>
                                                <td><a href="{{url('update-offer',$row->id)}}">Edit</a> / <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('delete-offer',$row->id)}}">Delete</a></td>
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