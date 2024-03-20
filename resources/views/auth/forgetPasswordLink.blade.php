@extends('layouts.welcome')

@push('css-styles')
    <style>
        .label-required:after {
            content: "*";
            color: red;
        }
        .sign-left-side.sign-left-side-copy {
    max-width: 100%;
}
.video_wrap-new{
    margin-top: 0;

}

    </style>
@endpush
@section('content')

    <div class="bg-vido-new">
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('welcome_assets/images/bg-video.mp4') }}" type="video/mp4">
    </div>
    <section class="signin-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="sign-left-side sign-left-side-copy text-center">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif


                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required
                                        autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required
                                        autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                    Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password-confirm" class="form-control"
                                        name="password_confirmation" required autofocus>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn summit-bt-box">
                                    Reset Password
                                </button>
                            </div>
                        </form </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="video_wrap-new">
                            <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded"
                                src="https://player.vimeo.com/video/507142863" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
    </section>

@endsection
@push('scripts')
@endpush
