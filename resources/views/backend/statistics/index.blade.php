@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            {{-- new --}}
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mt-2 px-3">
                        <div class="col-12 col-sm-6">
                            <legend class="h4">
                                Dashboard
                            </legend>
                        </div>
                        <div class="col-12 col-md-6  d-flex justify-content-end align-it ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form id="form" class="mx-auto w-100 px-3" action="{{ route('cms.statistics.index') }}"
                                method="GET" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-md-4 mt-2">
                                        <label>Start Date</label>
                                        <input class="form-control w-100" type="date" id="start_date"
                                            value="{{ request('start_date') }}" name="start_date" required>
                                        @if ($errors->has('start_date'))
                                            <p class="text-danger"> {{ $errors->first('start_date') }} </p>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label>End Date</label>
                                        <input class="form-control w-100" type="date" id="end_date"
                                            value="{{ request('end_date') }}" name="end_date" required>
                                        @if ($errors->has('end_date'))
                                            <p class="text-danger"> {{ $errors->first('end_date') }} </p>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <button type="submit" id="check"
                                            class="btn btn-success  waves-effect waves-light align-items-start mt-4 search_btn_size">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="align-items-center col-md-3 d-flex justify-content-end">
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="row layout-top-spacing">
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Total Users</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $users }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.user.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing mt-sm-0 mt-3">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Total Brands</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $brand }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.brand.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing mt-sm-0 mt-3">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Total Categories</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $category }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.category.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing mt-sm-0 mt-3">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Total Sub Categories</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $subCategory }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.sub_category.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing mt-sm-0 mt-3">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Total Product</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $products }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.product.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 layout-spacing mt-sm-0 mt-3">
                            <div class="widget widget-one_hybrid widget-referral h-100 px-2 py-3">
                                <div class="widget-heading p-0 m-0">
                                    <h4 class="text-center">Amount</h4>
                                    <div class="w-title justify-content-center align-items-center">
                                        <div class="w-icon">
                                            <i class="far fa-chart-bar big-font-icon"> </i>
                                        </div>
                                        <div class="">
                                            <p class="w-value">{{ $completedOrdersAmount }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('backend.order.index')}}" class="btn btn-outline-primary mx-auto">
                                            <small><i class="far fa-edit"> </i></small> Manage
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <style>
        .widget {
            padding: 20 px !important;
        }
    </style>
    @section('js')
    @endsection
