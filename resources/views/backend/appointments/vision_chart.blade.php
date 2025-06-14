@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('cdn')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="layout-px-spacing" >

        <div class="row layout-top-spacing ">

            <div class="col-12 layout-spacing vission_padding_cut">
                <div class="widget widget-chart-one">
                    <h4 class="widget-heading">
                        Update Vission Chart
                    </h4>

                    <form action="{{ route('cms.vision_chart.update', $appointment->id) }}" method="POST"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="widget-content widget-content-area  p-0">

                            <div class="row ">
                                <div class="col-12 mx-auto">

                                    <h5 class="mt-3">Vission Charts</h5>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                                            <h6 class="text-center heading-center-text">Vission RE </p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Unaided</th>
                                                                <th>BCVA</th>
                                                                <th>NrVn</th>
                                                                <th>Tension<br><span class="text-lowercase">(mm of hg)</span></th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_right_eye_unaided"
                                                                        value="{{ $vission_right_eye_value ? $vission_right_eye_value->unaided : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_right_eye_bcva"
                                                                        value="{{ $vission_right_eye_value ? $vission_right_eye_value->bcva : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_right_eye_nrvn"
                                                                        value="{{ $vission_right_eye_value ? $vission_right_eye_value->nrvn : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_right_eye_tension"
                                                                        value="{{ $vission_right_eye_value ? $vission_right_eye_value->tension : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('vission_right_eye_unaided'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_right_eye_unaided') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_right_eye_bcva'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_right_eye_bcva') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_right_eye_nrvn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_right_eye_nrvn') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_right_eye_tension'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_right_eye_tension') }}
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h6 class="text-center heading-center-text">Vission LE</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Unaided</th>
                                                                <th>BCVA</th>
                                                                <th>NRVN</th>
                                                                <th>TENSION<br><span class="text-lowercase">(mm of hg)</span></th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_left_eye_unaided"
                                                                        value="{{ $vission_left_eye_value ? $vission_left_eye_value->unaided : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_left_eye_bcva"
                                                                        value="{{ $vission_left_eye_value ? $vission_left_eye_value->bcva : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_left_eye_nrvn"
                                                                        value="{{ $vission_left_eye_value ? $vission_left_eye_value->nrvn : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="vission_left_eye_tension"
                                                                        value="{{ $vission_left_eye_value ? $vission_left_eye_value->tension : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('vission_left_eye_unaided'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_left_eye_unaided') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_left_eye_bcva'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_left_eye_bcva') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_left_eye_nrvn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_left_eye_nrvn') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('vission_left_eye_tension'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('vission_left_eye_tension') }}
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                                            <h6 class="text-center heading-center-text">PGP</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_distance_sphere"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_distance_cylinder"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_distance_axis"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_distance_vision"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_sphere_sphere"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_sphere_cylinder"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_sphere_axis"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control controllinput"
                                                                        name="pgp_right_eye_sphere_vision"
                                                                        value="{{ $pgp_right_eye_value ? $pgp_right_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('pgp_right_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_right_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_right_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @if ($errors->has('pgp_right_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif --}}

                                                                    @if ($errors->has('pgp_right_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_right_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_right_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @if ($errors->has('pgp_right_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_right_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif --}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                                            <h6 class="text-center heading-center-text">PGP</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_distance_sphere"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_distance_cylinder"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_distance_axis"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_distance_vision"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_sphere_sphere"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_sphere_cylinder"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_sphere_axis"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control controllinput"
                                                                        name="pgp_left_eye_sphere_vision"
                                                                        value="{{ $pgp_left_eye_value ? $pgp_left_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('pgp_left_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_left_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_left_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif

                                                                    {{-- @if ($errors->has('pgp_left_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif --}}

                                                                    @if ($errors->has('pgp_left_eye_sphere_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_left_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('pgp_left_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @if ($errors->has('pgp_left_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('pgp_left_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif --}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h6 class="text-center heading-center-text">AR</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_right_eye_distance_sphere"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_right_eye_distance_cylinder"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_right_eye_distance_axis"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control"
                                                                        name="ar_right_eye_distance_vision"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            {{-- <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control"
                                                                        name="ar_right_eye_sphere_sphere"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_right_eye_sphere_cylinder"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_right_eye_sphere_axis"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_right_eye_sphere_vision"
                                                                        value="{{ $ar_right_eye_value ? $ar_right_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td>

                                                            </tr> --}}
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('ar_right_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_right_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_right_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @if ($errors->has('ar_right_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif --}}

                                                                    {{-- @if ($errors->has('ar_right_eye_sphere_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_right_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_right_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif --}}
                                                                    {{-- @if ($errors->has('ar_right_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_right_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif --}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h6 class="text-center heading-center-text">AR</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                {{-- <th>Vision</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_left_eye_distance_sphere"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_left_eye_distance_cylinder"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput"
                                                                        name="ar_left_eye_distance_axis"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                {{-- <td> <input class="form-control"
                                                                        name="ar_left_eye_distance_vision"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td> --}}
                                                            </tr>
                                                            {{-- <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control"
                                                                        name="ar_left_eye_sphere_sphere"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_left_eye_sphere_cylinder"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_left_eye_sphere_axis"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control"
                                                                        name="ar_left_eye_sphere_vision"
                                                                        value="{{ $ar_left_eye_value ? $ar_left_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr> --}}
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('ar_left_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_left_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_left_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    {{-- @if ($errors->has('ar_left_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif

                                                                    @if ($errors->has('ar_left_eye_sphere_shpere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_left_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_left_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('ar_left_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('ar_left_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif --}}

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h6 class="text-center heading-center-text">Spectacle</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">RE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vision</th>
                                                                <th>PnVn</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_distance_sphere"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_distance_cylinder"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_distance_axis"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_distance_vision"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_distance_PnVn"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->distance_PnVn : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_sphere_sphere"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_sphere_cylinder"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_sphere_axis"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_sphere_vision"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_right_eye_sphere_PnVn"
                                                                        value="{{ $spectacle_right_eye_value ? $spectacle_right_eye_value->sphere_PnVn : '' }}"
                                                                        type="text">
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('spectacle_right_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_distance_PnVn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_distance_PnVn') }}
                                                                        </div>
                                                                    @endif

                                                                    @if ($errors->has('spectacle_right_eye_sphere_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_right_eye_sphere_PnVn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_right_eye_sphere_PnVn') }}
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h6 class="text-center heading-center-text">Spectacle</p>
                                                <div class="table-responsive">
                                                    <table class="table mb-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center heading-center-text">LE</th>
                                                                <th>Sphere</th>
                                                                <th>Cylinder</th>
                                                                <th>Axis</th>
                                                                <th>Vision</th>
                                                                <th>PnVn</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Distance</th>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_distance_sphere"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->distance_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_distance_cylinder"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->distance_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_distance_axis"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->distance_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_distance_vision"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->distance_vision : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_distance_PnVn"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->distance_PnVn : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center heading-center-text">Near</th>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_sphere_sphere"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->sphere_sphere : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_sphere_cylinder"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->sphere_cylinder : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_sphere_axis"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->sphere_axis : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_sphere_vision"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->sphere_vision : '' }}"
                                                                        type="text">
                                                                </td>
                                                                <td> <input class="form-control controllinput controllinput_Spectacle"
                                                                        name="spectacle_left_eye_sphere_PnVn"
                                                                        value="{{ $spectacle_left_eye_value ? $spectacle_left_eye_value->sphere_PnVn : '' }}"
                                                                        type="text">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6">
                                                                    @if ($errors->has('spectacle_left_eye_distance_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_distance_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_distance_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_distance_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_distance_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_distance_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_distance_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_distance_vision') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_distance_PnVn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_distance_PnVn') }}
                                                                        </div>
                                                                    @endif

                                                                    @if ($errors->has('spectacle_left_eye_sphere_sphere'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_sphere_sphere') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_sphere_cylinder'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_sphere_cylinder') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_sphere_axis'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_sphere_axis') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_sphere_vision'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_sphere_vision') }}
                                                                        </div>
                                                                    @endif
                                                                    @if ($errors->has('spectacle_left_eye_sphere_PnVn'))
                                                                        <div class="text-danger" role="alert">
                                                                            {{ $errors->first('spectacle_left_eye_sphere_PnVn') }}
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="col-12 mx-auto">
                                    <h4 class="mt-4 text-center heading-center-text">Slit Lamp Findings</h4>
                                    <div class="form-row">
                                        <div class="form-group col-4 cust-title text-center heading-center-text">RE</div>
                                        <div class="form-group col-4 text-center heading-center-text"></div>
                                        <div class="form-group col-4 cust-title text-center heading-center-text">LE</div>

                                        {{-- start --}}
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="right_eye_lids" class="form-control"
                                                    min="1" max="30" required
                                                    value="{{ old('right_eye_lids') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->lids : 'Normal') }}">
                                            </div>
                                            @if ($errors->has('right_eye_lids'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_lids') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Lids</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_lids" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_lids') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->lids : 'Normal') }}"
                                                    required>
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
                                                <input type="text" name="right_eye_conjunctiva" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('right_eye_conjunctiva') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->conjunctiva : 'Clear') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_conjunctiva'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_conjunctiva') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Conjunctiva</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_conjunctiva" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_conjunctiva') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->conjunctiva : 'Clear') }}"
                                                    required>
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
                                                    value="{{ old('right_eye_cornea') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->cornea : 'Clear') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_cornea'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_cornea') ?? 'Clear' }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Cornea</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_cornea" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_cornea') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->cornea : 'Clear') }}"
                                                    required>
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
                                                    value="{{ old('right_eye_pupil') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->pupil : 'Round Reacting To Light') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_pupil'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_pupil') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Pupil</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_pupil" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_pupil') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->pupil : 'Round Reacting To Light') }}"
                                                    required>
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
                                                    value="{{ old('right_eye_anterior_chamber') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->anterior_chamber : 'Well Formed') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_anterior_chamber'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_anterior_chamber') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Anterior Chamber</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_anterior_chamber"
                                                    class="form-control" min="1" max="30"
                                                    value="{{ old('left_eye_anterior_chamber') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->anterior_chamber : 'Well Formed') }}"
                                                    required>
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
                                                    value="{{ old('right_eye_lens') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->lens : 'Clear') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_lens'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_lens') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Lens</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_lens" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_lens') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->lens : 'Clear') }}"
                                                    required>
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
                                                    value="{{ old('right_eye_fundus') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->fundus : 'CDR 0.3 FR+  ') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_fundus'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_fundus') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-4 text-center cust-title heading-center-text">Fundus</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_fundus" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_fundus') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->fundus : 'CDR 0.3 FR+ ') }}"
                                                    required>
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
                                                <input type="text" name="right_eye_tension" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('right_eye_tension') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->tension : 'Normal') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_tension'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_tension') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-2 text-center heading-center-text">Tension</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_tension" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_tension') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->tension : 'Normal') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('left_eye_tension'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('left_eye_tension') }}</div>
                                            @endif
                                        </div> --}}
                                        {{-- end --}}
                                        {{-- start --}}
                                        {{-- <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="right_eye_k_readings" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('right_eye_k_readings') ?? ($right_slit_lamp_findings ? $right_slit_lamp_findings->k_readings : 'Normal') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('right_eye_k_readings'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('right_eye_k_readings') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-4 mt-2 text-center heading-center-text">K Readings</div>
                                        <div class="form-group col-4 mt-2">
                                            <div class="input-group has-validation">
                                                <input type="text" name="left_eye_k_readings" class="form-control"
                                                    min="1" max="30"
                                                    value="{{ old('left_eye_k_readings') ?? ($left_slit_lamp_findings ? $left_slit_lamp_findings->k_readings : 'Normal') }}"
                                                    required>
                                            </div>
                                            @if ($errors->has('left_eye_k_readings'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('left_eye_k_readings') }}</div>
                                            @endif
                                        </div> --}}
                                        {{-- end --}}
                                    </div>

                                </div>
                                <div class="justify-content-between w-100 m-3 vission_chart_submit_btn">
                                    <a href="{{ route('cms.payment.edit', $appointment->id) }}"
                                        class="mt-4 btn btn-primary btn-lg">Skip</a>
                                    <button type="submit" class="mt-4 btn btn-primary btn-lg"
                                        onclick="return confirm('Are you sure, you want to update?')">
                                        Submit & Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
    <script>
        $(".tagging").select2({
            tags: true,
            closeOnSelect: false
        });
    </script>
@endsection
