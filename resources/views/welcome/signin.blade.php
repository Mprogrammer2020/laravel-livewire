@extends('layouts.welcome')

@push('css-styles')
@endpush

@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<div class="login bg-light">
       {{-- <img src="{{asset('welcome_assets/images/banner.png')}}" alt=""> --}}
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-6">
               <div class="login_wrap_outer">
               <div class="login_wrap shadow border rounded">
               @error('message')
                           <div class="alert alert-danger">
                               {!! $message !!}
                           </div>
               @enderror
                   <div class="text-center h3 mb-4 font-weight-bold">Login to continue</div>
                   <div class="">
                       <form method="POST" action="{{ route('user.login.post') }}">
                           @csrf
                           <div class="form-group">
                               <input type="text" placeholder="Email*" name="email"
                                   class="form-control @error('email') is-invalid @enderror" required>
                           </div>
                           <div class="form-group">
                               <input type="password" placeholder="Password*" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                           </div>
                           <button type="submit" class="btn btn-primary w-100">Login</button>
                       </form>
                       <p class="text-center">
                           <small>Not Register Yet?</small>
                       </p>
                       <a href="{{ route('user.register') }}" class="btn btn-warning w-100">Register
                           Now</a>
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
       </div>
   </div>-->

<div class="bg-vido-new">
    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('welcome_assets/images/bg-video.mp4') }}" type="video/mp4">
        </div>

        <section class="signin-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="sign-left-side text-center">
                            <div id="signin-error">
                                @error('message')
                                <div class="alert alert-danger">
                                    {!! $message !!}
                                </div>
                                @enderror
                                @if(\Session::has('verify_failed'))
                                <div class="alert alert-danger">
                                   Your email is not verified. Please verify your email. <a href="javascript:;" onclick="openVerificationModal()">Click Here</a> to send the verification link again.
                                </div>
                                @endif
                                @if(\Session::get('reg_success') && \Session::get('reg_success') == 'yes')
                                <div class="alert alert-success">
                                    Thank you for registering with us.
                                    <!-- Thank you for registering with us. A verification link has been sent to the email address you provided during registration. -->
                                </div>
                                <script>
                                    setTimeout(function () {
                                        $('.alert-success').hide(500);
                                    }, 5000);
                                </script>
                                @endif
                            </div>
                            <h1>Sign in</h1>
                            <form method="POST" action="{{ route('user.login.post') }}" id="login_form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Email*" name="email"
                                           class="form-control @error('email') is-invalid @enderror" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password*" name="password"
                                           class="form-control @error('password') is-invalid @enderror" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <button type="submit" class="btn summit-bt-box mb-4">Login</button><br>
                                <a href="{{ route('user.forgot.password')}}">Forgot Password?</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="video_wrap-new">
                            <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded"
                                    src="{{ $cms_user_dshboard->video_link ?? 'https://player.vimeo.com/video/507142863' }}" frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="resend-verification-email-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Send Verification Email</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">×</span>

                        </button>

                    </div>
                    <form id="send-verification-email-form" method="post" action="">
                        <div class="modal-body">
                            @csrf
                            <span id="error"></span>
                            <h5 class="fw-6 mb-3">Email</h5>
                            <div class="form-group">
                                <input type="text" name="email" id="email" autofocus autocomplete="off"
                                       class="bg-white form-control h-auto px-4 py-3 rounded-pill shadow-none"
                                       placeholder="Email" required />
                            </div>
                            <div class="w-100 pt-3">
                                <button type="button" class="btn btn-success rounded-pill pull-right" id="sumit-verification-email"
                                        onclick="sendVerificationEmail()">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

        @push('scripts')
        @if(\Session::get('_validate_error') && \Session::get('_validate_error') == 'yes')
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "LoginForm",
                action: "LoginFailed"
            })
        </script>
        @endif
        @if(\Session::get('reg_success') && \Session::get('reg_success') == 'yes')
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "RegistrationForm",
                action: "RegistrationSuccessfull"
            })
        </script>
        @endif

        <script>
            @if(\Session::get('verification_success'))
                Swal.fire({
                    title: 'Success',
                    text: '{{\Session::get('verification_success')}}',
                    icon: 'success',
                  })                
            @endif
            @if(\Session::get('verification_error'))
                Swal.fire({
                    title: 'Error!',
                    text: '{{\Session::get('verification_error')}}',
                    icon: 'error',
                  })                
            @endif

            window.openVerificationModal = function () {
                $("#resend-verification-email-modal").modal('show');
            }

            window.sendVerificationEmail = function () {
                $("#sumit-verification-email").prop('disabled',true);
                $.ajax({
                    url: "{{route('user.send.verificationEmail')}}",
                    method: "post",
                    data: $("#send-verification-email-form").serialize(),
                    success: function (result) {
                        console.log(result);
                        $("#sumit-verification-email").prop('disabled',false);
                        if (result.success) {
                            $("#signin-error").html('<div class="alert alert-success">New Verification link has been sent to the email address.</div>');
                            setTimeout(function () {
                                $(".alert").hide(500);
                            }, 5000);
                            $("#resend-verification-email-modal").modal('hide');
                        } else {
                            $("#send-verification-email-form").find("#error").html(
                                    '<div class="alert alert-danger"><a href="#" class="close modal-close" data-dismiss="alert" aria-label="close">&times;</a>Record not found!!!</div>'
                                    );
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, error) {
                        $("#sumit-verification-email").prop('disabled',false);
                        $("#send-verification-email-form").find("#error").html(
                                '<div class="alert alert-danger"><a href="#" class="close modal-close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                XMLHttpRequest.responseJSON.message + '</div>');
                    }
                });
            }
        </script>
        @endpush
