@extends('backend.layouts.app')
@section('title', 'Edit Order')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Edit Order
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Order</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow col-xl-12">
                <div class="col-12">
                    <div class="row m-0">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">User</label><br>
                                <p class="label-title"><a href="{{ route('backend.user.show', $order->user_id) }}"
                                        class="cust-title" target="_blank">{{ $order->user->first_name ?? '---' }}
                                        {{ $order->user->last_name }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">Order
                                    Id</label><br>
                                <p class="label-title">{{ $order->api_order_id ?? '---' }}</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">Order
                                    Status</label><br>
                                <p class="label-title">
                                    @if ($order->status == 'initial')
                                        <label class="badge badge-primary" style="color:white">{{ $order->status }}</label>
                                    @elseif ($order->status == 'failed')
                                        <label class="badge badge-danger" style="color:white">{{ $order->status }}</label>
                                    @elseif ($order->status == 'completed')
                                        <label class="badge badge-success" style="color:white">{{ $order->status }}</label>
                                    @else
                                        <label class="badge badge-secondary"
                                            style="color:white">{{ $order->status }}</label>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">Delivery
                                    Id</label><br>
                                <p class="label-title">{{ $order->delivery_api_id ?? '---' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">Delivery
                                    Type</label><br>
                                <p class="label-title">{{ $order->delivery_type ?? '---' }}</p>
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
                                <p class="label-title">{{ $order->discount_amount ?? '---' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="degree3" class="cust-title" class="label-title">Total
                                    Amount</label><br>
                                <p class="label-title">{{ $order->total_amount }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.order.update', $order->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-md-4 col-12 mb-2">
                                    <label for="formGroupExampleInput">Refund Status</label>
                                    <select name="refund_status" class="form-control">
                                        <option value="">Select Any</option>
                                        @if (old('refund_status'))
                                            <option value="pending"
                                                @if (old('refund_status') == 'pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="created"
                                                @if (old('refund_status') == 'created') {{ 'selected' }} @endif>Created
                                            </option>
                                            <option value="processed"
                                                @if (old('refund_status') == 'processed') {{ 'selected' }} @endif>Processed
                                            </option>
                                        @else
                                            <option value="pending"
                                                @if ($order->refund_status == 'pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="created"
                                                @if ($order->refund_status == 'created') {{ 'selected' }} @endif>Created
                                            </option>
                                            <option value="processed"
                                                @if ($order->refund_status == 'processed') {{ 'selected' }} @endif>Processed
                                            </option>
                                        @endif
                                    </select>
                                    @if ($errors->has('refund_status'))
                                        <div class="text-danger" role="alert">{{ $errors->first('refund_status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 mb-2">
                                    <label for="formGroupExampleInput">Refund Amount</label>
                                    <input type="text" name="refund_amount" min="1" max="100000"
                                        class="form-control" placeholder="Enter Refund Amount"
                                        value="{{ old('refund_amount', $order->refund_amount) }}">
                                    @if ($errors->has('refund_amount'))
                                        <div class="text-danger" role="alert">{{ $errors->first('refund_amount') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 mb-2">
                                    <label for="formGroupExampleInput">Refund Date</label>
                                    <input type="date" name="refund_date" class="form-control"
                                        placeholder="Enter Refund Date"
                                        value="{{ old('refund_date', dd_format($order->refund_date, 'Y-m-d')) }}">
                                    @if ($errors->has('refund_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('refund_date') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-4 col-12 mb-2">
                                    <label for="formGroupExampleInput">Refund Note</label>
                                    <textarea type="text" name="refund_note" minlength="3" maxlength="150" class="form-control"
                                        placeholder="Enter Refund note" rows="3" cols="100">{{ old('refund_note', $order->refund_note) }}</textarea>
                                    @if ($errors->has('refund_note'))
                                        <div class="text-danger" role="alert">{{ $errors->first('refund_note') }}</div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary"
                                onclick="return confirm('Are you sure, you want to update?')">
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
@endsection
