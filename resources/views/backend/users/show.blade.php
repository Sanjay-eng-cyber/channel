@extends('backend.layouts.app')
@section('title', 'User - ' . $user->first_name . ' ' . $user->last_name)
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-1">
                            <legend class="h4">
                                User Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">User Details</a></li>
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
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ $user->first_name ?? '---' }}
                                                    {{ $user->last_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $user->email ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Phone
                                                    No.</label><br>
                                                <p class="label-title">{{ $user->phone }}</p>
                                            </div>
                                        </div>
                                        @if ($userPrimaryAddress)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Primary
                                                        Address</label><br>
                                                    <p class="label-title">{{ $userPrimaryAddress->street_address }},
                                                        {{ $userPrimaryAddress->city }},
                                                        {{ $userPrimaryAddress->state }},
                                                        {{ $userPrimaryAddress->country }} -
                                                        {{ $userPrimaryAddress->postal }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- @dd($userOtherAddress->street_address) --}}
                                        @if ($userOtherAddress->count())
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Secondary
                                                        Address</label><br>
                                                    @foreach ($userOtherAddress as $address)
                                                        <p class="label-title">{{ $address->street_address }},
                                                            {{ $address->city }},
                                                            {{ $address->state }},
                                                            {{ $address->country }} - {{ $address->postal }}
                                                        </p>
                                                    @endforeach

                                                </div>
                                            </div>
                                        @endif
                                        @if ($user->profile_image)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title" class="label-title">Profile
                                                        Image</label><br>
                                                    <span id="lightgallery1">
                                                        <a
                                                            href="{{ asset('storage/images/profile/' . $user->profile_image) }}">
                                                            {{-- <img src="{{ asset('storage/images/profile/' . $user->profile_image) }}"
                                                                style="height: 150px;width:150px;object-fit:contain;"
                                                                alt=""> --}}
                                                            <button class="btn btn-primary">View</button>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="widget-content widget-content-area">

            </div> --}}
            <div class="widget-content widget-content-area simple-tab">
                <ul class="nav nav-tabs " id="simpletab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                            aria-controls="orders" aria-selected="true">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab"
                            aria-controls="wishlist" aria-selected="true">Wishlists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="transaction-tab" data-toggle="tab" href="#transaction" role="tab"
                            aria-controls="transaction" aria-selected="true">Transactions</a>
                    </li>
                </ul>
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade p-0" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="table-responsive orders-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse((object) $orders as $order)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $orders) }}</td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>
                                                @if ($order->status == 'initial')
                                                    <label class="badge badge-primary">{{ $order->status }}</label>
                                                @elseif ($order->status == 'failed')
                                                    <label class="badge badge-danger">{{ $order->status }}</label>
                                                @else
                                                    <label class="badge badge-success">{{ $order->status }}</label>
                                                @endif
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.order.show', $order->id) }}">View</a>
                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.edit', $showcase->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.destroy', $showcase->id) }}">Delete</a> --}}
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="5">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($orders)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $orders->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                        <div class="table-responsive wishlist-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($wishlists as $wishlist)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $wishlists) }}</td>
                                            <td>
                                                <a href="{{ route('backend.product.show', $wishlist->product_id) }}">
                                                    {{ $wishlist->product->name }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-md-center">
                                            <td colspan="2">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($wishlists)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $wishlists->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                        <div class="table-responsive transaction-table min-height-20em">
                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Order Id</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Transaction Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $transaction)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $transactions) }}</td>
                                            <td>
                                                <a class="blue-col-a"
                                                    href="{{ route('backend.order.show', $transaction->order_id) }}"
                                                    target="target_blank">{{ $transaction->order_id }}</a>
                                            </td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>
                                                @if ($transaction->status == 'initial')
                                                    <label class="badge badge-primary">{{ $transaction->status }}</label>
                                                @elseif ($transaction->status == 'failed')
                                                    <label class="badge badge-danger">{{ $transaction->status }}</label>
                                                @elseif ($transaction->status == 'pending')
                                                    <label class="badge badge-warning">{{ $transaction->status }}</label>
                                                @else
                                                    <label class="badge badge-success">{{ $transaction->status }}</label>
                                                @endif
                                            </td>
                                            <td>{{ $transaction->transaction_date }}</td>
                                            <td class="text-center">
                                                <div class="dropdown custom-dropdown">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('backend.transaction.show', $transaction->id) }}">View</a>
                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.edit', $showcase->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                            href="{{ route('backend.showcase.destroy', $showcase->id) }}">Delete</a> --}}
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
                            @if ($transactions)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $transactions->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('cdn')
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            let activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
            }
        })
    </script>
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery1").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true,
            });
        });
    </script>
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
