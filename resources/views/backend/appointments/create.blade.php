@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('cdn')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}">

    <style>
        .signature-pad {
            /* cursor: url(pen.png) 1, 26, pointer; */
            /* cursor: url(/images/pen.png) 1, 26, pointer; */
            border: 2px solid black;
            border-radius: 5px;
            cursor: crosshair;
        }

        .clear-button {
            color: black;
        }

        .submit-button {
            /* background-color: black; */
            border: none;
            padding: 0.5em 1em;
            /* color: white; */
            cursor: pointer;
            /* margin-top: 3em; */
            float: right;
        }

        .consent_signature {
            border-radius: 5px;
            border: 2px solid black;
            display: none;
        }


        @media (pointer: coarse) {
            .cus-signature {
                overflow: hidden;
            }
        }

        @media (max-width: 992px) {
            .modal-dialog {
                max-width: 90% !important;
                margin: auto !important;
            }

            .bd-example-modal-lg {
                padding-right: 0 !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-12 layout-spacing">
                <div class="statbox widget box box-shadow my-1">
                    <div class="widget-header">
                        <div class="row justify-content-between align-items-center mb-1">
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-2 mb-1">
                                <legend class="h4">
                                    Create Appointment
                                </legend>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 ">
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
                    <form action="{{ route('cms.appointments.store', $patient->id) }}" method="POST"
                        enctype="multipart/form-data" id="appointmentSubmit" autocomplete="off">
                        @csrf
                        <div class="widget-content widget-content-area p-0">

                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="form-row ">
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" id=""
                                                required minlength="3" maxlength="30" value="{{ $patient->name }}"
                                                readonly>
                                            @if ($errors->has('name'))
                                                <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">MRD</label>
                                            <input type="text" name="mrd" class="form-control" id=""
                                                required minlength="3" maxlength="40" value="{{ $patient->mrd }}" readonly>
                                            @if ($errors->has('name'))
                                                <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Contact Number</label>
                                            <input type="text" name="mobile" class="form-control" id=""
                                                required minlength="10" maxlength="10" value="{{ $patient->mobile }}"
                                                readonly>
                                            @if ($errors->has('mobile'))
                                                <div class="text-danger" role="alert">{{ $errors->first('mobile') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Email id</label>
                                            <input type="email" name="email" class="form-control" id=""
                                                required minlength="3" maxlength="30" value="{{ $patient->email }}"
                                                readonly>
                                            @if ($errors->has('email'))
                                                <div class="text-danger" role="alert">{{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">D.O.B</label>
                                            <input type="date" name="date_of_birth" class="form-control" id=""
                                                required
                                                value="{{ old('date_of_birth') ? dd_format(old('date_of_birth'), 'Y-m-d') : dd_format($patient->dob, 'Y-m-d') }}"
                                                readonly>
                                            @if ($errors->has('date_of_birth'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('date_of_birth') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="gender" id="" readonly>
                                                <option value="male"
                                                    @if ($patient->gender == 'male') {{ 'selected' }} @endif>
                                                    Male
                                                </option>
                                                <option value="female"
                                                    @if ($patient->gender == 'female') {{ 'selected' }} @endif>
                                                    Female</option>
                                                <option value="other"
                                                    @if ($patient->gender == 'other') {{ 'selected' }} @endif>
                                                    Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="text-danger" role="alert">{{ $errors->first('gender') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Age (years)</label>
                                            <input type="number" name="age" class="form-control" id=""
                                                value="{{ old('age') ?? $patient->getAge() }}" required>
                                            @if ($errors->has('age'))
                                                <div class="text-danger" role="alert">{{ $errors->first('age') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-1">
                                            <label for="">Appointment Date:</label>
                                            <input type="text" name="appointment_date"
                                                class="form-control flatpickr flatpickr-input active"
                                                id="appointment_date" placeholder="Select Date.." required
                                                value="{{ old('appointment_date') }}">
                                            @if ($errors->has('appointment_date'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('appointment_date') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                    {{-- @dd($patient->dob) --}}
                                    <div class="form-row ">

                                        {{-- <div class="form-group col-md-3">
                                            <label for="formGroupExampleInput">Booked From:</label>
                                            <select class="form-control" name="booked_from" id="" required>
                                                <option value="">Select Any</option>
                                                <option value="Inside Clinic"
                                                    @if (old('booked_from') == 'Inside Clinic') {{ 'selected' }} @endif>
                                                    Inside Clinic
                                                </option>
                                                <option value="Outside Clinic"
                                                    @if (old('booked_from') == 'Outside Clinic') {{ 'selected' }} @endif>
                                                    Outside Clinic</option>
                                            </select>
                                            @if ($errors->has('booked_from'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('booked_from') }}
                                                </div>
                                            @endif
                                        </div> --}}

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mt-1">
                                            <h5 class="widget-heading">
                                                Chief Complaints
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="chief_complaints" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('chief_complaints') ?? ($old_appointment ? $old_appointment->cheif_complaints : null) }}</textarea>
                                            </div>
                                            @if ($errors->has('chief_complaints'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('chief_complaints') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3 mt-lg-1 mt-sm-3">
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
                                                @elseif($old_appointment && $old_appointment->medical_history)
                                                    @foreach (explode(',', $old_appointment->medical_history) as $om)
                                                        @if ($om != '' && !in_array($om, App\Models\Appointment::MEDICAL_HISTORY))
                                                            <option value="{{ $om }}" selected>
                                                                {{ $om }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @foreach (App\Models\Appointment::MEDICAL_HISTORY as $medical_history)
                                                    <option value="{{ $medical_history }}"
                                                        @if (in_array(
                                                                $medical_history,
                                                                old('medical_history') ??
                                                                    ($old_appointment
                                                                        ? ($old_appointment->medical_history
                                                                            ? explode(',', $old_appointment->medical_history)
                                                                            : [])
                                                                        : []))) {{ 'selected' }} @endif>
                                                        {{ $medical_history }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('medical_history'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('medical_history') }}</div>
                                            @endif
                                            @if ($errors->has('medical_history.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('medical_history.*') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-0 mt-lg-3">
                                            <h5 class="widget-heading">
                                                Allergies
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="allergies" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('allergies') ?? ($old_appointment ? $old_appointment->allergies : null) }}</textarea>
                                            </div>
                                            @if ($errors->has('allergies'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('allergies') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3 mt-lg-3 mt-sm-3">
                                            <h5 class="widget-heading">
                                                Ocullar H/o
                                            </h5>
                                            <div class="input-group has-validation">
                                                <textarea name="ocullar_ho" class="form-control" rows='3' minlength="2" maxlength="500">{{ old('ocullar_ho') ?? ($old_appointment ? $old_appointment->ocullar_ho : null) }}</textarea>
                                            </div>
                                            @if ($errors->has('ocullar_ho'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('ocullar_ho') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="mt-4 mx-auto d-block btn btn-success btn-lg"
                                    data-toggle="modal" data-target="#exampleModal">
                                    General Consent
                                </button>

                                {{-- <button type="button" id="appSubmiBtn"
                                    class="mt-4 mx-auto d-block btn btn-primary btn-lg"> --}}
                                <button type="submit" id="appSubmiBtn"
                                    class="mt-4 mx-auto d-block btn btn-primary btn-lg">
                                    Submit & Proceed
                                </button>
                            </div>
                        </div>
                </div>


                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel">General Consent</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Thank you for choosing us for your eye care needs. Our goal is to provide comprehensive
                                    eye care and
                                    high quality eye wear in an environment of superior service, value and friendliness.
                                </p>
                                <p>I am asking for the medical care and treatment at this facility, and agree to accept
                                    services which
                                    may
                                    diagnose my medical condition, procedures to treat my condition and medical care.
                                </p>
                                <p>Hereby, I understand that my agreement to accept these services is called a General
                                    Consent and that
                                    it
                                    includes any routine procedure(s) or treatment(s) administration of medication(s),
                                    administration of
                                    eye
                                    drops, use of local anesthesia and tests.
                                </p>
                                <p>Pupil Dilation: This examination enables your eye care professional to see more of your
                                    retina, the
                                    light-sensitive layer of tissue at the back of your eye. Dilating (widnening) the pupil
                                    permits your
                                    eye
                                    to be examined for signs of disease. This causes blur vision for few hours.
                                </p>
                                <p>I understand that there may be few comprehensive tests required such as OCT, Fundus
                                    Photo, Perimetry
                                    etc
                                    by my ophthalmologist to diagnose my eye condition. I hereby agree that these tests are
                                    conducted
                                    with
                                    my consent and the price of these tests are well informed before performing.
                                </p>
                                <p>I do acknowledge that different declarations may be needed for some specific diagnosis.
                                </p>
                                <p>I further acknowledge that the results of medical treatments and surgical procedures may
                                    not be
                                    adequately predicted; neither the hospital nor the attending medical team can give, or
                                    is allowed to
                                    give any guarantee or confirmation of outcomes.
                                </p>
                                <p>I assure full responsibility for all items of personal property and valuables, including
                                    money,
                                    jewellery, glasses, dentures, hearing aids, documents and other personal items
                                </p>
                                <p>I have read and understood Hospital Patient's Rights and Responsibilities displayed.
                                </p>
                                <div class="row">
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label for="">Enter Consent Name</label>
                                        <input type="text" name="consent_name" class="form-control" id="consent_name"
                                            minlength="3" maxlength="40" value="{{ old('consent_name') }}"
                                            placeholder="Enter Name" style="max-width: 300px;">
                                        @if ($errors->has('consent_name'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('consent_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row cus-signature justify-content-end">
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <img src="" id="sig-image" class="consent_signature"
                                            name="consent_signature" alt="Please Provide Signature">
                                    </div>
                                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 signature-pad-form">
                                        <canvas height="100" width="300" class="signature-pad"
                                            id="sig-canvas"></canvas>
                                        <p><a href="#" class="clear-button" id="sig-clearBtn">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                                                    width="14px" height="14px" fill-rule="nonzero">
                                                    <g fill="#ff0000" fill-rule="nonzero" stroke="none"
                                                        stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                                        stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                                        font-family="none" font-weight="none" font-size="none"
                                                        text-anchor="none" style="mix-blend-mode: normal">
                                                        <g transform="scale(10.66667,10.66667)">
                                                            <path
                                                                d="M4.70703,3.29297l-1.41406,1.41406l7.29297,7.29297l-7.29297,7.29297l1.41406,1.41406l7.29297,-7.29297l7.29297,7.29297l1.41406,-1.41406l-7.29297,-7.29297l7.29297,-7.29297l-1.41406,-1.41406l-7.29297,7.29297z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                Clear Signature</a></p>
                                        @if ($errors->has('consent_signature_image'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('consent_signature_image') }}
                                            </div>
                                        @endif
                                        <button class="submit-button btn btn-primary mt-2" id="sig-submitBtn"
                                            type="button">Save
                                            Signature</button>
                                        <input type="text" id="signature_input" name="consent_signature_image"
                                            class="d-none">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    <script src="{{ asset('js/consent.js') }}"></script>
    <script>
        $(".tagging").select2({
            tags: true,
            closeOnSelect: false,
            placeholder: "Select Any"
        });
        $(document).ready(function() {
            @if (count($errors) > 0 && ($errors->has('consent_name') || $errors->has('consent_signature_image')))
                $('#exampleModal').modal('show')
            @endif

            var consentName = document.getElementById('consent_name');
            var signatureInput = document.getElementById('signature_input');
            // var appDate = document.getElementById('appointment_date');

            $('#appointmentSubmit').on("submit", function(e) {
                if (!consentName.value) {
                    Snackbar.show({
                        text: "Please Enter Consent Name",
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#2196f3'
                    });
                    e.preventDefault();
                } else if (!signatureInput.value) {
                    Snackbar.show({
                        text: "Please Enter Consent Signature",
                        pos: 'top-right',
                        actionTextColor: '#fff',
                        backgroundColor: '#2196f3'
                    });
                    e.preventDefault();
                } else {
                    return true;
                }
            });
        });
        var f2 = flatpickr(document.getElementById('appointment_date'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            allowInput: true,
            disableMobile: "true"
        });
    </script>
@endsection
