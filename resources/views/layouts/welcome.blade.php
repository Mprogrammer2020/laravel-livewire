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
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://metrics.gentlemenscannabis.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WN8W5NC');</script>
<!-- End Google Tag Manager -->
  @stack('css-styles')
  <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/themes/base/jquery-ui.css'
          rel='stylesheet'>
  <script type="text/javascript" src="{{asset('welcome_assets/js/jquery-3.5.1.slim.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/bootstrap.min.js')}}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.1/jquery-ui.min.js"></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://metrics.gentlemenscannabis.com/ns.html?id=GTM-WN8W5NC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  @include('layouts.includes.welcome.header')
  @yield('content') 
  @include('layouts.includes.welcome.footer')

  <div class="svg d-none">
    <svg xmlns="http://www.w3.org/2000/svg')}}" width="23.039" height="18.719" viewBox="0 0 23.039 18.719">
      <path id="twitter"
        d="M23.039,50.216a9.848,9.848,0,0,1-2.722.746A4.7,4.7,0,0,0,22.4,48.351a9.439,9.439,0,0,1-3,1.143,4.723,4.723,0,0,0-8.17,3.23A4.863,4.863,0,0,0,11.34,53.8,13.369,13.369,0,0,1,1.6,48.861a4.725,4.725,0,0,0,1.451,6.313,4.665,4.665,0,0,1-2.134-.582v.052a4.745,4.745,0,0,0,3.784,4.641,4.714,4.714,0,0,1-1.238.156,4.176,4.176,0,0,1-.894-.081,4.768,4.768,0,0,0,4.413,3.29A9.491,9.491,0,0,1,1.13,64.665,8.847,8.847,0,0,1,0,64.6a13.3,13.3,0,0,0,7.246,2.12A13.351,13.351,0,0,0,20.689,53.279c0-.209-.007-.41-.017-.611A9.423,9.423,0,0,0,23.039,50.216Z"
        transform="translate(0 -48)" />
    </svg>
    <svg id="facebook" data-name="facebook (3)" xmlns="http://www.w3.org/2000/svg')}}" width="18.934" height="18.935"
      viewBox="0 0 18.934 18.935">
      <path id="Path_2143" data-name="Path 2143"
        d="M1.972,0h14.99a1.972,1.972,0,0,1,1.972,1.972v14.99a1.972,1.972,0,0,1-1.972,1.972H1.972A1.972,1.972,0,0,1,0,16.962V1.972A1.972,1.972,0,0,1,1.972,0Z" />
      <path id="Path_2144" data-name="Path 2144"
        d="M220.039,67.156h1.578a.394.394,0,0,0,.394-.394V64.394a.4.4,0,0,0-.395-.394h-1.578a4.339,4.339,0,0,0-4.339,4.339v1.972h-1.972a.394.394,0,0,0-.394.394v2.367a.394.394,0,0,0,.394.394H215.7v7.1h3.156v-7.1h1.972a.394.394,0,0,0,.374-.27l.789-2.367a.394.394,0,0,0-.374-.519h-2.761V68.339A1.183,1.183,0,0,1,220.039,67.156Z"
        transform="translate(-205.444 -61.633)" fill="#ecf4e8" />
    </svg>
    <svg id="instagram" data-name="instagram (1)" xmlns="http://www.w3.org/2000/svg')}}" width="18.747" height="18.747"
      viewBox="0 0 18.747 18.747">
      <g id="Group_1801" data-name="Group 1801">
        <g id="Group_1800" data-name="Group 1800">
          <path id="Path_2145" data-name="Path 2145"
            d="M12.888,0H5.858A5.859,5.859,0,0,0,0,5.858v7.03a5.859,5.859,0,0,0,5.858,5.858h7.03a5.859,5.859,0,0,0,5.858-5.858V5.858A5.859,5.859,0,0,0,12.888,0Zm4.1,12.888a4.105,4.105,0,0,1-4.1,4.1H5.858a4.105,4.105,0,0,1-4.1-4.1V5.858a4.105,4.105,0,0,1,4.1-4.1h7.03a4.105,4.105,0,0,1,4.1,4.1Z" />
        </g>
      </g>
      <g id="Group_1803" data-name="Group 1803" transform="translate(4.687 4.687)">
        <g id="Group_1802" data-name="Group 1802">
          <path id="Path_2146" data-name="Path 2146"
            d="M132.687,128a4.687,4.687,0,1,0,4.687,4.687A4.687,4.687,0,0,0,132.687,128Zm0,7.616a2.929,2.929,0,1,1,2.929-2.929A2.933,2.933,0,0,1,132.687,135.616Z"
            transform="translate(-128 -128)" />
        </g>
      </g>
      <g id="Group_1805" data-name="Group 1805" transform="translate(13.787 3.711)">
        <g id="Group_1804" data-name="Group 1804">
          <circle id="Ellipse_96" data-name="Ellipse 96" cx="0.624" cy="0.624" r="0.624" />
        </g>
      </g>
    </svg>


  </div>

  <!-- SCRIPT -->

  <script type="text/javascript" src="{{asset('welcome_assets/js/slick.min.js')}}"></script>
  <!-- <script type="text/javascript" src="{{asset('welcome_assets/js/common.js')}}"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  @stack('scripts')
</body>

</html>