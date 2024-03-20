<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Cannabis</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css') }}" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('user_assets/images/favicon.ico') }}">
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://metrics.gentlemenscannabis.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WN8W5NC');</script>
<!-- End Google Tag Manager -->
    @stack('css')


</head>



<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://metrics.gentlemenscannabis.com/ns.html?id=GTM-WN8W5NC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="mainWrap d-flex flex-column vh-100 overflow-hidden">
        <x-layouts.partials.header />

        <div class="containerArea h-100 overflow-auto">
            {{ $slot }}
        </div>

        <x-layouts.partials.footer />

    </div>

    <x-layouts.partials.leftbar />

    <!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

    {{-- <script src="{{ asset('user_assets/js/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('user_assets/js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('user_assets/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('user_assets/js/slick.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script> --}}

    @stack('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });

            $('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                focusOnSelect: true,
                // variableWidth:true
            });

        });

    </script>

</body>

</html>
