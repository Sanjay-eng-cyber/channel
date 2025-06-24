@extends('backend.layouts.app')
@section('title', 'Order Items')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <legend class="h4">
                                Order Items
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Order Items</a></li>
                                </ol>
                            </nav>
                        </div>
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
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order_items as $oi)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $order_items) }}</td>
                                            <td>{{ $oi->product->name }}</td>
                                            <td>{{ $oi->amount }}</td>
                                            <td>{{ $oi->quantity }}</td>
                                            {{-- <td class="text-center">
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
                                                            href="{{ route('backend.order.show', $order->id) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.edit', $showcase->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.destroy', $showcase->id) }}">Delete</a>
                                                    </div>
                                                </div>

                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination col-lg-12 mt-3">
                            <div class=" text-center mx-auto">
                                <ul class="pagination text-center">
                                    {{ $order_items->appends(Request::all())->links('pagination::bootstrap-4') }}
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
