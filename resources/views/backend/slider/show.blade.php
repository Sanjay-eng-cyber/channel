@extends('backend.layouts.app')
@section('title', ucwords($slider->type))
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-xl-4 col-md-6  mt-2 mb-1">
                            <legend class="h4">
                                Slider Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Slider Details</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info statbox widget box box-shadow col-md-6">
                <div class="row widget-header">
                    <div class="col-md-12">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Title</label><br>
                                                <p class="label-title">{{ $slider->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Type</label><br>
                                                <p class="label-title">{{ ucwords($slider->type) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Link</label><br>
                                                <p class="label-title">{{ $slider->link }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Image</label><br>
                                                @if ($slider->image)
                                                    <span id="lightgallery1">
                                                        <a href="{{ asset('storage/images/sliders/' . $slider->image) }}">
                                                            <img src="{{ asset('storage/images/sliders/' . $slider->image) }}"
                                                                style="height: 150px;width:150px;object-fit:contain;"
                                                                alt="">
                                                        </a>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Description</label><br>
                                                <p class="label-title">{{ $slider->descriptions ?? '---' }}</p>
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
@section('js')
    <script src="{{ asset('plugins/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('plugins/lightgallery/js/lg-zoom.js') }}"></script>>
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery1'), {
                speed: 500,
                download: false,
                thumbnail: true,
            });
        });
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
