@extends('backend.layouts.app')
@section('title', 'Transaction Details')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-xl-4 col-md-6  mt-2 mb-1">
                            <legend class="h4">
                                Transaction Details
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6  mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Transaction Details</a></li>
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
                                                <label for="degree3" class="cust-title" class="label-title">Order
                                                    Id</label><br>
                                                <p class="label-title"> <a class="blue-col-a"
                                                        href="{{ route('backend.order.show', $transaction->order_id) }}"
                                                        target="target_blank">{{ $transaction->order_id }}</a></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">User</label><br>
                                                <p class="label-title"> <a class="blue-col-a"
                                                        href="{{ route('backend.user.show', $user->id) }}"
                                                        target="target_blank">{{ $user->first_name . ' ' . $user->last_name }}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pg Payment
                                                    Id</label><br>
                                                <p class="label-title">{{ $transaction->pg_payment_id ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pg
                                                    Response</label><br>
                                                <p class="label-title">{{ $transaction->pg_response ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pg
                                                    Amount</label><br>
                                                <p class="label-title">{{ $transaction->pg_amount ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Pg
                                                    Status</label><br>
                                                <p class="label-title">{{ $transaction->pg_status ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Payment
                                                    Type</label><br>
                                                <p class="label-title">{{ $transaction->payment_type ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Amount</label><br>
                                                <p class="label-title">{{ $transaction->amount }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Status</label><br>
                                                <p class="label-title">
                                                    @if ($transaction->status == 'initial')
                                                        <label class="badge badge-primary"
                                                            style="color:white">{{ $transaction->status }}</label>
                                                    @elseif ($transaction->status == 'failed')
                                                        <label class="badge badge-danger"
                                                            style="color:white">{{ $transaction->status }}</label>
                                                    @elseif ($transaction->status == 'pending')
                                                        <label class="badge badge-warning"
                                                            style="color:white">{{ $transaction->status }}</label>
                                                    @else
                                                        <label class="badge badge-success"
                                                            style="color:white">{{ $transaction->status }}</label>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Date</label><br>
                                                <p class="label-title">
                                                    {{ $transaction->transaction_date ? dd_format($transaction->transaction_date, 'd-m-y h:ia') : '---' }}
                                                </p>
                                            </div>
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
@endsection
@section('js')
@endsection
<style>
    .lg-icon {
        background: transparent !important;
    }
</style>
