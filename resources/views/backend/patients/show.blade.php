@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-1">
                            <legend class="h4">
                                Patient Details
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Patients</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow">
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <div class="work-section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if ($patient->profile_image)
                                            <div class="form-group mb-3 row">
                                                <div class="col-md-12">
                                                    <label for="">Profile Image</label><br>
                                                    <div id="lightgallery2">
                                                        <a
                                                            href="{{ asset('storage/profile_image/' . $patient->profile_image) }}">
                                                            <img src="{{ asset('storage/profile_image/' . $patient->profile_image) }}"
                                                                alt="Profile Image" width="100" height="100" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Name</label><br>
                                                <p class="label-title">{{ ucfirst($patient->name) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">MRD</label><br>
                                                <p class="label-title">{{ $patient->mrd }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Mobile</label><br>
                                                <p class="label-title">{{ $patient->mobile }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Gender</label><br>
                                                <p class="label-title">{{ ucfirst($patient->gender) }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <hr> --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Email</label><br>
                                                <p class="label-title">{{ $patient->email }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">D.O.B</label><br>
                                                <p class="label-title">{{ dd_format($patient->dob, 'd-M-Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">Refered
                                                    BY</label><br>
                                                <p class="label-title">{{ ucfirst($patient->refered_by ?? 'NA') }}
                                                </p>
                                            </div>
                                        </div>
                                        @if ($patient->refered_by)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="degree3" class="cust-title"
                                                        class="label-title">Details</label><br>
                                                    <p class="label-title">{{ $patient->refered_by_value ?? 'NA' }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- <hr> --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title"
                                                    class="label-title">Address</label><br>
                                                <p class="label-title">{{ $patient->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

            </div>
            {{-- NEW CODE --}}
            <div class="widget-content widget-content-area simple-tab">
                <ul class="nav nav-tabs " id="simpletab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="appointment-tab" data-toggle="tab" href="#appointment"
                            role="tab" aria-controls="appointment" aria-selected="true">Appointment</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="followup-tab" data-toggle="tab" href="#followup" role="tab"
                            aria-controls="followup" aria-selected="false">Follow Up</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="surgery-tab" data-toggle="tab" href="#surgery" role="tab"
                            aria-controls="surgery" aria-selected="false">Surgery</a>
                    </li>

                </ul>
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade p-0 show active" id="appointment" role="tabpanel"
                        aria-labelledby="appointment-tab">
                        <div class="table-responsive orders-table min-height-20em">
                            <table class="table table-striped table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Filled By</th>
                                        {{-- <th>Patient Name</th> --}}
                                        <th>Diagnosis</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $appointments) }}</td>
                                            <td>{{ $appointment->user->name }}</td>
                                            {{-- <td>{{ $appointment->patient->name }}</td> --}}
                                            <td>{{ $appointment->diagnosis ?? '--' }}</td>
                                            <td>{{ $appointment->date ? dd_format($appointment->date, 'd-M-Y -h:i a') : '--' }}
                                            </td>
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
                                                            href="{{ route('cms.appointments.show', $appointment->id) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.appointments.edit', $appointment->id) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.appointments.create', $appointment->id) }}">Create
                                                            Follow Up</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($appointments)
                                <div class="text-center mt-4">
                                    {{ $appointments->withQueryString()->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade p-0" id="followup" role="tabpanel" aria-labelledby="followup-tab">
                        <div class="table-responsive orders-table min-height-20em">
                            <table class="table table-striped footable mb-0" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Filled By</th>
                                        {{-- <th>Patient Name</th> --}}
                                        {{-- <th>Diagnosis</th> --}}
                                        <th>Details</th>
                                        <th>Appointment Date</th>
                                        <th>Follow Up Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($followups as $followup)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $followups) }}</td>
                                            <td>{{ $followup->user->name }}</td>
                                            {{-- <td>{{ $followup->patient->name }}</td> --}}
                                            {{-- <td>{{ $followup->appointment->diagnosis ?? '--' }}</td> --}}
                                            <td>{{ $followup->details ?? '--' }}</td>
                                            <td>{{ $followup->appointment->date ? dd_format($followup->appointment->date, 'd-M-Y -h:i a') : '--' }}
                                            <td>{{ $followup->date ? dd_format($followup->date, 'd-M-Y -h:i a') : '--' }}
                                            </td>
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
                                                            href="{{ route('cms.followups.show', $followup->id) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.followups.edit', $followup->id) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.appointments.show', $followup->appointment_id) }}">View
                                                            Appointment</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($followups)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $followups->withQueryString()->links('pagination::bootstrap-4') }}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="surgery" role="tabpanel" aria-labelledby="surgery-tab">
                        <div class="table-responsive orders-table min-height-20em">
                            <table class="table table-striped footable mb-0" style="text-align:center;">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        {{-- <th>Filled By</th> --}}
                                        <th>Surgery Name</th>
                                        <th>Surgery On</th>
                                        {{-- <th>Patient Name</th> --}}
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($surgerys as $surgery)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $surgerys) }}</td>
                                            <td>{{ $surgery->surgery ? $surgery->surgery->name : $surgery->surgery_detail }}
                                            </td>
                                            {{-- <td>{{ $surgery->surgery->name }}</td> --}}
                                            <td>{{ ucWords(str_replace(['_'], ' ', $surgery->surgery_on)) }}</td>
                                            {{-- <td>{{ $surgery->patient->name }}</td> --}}
                                            <td>{{ $surgery->date ? dd_format($surgery->date, 'd-M-Y -h:i a') : '--' }}
                                            </td>
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
                                                        {{-- <a class="dropdown-item"
                                                                    href="{{ route('cms.surgery.show', $surgery->id) }}">View</a> --}}
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.surgery.edit', $surgery->id) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.surgery.create', $surgery->id) }}">Create
                                                            Follow Up</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($surgerys)
                                <div class="pagination col-lg-12 mt-4">
                                    <div class="col-md-12 text-center align-self-center">
                                        <ul class="pagination text-center">
                                            {{ $surgerys->withQueryString()->links('pagination::bootstrap-4') }}
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
    <script src="{{ asset('js/lg-zoom.min.js') }}">
    </script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery2").lightGallery({
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
