<div>
    <!-- login Modal -->
    <div class="modal fade auth-popup" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog    modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body">
                    <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                        aria-label="Close">
                        <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                            alt="">
                    </button>

                    {{-- if otp not send --}}

                    @if ($step == 1)
                        <div class="auth-popup-body">
                            <h4 class="text-pink  font-body my-4">
                                Log in/Create Account
                            </h4>
                            <form wire:submit.prevent="sendOtp">
                                @csrf
                                <div class="input-group phone-number-arrow mb-3">
                                    <input type="text" class="form-control" placeholder="Enter Your Mobile Number"
                                        wire:model="mobile_no" required minlength="10" maxlength="10">
                                    <button class="input-group-text" type="submit">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                                @if ($errors->has('mobile_no'))
                                    <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                @endif
                            </form>
                        </div>
                    @elseif($step == 2)
                        {{-- else otp sent --}}
                        <div class="auth-popup-body">
                            <h4 class="text-pink  font-body my-4">
                                Welcome
                            </h4>
                            <p class="text-muted text-start">OTP Has Been Sent To Your Registered
                                Mobile Number {{ $mobile_no }}
                            </p>
                            <form wire:submit.prevent="submitOtp">
                                <div class="input-group phone-number-arrow mb-2">
                                    <input type="text" class="form-control" placeholder="Please Enter OTP"
                                        wire:model="otp" required>
                                </div>
                                @if ($errors->has('otp'))
                                    <span class="text-danger">{{ $errors->first('otp') }}</span>
                                @endif
                                <div class="d-flex justify-content-between mb-2">
                                    <button type="button" class="btn text-pink p-0 m-0 border-0" id="resend-otp-btn"
                                        disabled>
                                        RESEND OTP
                                    </button>
                                    <span class="text-muted m-0" id="otp-timer">30s</span>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-pink w-100 mt-4">Verify OTP</button>
                                </div>
                                <button class="text-muted text-center btn" onclick="breakCount()"
                                    wire:click="back()">Back To
                                    Log In</button>
                            </form>
                            <script>
                                var breakCount = () => {
                                    window.clearInterval(otpTimer);
                                }
                                var count = 30;
                                var otpTimer = setInterval(function() {
                                    if (count <= 0) {
                                        window.clearInterval(otpTimer);
                                        document.getElementById("resend-otp-btn").disabled = false;
                                        document.getElementById("otp-timer").innerHTML = "";
                                    } else {
                                        document.getElementById("otp-timer").innerHTML = count + "s";
                                    }
                                    count -= 1;
                                }, 1000);
                            </script>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

