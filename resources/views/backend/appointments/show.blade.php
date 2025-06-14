@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row layout-top-spacing m-0  ">
        <div id="tableDropdown" class="col-lg-12 col-md-12 col-sm-12 layout-spacing ">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-0">
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2 mb-1">
                            <legend class="h4">
                                Appointments
                            </legend>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Appointments</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info statbox widget box box-shadow" style="padding: 15px;">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="work-section">

                            <h4 class="">Patient Details</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Patient
                                            Name</label><br>
                                        <p class="label-title">
                                            {{ ucfirst($appointment->patient->name) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">MRD</label><br>
                                        <p class="label-title">
                                            {{ ucfirst($appointment->patient->mrd) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Mobile</label><br>
                                        <p class="label-title">{{ $appointment->patient->mobile ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Email</label><br>
                                        <p class="label-title">{{ $appointment->patient->email ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Gender</label><br>
                                        <p class="label-title">
                                            {{ ucfirst($appointment->patient->gender) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Age</label><br>
                                        <p class="label-title">
                                            {{ $appointment->age ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">D.O.B</label><br>
                                        <p class="label-title">
                                            {{ dd_format($appointment->patient->dob, 'd-M-Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Appointment
                                            Date</label><br>
                                        <p class="label-title">
                                            {{ dd_format($appointment->date, 'd-M-Y -h:i a') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Filled
                                            By</label><br>
                                        <p class="label-title">
                                            {{ $appointment->user->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form action="{{ route('cms.appointments.print', $appointment->id) }}"
                                            method="POST" target="_blank">
                                            @csrf
                                            <button class="btn btn-primary m-1" type="submit">Print</button>
                                        </form>
                                    </div>
                                </div>
                                @if ($appointment->consent_name && $appointment->consent_signature)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <form action="{{ route('cms.appointments.consent.print', $appointment->id) }}"
                                                method="POST" target="_blank">
                                                @csrf
                                                <button class="btn btn-primary m-1" type="submit">Print Consent</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if ($appointment->eye_values()->count())
                                <hr class="m-0">
                                <h4 class="mt-2">Vission Charts</h4>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($vission_right_eye)
                                            <h6 class="text-center">Vission RE</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>Unaided</th>
                                                                <th>BCVA</th>
                                                                <th>NrVn</th>
                                                                <th>Tension<br><span class="text-lowercase">(mm
                                                                        of hg)</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_right_eye->unaided }}"
                                                                        name="vission_right_eye_unaided" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_right_eye->bcva }}"
                                                                        name="vission_right_eye_bcva" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_right_eye->nrvn }}"
                                                                        name="vission_right_eye_nrvn" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_right_eye->tension }}"
                                                                        name="vission_right_eye_tension" type="text">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($vission_left_eye)
                                            <h6 class="text-center">Vission LE</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center ">
                                                                <th>Unaided</th>
                                                                <th>BCVA</th>
                                                                <th>NrVn</th>
                                                                <th>Tension<br><span class="text-lowercase">(mm
                                                                        of hg)</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_left_eye->unaided }}"
                                                                        name="vission_left_eye_unaided" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_left_eye->bcva }}"
                                                                        name="vission_left_eye_bcva" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_left_eye->nrvn }}"
                                                                        name="vission_left_eye_nrvn" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $vission_left_eye->tension }}"
                                                                        name="vission_left_eye_tension" type="text">
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                        <th class="text-center">Near</th>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_sphere }}"
                                                                                name="ar_left_eye_sphere_sphere"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_cylinder }}"
                                                                                name="ar_left_eye_sphere_cylinder"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_axis }}"
                                                                                name="ar_left_eye_sphere_axis"
                                                                                type="text">
                                                                        </td>
                                                                    </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($pgp_right_eye)
                                            <h6 class="text-center">PGP</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="text-center">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vission</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text ">Distance</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->distance_sphere }}"
                                                                        name="pgp_right_eye_distance_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->distance_cylinder }}"
                                                                        name="pgp_right_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->distance_axis }}"
                                                                        name="pgp_right_eye_distance_axis" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->distance_vision }}"
                                                                        name="pgp_right_eye_distance_vision"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->sphere_sphere }}"
                                                                        name="pgp_right_eye_sphere_sphere" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->sphere_cylinder }}"
                                                                        name="pgp_right_eye_sphere_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->sphere_axis }}"
                                                                        name="pgp_right_eye_sphere_axis" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_right_eye->sphere_vision }}"
                                                                        name="pgp_right_eye_sphere_vision" type="text">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($pgp_left_eye)
                                            <h6 class="text-center">PGP</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th class="text-center">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vission</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->distance_sphere }}"
                                                                        name="pgp_left_eye_distance_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->distance_cylinder }}"
                                                                        name="pgp_left_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->distance_axis }}"
                                                                        name="pgp_left_eye_distance_axis" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->distance_vision }}"
                                                                        name="pgp_left_eye_distance_vision"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->sphere_sphere }}"
                                                                        name="pgp_left_eye_sphere_sphere" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->sphere_cylinder }}"
                                                                        name="pgp_left_eye_sphere_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->sphere_axis }}"
                                                                        name="pgp_left_eye_sphere_axis" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $pgp_left_eye->sphere_vision }}"
                                                                        name="pgp_left_eye_sphere_vision" type="text">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($ar_right_eye)
                                            <h6 class="text-center">AR</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center ">
                                                                <th class="text-center">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_right_eye->distance_sphere }}"
                                                                        name="ar_right_eye_distance_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_right_eye->distance_cylinder }}"
                                                                        name="ar_right_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_right_eye->distance_axis }}"
                                                                        name="ar_right_eye_distance_axis" type="text">
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                        <th class="text-center">Near</th>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_right_eye->sphere_sphere }}"
                                                                                name="ar_right_eye_sphere_sphere"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_right_eye->sphere_cylinder }}"
                                                                                name="ar_right_eye_sphere_cylinder"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_right_eye->sphere_axis }}"
                                                                                name="ar_right_eye_sphere_axis"
                                                                                type="text">
                                                                        </td>
                                                                    </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($ar_left_eye)
                                            <h6 class="text-center">AR</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center ">
                                                                <th class="text-center">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_left_eye->distance_sphere }}"
                                                                        name="ar_left_eye_distance_sphere" type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_left_eye->distance_cylinder }}"
                                                                        name="ar_left_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput" readonly
                                                                        value="{{ $ar_left_eye->distance_axis }}"
                                                                        name="ar_left_eye_distance_axis" type="text">
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                        <th class="text-center">Near</th>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_sphere }}"
                                                                                name="ar_left_eye_sphere_sphere"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_cylinder }}"
                                                                                name="ar_left_eye_sphere_cylinder"
                                                                                type="text">
                                                                        </td>
                                                                        <td> <input class="form-control" readonly
                                                                                value="{{ $ar_left_eye->sphere_axis }}"
                                                                                name="ar_left_eye_sphere_axis"
                                                                                type="text">
                                                                        </td>
                                                                    </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($spectacle_right_eye)
                                            <h6 class="text-center">Spectacle</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center ">
                                                                <th class="text-center">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vission</th>
                                                                <th>PnVn</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->distance_sphere }}"
                                                                        name="spectacle_right_eye_distance_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->distance_cylinder }}"
                                                                        name="spectacle_right_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->distance_axis }}"
                                                                        name="spectacle_right_eye_distance_axis"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->distance_vision }}"
                                                                        name="spectacle_right_eye_distance_vision"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->distance_PnVn }}"
                                                                        name="spectacle_right_eye_distance_PnVn"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">Near</th>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->sphere_sphere }}"
                                                                        name="spectacle_right_eye_sphere_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->sphere_cylinder }}"
                                                                        name="spectacle_right_eye_sphere_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->sphere_axis }}"
                                                                        name="spectacle_right_eye_sphere_axis"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->sphere_vision }}"
                                                                        name="spectacle_right_eye_sphere_vision"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_right_eye->sphere_PnVn }}"
                                                                        name="spectacle_right_eye_sphere_PnVn"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        @if ($spectacle_left_eye)
                                            <h6 class="text-center">Spectacle</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr class="text-center ">
                                                                <th class="text-center">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vission</th>
                                                                <th>PnVn</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->distance_sphere }}"
                                                                        name="spectacle_left_eye_distance_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->distance_cylinder }}"
                                                                        name="spectacle_left_eye_distance_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->distance_axis }}"
                                                                        name="spectacle_left_eye_distance_axis"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->distance_vision }}"
                                                                        name="spectacle_left_eye_distance_vision"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->distance_PnVn }}"
                                                                        name="spectacle_left_eye_distance_PnVn"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">Near</th>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->sphere_sphere }}"
                                                                        name="spectacle_left_eye_sphere_sphere"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->sphere_cylinder }}"
                                                                        name="spectacle_left_eye_sphere_cylinder"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->sphere_axis }}"
                                                                        name="spectacle_left_eye_sphere_axis"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->sphere_vision }}"
                                                                        name="spectacle_left_eye_sphere_vision"
                                                                        type="text">
                                                                </td>
                                                                <td> <input
                                                                        class="form-control controllinput controllinput_Spectacle"
                                                                        readonly
                                                                        value="{{ $spectacle_left_eye->sphere_PnVn }}"
                                                                        name="spectacle_left_eye_sphere_PnVn"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        @endif
                                    </div>
                                </div>


                            @endif

                            @if ($appointment->slit_lamp_findings()->count())
                                <hr class="m-0">
                                <h4 class="mt-4 text-center">Slit Lamp Findings</h4>
                                <div class="col-12 mx-auto">
                                    <div class="row">
                                        <div class="form-row">
                                            <div class="form-group label-title col-4 text-center cust-title">RE</div>
                                            <div class="form-group label-title col-4 text-center cust-title"></div>
                                            {{-- <div class="form-group label-title col-4 text-center">Slit Lamp Findings
                                            </div> --}}
                                            <div class="form-group label-title col-4 text-center cust-title">LE</div>

                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_lids" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->lids : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_lids'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_lids') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title align-middle ">Lids
                                            </div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_lids" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->lids : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_lids'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_lids') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}

                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_conjunctiva"
                                                        class="form-control" min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->conjunctiva : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_conjunctiva'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_conjunctiva') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Conjunctiva</div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_conjunctiva"
                                                        class="form-control" min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->conjunctiva : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_conjunctiva'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_conjunctiva') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_cornea" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->cornea : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_cornea'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_cornea') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Cornea</div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_cornea" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->cornea : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_cornea'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_cornea') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_pupil" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->pupil : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_pupil'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_pupil') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Pupil</div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_pupil" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $re_slit_lamp_findings->pupil : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_pupil'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_pupil') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_anterior_chamber"
                                                        class="form-control" min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->anterior_chamber : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_anterior_chamber'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_anterior_chamber') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Anterior Chamber
                                            </div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_anterior_chamber"
                                                        class="form-control" min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->anterior_chamber : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_anterior_chamber'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_anterior_chamber') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_lens" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->lens : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_lens'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_lens') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Lens</div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_lens" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->lens : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_lens'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_lens') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="right_eye_fundus" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->fundus : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('right_eye_fundus'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('right_eye_fundus') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-4 mt-4 text-center cust-title">Fundus</div>
                                            <div class="form-group col-4 mt-2">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="left_eye_fundus" class="form-control"
                                                        min="1" max="30"
                                                        value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->fundus : 'NA' }}"
                                                        required readonly>
                                                </div>
                                                @if ($errors->has('left_eye_fundus'))
                                                    <div class="text-danger" role="alert">
                                                        {{ $errors->first('left_eye_fundus') }}</div>
                                                @endif
                                            </div>
                                            {{-- end --}}
                                            {{-- start --}}
                                            {{-- <div class="form-group col-4 mt-2">
                                                    <div class="input-group has-validation">
                                                        <input type="text" name="right_eye_tension"
                                                            class="form-control" min="1" max="30"
                                                            value="{{ $re_slit_lamp_findings ? $re_slit_lamp_findings->tension . '.' . 'mm/g' : 'NA' }}"
                                                            required readonly>
                                                    </div>
                                                    @if ($errors->has('right_eye_tension'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('right_eye_tension') }}</div>
                                                    @endif
                                                </div> --}}
                                            {{-- <div class="form-group col-4 mt-2 text-center cust-title">Tension</div>
                                                <div class="form-group col-4 mt-2">
                                                    <div class="input-group has-validation">
                                                        <input type="text" name="left_eye_tension"
                                                            class="form-control" min="1" max="30"
                                                            value="{{ $le_slit_lamp_findings ? $le_slit_lamp_findings->tension . '.' . 'mm/g' : 'NA' }}"
                                                            required readonly>
                                                    </div>
                                                    @if ($errors->has('left_eye_tension'))
                                                        <div class="text-danger" role="alert">
                                                            {{ $errors->first('left_eye_tension') }}</div>
                                                    @endif
                                                </div> --}}
                                            {{-- end --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <hr class="m-0">
                            <h4 class="mt-2">Additional Details</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Chief
                                            Complaints</label><br>
                                        <p class="label-title">
                                            {{ $appointment->cheif_complaints ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Medical
                                            History</label><br>
                                        <p class="label-title">{{ $appointment->medical_history ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title"
                                            class="label-title">Allergies</label><br>
                                        <p class="label-title">{{ $appointment->allergies ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Ocullar
                                            Ho</label><br>
                                        <p class="label-title">{{ $appointment->ocullar_ho ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="degree3" class="cust-title" class="label-title">K Readings</label><br>
                                                <p class="label-title">{{ $appointment->k_readings ?? '--' }}
                                                </p>
                                            </div>
                                        </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title"
                                            class="label-title">Investigations</label><br>
                                        <p class="label-title">{{ $appointment->investigations ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title"
                                            class="label-title">Diagnosis</label><br>
                                        <p class="label-title">{{ $appointment->diagnosis ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Treatment
                                            Advised</label><br>
                                        <p class="label-title">
                                            {{ $appointment->treatment_advised ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree3" class="cust-title" class="label-title">Blood
                                            Test</label><br>
                                        <p class="label-title">{{ $appointment->blood_test ?? '--' }}
                                        </p>
                                    </div>
                                </div>
                                @if ($appointment->medias()->count())
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Reports</label><br>
                                            <div class="d-flex">
                                                <div id="lightgallery">
                                                    @forelse($appointment->medias()->whereType('image')->get() as $key => $report)
                                                        @if ($key == 0)
                                                            <a class="btn btn-primary m-1"
                                                                href="{{ asset('storage/documents/' . $report->filename) }}">
                                                                View
                                                            </a>
                                                        @else
                                                            <a class=""
                                                                href="{{ asset('storage/documents/' . $report->filename) }}"></a>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </div>
                                                @forelse($appointment->medias()->where('type','!=','image')->get() as $key => $report)
                                                    <a class="btn btn-primary m-1" target="_blank"
                                                        href="{{ asset('storage/documents/' . $report->filename) }}">
                                                        View {{ $key + 1 }}
                                                    </a>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="label-title cust-title">Medication
                                            Advised</label>
                                        @forelse ($appointment->medicineAdvised()->get() as $ma)
                                            <div class="row m-2">
                                                <div class="col-12 col-md-4">
                                                    <p>{{ $ma->medicine->name }}</p>
                                                </div>
                                                @if ($ma->for)
                                                    <div class="col-12 col-md-2">
                                                        <p>{{ ucwords(str_replace(['_'], ' ', $ma->for)) }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-12 col-md-2">
                                                        ----
                                                    </div>
                                                @endif

                                                <div class="col-12 col-md-2">
                                                    <p>{{ $ma->dosage }}</p>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <p>{{ $ma->time ?? '----' }}</p>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <p>{{ $ma->duration }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="label-title">---</p>
                                        @endforelse
                                    </div>
                                </div>

                            </div>

                            @if ($appointment->income)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="degree3" class="cust-title" class="label-title">Mode of
                                                Payment</label><br>
                                            <p class="label-title">
                                                {{ ucfirst($appointment->income->payment_type) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="degree3" class="cust-title"
                                                class="label-title">Amount</label><br>
                                            <p class="label-title">
                                                {{ $appointment->income->payment_amount }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="degree3" class="cust-title" class="label-title">Payment
                                                Status</label><br>
                                            <p class="label-title">
                                                {{ ucfirst($appointment->income->payment_status) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="degree3" class="cust-title" class="label-title">Payment
                                                Details</label><br>
                                            <p class="label-title">
                                                {{ ucfirst($appointment->income->details ?? '--') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="degree3" class="cust-title" class="label-title">Payment
                                                Date</label><br>
                                            <p class="label-title">
                                                {{ $appointment->income->date ? dd_format($appointment->income->date, 'd-M-Y -h:i a') : '--' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="d-md-inline-flex">
                                    <a href="{{ route('cms.appointments.edit', $appointment->id) }}"
                                        class="mt-4 ml-3 d-block btn btn-primary btn-lg">Edit Appointment</a>
                                    {{-- <a class="mt-4 mr-2 d-block btn btn-primary btn-lg"
                                                href="{{ route('cms.appointments.edit', $appointment->id) }}">Edit
                                                Appointment</a>
                                            <a class="mt-4 mr-2 d-block btn btn-primary btn-lg"
                                                href="{{ route('cms.vision_chart.edit', $appointment->id) }}">Edit
                                                Vision
                                                Chart</a> --}}
                                    {{-- <a class="mt-4 d-block btn btn-primary btn-lg"
                                                href="{{ route('cms.payment.edit', $appointment->id) }}">Edit Payment
                                                Details</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    {{-- <link rel="stylesheet" type=" text/css" href="{{ asset('css/lightgallery.css') }}">
        <script src="{{ asset('js/lightgallery.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $("#lightgallery").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true
            });
        });
    </script>
@endsection
<style>

</style>
