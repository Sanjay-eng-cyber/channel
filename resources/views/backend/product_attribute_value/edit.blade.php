@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4  mt-2 mb-1">
                            <legend class="h4">
                                Edit Product Attribute Value
                            </legend>
                        </div>

                        <div class="col-xl-4  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Edit Product Attribute Value</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-md-6">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST"
                            action="{{ route('backend.product_attribute_value.update', $product_attribute_value->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-12   col-sm-12">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="40" required name="name"
                                        value="{{ old('name') ?? $product_attribute_value->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12   col-sm-12 py-2">
                                    <label for="formGroupExampleInput">Attribute</label>
                                    <select class="form-control" name="attribute_id">
                                        <option value="">Select Any Attribute</option>
                                        @if (old('category_id'))
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute->id }}"
                                                    @if (old('attribute_id') == $attribute->id) {{ 'selected' }} @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute->id }}"
                                                    @if ($product_attribute_value->attribute_id == $attribute->id) {{ 'selected' }} @endif>
                                                    {{ $attribute->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('attribute_id'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('attribute_id') }}
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

