@extends('frontend.layouts.app')
@section('title', 'Profile')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">

@endsection
@section('content')

    <style>
        .new-asterisk {
            color: red;
        }
    </style>

    @include('components.frontend.profile-nav-div')

    <section class="my-1 position-relative" style="z-index: 999">
        <div class="container">
            <div class="row py-2 d-flex justify-content-center">
                <div class="col-12 col-lg-11 col-xl-11">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="" class="bread-crum breadcrumb-hover">Profile</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </section>
    <section class="pb-4 position-relative" style="z-index: 9999">
        <div class="container">
            <div class="row py-2 d-flex justify-content-center">
                <div class="col-12 col-lg-6 col-xl-6">
                    <form class="p-4 profile-form-border" action="{{ route('frontend.profile.update') }}" method="post">
                        <h5 class="main-head text-red">Personal Information</h5>
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="first_name" class=" profile-form-input-custome"
                                    placeholder="First Name" minlength="3" maxlength="30"
                                    value="{{ old('first_name') ?? $user->first_name }}" required>
                                @if ($errors->has('first_name'))
                                    <div id="first_name-error" class="text-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" name="last_name" class=" profile-form-input-custome"
                                    placeholder="Last Name" minlength="3" maxlength="30" required
                                    value="{{ old('last_name') ?? $user->last_name }}">
                                @if ($errors->has('last_name'))
                                    <div id="last_name-error" class="text-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="phone" class=" profile-form-input-custome"
                                    placeholder="Mobile" required minlength="10" maxlength="10"
                                    value="{{ old('phone') ?? $user->phone }}" disabled>
                                @if ($errors->has('phone'))
                                    <div id="phone-error" class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" name="email" class=" profile-form-input-custome" placeholder="Email"
                                    minlength="5" maxlength="50" value="{{ old('email') ?? $user->email }}">
                                @if ($errors->has('email'))
                                    <div id="email-error" class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6 py-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                    value="male" @if ($user->gender == 'male') {{ 'checked' }} @endif
                                    placeholder="male" required>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Male
                                </label>
                            </div>


                            <div class="col-6 py-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                                    value="female" @if ($user->gender == 'female') {{ 'checked' }} @endif required>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios2">
                                    Female
                                </label>
                            </div>
                            @if ($errors->has('gender'))
                                <div id="gender-error" class="text-danger">{{ $errors->first('gender') }}</div>
                            @endif
                        </div>
                        <div class="col-sm-12 pt-4 text-end">
                            <button type="submit" class="btn profile-btn-color">Update profile</button>
                        </div>

                    </form>

                    <div class="py-3">
                    </div>
                    {{-- <form class="p-4 profile-form-border" action="" method="post">
                        <h5 class="main-head text-red">Change Password</h5>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Current Password">
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <img src="frontend/images/organic-product/change-p-pic.png" class="img-fluid" alt=""
                                    style="width: 255px;">
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="col-sm-12 pt-4 pt-lg-0  text-end">
                            <button type="submit" class="btn profile-btn-color">Update password</button>
                        </div>


                    </form> --}}
                </div>

                <div class="col-12 col-lg-6 col-xl-5">

                    @forelse($userAddresses->get() as $key => $userAddress)
                        <div class="profile-form-border p-4 mb-3">
                            <div class="row">


                                <div
                                    class="d-flex flex-wrap justify-content-between align-items-center gap-1 gap-sm-0 py-2">
                                    <h5 class="main-head text-red">Address {{ $key + 1 }}</h5>
                                    <div class="d-flex gap-2">
                                        <div>
                                            <a href="javascript:void(0)" class="edit_modal"
                                                data-id="{{ $userAddress->id }}">
                                                <i class="far fa-edit fa-1x profile-trash-icon"></i>
                                            </a>
                                        </div>
                                        @if ($userAddress->type == 'primary')
                                            <div>
                                                <button type="button"
                                                    class="btn btn-primary position-relative profile-s-bg-color">
                                                    {{ ucfirst($userAddress->type) }}
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                        <i class="fas fa-check" style="color:white"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        @endif
                                        @if ($userAddress->type != 'primary')
                                            <div class="cur-pointer">
                                                <a data-bs-toggle="modal" data-bs-target="#trashbtn{{ $key }}">
                                                    <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                </a>
                                            </div>
                                            <div class=""> <a
                                                    href="{{ route('frontend.address.make-primary', $userAddress) }}"
                                                    class="btn btn-primary position-relative profile-s-bg-color">
                                                    Make as Primary
                                                </a>
                                            </div>
                                            <div class="modal fade auth-popup" id="trashbtn{{ $key }}"
                                                tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true"
                                                style="z-index: 999999">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">

                                                        <div class="modal-body" style="overflow:hidden;">
                                                            <button class="auth-popup-close-button mb-4" type="button"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <img src="{{ url('frontend/images/icons/icon-close.svg') }}"
                                                                    style="width: 51px;" alt="">
                                                            </button>

                                                            <div class="auth-popup-body" v-if="!requested">
                                                                <img src="{{ asset('frontend/images/popup/popup-sure.png') }}"
                                                                    class="img-fluid m-auto" alt=""
                                                                    srcset="" style="width:267px">
                                                                <h4 class="dispaly-6 main-head text-black mt-3 mb-2">Are
                                                                    You Sure !</h4>
                                                                <div class="d-flex justify-content-evenly my-4">
                                                                    <a href="{{ route('frontend.address.delete', $userAddress->id) }}"
                                                                        class="btn btn-lightpink px-4 btn-lg">
                                                                        Yes
                                                                    </a>
                                                                    <button type="button"
                                                                        class="btn btn-pink px-4 btn-lg"
                                                                        data-bs-dismiss="modal">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6 class="main-head">{{ $userAddress->name }}</h6>
                                    <span>{{ $userAddress->street_address }} <br>
                                        {{ $userAddress->city }}
                                        {{ $userAddress->state }} <br>
                                        {{ $userAddress->country }} - {{ $userAddress->postal_code }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse

                    @if ($userAddresses->count() < 3)
                        <div class="p-4 profile-form-border " style="position: relative;">
                            <form class="" action="{{ route('frontend.address.store') }}" method="post">
                                @csrf
                                <h5 class="main-head text-red">Add Address</h5>

                                <div class="form-group py-2 req-input position-relative isolation">
                                    <input type="text" name="name"
                                        class=" profile-form-input-custome profile-asterisk" placeholder="Name" required
                                        minlength="3" maxlength="20" required
                                        value="{{ session()->has('store-form-error') && old('name') ? old('name') : null }}">
                                    <span class="new-asterisk position-absolute" style="top:10px;left:50px">*</span>
                                    @if (session()->has('store-form-error') && $errors->has('name'))
                                        <div id="name-error" class="text-danger">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group py-2 req-input-2 position-relative isolation">
                                    <input type="text" name="street_address"
                                        class=" profile-form-input-custome profile-asterisk" placeholder="Street Address"
                                        required minlength="5" maxlength="120" required
                                        value="{{ session()->has('store-form-error') && old('street_address') ? old('street_address') : null }}">
                                    <span class="new-asterisk  position-absolute" style="top:10px;left:120px">*</span>

                                    @if (session()->has('store-form-error') && $errors->has('street_address'))
                                        <div id="street_address-error" class="text-danger">
                                            {{ $errors->first('street_address') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="city"
                                        class=" profile-form-input-custome profile-asterisk" placeholder="City"
                                        minlength="3" maxlength="40" required
                                        value="{{ session()->has('store-form-error') && old('city') ? old('city') : null }}">
                                    @if (session()->has('store-form-error') && $errors->has('city'))
                                        <div id="city-error" class="text-danger">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    {{-- <input type="text" name="state" class=" profile-form-input-custome"
                                        placeholder="State" minlength="3" maxlength="50" required> --}}
                                    <select name="state" class=" profile-form-input-custome profile-asterisk" required>
                                        <option value="">
                                            Select State
                                        </option>
                                        @foreach (App\Models\UserAddress::STATE as $state)
                                            <option value="{{ $state }}"
                                                @if (session()->has('store-form-error') && old('state') == $state) {{ 'selected' }} @endif>
                                                {{ $state }}</option>
                                        @endforeach
                                    </select>
                                    @if (session()->has('store-form-error') && $errors->has('state'))
                                        <div id="state-error" class="text-danger">{{ $errors->first('state') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    {{-- <input type="text" name="country"
                                        class=" profile-form-input-custome profile-asterisk" placeholder="Country"
                                        minlength="3" maxlength="50" required> --}}
                                    <select name="country" class=" profile-form-input-custome profile-asterisk">
                                        <option value="India" selected>India</option>
                                        {{-- @foreach (App\Models\UserAddress::COUNTRY as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach --}}
                                    </select>
                                    @if (session()->has('store-form-error') && $errors->has('country'))
                                        <div id="country-error" class="text-danger">{{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group  profile-form-group-star-pin-code py-2 position-relative isolation">
                                    <input type="text" name="postal_code"
                                        class="profile-form-input-custome profile-asterisk" placeholder="Pin Code"
                                        minlength="6" maxlength="6" required
                                        value="{{ session()->has('store-form-error') && old('postal_code') ? old('postal_code') : null }}">
                                    <span class="new-asterisk  position-absolute" style="top:10px;left:73px">*</span>
                                    @if (session()->has('store-form-error') && $errors->has('postal_code'))
                                        <div id="postal_code-error" class="text-danger">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-12 pt-4">
                                    <button type="submit" class="btn profile-btn-color">Save Address</button>
                                </div>

                            </form>
                        </div>
                    @endif
                    {{-- <div class="row">
                        <div class="col-sm-12 py-5 text-center">
                            <button type="submit" class="btn profile-btn-color">
                                + Add Address
                            </button>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>


    </section>



    {{-- Edit address Modal --}}
    <div class="modal fade auth-popup" id="editaddress" tabindex="-1" aria-labelledby="addressFormPopupLabel"
        aria-hidden="true" style="z-index:99999">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body">
                    <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                        aria-label="Close">
                        <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                            alt="">
                    </button>

                    {{-- if otp not send --}}
                    <div class="auth-popup-body">
                        <form class="row" id="editForm" method="post" action="">
                            @csrf
                            <h5 class="main-head text-red">Edit Address</h5>
                            <input type="hidden" name="type" id="type" value="">
                            <div class="form-group py-2 req-input">
                                <input type="text" name="name" id="name" class=" profile-form-input-custome "
                                    placeholder="Name" required minlength="3" maxlength="20" required>
                                @if (session()->has('edit-form-error') && $errors->has('name'))
                                    <div id="name-error" class="text-danger text-start">
                                        {{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group py-2 req-input-2">
                                <input type="text" name="street_address" id="street_address"
                                    class=" profile-form-input-custome" placeholder="Street Address" required
                                    minlength="5" maxlength="120" required>
                                @if (session()->has('edit-form-error') && $errors->has('street_address'))
                                    <div id="street_address-error" class="text-danger text-start">
                                        {{ $errors->first('street_address') }}</div>
                                @endif
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <input type="text" name="city" id="city" class=" profile-form-input-custome"
                                    placeholder="City" minlength="3" maxlength="40" required>
                                @if (session()->has('edit-form-error') && $errors->has('city'))
                                    <div id="city-error" class="text-danger text-start">{{ $errors->first('city') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <select name="state" id="state" class=" profile-form-input-custome" required>
                                    <option value="">
                                        Select State
                                    </option>
                                    @foreach (App\Models\UserAddress::STATE as $state)
                                        <option value="{{ $state }}">{{ $state }}</option>
                                    @endforeach
                                </select>
                                @if (session()->has('edit-form-error') && $errors->has('state'))
                                    <div id="state-error" class="text-danger text-start">
                                        {{ $errors->first('state') }}</div>
                                @endif
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <select name="country" id="country" class="profile-form-input-custome" required>
                                    {{-- <option value="">
                                        Select Country
                                    </option> --}}
                                    <option value="India">India</option>
                                    {{-- @foreach (App\Models\UserAddress::COUNTRY as $country)
                                        <option value="{{ $country }}">
                                            {{ $country }}</option>
                                    @endforeach --}}
                                    @if (session()->has('edit-form-error') && $errors->has('country'))
                                        <div id="country-error" class="text-danger text-start">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <input type="text" name="postal_code" id="postal_code"
                                    class="profile-form-input-custome" placeholder="Pin Code" minlength="3"
                                    maxlength="20" required>
                                @if (session()->has('edit-form-error') && $errors->has('postal_code'))
                                    <div id="postal_code-error" class="text-danger text-start">
                                        {{ $errors->first('postal_code') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 pt-4">
                                <button type="submit" id="updateButton" class="btn profile-btn-color">Update
                                    Address</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    {{-- edit address modal end --}}
@endsection
@section('js')

    <script>
        // Select all input fields with the "required" class
        const requiredInputs = document.querySelectorAll('.profile-asterisk');
        // console.log(requiredInputs);


        requiredInputs.forEach((input) => {
            input.addEventListener("input", () => {
                const asterisk = input.nextElementSibling;

                if (input.value.trim() !== "") {
                    asterisk.style.display = "none";
                } else {
                    asterisk.style.display = "inline";
                }
            });
        });

        var bb = document.querySelectorAll('.new-asterisk');

            if (document.getElementById('name-error') ||
                document.getElementById('street_address-error') ||
                document.getElementById('city-error') ||
                document.getElementById('state-error') ||
                document.getElementById('country-error') ||
                document.getElementById('postal_code-error')) {
                bb.forEach(function(element) {
                    element.style.display = 'none';
                });
            }


            

            

    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit_modal', function() {
                var address_id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: "/address/edit/" + address_id,
                    success: function(response) {
                        $('#editaddress').modal('show');
                        //console.log(response);
                        $('#name').val(response.userAddress.name);
                        $('#street_address').val(response.userAddress.street_address);
                        $('#city').val(response.userAddress.city);
                        $('#state').val(response.userAddress.state).change();
                        $('#country').val(response.userAddress.country).change();
                        $('#postal_code').val(response.userAddress.postal_code);
                        $('#type').val(response.userAddress.type);
                        var editForm = $('#editForm');
                        editForm.attr('action', '/address/update/' + address_id);
                    },
                    error: function(response) {
                        // console.log('Error', response);
                        Snackbar.show({
                            text: "Something Went Wrong",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                })
            });
        });
    </script>
@endsection
