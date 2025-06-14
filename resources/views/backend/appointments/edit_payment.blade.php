@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('cdn')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <h4 class="widget-heading">
                        Fill Appointment Details
                    </h4>
                    <div id="first-item" class="first-item" style="display: none;">
                        <div class="row">
                            <div class="col-lg-4 col-12 mt-3">
                                <h5 class="widget-heading">
                                    Medicine
                                </h5>
                                <div class="input-group has-validation">
                                    <select name="medicine[]" id="" class="form-control custom-select2" required>
                                        <option value="">Select Any</option>
                                        @foreach ($medicines as $med)
                                            <option value="{{ $med->id }}">{{ $med->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('medicine'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('medicine') }}</div>
                                @endif
                                @if ($errors->has('medicine.*'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('medicine.*') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-2 col-12 mt-3">
                                <h5 class="widget-heading">
                                    For
                                </h5>
                                <div class="input-group has-validation">
                                    <select name="for[]" id="" class="form-control">
                                        <option value="">None</option>
                                        <option value="right_eye">Right Eye</option>
                                        <option value="left_eye">Left Eye</option>
                                        <option value="both_eyes">Both Eyes</option>
                                    </select>
                                </div>
                                @if ($errors->has('for'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('for') }}</div>
                                @endif
                                @if ($errors->has('for.*'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('for.*') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-2 col-12 mt-3">
                                <h5 class="widget-heading">
                                    Dosage
                                </h5>
                                <div class="input-group has-validation">
                                    <select name="dosage[]" id="" class="form-control" required>
                                        <option value="">Select Any</option>
                                        @foreach (App\Models\Medicine::DOSAGE as $d)
                                            <option value="{{ $d }}">{{ $d }}</option>
                                        @endforeach
                                        {{-- <option value="Once a day">Once a day</option> --}}
                                    </select>
                                </div>
                                @if ($errors->has('dosage'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('dosage') }}</div>
                                @endif
                                @if ($errors->has('dosage.*'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('dosage.*') }}</div>
                                @endif
                            </div>

                            <div class="col-lg-2 col-12 mt-3">
                                <h5 class="widget-heading">
                                    Time
                                </h5>
                                <div class="input-group has-validation">
                                    <select name="time[]" id="" class="form-control">
                                        <option value="">Select Any</option>
                                        @foreach (App\Models\Medicine::TIMINGS as $t)
                                            <option value="{{ $t }}">{{ $t }}</option>
                                        @endforeach
                                        {{-- <option value="after_food">After Food</option>
                                        <option value="before_food">Before Food</option> --}}
                                    </select>
                                </div>
                                @if ($errors->has('time'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('time') }}</div>
                                @endif
                                @if ($errors->has('time.*'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('time.*') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-2 col-12 mt-3">
                                <h5 class="widget-heading">
                                    Duration
                                </h5>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="duration[]"
                                        placeholder="Enter Duration" required>
                                </div>
                                @if ($errors->has('duration'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('duration') }}</div>
                                @endif
                                @if ($errors->has('duration.*'))
                                    <div class="text-danger" role="alert">
                                        {{ $errors->first('duration.*') }}</div>
                                @endif
                            </div>
                            <div class="col-1g-1 col-12 mt-3 d-flex justify-content-end">
                                <div class="delete btn btn-danger" id=""><i class="far fa-trash-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('cms.payment.update', $appointment->id) }}" method="POST"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="widget-content widget-content-area p-0">
                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Investigations
                                            </h5>
                                            <div class="input-group has-validation">
                                                <select class="form-control tagging" multiple="multiple"
                                                    name="investigations[]" id="">
                                                    @if (old('investigations'))
                                                        @foreach (old('investigations') as $i)
                                                            @if ($i != '' && !in_array($i, App\Models\Appointment::INVESTIGATION))
                                                                <option value="{{ $i }}" selected>
                                                                    {{ $i }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::INVESTIGATION as $investigations)
                                                            <option value="{{ $investigations }}"
                                                                @if (in_array($investigations, old('investigations') ?? [])) {{ 'selected' }} @endif>
                                                                {{ $investigations }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        @foreach (explode(',', $appointment->investigations) as $i)
                                                            @if ($i != '' && !in_array($i, App\Models\Appointment::INVESTIGATION))
                                                                <option value="{{ $i }}" selected>
                                                                    {{ $i }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::INVESTIGATION as $investigations)
                                                            <option value="{{ $investigations }}"
                                                                @if (in_array($investigations, explode(',', $appointment->investigations) ?? [])) {{ 'selected' }} @endif>
                                                                {{ $investigations }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @if ($errors->has('investigations'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('investigations') }}</div>
                                            @endif
                                            @if ($errors->has('investigations.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('investigations.*') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Diagnosis

                                            </h5>
                                            <div class="input-group has-validation">
                                                <select class="form-control tagging" multiple="multiple"
                                                    name="diagnosis[]" id="">
                                                    @if (old('diagnosis'))
                                                        @foreach (old('diagnosis') as $d)
                                                            @if ($d != '' && !in_array($d, App\Models\Appointment::DIAGNOSIS))
                                                                <option value="{{ $d }}" selected>
                                                                    {{ $d }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::DIAGNOSIS as $diagnosis)
                                                            <option value="{{ $diagnosis }}"
                                                                @if (in_array($diagnosis, old('diagnosis') ?? [])) {{ 'selected' }} @endif>
                                                                {{ $diagnosis }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        @foreach (explode(',', $appointment->diagnosis) as $d)
                                                            @if ($d != '' && !in_array($d, App\Models\Appointment::DIAGNOSIS))
                                                                <option value="{{ $d }}" selected>
                                                                    {{ $d }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::DIAGNOSIS as $diagnosis)
                                                            <option value="{{ $diagnosis }}"
                                                                @if (in_array($diagnosis, explode(',', $appointment->diagnosis) ?? [])) {{ 'selected' }} @endif>
                                                                {{ $diagnosis }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @if ($errors->has('diagnosis'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('diagnosis') }}</div>
                                            @endif
                                            @if ($errors->has('diagnosis.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('diagnosis.*') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Treatment Advised
                                            </h5>
                                            <div class="input-group has-validation">
                                                <input type="text" name="treatment_advised" class="form-control"
                                                    value="{{ old('treatment_advised') ?? $appointment->treatment_advised }}"
                                                    min="2" max="500">
                                            </div>
                                            @if ($errors->has('treatment_advised'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('treatment_advised') }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Blood Test:
                                            </h5>
                                            <div class="input-group has-validation">
                                                <select class="form-control tagging" multiple="multiple"
                                                    name="blood_test[]" id="">
                                                    @if (old('blood_test'))
                                                        @foreach (old('blood_test') as $b)
                                                            @if ($b != '' && !in_array($b, App\Models\Appointment::BLOOD_TESTS))
                                                                <option value="{{ $b }}" selected>
                                                                    {{ $b }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::BLOOD_TESTS as $blood_test)
                                                            <option value="{{ $blood_test }}"
                                                                @if (in_array($blood_test, old('blood_test') ?? [])) {{ 'selected' }} @endif>
                                                                {{ $blood_test }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach (explode(',', $appointment->blood_test) as $b)
                                                            @if ($b != '' && !in_array($b, App\Models\Appointment::BLOOD_TESTS))
                                                                <option value="{{ $b }}" selected>
                                                                    {{ $b }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                        @foreach (App\Models\Appointment::BLOOD_TESTS as $blood_test)
                                                            <option value="{{ $blood_test }}"
                                                                @if (in_array($blood_test, explode(',', $appointment->blood_test) ?? [])) {{ 'selected' }} @endif>
                                                                {{ $blood_test }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @if ($errors->has('blood_test'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('blood_test') }}
                                                </div>
                                            @endif
                                            @if ($errors->has('blood_test.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('blood_test.*') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3">
                                            <h5 class="widget-heading">
                                                Upload Documents
                                            </h5>
                                            <div class="input-group has-validation">
                                                <input class="form-control" type="file" multiple name="document[]">
                                            </div>
                                            @if ($errors->has('document'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('document') }}</div>
                                            @endif
                                            @if ($errors->has('document.*'))
                                                <div class="text-danger" role="alert">
                                                    {{ $errors->first('document.*') }}</div>
                                            @endif
                                        </div>
                                        @if ($appointment->medias()->count())
                                            <div class="col-lg-6 col-12 mt-3">
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
                                    <hr>
                                    <h5 class="mt-3">Medication</h5>
                                    @foreach ($appointment->medicineAdvised as $key => $m)
                                        <div class="row m-2">
                                            <div class="col-12 col-md-4">
                                                <p>{{ $key + 1 . ' - ' . $m->medicine->name }}</p>
                                            </div>
                                            @if ($m->for)
                                                <div class="col-12 col-md-2">
                                                    <p>{{ ucwords(str_replace(['_'], ' ', $m->for)) }}</p>
                                                </div>
                                            @else
                                                <div class="col-12 col-md-2">
                                                    ----
                                                </div>
                                            @endif

                                            <div class="col-12 col-md-2">
                                                <p>{{ $m->dosage }}</p>
                                            </div>
                                            @if ($m->time)
                                                <div class="col-12 col-md-1">
                                                    <p>{{ $m->time }}</p>
                                                </div>
                                            @else
                                                <div class="col-12 col-md-1">
                                                    ----
                                                </div>
                                            @endif

                                            <div class="col-12 col-md-2">
                                                <p>{{ $m->duration }}</p>
                                            </div>
                                            <div class="col-12 col-md-1">
                                                <a class="btn btn-danger fa mb-3 float-right"
                                                    href="{{ route('cms.appointments.medicine_delete', ['appointment_id' => $appointment->id, 'medicine_advised_id' => $m->id]) }}"
                                                    onclick="return confirm('Are you sure you want to delete this medicine advised?')">x</a>
                                            </div>
                                        </div>
                                        <hr class="m-1">
                                    @endforeach
                                    <div class="item-list" id="item-list">
                                    </div>
                                    <div class="row mt-3 mx-auto">
                                        <div class="add-item btn btn-lg btn-success btn-sm" id="add-item"><i
                                                class="far fa-plus-square mr-2"></i>Add item</div>
                                    </div>
                                </div>
                                <div class="col-12 row mx-auto">
                                    <div class="col-lg-6 col-12 mt-3">
                                        <h5 class="widget-heading">
                                            Payment Type:
                                        </h5>
                                        <div class="input-group has-validation">
                                            <select class="form-control" name="payment_type" id="">
                                                <option value="">Select Any</option>
                                                @if (old('payment_type'))
                                                    @foreach (App\Models\Appointment::PAYMENTS as $payments)
                                                        <option value="{{ $payments }}"
                                                            @if ($payments == old('payment_type')) {{ 'selected' }} @endif>
                                                            {{ $payments }}</option>
                                                    @endforeach
                                                @else
                                                    @foreach (App\Models\Appointment::PAYMENTS as $payments)
                                                        <option value="{{ $payments }}"
                                                            @if (($appointment->income ? $appointment->income->payment_type : '') == $payments) {{ 'selected' }} @endif>
                                                            {{ $payments }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if ($errors->has('payment_type'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('payment_type') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3">
                                        <h5 class="widget-heading">
                                            Payment Status
                                        </h5>
                                        <select class="form-control" name="payment_status" id="">
                                            <option value="">Select Any</option>
                                            @if (old('payment_status'))
                                                <option value="completed"
                                                    @if (old('payment_status') == 'completed') {{ 'selected' }} @endif>
                                                    Completed
                                                </option>
                                                <option value="pending"
                                                    @if (old('payment_status') == 'pending') {{ 'selected' }} @endif>
                                                    Pending
                                                </option>
                                            @else
                                                <option value="completed"
                                                    @if (($appointment->income ? $appointment->income->payment_status : '') == 'completed') {{ 'selected' }} @endif>
                                                    Completed
                                                </option>
                                                <option value="pending"
                                                    @if (($appointment->income ? $appointment->income->payment_status : '') == 'pending') {{ 'selected' }} @endif>
                                                    Pending
                                                </option>
                                            @endif
                                        </select>

                                        @if ($errors->has('payment_status'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('payment_status') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3">
                                        <h5 class="widget-heading">
                                            Payment Amount
                                        </h5>
                                        <div class="input-group has-validation">
                                            <input class="form-control" type="text" name="payment_amount"
                                                placeholder="Enter Payment Amount"
                                                value="{{ old('payment_amount') ?? ($appointment->income ? $appointment->income->payment_amount : '') }}">
                                        </div>
                                        @if ($errors->has('payment_amount'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('payment_amount') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3">
                                        <h5 class="widget-heading">
                                            Payment Date
                                        </h5>
                                        <input type="datetime-local" class="form-control" id="formGroupExampleInput3"
                                            placeholder="Enter payment Date"
                                            value="{{ old('payment_date') ?? ($appointment->income ? $appointment->income->date : '') }}"
                                            name="payment_date">
                                        @if ($errors->has('payment_date'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('payment_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12 mt-3">
                                        <h5 class="widget-heading">
                                            Payment Details
                                        </h5>
                                        <div class="input-group has-validation">
                                            <input class="form-control" type="text" name="payment_details"
                                                placeholder="Enter Payment Details"
                                                value="{{ old('payment_details') ?? ($appointment->income ? $appointment->income->details : '') }}"
                                                minlength="3" maxlength="150">
                                        </div>
                                        @if ($errors->has('payment_details'))
                                            <div class="text-danger" role="alert">
                                                {{ $errors->first('payment_details') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 col-12 mt-5">
                                        <h5 class="widget-heading">
                                            Send Thankyou Mail
                                        </h5>
                                        <input style="width: 20px" type="checkbox" name="send_thankyou_message"
                                            value="1">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between w-100 m-3">
                                    <a href="{{ route('cms.appointments.show', $appointment->id) }}"
                                        class="mt-4 d-block btn btn-primary btn-lg">Skip</a>
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
    <link type=" text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery.min.js') }}">
    </script>
    {{-- <script src="{{ asset('plugins/select2/select2.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/select2/custom-select2.js') }}"></script> --}}
    <script>
        $(".tagging").select2({
            tags: true,
            closeOnSelect: false,
            placeholder: "Select Any"
        });
        $(document).ready(function() {
            $('#add-item').click(function() {
                $('#first-item').first().clone().appendTo('#item-list').show().find('input').val('');
                $('#item-list .custom-select2').select2({
                    closeOnSelect: false,
                    placeholder: "Select Any"
                });
                attach_delete();
            });

            function attach_delete() {
                $('.delete').off();
                $('.delete').click(function() {
                    $(this).closest('.item-list .first-item').remove();
                });
            }
            // $('.mdb-select').materialSelect();
            // $(document).ready(function() {
            //     $('.mdb-select').select2();
            // });
            $("#lightgallery").lightGallery({
                download: false,
                escKey: true,
                fullScreen: true
            });
        });
    </script>

@endsection
