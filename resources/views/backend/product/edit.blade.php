@extends('backend.layouts.app')
@section('title', 'Dashboard')
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
                                    <div class="col-xl-6  col-md-6 col-sm-12">
                                        <label for="formGroupExampleInput" class="">Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Name" minlength="3" maxlength="250" required name="name"
                                            value="{{ old('name') ?? $product->name }}">
                                        @if ($errors->has('name'))
                                            <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12">
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
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="degree2">Category</label>
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
                                    <div
                                        class="col-xl-6  col-md-6 col-sm-12                                      <label for="degree2">
                                        Sub Category</label>
                                        <select class="form-control mb-4" name="sub_category_id" id="sub">
                                            <option value="">Select Any Sub Category</option>
                                        </select>
                                        @if ($errors->has('sub_category_id'))
                                            <div class="text-danger" role="alert">{{ $errors->first('sub_category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12">
                                        <label for="formGroupExampleInput" class="">Connection No.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Connection No." required minlength="3" maxlength="20"
                                            name="connection_no"
                                            value="{{ old('connection_no') ?? $product->connection_no }}">
                                        @if ($errors->has('connection_no'))
                                            <div class="text-danger" role="alert">{{ $errors->first('connection_no') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="formGroupExampleInput" class="">MRP</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Mrp" minlength="3" maxlength="40" required name="mrp"
                                            value="{{ old('mrp') ?? $product->mrp }}">
                                        @if ($errors->has('mrp'))
                                            <div class="text-danger" role="alert">{{ $errors->first('mrp') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12">
                                        <label for="formGroupExampleInput" class="">Final Price</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Final Price" minlength="3" maxlength="40" required
                                            name="final_price" value="{{ old('final_price') ?? $product->final_price }}">
                                        @if ($errors->has('final_price'))
                                            <div class="text-danger" role="alert">{{ $errors->first('final_price') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12 py-3">
                                        <label for="formGroupExampleInput" class="">Stock</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Stock" minlength="3" maxlength="40" required
                                            name="stock" value="{{ old('stock') ?? $product->stock }}">
                                        @if ($errors->has('stock'))
                                            <div class="text-danger" role="alert">{{ $errors->first('stock') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12 py-3">
                                        <label for="formGroupExampleInput" class="">SKU</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter SKU" required name="sku"
                                            value="{{ old('sku') ?? $product->sku }}">
                                        @if ($errors->has('sku'))
                                            <div class="text-danger" role="alert">{{ $errors->first('sku') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12 mb-3">
                                        <label for="formGroupExampleInput" class="">Short Descriptions</label>
                                        <textarea name="short_descriptions" rows="5" cols="50" class="form-control" minlength="3"
                                            maxlength="5000" required>{{ $product->short_descriptions }}</textarea>
                                        @if ($errors->has('short_descriptions'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('short_descriptions') }}</div>
                                        @endif
                                    </div>
                                    @foreach ($attributes as $attribute)
                                        <div class="col-xl-6  col-md-6 col-sm-12 mb-3">
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
                                    <div class="col-xl-12  col-md-6 col-sm-12 py-1">
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
                                    <div class="col-xl-6  col-md-6 col-sm-12">
                                        <label for="degree2">Image</label>
                                        <div class="d-flex flex-wrap">
                                            @forelse ($product->medias()->get() as $media)
                                                <img class="m-2 border"
                                                    src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                    height="150px" width="150px" alt="">

                                            @empty
                                            @endforelse
                                        </div>
                                        <input class="form-control" name="image[]" type="file" id="image"
                                            multiple />
                                        @if ($errors->has('image'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('image.*'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image.*') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-6  col-md-6 col-sm-12 mb-3">
                                        <label for="degree2">Thumbnail Image</label><br>
                                        <img class="m-2 border"
                                            src="{{ asset('storage/images/products/' . $product->thumbnail_image) }}"
                                            height="150px" width="150px" alt="">
                                        <input class="form-control" name="thumbnail_image" type="file"
                                            id="image">
                                        @if ($errors->has('thumbnail_image'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('thumbnail_image') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-12  col-sm-12 py-1">
                                        <label for="descriptions">Description</label>
                                        <textarea id="team-about" name="descriptions" minlength="3" maxlength="20000">{{ old('descriptions') ?? $product->descriptions }}</textarea>
                                        @if ($errors->has('body'))
                                            <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure, you want to update?')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery2").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true
            });
        });
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js">
</script>
<script>
    tinymce.init({
        selector: '#team-about',
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
    $(document).ready(function() {
        getValues()
    });
</script>
