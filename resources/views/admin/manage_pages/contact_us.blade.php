@extends('layouts.admin.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Contact Us</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{url('contact-us')}}" class="form-horizontal">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Map Link</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="map_link" maxlength="100" class="form-control" type="text" value="@if(!empty($ContactPageContent->map_link)){{$ContactPageContent->map_link}}@endif">
                                            <input name="id" type="hidden" value="@if(!empty($ContactPageContent->id)){{$ContactPageContent->id}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Page Title</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="page_title" maxlength="50" class="form-control" type="text" value="@if(!empty($ContactPageContent->page_title)){{$ContactPageContent->page_title}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="description" class="form-control" type="text" value="@if(!empty($ContactPageContent->description)){{$ContactPageContent->description}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Keywords</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="keyword" maxlength="100" class="form-control" type="text" value="@if(!empty($ContactPageContent->keyword)){{$ContactPageContent->keyword}}@endif">
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
            </div>
        </div>
    </div>

@endsection('content')