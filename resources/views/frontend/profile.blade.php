@extends('frontend.layouts.app')
@section('title', 'Profile')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">

@endsection
@section('content')

    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="{{ $user->first_name }}" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">My profile</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pb-4">
        <div class="container">
            <div class="row py-2 d-flex justify-content-center">
                <div class="col-12 col-lg-6 ">
                    <form class="p-4 profile-form-border" action="{{ route('frontend.profile.update') }}" method="post">
                        <h5 class="main-head text-red">Personal Information</h5>
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="first_name" class=" profile-form-input-custome"
                                    placeholder="First Name" minlength="3" maxlength="30"
                                    value="{{ old('first_name') ?? $user->first_name }}" required>
                                @if ($errors->has('first_name'))
                                    <div id="first_name-error" class="text-primary">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" name="last_name" class=" profile-form-input-custome"
                                    placeholder="Last Name" minlength="3" maxlength="30" required
                                    value="{{ old('last_name') ?? $user->last_name }}">
                                @if ($errors->has('last_name'))
                                    <div id="last_name-error" class="text-primary">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="phone" class=" profile-form-input-custome"
                                    placeholder="Mobile" required minlength="10" maxlength="10"
                                    value="{{ old('phone') ?? $user->phone }}" disabled>
                                @if ($errors->has('phone'))
                                    <div id="phone-error" class="text-primary">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" name="email" class=" profile-form-input-custome" placeholder="Email"
                                    minlength="5" maxlength="50" value="{{ old('email') ?? $user->email }}">
                                @if ($errors->has('email'))
                                    <div id="email-error" class="text-primary">{{ $errors->first('email') }}</div>
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
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                    value="female" @if ($user->gender == 'female') {{ 'checked' }} @endif required>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Female
                                </label>
                            </div>
                            @if ($errors->has('gender'))
                                <div id="gender-error" class="text-primary">{{ $errors->first('gender') }}</div>
                            @endif
                        </div>
                        <div class="col-sm-12 pt-4 text-end">
                            <button type="submit" class="btn profile-btn-color">Update profile</button>
                        </div>

                    </form>


                    <form class="p-4 profile-form-border mt-3" action="" method="post">
                        <h5 class="main-head text-red text-start">Change Password</h5>
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="c-password" class=" profile-form-input-custome"
                                    placeholder="Current Password" minlength="3" maxlength="30" value="" required>
                                {{-- @if ($errors->has('first_name'))
                                    <div id="first_name-error" class="text-primary">{{ $errors->first('first_name') }}</div>
                                @endif --}}
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" name="n-password" class=" profile-form-input-custome"
                                    placeholder="New Password" minlength="3" maxlength="30" required value="">
                                {{-- @if ($errors->has('last_name'))
                                    <div id="last_name-error" class="text-primary">{{ $errors->first('last_name') }}</div>
                                @endif --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pt-0 d-sm-block d-none">
                                <img src="frontend/images/icons/lock-icon.png" alt="" class="p-0 m-0 ">
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" name="c-n-password" class=" profile-form-input-custome"
                                    placeholder="Confirm New Password" minlength="5" maxlength="50" value="">
                                {{-- @if ($errors->has('email'))
                                    <div id="email-error" class="text-primary">{{ $errors->first('email') }}</div>
                                @endif --}}
                                <div class="col-sm-12  text-end mt-5">
                                    <button type="submit" class="btn profile-btn-color">Update Password</button>
                                </div>
                            </div>

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

                <div class="col-12 col-lg-4">

                    @forelse($userAddresses->get() as $key => $userAddress)
                        <div class="profile-form-border p-4 mb-3">
                            <div class="row">

                                <div class="col-6 py-2">
                                    <h5 class="main-head text-red">Address {{ $key + 1 }}</h5>
                                </div>
                                <div class="col-6 py-2">
                                    <ul class="d-flex gap-4 list-unstyled justify-content-end">
                                        @if ($userAddress->type == 'primary')
                                            <li>
                                                <button type="button"
                                                    class="btn btn-primary position-relative profile-s-bg-color">
                                                    {{ ucfirst($userAddress->type) }}
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                        <i class="fas fa-check" style="color:white"></i>
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </button>
                                            </li>
                                        @endif
                                        @if ($userAddress->type != 'primary')
                                            <li>
                                                <a href="{{ route('frontend.address.delete', $userAddress->id) }}"
                                                    data-bs-toggle="modal" data-bs-target="#trashbtn">
                                                    <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
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
                            <form class="" action="{{ route('frontend.address.update') }}" method="post">
                                @csrf
                                <h5 class="main-head text-red">Add Address</h5>

                                <div class="form-group py-2 req-input">
                                    <input type="text" name="name" class=" profile-form-input-custome "
                                        placeholder="Name" required minlength="3" maxlength="20" required>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="text-primary">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group py-2 req-input-2">
                                    <input type="text" name="street_address" class=" profile-form-input-custome"
                                        placeholder="Street Address" required minlength="5" maxlength="80" required>
                                    @if ($errors->has('street_address'))
                                        <div id="street_address-error" class="text-primary">
                                            {{ $errors->first('street_address') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="city" class=" profile-form-input-custome"
                                        placeholder="City" minlength="3" maxlength="20" required>
                                    @if ($errors->has('city'))
                                        <div id="city-error" class="text-primary">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="state" class=" profile-form-input-custome"
                                        placeholder="State" minlength="3" maxlength="50" required>
                                    @if ($errors->has('state'))
                                        <div id="state-error" class="text-primary">{{ $errors->first('state') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="country" class=" profile-form-input-custome"
                                        placeholder="Country" minlength="3" maxlength="50" required>
                                    @if ($errors->has('country'))
                                        <div id="country-error" class="text-primary">{{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group  profile-form-group-star-pin-code py-2">
                                    <input type="text" name="postal_code" class="profile-form-input-custome"
                                        placeholder="Pin Code" minlength="3" maxlength="20" required>
                                    @if ($errors->has('postal_code'))
                                        <div id="postal_code-error" class="text-primary">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group   py-2">

                                    <div class="row">
                                        <div class="col-6 pt-2">
                                            <label for="" class="form-check-label gray-new">Address Type</label>
                                        </div>
                                    </div>
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

    <div class="modal fade auth-popup" id="trashbtn" tabindex="-1" aria-labelledby="loginPopupLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body" style="overflow:hidden;">
                    <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                        aria-label="Close">
                        <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                            alt="">
                    </button>

                    <div class="auth-popup-body" v-if="!requested">
                        <img src="{{ asset('frontend/images/popup/popup-sure.png') }}" class="img-fluid m-auto"
                            alt="" srcset="" style="width:267px">
                        <h4 class="dispaly-6 main-head text-black mt-3 mb-2">Are You Sure !</h4>
                        <div class="d-flex justify-content-evenly my-4">
                            <button type="button" class="btn btn-lightpink px-4 btn-lg">Yes</button>
                            <button type="button" class="btn btn-pink px-4 btn-lg">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
