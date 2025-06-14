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
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Create Income
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Income</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('cms.income.store') }}">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-md-6 form-group mb-4">
                                    <label for="">Payment Type:</label>
                                    <select class="form-control" name="payment_type" id="" required>
                                        <option value="">Select Any</option>
                                        @foreach (App\Models\Appointment::PAYMENTS as $payments)
                                            <option value="{{ $payments }}"
                                                @if (old('payment_type') == $payments) {{ 'selected' }} @endif>
                                                {{ $payments }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('payment_type'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('payment_type') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12 col-md-6 form-group mb-4">
                                    <label for="formGroupExampleInput3">Amount</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Amount" value="{{ old('payment_amount') }}" maxlength="25"
                                        required name="payment_amount">
                                    @if ($errors->has('payment_amount'))
                                        <div class="text-danger" role="alert">{{ $errors->first('payment_amount') }}</div>
                                    @endif
                                </div>

                                <div class="col-12 col-md-6 form-group mb-4">
                                    <label for="formGroupExampleInput">Payment Status</label>
                                    <select class="form-control" name="payment_status">
                                        <option value="">Select Any</option>
                                        <option value="completed"
                                            @if (old('payment_status') == 'completed') {{ 'selected' }} @endif>Completed</option>
                                        <option value="pending"
                                            @if (old('payment_status') == 'pending') {{ 'selected' }} @endif>Pending</option>
                                    </select>
                                    @if ($errors->has('payment_status'))
                                        <div class="text-danger" role="alert">{{ $errors->first('payment_status') }}</div>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6 form-group mb-4">
                                    <label for="formGroupExampleInput">Date</label>
                                    <input type="datetime-local" class="form-control" id="formGroupExampleInput"
                                        name="date" value="{{ old('date') }}">
                                    @if ($errors->has('date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-4 row">
                                <div class="col-12">
                                    <label for="formGroupExampleInput">Details</label>
                                    <textarea name="details" id="" class="form-control" cols="30" rows="4" minlength="3"
                                        maxlength="300">{{ old('details') }}</textarea>
                                    @if ($errors->has('details'))
                                        <div class="text-danger" role="alert">{{ $errors->first('details') }}</div>
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
