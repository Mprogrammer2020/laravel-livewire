@extends('layouts.welcome')

@push('css-styles')
<style>
.label-required:after {
            content: "*";
            color: red;
        }
        
.calendar-picker {
    border-radius: 30px !important;
    height: 44px !important;
}
.calendar-picker input, .calendar-picker button{
height:43px !important;
}
.calendar-picker button:hover{
    background: none !important;
}
</style>
@endpush
@section('content')
    <!-- <div class="login bg-light">
        <img src="{{asset('welcome_assets/images/banner.png')}}" alt="">
        <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
               <div class="login_wrap_outer">
               <div class="login_wrap shadow border rounded">
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="text-center h3 mb-4 font-weight-bold">Sign Up</div>
                    <div class="">
                        <form method="POST" action="{{ route('user.register.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signupInputEmail1" class="label-required">Public Nickname</label>
                                <input type="text" placeholder="Nickname" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="signupInputEmail1" class="label-required">Email Address</label>
                                <input type="text" placeholder="Email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="signupInputEmail1" class="label-required">Password</label>
                                <input type="password" placeholder="Password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="tracking_id" value="{{$tracking_id}}" />

                            <div class="form-group">
                                <label for="signupInputEmail1" class="label-required">Retype Password</label>
                                <input type="password" placeholder="Retype Password" name="confirmpassword"
                                    class="form-control @error('confirmpassword') is-invalid @enderror" required>
                                @error('confirmpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="signupInputEmail1">Birthdate</label>
                                <input type="date" placeholder="Enter birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                            </div>

                            <div class="w-100 mb-4">
                                <input type="checkbox" id="registeragree" name="checkagree"
                                    class="@error('checkagree') is-invalid @enderror" {{ old('checkagree') ? 'checked' : '' }}>
                                <label for="registeragree">I Agree With <a href="{{route('welcome.terms-of-use')}}" target="_blank" >Terms and Condition</a> And <a href="{{route('welcome.privacy-policy')}}" target="_blank" >Privacy Policy</a></label>
                                @error('checkagree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary w-100">Signup</button>
                        </form>
                        <p class="text-center">
                            <small>Already Registered?</small>
                        </p>
                        <a class="btn btn-warning w-100" href="{{ route('user.login') }}">Sign In</a>
                    </div>
                </div>
                </div>
                </div>
                 <div class="col-lg-6">
                <div class="video_wrap">
                    {{-- <h2>Become A Part Of A Revolutionary Plant Growing Service In The Cannabis Industry</h2> --}}
        <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded" src="https://player.vimeo.com/video/507142863" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
                </div>
                </div>
            </div>
        </div> -->

         <div class="bg-vido-new">
        <video autoplay muted loop id="myVideo">
        <source src="{{asset('welcome_assets/images/bg-video.mp4')}}" type="video/mp4">
    </div>
    <section class="signin-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="sign-left-side text-center">
                         @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                        <h1>Sign up</h1>
                        <form method="POST" action="{{ route('user.register.post') }}" id="registration_form">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="signupInputEmail1" class="label-required">Public Nickname</label> --}}
                                <input type="text" placeholder="Nickname" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{-- <label for="signupInputEmail1" class="label-required">Email Address</label> --}}
                                <input type="text" placeholder="Email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{-- <label for="signupInputEmail1" class="label-required">Password</label> --}}
                                <input type="password" placeholder="Password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="tracking_id" value="{{$tracking_id}}" />

                            <div class="form-group">
                                {{-- <label for="signupInputEmail1" class="label-required">Retype Password</label> --}}
                                <input type="password" placeholder="Retype Password" name="confirmpassword"
                                    class="form-control @error('confirmpassword') is-invalid @enderror" required>
                                @error('confirmpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" style="position: relative;">
                                <i class="fa fa-calendar calendar-signup date" aria-hidden="true"></i>
                                {{-- <label for="signupInputEmail1">Birthdate</label> --}}
                                <input type="text" placeholder="Enter Birth Date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" autocomplete="off">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-100 mb-4 signup-page-form">
                                <input type="checkbox" id="registeragree" name="checkagree"
                                    class="@error('checkagree') is-invalid @enderror" {{ old('checkagree') ? 'checked' : '' }}>
                                <label for="registeragree"><span>I Agree With <a href="{{route('welcome.terms-of-use')}}" target="_blank" >Terms and Condition</a></span> <span>And <a href="{{route('welcome.privacy-policy')}}" target="_blank" >Privacy Policy</a></span></label>
                                @error('checkagree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button type="submit" class="btn summit-bt-box">Signup</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                <div class="video_wrap-new">

                        <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded" src="{{ $cms_user_dshboard->video_link ?? 'https://player.vimeo.com/video/507142863' }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    @endsection
    </div>
@push('scripts')
<script>
    var today = new Date();
    $("#birthdate").datepicker({
        changeYear:true,
        changeMonth:true,
        dateFormat:'dd/mm/yy',
        maxDate : "-21Y",
        yearRange : "-100:+0"
    });
    
    $(".date").on('click',function(){
       $("#birthdate").datepicker('show');
    });
</script>
@if(\Session::get('_validate_error') && \Session::get('_validate_error') == 'yes')
    <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: "RegistrationForm",
        action: "RegistrationFailed"
    })
    </script>
@endif
@endpush
