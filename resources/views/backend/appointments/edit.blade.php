@extends('cms.layouts.app')
@section('title', 'Dashboard')

@section('cdn')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">
@endsection
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-12 layout-spacing">
                <div class="statbox widget box box-shadow my-1">
                    <div class="widget-header">
                        <div class="row justify-content-between align-items-center mb-1">
                            <div class="col-lg-6 col-md-6 col-sm-6 mt-2 ">
                                <legend class="h4">
                                  Edit Appointment
                                </legend>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12  d-flex justify-content-end align-it mt-2">
                                <nav class="breadcrumb-two" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a
                                                href="javascript:void(0);">Appointment</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-chart-one">
                    <form action="{{ route('cms.appointments.update', $appointment->id) }}" method="POST"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="widget-content widget-content-area p-0">

                            <div class="row">
                                <div class="col-12 mx-auto">

                                    <div class="form-row ">
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">MRD</label>
                                            <input type="text" name="mrd" class="form-control" id=""
                                                required minlength="3" maxlength="30"
                                                value="{{ $appointment->patient->mrd }}" readonly>
                                            @if ($errors->has('mrd'))
                                                <div class="text-danger" role="alert">{{ $errors->first('mrd') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" id=""
                                                required minlength="3" maxlength="30"
                                                value="{{ $appointment->patient->name }}" readonly>
                                            @if ($errors->has('name'))
                                                <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for=""> Number</label>
                                            <input type="text" name="mobile" class="form-control" id=""
                                                required minlength="10" maxlength="10"
                                                value="{{ $appointment->patient->mobile }}" readonly>
                                            @if ($errors->has('mobile'))
                                                <div class="text-danger" role="alert">{{ $errors->first('mobile') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">Email id</label>
                                            <input type="email" name="email" class="form-control" id=""
                                                required minlength="3" maxlength="30"
                                                value="{{ $appointment->patient->email }}" readonly>
                                            @if ($errors->has('email'))
                                                <div class="text-danger" role="alert">{{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">D.O.B</label>
                                            <input type="date" name="date_of_birth" class="form-control" id=""
                                                required
                                                value="{{ old('date_of_birth') ? dd_format(old('date_of_birth'), 'Y-m-d') : dd_format($appointment->patient->dob, 'Y-m-d') }}"
                                                readonly>
                                            @if ($errors->has('date_of_birth'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('date_of_birth') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="gender" id="" readonly>
                                                <option value="male"
                                                    @if ($appointment->patient->gender == 'male') {{ 'selected' }} @endif>
                                                    Male
                                                </option>
                                                <option value="female"
                                                    @if ($appointment->patient->gender == 'female') {{ 'selected' }} @endif>
                                                    Female</option>
                                                <option value="other"
                                                    @if ($appointment->patient->gender == 'other') {{ 'selected' }} @endif>
                                                    Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="text-danger" role="alert">{{ $errors->first('gender') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">Age (years)</label>
                                            <input type="number" name="age" class="form-control" id=""
                                                value="{{ old('age') ?? $appointment->age }}" required>
                                            @if ($errors->has('age'))
                                                <div class="text-danger" role="alert">{{ $errors->first('age') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                            <label for="">Appointment Date:</label>
                                            <input type="datetime-local" name="appointment_date" class="form-control"
                                                id="appointment_date" required
                                                value="{{ old('appointment_date') ?? $appointment->date }}">
                                            @if ($errors->has('appointment_date'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('appointment_date') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- @dd($appointment->patient->dob) --}}
                                    <div class="form-row ">

                                        {{-- <div class="form-group col-md-3">
                                            <label for="formGroupExampleInput">Booked From:</label>
                                            <select class="form-control" name="booked_from" id="" required>
                                                <option value="">Select Any</option>
                                                @if (old('booked_from'))
                                                    <option value="Inside Clinic"
                                                        @if (old('booked_from') == 'Inside Clinic') {{ 'selected' }} @endif>
                                                        Inside Clinic
                                                    </option>
                                                    <option value="Outside Clinic"
                                                        @if (old('booked_from') == 'Outside Clinic') {{ 'selected' }} @endif>
                                                        Outside Clinic</option>
                                                @else
                                                    <option value="Inside Clinic"
                                                        @if ($appointment->booked_from == 'Inside Clinic') {{ 'selected' }} @endif>
                                                        Inside Clinic
                                                    </option>
                                                    <option value="Outside Clinic"
                                                        @if ($appointment->booked_from == 'Outside Clinic') {{ 'selected' }} @endif>
                                                        Outside Clinic</option>
                                                @endif
                                            </select>
                                            @if ($errors->has('booked_from'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('booked_from') }}
                                                </div>
                                            @endif
                                        </div> --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Chief Complaints
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="chief_complaints" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('chief_complaints') ?? $appointment->cheif_complaints }}</textarea>
                                            </div>
                                            @if ($errors->has('chief_complaints'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('chief_complaints') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Medical History
                                            </h5>
                                            <select class="form-control tagging" multiple="multiple"
                                                name="medical_history[]" id="">
                                                @if (old('medical_history'))
                                                    @foreach (old('medical_history') as $m)
                                                        @if ($m != '' && !in_array($m, App\Models\Appointment::MEDICAL_HISTORY))
                                                            <option value="{{ $m }}" selected>
                                                                {{ $m }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    @foreach (App\Models\Appointment::MEDICAL_HISTORY as $medical_history)
                                                        <option value="{{ $medical_history }}"
                                                            @if (in_array($medical_history, old('medical_history') ?? [])) {{ 'selected' }} @endif>
                                                            {{ $medical_history }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach (explode(',', $appointment->medical_history) as $m)
                                                        @if ($m != '' && !in_array($m, App\Models\Appointment::MEDICAL_HISTORY))
                                                            <option value="{{ $m }}" selected>
                                                                {{ $m }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    @foreach (App\Models\Appointment::MEDICAL_HISTORY as $medical_history)
                                                        <option value="{{ $medical_history }}"
                                                            @if (in_array($medical_history, explode(',', $appointment->medical_history))) {{ 'selected' }} @endif>
                                                            {{ $medical_history }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('medical_history'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('medical_history') }}
                                                </div>
                                            @endif
                                            @if ($errors->has('medical_history.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('medical_history.*') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Allergies
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="allergies" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('allergies') ?? $appointment->allergies }}</textarea>
                                            </div>
                                            @if ($errors->has('allergies'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('allergies') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Ocullar H/o
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="ocullar_ho" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('ocullar_ho') ?? $appointment->ocullar_ho }}</textarea>
                                            </div>
                                            @if ($errors->has('ocullar_ho'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('ocullar_ho') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <div class="d-lg-flex">
                                            {{-- <a class="mt-4 mr-2 d-block btn btn-primary btn-lg"
                                                href="{{ route('cms.vision_chart.edit', $appointment->id) }}">Edit Vision
                                                Chart</a>
                                            <a class="mt-4 d-block btn btn-primary btn-lg"
                                                href="{{ route('cms.payment.edit', $appointment->id) }}">Edit Payment
                                                Details</a> --}}
                                            <a href="{{ route('cms.vision_chart.edit', $appointment->id) }}"
                                                class="mt-4 d-block btn btn-primary btn-lg">Skip</a>
                                        </div>
                                        <button type="submit" class="mt-4 d-block btn btn-primary btn-lg"
                                            onclick="return confirm('Are you sure, you want to update?')">
                                            Submit
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
    <script src="{{ asset('plugins/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script>
        $(".tagging").select2({
            tags: true,
            closeOnSelect: false,
            placeholder: "Select Any"
        });
        var f2 = flatpickr(document.getElementById('appointment_date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            allowInput: true,
            disableMobile: "true"
        });
    </script>
@endsection
