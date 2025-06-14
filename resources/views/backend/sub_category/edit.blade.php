@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Edit Sub Category
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Edit Sub
                                            Category</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-6">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST"
                            action="{{ route('backend.sub_category.update', $sub_category->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-12  col-md-6 col-sm-12">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="40" required name="name"
                                        value="{{ old('name') ?? $sub_category->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12  col-md-6 col-sm-12 py-2">
                                    <label for="formGroupExampleInput">Category</label>
                                    <select class="form-control" name="category_id">
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
                                                    @if ($sub_category->category_id == $category->id) {{ 'selected' }} @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-12  col-md-6 col-sm-12 py-2">
                                    <label for="degree2">Image</label><br>
                                    @if ($sub_category->image)
                                        <img src="{{ asset('storage/images/sub_categories/' . $sub_category->image) }}"
                                            height="150px" width="150px" alt="">
                                    @endif
                                    <br>
                                    <input class="form-control mt-xl-0 mt-3" name="image" type="file" />
                                    @if ($errors->has('image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-12  col-md-6 col-sm-12 py-2">
                                    <label for="degree2">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" rows="3" name="descriptions" minlength="3"
                                        maxlength="250">{{ old('descriptions', $sub_category->descriptions) }}</textarea>
                                    @if ($errors->has('descriptions'))
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
@endsection

