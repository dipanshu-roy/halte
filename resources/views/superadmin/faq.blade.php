@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">FAQs</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('admin/faq')}}" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="hidden" name="id" value="@if(!empty($updateFaq->id)){{$updateFaq->id}}@endif">
                                        <select name="category_id" id="" class="form-control" required>
                                            <option value="">Select</option>
                                            @if(!empty($faqcategory))
                                            @foreach($faqcategory as $cat)
                                            <option value="{{$cat->id}}" @if(!empty($updateFaq->category_id))
                                                @if($updateFaq->category_id==$cat->id) selected @endif
                                                @endif>{{$cat->category_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="tab_logic" class="after-add-more">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <div class="form-group bmd-form-group textarea">
                                                    <input class="form-control" maxlength="100" type="text" name="title" id="title"  value="@if(!empty($updateFaq->title)){{$updateFaq->title}}@endif" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Text</label>
                                            <div class="col-sm-10">
                                                <div class="form-group bmd-form-group textarea">
                                                    <textarea name="text" id="text" class="form-control" rows="10" required>@if(!empty($updateFaq->text)){{$updateFaq->text}}@endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <a class="btn btn-sm btn-link2 add-more">+ Add More</a>
                                    </div>
                                </div>
                            </div> -->
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
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($resultFaq))
                                        @foreach($resultFaq as $row)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->category_name}}</td>
                                            <td>{{$row->title}}</td>
                                            <td>{{$row->text}}</td>
                                            <td>
                                                <a href="{{url('admin/update-faq',$row->id)}}">Edit</a> / 
                                                <a onclick="return confirm('Are you sure you want to delete this ?');"href="{{url('admin/delete-faq',$row->id)}}">Delete</a>
                                            </td>
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
            @push('script')
            <script>
            $(document).ready(function() {
                $(".add-more").click(function() {
                    var html = $("#tab_logic").html();
                    $(".after-add-more").after(html);
                    $(".change").append(
                        "<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>"
                        );
                });
                $("body").on("click", ".remove", function() {
                    $(this).parents("#tab_logic").remove();
                });
            });
            </script>
            @endpush
            @endsection('content')