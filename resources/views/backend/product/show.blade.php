@extends('backend.layouts.app')
@section('title', 'Product - ' . $product->name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Product Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Product Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow">
                <div class="row widget-header">
                    <div class="col-md-11">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Brand
                                                    Name</label><br>
                                                <p class="label-title">{{ $product->brand ? $product->brand->name : '---' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Category
                                                    Name</label><br>
                                                <p class="label-title">{{ $product->category->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Sub Category
                                                    Name</label><br>
                                                <p class="label-title">
                                                    {{ $product->subCategory ? $product->subCategory->name : '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">MRP</label><br>
                                                <p class="label-title">{{ $product->mrp }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Final
                                                    Price</label><br>
                                                <p class="label-title">{{ $product->final_price }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Stock</label><br>
                                                <p class="label-title">{{ $product->stock }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">SKU</label><br>
                                                <p class="label-title">{{ $product->sku }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Unit Sale
                                                    Price</label><br>
                                                <p class="label-title">{{ $product->unit_sale_price }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Skin
                                                    Type</label><br>
                                                <p class="label-title">{{ $product->skin_type ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">material</label><br>
                                                <p class="label-title">{{ $product->material ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Special
                                                    Ingredients</label><br>
                                                <p class="label-title">{{ $product->special_ingredients ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Care Instruction</label><br>
                                                <p class="label-title">{{ $product->care_instruction ?? '----'}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Expiry</label><br>
                                                <p class="label-title">{{ $product->expiry ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Net Quantity</label><br>
                                                <p class="label-title">{{ $product->net_quantity ?? '----' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree2" class="label-title cust-title">Thumbnail
                                                    Image</label><br>
                                                <span id="lightgallery1"><a class="text-primary font-weight-bold"
                                                        href="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">View</a>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Other
                                                    Images</label><br>
                                                <div class="d-flex flex-wrap">
                                                    <span id="lightgallery2">
                                                        @forelse ($product->medias()->get()  as $key => $media)
                                                            @if ($key == 0)
                                                                <a href="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                                    type="button"
                                                                    class="text-primary font-weight-bold float-right">
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
                                                </div>
                                            </div>
                                        </div>

                                        {{-- @dd($product_showcases) --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Showcases</label><br>
                                                @forelse ($product_showcases as $p_showcase)
                                                    <p class="label-title d-inline">
                                                        {{ $p_showcase->showcase->name . ', ' }}
                                                    </p>
                                                @empty
                                                    <p class="label-title">---</p>
                                                @endforelse

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Attribute</label><br>
                                                @forelse ($product_attributes as $product_attribute)
                                                    <p class="label-title">
                                                        {{ $product_attribute->attribute->name . ' - ' . $product_attribute->value->name }}
                                                    </p>
                                                @empty
                                                    <p class="label-title">---</p>
                                                @endforelse
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Short
                                                    Description</label><br>
                                                <p class="label-title">{{ $product->short_descriptions ?? '---' }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Tags</label><br>
                                                <p class="label-title">
                                                    @forelse ($product->tags as $tag)
                                                        {{ $tag->name . ', ' }}
                                                    @empty
                                                        ---
                                                    @endforelse
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Description</label><br>
                                                <p class="label-title">{!! $product->descriptions !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="widget-content widget-content-area">

            </div> --}}
        </div>
    </div>
@endsection
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lg-zoom.js') }}"></script>>
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
            }
        })
    </script>
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
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
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
