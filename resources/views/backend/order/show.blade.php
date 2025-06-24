@extends('backend.layouts.app')
@section('title', 'Order Details')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6 mt-2 mb-1">
                            <legend class="h4">
                                Order Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Order Details</a></li>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">User</label><br>
                                                <p class="label-title"><a
                                                        href="{{ route('backend.user.show', $order->user_id) }}"
                                                        class="cust-title"
                                                        target="_blank">{{ $order->user->first_name ?? '---' }}
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
                                                    No.</label><br>
                                                <p class="label-title">{{ $order->order_no ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Order
                                                    Status</label><br>
                                                <p class="label-title">
                                                    @if ($order->status == 'initial')
                                                        <label class="badge badge-primary"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @elseif ($order->status == 'failed')
                                                        <label class="badge badge-danger"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @elseif ($order->status == 'completed')
                                                        <label class="badge badge-success"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @else
                                                        <label class="badge badge-secondary"
                                                            style="color:white">{{ $order->status }}</label>
                                                    @endif
                                                </p>
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

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title">Order Items</label><br>
                                                <a class="btn btn-primary"
                                                    href="{{ route('backend.order.items', $order->id) }}">View</a>
                                            </div>
                                        </div>
                                        @if ($transaction)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title">Transaction</label><br>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('backend.transaction.show', $transaction->id) }}">View</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($order->status == 'completed' && !$order->deliveries->count())
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Create
                                                        Delivery</label><br>
                                                    <a href="{{ route('backend.order.delivery.create', $order->id) }}"
                                                        class="btn btn-primary"
                                                        onclick="return confirm('Are you sure you want to create delivery for this order?')">Create</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($delivery)
                                        {{-- <div class="col-md-12"> --}}
                                        <h3>Delivery Details</h3><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">AWB Code</label><br>
                                                    <p class="label-title">{{ $delivery->awb_code }}</p>

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
                                                    <label for="degree3" class="cust-title" class="label-title">Partner
                                                        Order
                                                        Id</label><br>
                                                    <p class="label-title">{{ $delivery->partner_order_id ?? '---' }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Delivered Date</label><br>
                                                    <p class="label-title">
                                                        {{ $delivery->delivered_date ? dd_format($delivery->delivered_date, 'd-M-Y -h:i a') : '---' }}
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Status</label><br>
                                                    @if ($delivery->status == 'Pending')
                                                        <label
                                                            class="text-white badge badge-warning">{{ $delivery->status }}</label>
                                                    @elseif ($delivery->status == 'Intransit')
                                                        <label
                                                            class="text-white badge badge-primary">{{ $delivery->status }}</label>
                                                    @elseif ($delivery->status == 'Delivered')
                                                        <label
                                                            class="text-white badge badge-success">{{ $delivery->status }}</label>
                                                    @else
                                                        <label
                                                            class="text-white badge badge-secondary">{{ $delivery->status ?? '--' }}</label>
                                                    @endif

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
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Delivery</label><br>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('backend.delivery.show', $delivery->id) }}">View</a>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- </div> --}}
                                    @endif
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
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
