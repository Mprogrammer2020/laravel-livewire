<html lang="en">

    <head>
        <meta charset="UTF-8">
        <!-- <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"> -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,viewport-fit=cover'/>
        <meta name="msapplication-tap-highlight" content="no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <title>@yield('title')</title>
        <meta name ="description", content="@yield('meta_description','meta description')">
        <meta name ="keywords", content="@yield('meta_keywords','meta keywords')">
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;800;900&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('welcome_assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('welcome_assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('welcome_assets/css/style.css')}}">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('user_assets/images/favicon.ico') }}">
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://metrics.gentlemenscannabis.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-WN8W5NC');</script>
        <!-- End Google Tag Manager -->
        @stack('css-styles')
    </head>


    @push('css-styles')
    @endpush
    <style>
        .sign-left-side{
            max-width: 60%;
        }
    </style>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://metrics.gentlemenscannabis.com/ns.html?id=GTM-WN8W5NC"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tagsign-left-side Manager (noscript) -->

        <header class="header" >

            <nav class="navbar  navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('welcome.index')}}">
                        <img src="{{asset('welcome_assets/images/logo.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler btn btn-primary" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section class="signin-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="sign-left-side text-center">
                            @error('message')
                            <div class="alert alert-danger">
                                {!! $message !!}
                            </div>
                            @enderror
                            @if($success)
                            <div class="alert alert-success">
                                <h5>Your email is verified successfully. <a href="{{url('/user/login')}}"> Click here</a> to redirect to login page.</h5>
                            </div>
                            @endif
                            @if(!$success)
                            <div class="alert alert-danger">
                                <h5>Could not verify your email. Either email is already verified or the verification link expired.</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </section>
        <!-- SCRIPT -->
        <script>
            setTimeout(function () {
                window.location.href = "{{url('/user/login')}}";
            }, 5000);
        </script>
    </body>

</html>

