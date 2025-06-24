@extends('backend.layouts.app')
@section('title', 'Create Delivery')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-2 ">
                            <legend class="h4">
                                Create Delivery
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Create Delivery</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-xl-12">

                <div class="row m-0">
                    <legend class="h5 mt-3">
                        Order Details
                    </legend>
                    <div class="col-12">
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">User</label><br>
                                    <p class="label-title">{{ $order->user->first_name }}
                                        {{ $order->user->last_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Order
                                        Id</label><br>
                                    <p class="label-title">{{ $order->api_order_id }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Order No</label><br>
                                    <p class="label-title">{{ $order->order_no }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Sub
                                        Total</label><br>
                                    <p class="label-title">{{ $order->sub_total }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Discount
                                        Amount</label><br>
                                    <p class="label-title">{{ $order->discount_amount }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Total
                                        Amount</label><br>
                                    <p class="label-title">{{ $order->total_amount }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Street Address</label><br>
                                    <p class="label-title">{{ $order->street_address }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">City</label><br>
                                    <p class="label-title">{{ $order->city }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">State</label><br>
                                    <p class="label-title">{{ $order->state }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Country</label><br>
                                    <p class="label-title">{{ $order->country }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="degree3" class="cust-title" class="label-title">Total
                                        Amount</label><br>
                                    <p class="label-title">{{ $order->total_amount }}</p>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <legend class="h5 mt-3">
                        Order Items
                    </legend>
                    <div class="col-12">
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
                                    @forelse($order->items as $key => $oi)
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

                    <legend class="h5 mt-3">
                        Create Delivery
                    </legend>
                    <div class="col-12">
                        <form class="mt-3" method="POST"
                            action="{{ route('backend.order.delivery.store', $order->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Length (in cm)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Length" required step="0.1" name="length"
                                        value="{{ old('length') }}">
                                    @if ($errors->has('length'))
                                        <div class="text-danger" role="alert">{{ $errors->first('length') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Breadth (in cm)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Breadth" required step="0.1" name="breadth"
                                        value="{{ old('breadth') }}">
                                    @if ($errors->has('breadth'))
                                        <div class="text-danger" role="alert">{{ $errors->first('breadth') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Height (in cm)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Height" required step="0.1" name="height"
                                        value="{{ old('height') }}">
                                    @if ($errors->has('height'))
                                        <div class="text-danger" role="alert">{{ $errors->first('height') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="formGroupExampleInput" class="">Weight (in kg)</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Weight" required step="0.1" name="weight"
                                        value="{{ old('weight') }}">
                                    @if ($errors->has('weight'))
                                        <div class="text-danger" role="alert">{{ $errors->first('weight') }}</div>
                                    @endif
                                </div>
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
