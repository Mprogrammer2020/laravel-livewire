@extends('layouts.welcome')

@push('css-styles')
    <style>
        .label-required:after {
            content: "*";
            color: red;
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
            <div class="row">
                <div class="col-md-5">
                    <div class="sign-left-side text-center">
                        <h2>Forgot Password</h2>
                        <p>We will send you forgot password link on your email address</p>
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @error('message')
                            <div class="alert alert-danger">
                                {!! $message !!}
                            </div>
                        @enderror
                        <form action="{{ route('forget.password.post') }}" method="post">
                            @csrf
                            <div class="mb-4 main-input">
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                    aria-describedby="emailHelp" placeholder="Enter Your Email" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="summit-bt-box">SUBMIT</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="video_wrap-new">
                        <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded"
                            src="https://player.vimeo.com/video/507142863" frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
    </section>

@endsection
</div>
@push('scripts')
@endpush
