@extends('backend.layouts.app')
@section('title', 'Edit Delivery')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Delivery
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Delivery</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-12">

                <div class="row m-0">
                    {{-- <legend class="h5 mt-3">
                        Order Details
                    </legend>
                    <div class="col-12">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">User</label><br>
                                    <p class="label-title">{{ $order->user->first_name }}
                                        {{ $order->user->last_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Order
                                        Id</label><br>
                                    <p class="label-title">{{ $order->api_order_id }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Delivery
                                        Id</label><br>
                                    <p class="label-title">{{ $order->delivery_api_id }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Delivery
                                        Type</label><br>
                                    <p class="label-title">{{ $order->delivery_type }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Delivery
                                        Status</label><br>
                                    <p class="label-title">{{ $order->delivery_status ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Sub
                                        Total</label><br>
                                    <p class="label-title">{{ $order->sub_total }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Discount
                                        Amount</label><br>
                                    <p class="label-title">{{ $order->discount_amount }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Total
                                        Amount</label><br>
                                    <p class="label-title">{{ $order->total_amount }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Status</label><br>
                                    <p class="label-title">
                                        @if ($order->status == 'initial')
                                            <label class="badge badge-primary"
                                                style="color:white">{{ $order->status }}</label>
                                        @elseif ($order->status == 'failed')
                                            <label class="badge badge-danger"
                                                style="color:white">{{ $order->status }}</label>
                                        @else
                                            <label class="badge badge-success"
                                                style="color:white">{{ $order->status }}</label>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <legend class="h5 mt-3">
                        Edit Delivery
                    </legend> --}}
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">User
                                        Name</label><br>
                                    <p class="label-title">
                                        <a class="text-warning" href="{{ route('backend.user.show', $delivery->user_id) }}">
                                            {{ $delivery->user->first_name }}
                                    </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Order
                                        Id</label><br>
                                    <p class="label-title">
                                        <a class="text-warning"
                                            href="{{ route('backend.order.show', $delivery->order_id) }}">
                                            {{ $delivery->order_id }}
                                    </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Partner Order
                                        Id</label><br>
                                    <p class="label-title">{{ $delivery->partner_order_id ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Shipment
                                        Id</label><br>
                                    <p class="label-title">{{ $delivery->shipment_id ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">AWB
                                        Code</label><br>
                                    <p class="label-title">{{ $delivery->awb_code ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Partner
                                        Status</label><br>
                                    <p class="label-title">{{ $delivery->partner_status ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Pickup Token
                                        No.</label><br>
                                    <p class="label-title">{{ $delivery->pickup_token_number ?? '---' }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Pickup
                                        Date</label><br>
                                    <p class="label-title">
                                        {{ $delivery->pickup_date ? dd_format($delivery->pickup_date, 'd-m-y h:i:a') : '--' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Delivered
                                        Date</label><br>
                                    <p class="label-title">
                                        {{ $delivery->delivered_date ? dd_format($delivery->delivered_date, 'd-m-y h:i:a') : '--' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Message</label><br>
                                    <p class="label-title">{{ $delivery->message ?? '---' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Status</label><br>
                                    <p>
                                        @if ($delivery->status == 'Pending')
                                            <label class="text-white badge badge-warning">{{ $delivery->status }}</label>
                                        @elseif ($delivery->status == 'Intransit')
                                            <label class="text-white badge badge-primary">{{ $delivery->status }}</label>
                                        @elseif ($delivery->status == 'Delivered')
                                            <label class="text-white badge badge-success">{{ $delivery->status }}</label>
                                        @else
                                            <label
                                                class="text-white badge badge-secondary">{{ $delivery->status ?? '--' }}</label>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form class="mt-3" method="POST" action="{{ route('backend.delivery.update', $delivery->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">
                                <div class="col-md-4">
                                    <label for="formGroupExampleInput" class="">Delivery Date</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter date"  name="delivered_date"
                                        value="{{ old('delivered_date') ?? dd_format($delivery->delivered_date , 'Y-m-d') }}">
                                    @if ($errors->has('delivered_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('delivered_date') }}</div>
                                    @endif
                                </div>

                                <div class="col-4">
                                    <label for="formGroupExampleInput" class="">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Select Any</option>
                                        @if (old('status'))
                                            <option value="Pending"
                                                @if (old('status') == 'Pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="Intransit"
                                                @if (old('status') == 'Intransit') {{ 'selected' }} @endif>Intransit
                                            </option>
                                            <option value="Delivered"
                                                @if (old('status') == 'Delivered') {{ 'selected' }} @endif>Delivered
                                            </option>
                                            <option value="Returned"
                                                @if (old('status') == 'Returned') {{ 'selected' }} @endif>Returned
                                            </option>
                                        @else
                                            <option value="Pending"
                                                @if ($delivery->status == 'Pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="Intransit"
                                                @if ($delivery->status == 'Intransit') {{ 'selected' }} @endif>Intransit
                                            </option>
                                            <option value="Delivered"
                                                @if ($delivery->status == 'Delivered') {{ 'selected' }} @endif>Delivered
                                            </option>
                                            <option value="Returned"
                                                @if ($delivery->status == 'Returned') {{ 'selected' }} @endif>Returned
                                            </option>
                                        @endif
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="text-danger" role="alert">{{ $errors->first('status') }}</div>
                                    @endif
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Breadth (in cm)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Breadth" required step="0.1" name="breadth"
                                        value="{{ old('breadth') ?? $delivery->breadth }}">
                                    @if ($errors->has('breadth'))
                                        <div class="text-danger" role="alert">{{ $errors->first('breadth') }}</div>
                                    @endif
                                </div> --}}
                                {{-- <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Height (in cm)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Height" required step="0.1" name="height"
                                        value="{{ old('height') ?? $delivery->height }}">
                                    @if ($errors->has('height'))
                                        <div class="text-danger" role="alert">{{ $errors->first('height') }}</div>
                                    @endif
                                </div> --}}
                                {{-- <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Weight (in kg)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Weight" required step="0.1" name="weight"
                                        value="{{ old('weight') ?? $delivery->weight }}">
                                    @if ($errors->has('weight'))
                                        <div class="text-danger" role="alert">{{ $errors->first('weight') }}</div>
                                    @endif
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
