@extends('layouts.superadmin.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">About Us</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" action="{{url('admin/about-us')}}" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Text</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <textarea name="text" id="" class="form-control" rows="10">@if(!empty($PageContent->text)){{$PageContent->text}}@endif</textarea>
                                            <input name="id" type="hidden" value="@if(!empty($PageContent->id)){{$PageContent->id}}@endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="image" id="image" class="form-control" type="file" value="">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="#" class="img-remove-thumb"> @if(!empty($PageContent->image))<i class="fa fa-times" onclick="romeve_image()"></i><img id="blah" src="{{asset($PageContent->image)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Page Title</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="page_title" maxlength="50" class="form-control" type="text" value="@if(!empty($PageContent->page_title)){{$PageContent->page_title}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="description" class="form-control" type="text" value="@if(!empty($PageContent->description)){{$PageContent->description}}@endif">
                                            <p class="small">For SEO</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Keywords</label>
                                    <div class="col-sm-10">
                                        <div class="form-group bmd-form-group textarea">
                                            <input name="keyword"  maxlength="100" class="form-control" type="text" value="@if(!empty($PageContent->keyword)){{$PageContent->keyword}}@endif">
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

    @push('script')
    <script>
        function romeve_image(){
            $(".img-remove-thumb").empty();
            $("#image").val('');
        }
    </script>
    <script>
        $(document).ready(() => {
            $("#image").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb").html('<i class="fa fa-times" onclick="romeve_image()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    @endpush
@endsection('content')