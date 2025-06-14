@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row layout-top-spacing m-0 pa-padding-remove">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 ">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            {{-- <legend class="h4">
                                Patients
                            </legend> --}}
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 px-4 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Patients</a></li>
                                </ol>
                            </nav>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 mb-2">
                            <div class="">
                                <form class="form-inline row px-4 pa_form_responsive" action="{{ route('cms.patients.index') }}" method="GET">
                                    <input class="form-control form-control-sm pa_form_input" type="text"
                                        placeholder="Search By MRD/Name/Mobile" name="q"
                                        value="{{ request('q') ?? '' }}" minlength="3" maxlength="40">
                                    <input type="submit" value="Search" class="btn btn-success  ml-0 ml-lg-4 ml-md-4 ml-sm-4  search_btn_size pa_search_btn">
                                </form>
                                @if ($errors->has('q'))
                                    <div class="text-danger" role="alert">{{ $errors->first('q') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="align-items-center col-xl-5 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-end row mb-2">
                            <a href="{{ route('cms.patients.create') }}" name="txt"
                                class="btn btn-primary mt-2 ml-3 ">
                                Add New Patients
                            </a>
                            <a href="{{ route('cms.import.index') }}" name="txt" class="btn btn-primary mt-2 ml-3">
                                Import Patients
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow temp-index">
                <div class="">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive min-height-20em">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>MRD</th>
                                        <th>Name</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Mobile</th>
                                        <th>Diagnosis</th>
                                        {{-- <th>DOB</th> --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patients as $patient)
                                        <tr>
                                            <td>{{ tableRowSrNo($loop->index, $patients) }}</td>
                                            <td>{{ $patient->mrd }}</td>
                                            <td>{{ $patient->name }}</td>
                                            {{-- <td>{{ $patient->email }}</td> --}}
                                            <td>{{ $patient->mobile }}</td>
                                            <td>{{ $patient->getLatestDiagnosis() ?? '--' }}</td>
                                            {{-- <td>{{ $patient->dob ?? '--' }}</td> --}}
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
                                                            href="{{ route('cms.patients.show', $patient->id) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.appointments.create', $patient->id) }}">Create
                                                            Appointment</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.surgery.create', $patient->id) }}">Create
                                                            Surgery</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cms.patients.edit', $patient->id) }}">Edit</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Records Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination col-lg-12">
                            <div class="col-md-12 text-center align-self-center">
                                <ul class="pagination text-center">
                                    {{ $patients->appends(Request::all())->links('pagination::bootstrap-4') }}
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
