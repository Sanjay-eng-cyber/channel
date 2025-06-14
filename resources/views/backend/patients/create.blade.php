@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-2 ">
                            <legend class="h4">
                                Create Patients
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2">
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
            <div class="statbox widget box box-shadow temp-a">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('cms.patients.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Patient Name</label>
                                    <input type="name" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="30" required name="name"
                                        value="{{ old('name') ? old('name') : ($temp_appointment ? $temp_appointment->name : '') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">MRD</label>
                                    <input type="name" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter MRD" minlength="3" maxlength="40" required name="mrd"
                                        value="{{ old('mrd') }}">
                                    @if ($errors->has('mrd'))
                                        <div class="text-danger" role="alert">{{ $errors->first('mrd') }}</div>
                                    @endif
                                </div>
                                {{-- <div class="col-12"></div> --}}
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    {{-- <div class="col-12 col-md-4 m-0 p-0"> --}}
                                    <label for="formGroupExampleInput" class="">Select Image Upload
                                        Type</label><br>
                                    <select class="form-control" name="profile_image_type" id="profile_image_type">
                                        <option value="">Select Any</option>
                                        <option value="camera" @if (old('profile_image_type') == 'camera') {{ 'selected' }} @endif>
                                            Camera
                                        </option>
                                        <option value="file" @if (old('profile_image_type') == 'file') {{ 'selected' }} @endif>
                                            File Upload</option>
                                    </select>
                                    {{-- </div> --}}
                                </div>

                                <div class="col-12 py-3 my-3">
                                    <div id="camera_div" style="display: none;">
                                        <div class="panel">
                                            <button class="btn btn-outline-primary mr-1 mb-1" type="button"
                                                id="switchFrontBtn">Front Camera</button>
                                            <button class="btn btn-outline-primary mr-1 mb-1" type="button"
                                                id="switchBackBtn">Back
                                                Camera</button>
                                            <button class="btn btn-outline-primary mr-1 mb-1" type="button"
                                                id="snapBtn">Snap</button>
                                            <button class="btn btn-outline-primary mr-1 mb-1" type="button" id="turnOffCam"
                                                onclick="resetCamera()">Turn Off Camera</button>
                                            <button class="btn btn-outline-primary mb-1" type="button" id="clerPhotoBtn"
                                                onclick="clearPhoto()">Clear
                                                Photo</button>
                                        </div>
                                        <div style="width:100%">
                                            <!-- add autoplay muted playsinline for iOS -->
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <video id="cam" class="w-100 border-0 shadow-lg" autoplay muted
                                                        playsinline>Not available</video>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <canvas id="canvas" class="w-100" style="display:none"></canvas>
                                                    <img id="photo" class="w-100 shadow-lg"
                                                        alt="The screen capture will appear in this box.">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control col-12 col-md-6 col-lg-4" name="profile_image"
                                        id="myprofile">
                                    @if ($errors->has('profile_image_type'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('profile_image_type') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('profile_image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('profile_image') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Mobile</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Mobile No." minlength="10" maxlength="10" required
                                        name="mobile"
                                        value="{{ old('mobile') ? old('mobile') : ($temp_appointment ? $temp_appointment->mobile : '') }}">
                                    @if ($errors->has('mobile'))
                                        <div class="text-danger" role="alert">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Email</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Email" minlength="3" maxlength="30" name="email"
                                        value="{{ old('email') ? old('email') : ($temp_appointment ? $temp_appointment->email : '') }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Select Gender</label><br>
                                    <select class="form-control" name="gender" id="" required>
                                        <option value="male"
                                            @if (old('gender') == 'male') {{ 'selected' }} @endif>
                                            Male
                                        </option>
                                        <option value="female"
                                            @if (old('gender') == 'female') {{ 'selected' }} @endif>
                                            Female</option>
                                        <option value="other"
                                            @if (old('gender') == 'other') {{ 'selected' }} @endif>
                                            Other</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <div class="text-danger" role="alert">{{ $errors->first('gender') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Date of Birth:</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                    @if ($errors->has('date_of_birth'))
                                        <div class="text-danger" role="alert">{{ $errors->first('date_of_birth') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Address</label>
                                    <input type="address" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Address" minlength="3" maxlength="250" required
                                        name="address" value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <div class="text-danger" role="alert">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Refered By</label><br>
                                    <select class="form-control" name="refered_by" id="">
                                        <option value="">Select If Any</option>
                                        @foreach (App\Models\Patient::REFERED_BY as $refered_by)
                                            @if (old('refered_by'))
                                                <option value="{{ $refered_by }}"
                                                    @if (old('refered_by') == $refered_by) {{ 'selected' }} @endif>
                                                    {{ $refered_by }}
                                                </option>
                                            @elseif ($temp_appointment)
                                                <option value="{{ $refered_by }}"
                                                    @if ($temp_appointment->referred_by == $refered_by) {{ 'selected' }} @endif>
                                                    {{ $refered_by }}
                                                </option>
                                            @else
                                                <option value="{{ $refered_by }}">
                                                    {{ $refered_by }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('refered_by'))
                                        <div class="text-danger" role="alert">{{ $errors->first('refered_by') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Details:</label>
                                    <input type="text" class="form-control" placeholder="" id="formGroupExampleInput"
                                        name="refered_by_value"
                                        value="{{ old('refered_by_value') ? old('refered_by_value') : ($temp_appointment ? $temp_appointment->referred_by_value : '') }}"
                                        minlength="3" maxlength="30">
                                    @if ($errors->has('refered_by_value'))
                                        <div class="text-danger" role="alert">
                                            {{ $errors->first('refered_by_value') }}
                                        </div>
                                    @endif
                                </div>

                            </div>


                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        /*
                                                        Please try with devices with camera!
                                                        */

        /*
        Reference:
        https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
        https://developers.google.com/web/updates/2015/07/mediastream-deprecations?hl=en#stop-ended-and-active
        https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos
        */

        // reference to the current media stream
        var mediaStream = null;

        // Prefer camera resolution nearest to 1280x720.
        var constraints = {
            audio: false,
            video: {
                width: {
                    ideal: 640
                },
                height: {
                    ideal: 480
                },
                facingMode: "environment"
            }
        };

        async function getMediaStream(constraints) {
            try {
                mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
                let video = document.getElementById('cam');
                video.srcObject = mediaStream;
                video.onloadedmetadata = (event) => {
                    video.play();
                };
            } catch (err) {
                console.error(err.message);
            }
        };

        async function switchCamera(cameraMode) {
            try {
                // stop the current video stream
                if (mediaStream != null && mediaStream.active) {
                    var tracks = mediaStream.getVideoTracks();
                    tracks.forEach(track => {
                        track.stop();
                    })
                }

                // set the video source to null
                document.getElementById('cam').srcObject = null;

                // change "facingMode"
                constraints.video.facingMode = cameraMode;

                // get new media stream
                await getMediaStream(constraints);
            } catch (err) {
                console.error(err.message);
                alert(err.message);
            }
        }

        function takePicture() {
            let canvas = document.getElementById('canvas');
            let video = document.getElementById('cam');
            let photo = document.getElementById('photo');
            let context = canvas.getContext('2d');
            let clearBtn = document.getElementById('clerPhotoBtn');

            const height = video.videoHeight;
            const width = video.videoWidth;

            if (width && height) {
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);
                var data = canvas.toDataURL('image/png');
                photo.setAttribute('src', data);

                const dataURL = canvas.toDataURL('image/png');

                document.querySelector('input[name="profile_image"]').value = dataURL;
            } else {
                clearphoto();
            }
        }

        function clearPhoto() {
            let canvas = document.getElementById('canvas');
            let photo = document.getElementById('photo');
            let context = canvas.getContext('2d');


            context.fillStyle = "#AAA";
            context.fillRect(0, 0, canvas.width, canvas.height);
            var data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);

            const dataURL = canvas.toDataURL('image/png');

            //   document.querySelector('input[name="profile_image"]').value = dataURL;
            document.querySelector('input[name="profile_image"]').value = null;
        }

        function resetCamera() {
            // console.log('as');
            // stop the current video stream
            if (mediaStream != null && mediaStream.active) {
                var tracks = mediaStream.getVideoTracks();
                tracks.forEach(track => {
                    track.stop();
                })
            }
            // set the video source to null
            document.getElementById('cam').srcObject = null;
        }


        document.getElementById('switchFrontBtn').onclick = (event) => {
            switchCamera("user");
        }

        document.getElementById('switchBackBtn').onclick = (event) => {
            switchCamera("environment");
        }

        document.getElementById('snapBtn').onclick = (event) => {
            takePicture();
            event.preventDefault();
        }

        clearPhoto();

        function changeProfileImageType(imgType) {
            if (imgType == 'camera') {
                $('#camera_div').show()
                $('#myprofile').prop("type", 'hidden')
                // document.getElementById('image_input_div').innerHTML = `<input type="hidden" class="form-control col-12 col-md-4" name="profile_image"
            //                         id="myprofile" >`;
            } else if (imgType == 'file') {
                $('#camera_div').hide()
                // document.getElementById('image_input_div').innerHTML =
                //     `<input type="file" class="form-control col-12 col-md-4" name="profile_image">`;
                $('#myprofile').prop("type", 'file')
            }
            else {
                $('#camera_div').hide()
                $('#myprofile').prop("type", 'hidden')
            }
        }

        $('#profile_image_type').change(function() {
            changeProfileImageType(this.value)
        });

        $(document).ready(function () {
            changeProfileImageType($('#profile_image_type').val());
        });
    </script>
@endsection
