@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        {{-- <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow" style="padding: 10px">
            <div class="widget-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <h5>Expenses</h5>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-2">
                        <p>Home -> Expenses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2 mb-1">
                            <legend class="h4">
                                Import Appointment
                            </legend>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Appointment</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-lg-7">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('cms.appointment.import') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-12 col-md-12">
                                <input type="file" class="form-control" id="formGroupExampleInput3" name="excel">
                                @if ($errors->has('excel'))
                                    <div class="text-danger" role="alert">{{ $errors->first('excel') }}</div>
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
