
  <header class="header @if(\Request::segment(1)=='build-strain') bg_light @endif" >

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
       <!--  <li class="nav-item active">
          <a class="nav-link" href="{{route('welcome.index')}}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> -->
       <!--  <li class="nav-item">
          <a class="nav-link" target="_blank" href="{{config('app.blog_url')}}">Blog</a>
        </li>   -->
     
        <li class="nav-item">
          <a class="nav-link summit-bt-box" href="{{route('user.login')}}">Sign in</a>
        </li>
         <li class="nav-item">
          <a class="nav-link summit-bt-box" href="{{route('user.register')}}">Sign up</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>
</header>