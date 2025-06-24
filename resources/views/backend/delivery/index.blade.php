@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Deliveries
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Deliveies</a></li>
                                </ol>
                            </nav>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mt-2">
                            <form class="form-inline row app_form" action="{{ route('backend.delivery.index') }}"
                                method="GET">
                                <select class="form-control form-control-sm app_form_select" id="exampleFormControlSelect1"
                                    name="status">
                                    <option {{ request('status') && request('status') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    <option value="Pending"
                                        {{ request('status') && request('status') == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Intransit"
                                        {{ request('status') && request('status') == 'Intransit' ? 'selected' : '' }}>
                                        Intransit</option>
                                    <option value="Delivered"
                                        {{ request('status') && request('status') == 'Delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                    <option value="Returned"
                                        {{ request('status') && request('status') == 'Returned' ? 'selected' : '' }}>
                                        Returned</option>
                                    <option value="Cancelled"
                                        {{ request('status') && request('status') == 'Cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                </select>
                                {{-- <input id="rangeCalendarFlatpickr" name="date_range" value="{{request('date_range')}}" class="form-control flatpickr flatpickr-input active w-50"
                                        type="text" placeholder="Select Date.." readonly="readonly"> --}}
                                <input class="form-control form-control-sm app_form_input col-md-4 mt-md-0 mt-3"
                                    type="text" placeholder="Order Id/Sipment Id/Awb Id" name="q"
                                    value="{{ request('q') ?? '' }}" minlength="1" maxlength="40">
                                <input type="submit" value="Search"
                                    class="btn btn-success ml-0 ml-lg-4 ml-md-4 ml-sm-4  search_btn  search_btn_size ">
                            </form>
                            @if ($errors->has('q'))
                                <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 mb-2">
                        </div>
                        {{--
                        <div class="align-items-center col-xl-5 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-end row mb-2">
                            <a href="{{ route('backend.showcase.create') }}" name="txt"
                                class="btn btn-primary mt-2 ml-3 ">
                                Add Showcase
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
                <div class="">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        {{-- <th>User Name</th> --}}
                                        <th>Order No</th>
                                        <th>Shipment Id</th>
                                        <th>AWB Code</th>
                                        {{-- <th>Pickup Date</th> --}}
                                        <th>Status</th>
                                        {{-- <th>Delivery Partner Status</th> --}}
                                        <th>Delivered Date</th>
                                        {{-- <th>Status</th> --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($deliveries as $d)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $deliveries) }}</td>
                                            {{-- <td>
                                                <a class="text-warning"
                                                    href="{{ route('backend.user.show', $d->user_id) }}">
                                                    {{ $d->user->first_name }}
                                                </a>
                                            </td> --}}
                                            <td>
                                                <a class="text-warning"
                                                    href="{{ route('backend.order.show', $d->order_id) }}" target="_blank">
                                                    {{ $d->order->order_no ?? '---' }}
                                                </a>
                                            </td>
                                            <td>{{ $d->shipment_id ?? '--' }}</td>
                                            <td>{{ $d->awb_code ?? '--' }}</td>
                                            {{-- <td>{{ $d->pickup_date ? dd_format($d->pickup_date, 'd-m-y h:i:a') : '--' }} --}}
                                            <td>
                                                @if ($d->status == 'Pending')
                                                    <span class="badge badge-warning">{{ 'Pending' }}</span>
                                                @elseif($d->status == 'Intransit')
                                                    <span class="badge badge-info">{{ 'Intransit' }}</span>
                                                @elseif($d->status == 'Delivered')
                                                    <span class="badge badge-success">{{ 'Delivered' }}</span>
                                                @else
                                                    <span class="badge badge-primary">{{ $d->status ?? '--' }}</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($d->partner_status == 'Pending')
                                                    <span class="badge badge-warning">{{ 'Pending' }}</span>
                                                @elseif($d->partner_status == 'Cancelled')
                                                    <span class="badge badge-danger">{{ 'Cancelled' }}</span>
                                                @elseif($d->partner_status == 'Delivered')
                                                    <span class="badge badge-success">{{ 'Delivered' }}</span>
                                                @else
                                                    <span
                                                        class="badge badge-primary">{{ $d->partner_status ?? '--' }}</span>
                                                @endif
                                            </td> --}}
                                            <td>{{ $d->delivered_date ? dd_format($d->delivered_date, 'd-m-y h:i:a') : '--' }}
                                            </td>
                                            {{-- <td>
                                                @if ($d->awb_code === null)
                                                    <span class="badge badge-danger">{{ 'AWB Not Available' }}</span>
                                                @elseif($d->awb_code !== null && $d->message === 'Pickup queued')
                                                    <span class="badge badge-info">{{ 'Pickup Queued' }}</span>
                                                @else
                                                    @if ($d->status === 'Intransit')
                                                        <span class="badge badge-warning">{{ $d->status }}</span>
                                                    @elseif($d->status === 'Delivered')
                                                        <span class="badge badge-success">{{ $d->status }}</span>
                                                    @else
                                                        <label
                                                            class="badge badge-secondary">{{ $d->status ?? '--' }}</label>
                                                    @endif
                                                @endif
                                            </td> --}}

                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.delivery.show', $d->id) }}">View</a>
                                                        @if ($d->status != 'Delivered')
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.delivery.fetch', $d->id) }}">Fetch</a>
                                                        @endif
                                                        @if ($d->awb_code && $d->status === 'Intransit')
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.delivery.manifest', $d->partner_order_id) }}">Print
                                                                Manifest</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('backend.delivery.label', $d->shipment_id) }}">Print
                                                                Label</a>
                                                        @endif

                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.delivery.edit', $d->id) }}">Edit</a>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $deliveries->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
