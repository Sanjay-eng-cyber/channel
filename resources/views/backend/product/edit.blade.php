@extends('backend.layouts.app')
@section('title', 'Product Edit - ' . $product->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Edit Product
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Product</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-md-12">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.product.update', $product->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="form-group mb-3 row">
                                    <div class="col-xl-9 col-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Name*</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                            value="{{ old('name') ?? $product->name }}">
                                        @if ($errors->has('name'))
                                            <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Brand</label>
                                        <select class="form-control mb-4" name="brand_id">
                                            <option value="">Select Any Brand</option>
                                            @if (old('brand_id'))
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        @if (old('brand_id') == $brand->id) {{ 'selected' }} @endif>
                                                        {{ $brand->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        @if ($product->brand_id == $brand->id) {{ 'selected' }} @endif>
                                                        {{ $brand->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <div class="text-danger" role="alert">{{ $errors->first('brand_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Category*</label>
                                        <select class="form-control mb-4" name="category_id" id="sel1"
                                            onchange="getValues()" required>
                                            <option value="">Select Any Category</option>
                                            @if (old('category_id'))
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (old('category_id') == $category->id) {{ 'selected' }} @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($product->category_id == $category->id) {{ 'selected' }} @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <div class="text-danger" role="alert">{{ $errors->first('category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">
                                            Sub Category</label>
                                        <select class="form-control mb-4" name="sub_category_id" id="sub">
                                            <option value="">Select Any Sub Category</option>
                                        </select>
                                        @if ($errors->has('sub_category_id'))
                                            <div class="text-danger" role="alert">{{ $errors->first('sub_category_id') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Thumbnail Image : </label>
                                        <span id="lightgallery1"><a class="text-primary font-weight-bold float-right"
                                                href="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">View</a>
                                        </span>
                                        <br>
                                        {{-- <img class="m-2 border"
                                            src="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}"
                                            height="150px" width="150px" alt=""> --}}
                                        <input class="form-control" name="thumbnail_image" type="file" id="image">
                                        @if ($errors->has('thumbnail_image'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('thumbnail_image') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Image : </label>
                                        <span id="lightgallery2">
                                            @forelse ($product->medias()->get() as $key => $media)
                                                @if ($key == 0)
                                                    <a href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                        type="button" class="text-primary font-weight-bold float-right">
                                                        View
                                                    </a>
                                                @else
                                                    <a href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                        type="button" class="d-none">
                                                        View
                                                    </a>
                                                @endif
                                            @empty
                                            @endforelse
                                        </span>
                                        {{-- <div class="d-flex flex-wrap">
                                                <img class="m-2 border"
                                                    src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                    height="150px" width="150px" alt="">

                                        </div> --}}
                                        <input class="form-control" name="image[]" type="file" id="image" multiple />
                                        @if ($errors->has('image'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('image.*'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image.*') }}
                                            </div>
                                        @endif
                                    </div>

                                    {{-- <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Connection No.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Connection No." minlength="3" maxlength="20"
                                            name="connection_no"
                                            value="{{ old('connection_no') ?? $product->connection_no }}">
                                        @if ($errors->has('connection_no'))
                                            <div class="text-danger" role="alert">{{ $errors->first('connection_no') }}
                                            </div>
                                        @endif
                                    </div> --}}
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">MRP*</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Mrp" minlength="3" maxlength="40" required
                                            name="mrp" value="{{ old('mrp') ?? $product->mrp }}">
                                        @if ($errors->has('mrp'))
                                            <div class="text-danger" role="alert">{{ $errors->first('mrp') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Final Price*</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Final Price" minlength="3" maxlength="40" required
                                            name="final_price" value="{{ old('final_price') ?? $product->final_price }}">
                                        @if ($errors->has('final_price'))
                                            <div class="text-danger" role="alert">{{ $errors->first('final_price') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Stock*</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Stock" minlength="1" maxlength="40" required
                                            name="stock" value="{{ old('stock') ?? $product->stock }}">
                                        @if ($errors->has('stock'))
                                            <div class="text-danger" role="alert">{{ $errors->first('stock') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">SKU*</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter SKU" required name="sku"
                                            value="{{ old('sku') ?? $product->sku }}" maxlength="120">
                                        @if ($errors->has('sku'))
                                            <div class="text-danger" role="alert">{{ $errors->first('sku') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="formGroupExampleInput" class="">Short Descriptions</label>
                                        <textarea name="short_descriptions" placeholder="Enter Short Description" rows="3" cols="50"
                                            class="form-control" minlength="3" maxlength="5000">{{ $product->short_descriptions }}</textarea>
                                        @if ($errors->has('short_descriptions'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('short_descriptions') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tags">Tags</label>
                                        <select class="form-control tagging" name="tags[]" minlength="3"
                                            maxlength="30" multiple="multiple">
                                            @if (old('tags'))
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->name }}"
                                                        @if (in_array($tag->name, old('tags'))) {{ 'selected' }} @endif>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->name }}"
                                                        @if (in_array($tag->name, $tagsArray)) {{ 'selected' }} @endif>
                                                        {{ $tag->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('tags'))
                                            <div class="text-danger" role="alert">{{ $errors->first('tags') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('tags.*'))
                                            <div class="text-danger" role="alert">{{ $errors->first('tags.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                        <label for="formGroupExampleInput" class="">Unit Sale Price</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Unit Sale Price" name="unit_sale_price"
                                            value="{{ old('unit_sale_price') ?? $product->unit_sale_price }}" minlength="2" maxlength="30">
                                        @if ($errors->has('unit_sale_price'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('unit_sale_price') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                        <label for="formGroupExampleInput" class="">Skin Type</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Skin Type" name="skin_type"
                                            value="{{ old('skin_type') ?? $product->skin_type }}" minlength="2"
                                            maxlength="120">
                                        @if ($errors->has('skin_type'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('skin_type') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                                        <label for="formGroupExampleInput" class="">Material</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Material" name="material"
                                            value="{{ old('material') ?? $product->material }}" minlength="2"
                                            maxlength="120">
                                        @if ($errors->has('material'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('material') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Expiry</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Expiry" name="expiry"
                                            value="{{ old('expiry') ?? $product->expiry }}" minlength="2"
                                            maxlength="120">
                                        @if ($errors->has('expiry'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('expiry') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Net Quantity</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Net Quantity" name="net_quantity"
                                            value="{{ old('net_quantity') ?? $product->net_quantity }}" minlength="2"
                                            maxlength="120">
                                        @if ($errors->has('net_quantity'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('net_quantity') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-9 col-md-6 col-sm-12 mb-3 d-none d-xl-block">
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-6">
                                        <label for="formGroupExampleInput" class="">Special Ingredients</label>
                                        <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Special Ingredients"
                                            name="special_ingredients" minlength="2" maxlength="3000" rows="3" cols="50">{{ old('special_ingredients') ?? $product->special_ingredients }}</textarea>
                                        @if ($errors->has('special_ingredients'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('special_ingredients') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12 mb-6">
                                        <label for="formGroupExampleInput" class="">Care Instruction</label>
                                        <textarea type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Care Instruction"
                                            name="care_instruction" minlength="2" maxlength="3000" rows="3" cols="50">{{ old('care_instruction') ?? $product->care_instruction }}</textarea>
                                        @if ($errors->has('care_instruction'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('care_instruction') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-12 py-2 mb-3">
                                        <label for="descriptions">Description</label>
                                        <textarea id="team-about" class="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') ?? $product->descriptions }}</textarea>
                                        @if ($errors->has('body'))
                                            <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-12 pt-3">
                                        <label for="descriptions">Attributes:</label><br>
                                    </div>
                                    @foreach ($attributes as $attribute)
                                        <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                            <input hidden name="attributeKeys[]" value="{{ $attribute->id }}">
                                            <label for="degree2">{{ $attribute->name }}</label>
                                            <select class="form-control" name="values[]">
                                                <option value="">Select Any Attribute</option>
                                                @if (old('values'))
                                                    @foreach ($attribute->values()->get() as $attrbuteValue)
                                                        <option value="{{ $attrbuteValue->id }}"
                                                            @if (old('values') == $attrbuteValue->id) {{ 'selected' }} @endif>
                                                            {{ $attrbuteValue->name }}</option>
                                                    @endforeach
                                                @else
                                                    @foreach ($attribute->values()->get() as $attrbuteValue)
                                                        <option value="{{ $attrbuteValue->id }}"
                                                            @if (in_array($attrbuteValue->id, $product_attribute)) {{ 'selected' }} @endif>
                                                            {{ $attrbuteValue->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    @endforeach

                                    <div class="col-12 py-2 mb-3">
                                        <label for="descriptions">Showcase</label><br>
                                        @if (old('showcases'))
                                            @foreach ($showcases as $showcase)
                                                {{-- @dd($showcase) --}}
                                                <label for="{{ $showcase->id }}">{{ $showcase->name }}</label>
                                                <input type="checkbox" id="{{ $showcase->id }}" name="showcases[]"
                                                    value="{{ $showcase->id }}"
                                                    @if (old('showcases') && in_array($showcase->id, old('showcases'))) {{ 'checked' }} @endif>
                                            @endforeach
                                        @else
                                            @foreach ($showcases as $showcase)
                                                {{-- @dd($showcases,$showcase->id,$product_showcases,in_array($showcase->id,$product_showcases)) --}}
                                                <input type="checkbox" id="{{ $showcase->id }}" name="showcases[]"
                                                    value="{{ $showcase->id }}"
                                                    @if (in_array($showcase->id, $product_showcases)) {{ 'checked' }} @endif>
                                                <label for="{{ $showcase->id }}">{{ $showcase->name }}</label>
                                            @endforeach
                                        @endif

                                        @if ($errors->has('showcases'))
                                            <div class="text-danger" role="alert">{{ $errors->first('showcases') }}
                                            </div>
                                        @endif
                                    </div>


                                </div>
                                <input type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure, you want to update?')">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lg-zoom.js') }}"></script>>
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery1'), {
                speed: 500,
                download: false,
                thumbnail: true,
            });
            lightGallery(document.getElementById('lightgallery2'), {
                speed: 500,
                download: false,
                thumbnail: true,
            });
            getValues();
        });

        $(".tagging").select2({
            tags: true,
            placeholder: "Select / Enter Tags",
        });
    </script>

    <script>
        tinymce.init({
            selector: '.team-about',
            height: 200,
            plugins: 'textcolor colorpicker lists link',
            toolbar: "formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist | link | outdent indent  | removeformat",
            // theme: 'modern',
            // plugins: ' fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample  charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern ',
            // toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            // image_advtab: true,
            // templates: [{
            //         title: 'Test template 1',
            //         content: 'Test 1'
            //     },
            //     {
            //         title: 'Test template 2',
            //         content: 'Test 2'
            //     }
            // ],
            // content_css: [
            //     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',

            // ]
        });
        const sub_category_id = '{{ $product->sub_category_id ?? 'null' }}'

        function getValues() {
            $('#sub').html('')

            if ($('#sel1').val()) {

                $.ajax({
                    url: '/category/get/subcategory/' + $('#sel1').val(),
                    method: "GET",
                    success: function(data) {
                        if (data.data == '') {
                            $('#sub').append(`<option value=''>No data</option>`)
                        } else {
                            $('#sub').append(`<option value=''>Select If Required</option>`)
                            $.each(data.data, function(id, value) {
                                $('#sub').append(
                                    `<option value="${value.id}" ${sub_category_id == value.id ? 'selected' : ''}>${value.name}</option>`
                                )
                            })
                        }
                    },
                    error: function() {
                        Snackbar.show({
                            text: "Internal Error",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                })
            }
        }
    </script>


@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
{{-- <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js">
</script> --}}
