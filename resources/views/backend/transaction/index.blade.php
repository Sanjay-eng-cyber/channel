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
                                Transactions
                            </legend>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Transactions</a></li>
                                </ol>
                            </nav>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mt-2">
                            <form class="form-inline row app_form" action="{{ route('backend.transaction.index') }}"
                                method="GET">
                                <select class="form-control form-control-sm app_form_select" id="exampleFormControlSelect1"
                                    name="status">
                                    <option {{ request('status') && request('status') == 'all' ? 'selected' : '' }}>All
                                    </option>
                                    <option value="initial"
                                        {{ request('status') && request('status') == 'initial' ? 'selected' : '' }}>
                                        Initial</option>
                                        <option value="pending"
                                        {{ request('status') && request('status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="failed"
                                        {{ request('status') && request('status') == 'failed' ? 'selected' : '' }}>
                                        Failed</option>
                                    <option value="completed"
                                        {{ request('status') && request('status') == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                                {{-- <input id="rangeCalendarFlatpickr" name="date_range" value="{{request('date_range')}}" class="form-control flatpickr flatpickr-input active w-50"
                                        type="text" placeholder="Select Date.." readonly="readonly"> --}}
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
                                            <td>{{ $transaction->order_id }}</td>
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
                                    {{ $transactions->appends(Request::all())->links('pagination::bootstrap-4') }}
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
