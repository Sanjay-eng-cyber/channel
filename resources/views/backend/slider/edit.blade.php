@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Slider
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Slider</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-md-6">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.slider.update', $slider->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12">
                                    <label for="formGroupExampleInput" class="">Type</label>
                                    <select name="type" class="form-control" id="formGroupExampleInput" required>
                                        <option value="">Select Any</option>
                                        @if (old('type'))
                                            <option value="right slider"
                                                @if (old('type') == 'right slider') {{ 'selected' }} @endif>Right Slider
                                            </option>
                                            <option value="left slider"
                                                @if (old('type') == 'left slider') {{ 'selected' }} @endif>Left Slider
                                            </option>
                                            <option value="middle slider"
                                                @if (old('type') == 'middle slider') {{ 'selected' }} @endif>Middle Slider
                                            </option>
                                        @else
                                            <option value="right slider"
                                                @if ($slider->type == 'right slider') {{ 'selected' }} @endif>Right Slider
                                            </option>
                                            <option value="left slider"
                                                @if ($slider->type == 'left slider') {{ 'selected' }} @endif>Left Slider
                                            </option>
                                            <option value="middle slider"
                                                @if ($slider->type == 'middle slider') {{ 'selected' }} @endif>Middle Slider
                                            </option>
                                        @endif
                                    </select>
                                    @if ($errors->has('type'))
                                        <div class="text-danger" role="alert">{{ $errors->first('type') }}</div>
                                    @endif
                                </div>
                                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-2">
                                        <label for="formGroupExampleInput" class="">Title</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter Title" minlength="3" maxlength="60" required name="title"
                                            value="{{ old('title') ?? $slider->title }}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger" role="alert">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12">
                                        <label for="formGroupExampleInput" class="">Link</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Enter link" minlength="3" maxlength="120" required name="link"
                                            value="{{ old('link') ?? $slider->link}}">
                                        @if ($errors->has('link'))
                                            <div class="text-danger" role="alert">{{ $errors->first('link') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-2">
                                        <label for="formGroupExampleInput" class="">Image</label><br>
                                        <img src="{{ asset('storage/images/sliders/' . $slider->image) }}"
                                        height="150px" width="150px" alt="">
                                        <input type="file" class="form-control" id="formGroupExampleInput"
                                            name="image">
                                        @if ($errors->has('image'))
                                            <div class="text-danger" role="alert">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-2">
                                        <label for="degree2">Description</label>
                                        <textarea class="form-control" placeholder="Enter Description" rows="3" name="descriptions" minlength="3"
                                            maxlength="120">{{ old('descriptions') ?? $slider->descriptions}}</textarea>
                                        @if ($errors->has('descriptions'))
                                            <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
