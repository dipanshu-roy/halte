@extends('layouts.superadmin.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('admin/product/save-product')}}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input type="hidden" name="id" value="@if(!empty($update->id)){{$update->id}}@endif">
                                        <input name="product_name" maxlength="100" class="form-control" type="text" value="@if(!empty($update->product_name)){{$update->product_name}}@else{{old('product_name')}}@endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Main Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <select name="category_id" class="form-control" onchange="get_subcategory(this.value)">
                                        <option value="">Select </option>
                                        @if(!empty($category)) 
                                            @foreach($category as $cat)
                                            <option value="{{$cat->id}}" @if(!empty($update->category_id)) @if($update->category_id==$cat->id) selected @endif @endif>{{$cat->category_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Category</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select </option>
                                        @if(!empty($subcategory)) 
                                            @foreach($subcategory as $subcat)
                                            <option value="{{$subcat->id}}" @if(!empty($update->subcategory_id)) @if($update->subcategory_id==$subcat->id) selected @endif @endif>{{$subcat->subcategory_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select </option>
                                        @if(!empty($brand)) 
                                            @foreach($brand as $bra)
                                            <option value="{{$bra->id}}" @if(!empty($update->brand_id)) @if($update->brand_id==$bra->id) selected @endif @endif>{{$bra->barnd_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Main Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="main_image" id="main_image" class="form-control" type="file">
                                        <p class="small">Size (w x h) 750px x 750px</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="#" class="img-remove-thumb"> @if(!empty($update->main_image))<i class="fa fa-times" onclick="romeve_image()"></i><img id="blah" src="{{asset($update->main_image)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Images</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group sub_images">
                                        <input name="sub_images[]" id="sub_images" class="form-control" type="file" multiple>
                                        <p class="small">Size (w x h) 750px x 750px</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="#" class="img-remove-thumb-1"> @if(!empty($update->main_image))<i class="fa fa-times" onclick="romeve_image_1()"></i><img id="blah_1" src="{{asset($update->main_image)}}" alt="" width="100" class="img-thumbnail"> @endif</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Video</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <input name="video" id="video" class="form-control" maxlength="255" type="text" value="@if(!empty($update->video)){{$update->video}}@else{{old('video')}}@endif">
                                    <p class="small">Youtube Link</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">M.R.P.S</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <input name="mrps" id="mrps" class="form-control" maxlength="11" type="text" value="@if(!empty($update->mrps)){{$update->mrps}}@else{{old('mrps')}}@endif" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sale Price</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <input name="sale_price" id="sale_price" class="form-control" maxlength="11" type="text" value="@if(!empty($update->sale_price)){{$update->sale_price}}@else{{old('sale_price')}}@endif" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Amazon Link</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <input name="amazon_link" id="amazon_link" class="form-control" maxlength="255" type="text" value="@if(!empty($update->amazon_link)){{$update->amazon_link}}@else{{old('amazon_link')}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">About this item</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <textarea name="about_this_item" id="about_this_item" class="form-control" type="text" rows="5">@if(!empty($update->about_this_item)){{$update->about_this_item}}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Rating</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <select name="rating" id="rating" class="form-control">
                                        <option value="">Select </option>
                                        <option value="1" @if(!empty($update->rating)) @if($update->rating==1) selected @endif @endif>1</option>
                                        <option value="2" @if(!empty($update->rating)) @if($update->rating==2) selected @endif @endif>2</option>
                                        <option value="3" @if(!empty($update->rating)) @if($update->rating==3) selected @endif @endif>3</option>
                                        <option value="4" @if(!empty($update->rating)) @if($update->rating==4) selected @endif @endif>4</option>
                                        <option value="5" @if(!empty($update->rating)) @if($update->rating==5) selected @endif @endif>5</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Synonyms / Other Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                    <input name="synonyms_other_name" id="synonyms_other_name" class="form-control" maxlength="150" type="text" value="@if(!empty($update->synonyms_other_name)){{$update->synonyms_other_name}}@else{{old('synonyms_other_name')}}@endif">
                                    <p class="small">Use for Search</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Page Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_title" class="form-control" maxlength="150" type="text" value="@if(!empty($update->page_title)){{$update->page_title}}@else{{old('page_title')}}@endif">
                                        <p class="small">For SEO</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_description" class="form-control" maxlength="255" type="text" value="@if(!empty($update->page_description)){{$update->page_description}}@else{{old('page_description')}}@endif">
                                        <p class="small">For SEO</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Keywords</label>
                                <div class="col-sm-10">
                                    <div class="form-group bmd-form-group textarea">
                                        <input name="page_keywords" class="form-control" maxlength="255" type="text" value="@if(!empty($update->page_keywords)){{$update->page_keywords}}@else{{old('page_keywords')}}@endif">
                                        <p class="small">For SEO</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-body ">
                                        <h4>Add Other Details</h4>
                                        <hr>
                                        <ul class="nav nav-pills nav-pills-warning" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                                                    Features
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                                    Specification
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                                    Videos
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-space">
                                            <div class="tab-pane active show" id="link1">
                                                <p><br></p>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Feature Main Image</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group bmd-form-group textarea">
                                                            <input name="feature_main_image" id="feature_main_image" class="form-control" type="file">
                                                            <p class="small">Size (w x h) 600px x 600px</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group bmd-form-group textarea">
                                                            <textarea name="description" id="description" class="form-control" type="text" rows="3">@if(!empty($update->description)){{$update->description}}@endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="tab_logic" class="after-add-more">
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">Feature Title</label>
                                                                <div class="col-sm-10">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="feature_title[]" id="feature_title" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">Feature Image</label>
                                                                <div class="col-sm-10">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="feature_image[]" id="feature_image" class="form-control" type="file" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">Feature Details</label>
                                                                <div class="col-sm-10">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <textarea name="feature_details[]" id="feature_details" class="form-control" type="text" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group bmd-form-group textarea">
                                                            <a class="btn btn-sm btn-link2 add-more">+ Add More Feature</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="link2">
                                                <p><br></p>
                                                <p>Technical Specification:</p>
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">SKU</label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Power Source </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">Material</label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Colour</label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">Style</label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Item Weight </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">Cutting Width </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Number of Positions </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">Country of Origin </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Product Dimensions </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Add New Specification</p>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-4 col-form-label">Specification Title </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <label class="col-sm-5 col-form-label">Specification Value </label>
                                                                <div class="col-sm-7">
                                                                    <div class="form-group bmd-form-group textarea">
                                                                        <input name="" id="" class="form-control" type="text" value="">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group bmd-form-group textarea">
                                                                <a class="btn btn-sm btn-link2">+ Add New Specification</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label">Additional Information</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group bmd-form-group textarea">
                                                                <textarea name="" id="" class="form-control" type="text" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="link3">
                                                <p><br></p>
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label">Video Link</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group bmd-form-group textarea">
                                                                <input name="" id="" class="form-control" type="text" value="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-10">
                                                            <div class="form-group bmd-form-group textarea">
                                                                <a class="btn btn-sm btn-link2">+ Add More Video Link</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    function get_subcategory(id) {
        $('#subcategory_id').empty();
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('ajax/get-subcategory')}}",
            data: {
                category_id: id
            },
            success: function(xhr) {
                var datas = xhr.data;
                for (var i = 0; i < datas.length; i++) {
                    $('#subcategory_id').append('<option value="'+datas[i].id+'" data-id="'+datas[i].subcategory_name+'">'+datas[i].subcategory_name+'</option>');
                }
            }
        });
    }
    function romeve_image(){
        $(".img-remove-thumb").empty();
        $("#main_image").val('');
    }
    function romeve_image_1(){
        $(".img-remove-thumb-1").empty();
        $("#sub_images").val('');
    }
</script>
<script>
    $(document).ready(() => {
        $("#main_image").change(function () {
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
    $(function() {
        $("#sub_images").change(function() {
            if (this.files && this.files[0]) {
                alert(this.files.length);
                for (var i = 0; i < this.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $(".img-remove-thumb-1").append('<i class="fa fa-times" onclick="romeve_image_1()"></i><img src="'+event.target.result+'" width="100" class="img-thumbnail">');
                    };
                    reader.readAsDataURL(this.files[i]);
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".add-more").click(function(){ 
            var html = $("#tab_logic").html();
            $(".after-add-more").after(html);
            $(".change").append("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
        });
        $("body").on("click",".remove",function(){ 
            $(this).parents("#tab_logic").remove();
        });
    });
</script>
@endpush
@endsection('content')