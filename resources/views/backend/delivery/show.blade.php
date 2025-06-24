@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-1">
                            <legend class="h4">
                                Delivery Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Delivery Details</a></li>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">User
                                                    Name</label><br>
                                                <p class="label-title">
                                                    <a class="text-warning"
                                                        href="{{ route('backend.user.show', $delivery->user_id) }}">
                                                        {{ $delivery->user->first_name }}
                                                </p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Order
                                                    No</label><br>
                                                <p class="label-title">
                                                    <a class="text-warning"
                                                        href="{{ route('backend.order.show', $delivery->order_id) }}">
                                                        {{ $delivery->order->order_no }}
                                                </p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Partner Order
                                                    Id</label><br>
                                                <p class="label-title">{{ $delivery->partner_order_id ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Shipment
                                                    Id</label><br>
                                                <p class="label-title">{{ $delivery->shipment_id ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">AWB
                                                    Code</label><br>
                                                <p class="label-title">{{ $delivery->awb_code ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Partner
                                                    Status</label><br>
                                                {{-- <p class="label-title">{{ $delivery->partner_status ?? '---' }}</p> --}}
                                                @if ($delivery->partner_status == 'Pending')
                                                    <label class="text-white badge badge-warning">{{ 'Pending' }}</label>
                                                @elseif($delivery->partner_status == 'Intransit')
                                                    <label class="text-white badge badge-danger">{{ 'Cancelled' }}</label>
                                                @elseif($delivery->partner_status == 'Delivered')
                                                    <label class="text-white badge badge-success">{{ 'Delivered' }}</label>
                                                @else
                                                    <label
                                                        class="text-white badge badge-primary">{{ $delivery->partner_status ?? '--' }}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pickup Token
                                                    No.</label><br>
                                                <p class="label-title">{{ $delivery->pickup_token_number ?? '---' }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pickup
                                                    Date</label><br>
                                                <p class="label-title">
                                                    {{ $delivery->pickup_date ? dd_format($delivery->pickup_date, 'd-m-y h:i:a') : '--' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Delivered
                                                    Date</label><br>
                                                <p class="label-title">
                                                    {{ $delivery->delivered_date ? dd_format($delivery->delivered_date, 'd-m-y h:i:a') : '--' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Message</label><br>
                                                <p class="label-title">{{ $delivery->message ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Street
                                                    Address</label><br>
                                                <p class="label-title">{{ $delivery->order->street_address }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">City</label><br>
                                                <p class="label-title">{{ $delivery->order->city }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">State</label><br>
                                                <p class="label-title">{{ $delivery->order->state }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Country</label><br>
                                                <p class="label-title">{{ $delivery->order->country }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <legend class="h5 mt-3">
                                        Delivery Items
                                    </legend>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr no.</th>
                                                        <th style="min-width: 200px;">Product Name</th>
                                                        <th>Amount</th>
                                                        <th>QTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($delivery->order->items as $key => $oi)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $oi->product->name }}</td>
                                                            <td>{{ $oi->amount }}</td>
                                                            <td>{{ $oi->quantity }}</td>
                                                        @empty
                                                        <tr>
                                                            <td colspan="4">No Records Found</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
