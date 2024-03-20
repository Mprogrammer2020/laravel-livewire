@extends('layouts.welcome')

@section('title',$page->title)

@section('meta_description')
        {{$page->meta_description}}
@endsection
@section('meta_keywords')
         {{$page->meta_keywords}}
@endsection

@push('css-styles')
<style>
.iframe-custom{
    width: 100%;
    height: 383px;
    border: 5px solid !important;
    color: #fff;
}
</style>

@endpush

@section('content')
<!-- <div class="banner">
    <img src="{{asset('welcome_assets/images/banner.png')}}" alt="">
    <div class="overlay">
      <div class="overlay_bg">
        <img src="{{asset('welcome_assets/images/banner_pattarn.png')}}" alt="">
      </div>
      <div class="container-fluid">
        <div class="banner_content">
          <h2>Invest Into Cannabis The Smart Way!</h2>
          <div class="banner_desc">
            <p>
            We Grow And Host Your Custom Cannabis Strains For You WITHOUT Expensive Licensing And Farming Expenses..
            </p>
            <div class="d-flex justify-content-center">
            <div class="row"  style="width: 100%;">
              <div class="col-md-6">
                  <button  class="btn btn-primary btn-block mb-2" onclick="redirectToStrainBase()" >REGISTER MY FREE ACCOUNT</button>
              </div>
              <div class="col-md-6">
                  <button  class="btn btn-warning btn-block" onclick="window.open('https://webinar.gentlemenscannabis.com', '_blank')">LEARN MORE</button>
              </div>
            </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="how_it_work">
    <div class="container">
      <h2 class="block_title">Here’s How It Works</h2>
      <p>
      It’s Now Simpler Than Ever To Grow Cannabis Through Our Virtual Platform!
      </p>
      <div class="row how_it_work_row">
        <div class="col-lg mb-5 flex-box">
          <div class="how_it_work_box p-3">
            <div class="thumb">
              <img src="{{asset('welcome_assets/images/h_step_1.png')}}" alt="">
            </div>
            <div class="how_it_work_title">STEP 1 - REGISTER YOUR FREE CANNABIS WALLET</div>
            <div class="how_it_work_content">
              <p>

                “Join our unique cannabis community for free by registering your account today! Our social media was made by cannabis enthusiasts for cannabis enthusiasts to post and connect freely. We even have an education center with new content updated frequently!”
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg mb-5 flex-box">
          <div class="how_it_work_box p-3">
            <div class="thumb">
              <img src="{{asset('welcome_assets/images/h_step_2.png')}}" alt="">
            </div>
            <div class="how_it_work_title">STEP 2 - WE HARVEST FOR YOU</div>
            <div class="how_it_work_content">
              <p>
                “After you purchase your CBD plants from our unique plant management dashboard, our professional cultivation team will get to work! Your plants will be grown organically on our farm with the best quality conditions and local regulations along with dozens of other virtual plant growers.”
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg mb-5 flex-box">
          <div class="how_it_work_box p-3">
            <div class="thumb">
              <img src="{{asset('welcome_assets/images/h_step_3.png')}}" alt="">
            </div>
            <div class="how_it_work_title" style="font-size: 19px;">STEP 3 - MANAGE YOUR HARVEST</div>
            <div class="how_it_work_content">
              <p>
                “Our unique backend portal allows you to track all of the details of your plants and manage the direction of your harvest. Our goal is to pull you into the experience of real cannabis growing from the comfort of your home! Virtual cannabis growing is the new now!”
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="info1 has_angel_pattern small_conetent ">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <div class="bg_light bg_angel_pattern">
            <h2>
              All The Benefits Of Being A Grower Without The Red-Tape Or Physical Work...
            </h2>

            {{-- <p class="custom-sub">
              <strong>Think of how much more leverage you'd have to enter this multi- billion dollar per year
                industry.</strong>
            </p> --}}
            <p class="mt-3">
                Gentlemen's Cannabis Company makes it easy to get started in the cannabis industry. Our professional, ultramodern plant cultivation system and easy-to-use customer web interface makes it possible for anyone around the world to become a virtual grower and be on the front edge of the upcoming boom in the Colombian cannabis market.
            </p>


          </div>
        </div>
        <div class="col-lg-5">
          <div class="thumb no_shadow">
            <img src="{{asset('welcome_assets/images/thumb5.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

{{--
  <div class="info1  p-5 small_conetent">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-5">
          <div class="thumb no_shadow">
            <img src="{{asset('welcome_assets/images/thumb4.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-7">
          <h2>With our innovative software and preference tools, you'll get: </h2>
          <ul>
            <li>
              <p>Complete customization of your strain all the way down to the EFFECTS your plants have</p>
            </li>
            <li>
            <p>5-Month masterclass teaching you the ins and outs of growing quality cannabis plants</p>
            </li>
            <li>
              <p>All of the regulations, licensing, exportation, and more is off of your shoulders</p>
            </li>

          </ul>
          of the regulations, licensing, exportation, and more is off of your shoulders</h4> -->
          <!-- <p style="margin-left: 22px;">
          It's like having your own private cultivation team. Minus the millions in licensing and farming expenses.</p>
          <p style="margin-left: 22px;">
                You could ignore this offer and continue...
          </p>

          <ul>
            <li>
              <p>wasting years of time while Big Pharma monopolizes the industry</p>
            </li>
            <li>
              <p>spending millions of dollars in legal and licensing expenses</p>
            </li>
            <li>
              <p>looking over your shoulder for growing cannabis illegally</p>
            </li>
            <li>
              <p>watch with regret as the cannabis industry takes the world by storm this decade </p>
            </li>
            <li>
              <p>Settling for just imagining you have a powerful and organic strain to call your own </p>
            </li>
          </ul>
        </div>

      </div>  
    </div>
  </div>


  <div class="info1 bg_light p-5 small_conetent">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2>Or, in just a matter of months, you could use Gentlemen's Cannabis Company and get...</h2>
          <ul>
            <li>
              <p>A high quality cannabis strain tailored to all of your preferences</p>
            </li>
            <li>
              <p>A turn-key cultivation and corporate team experienced in your success</p>
            </li>
            <li>
              <p>A priceless amount of hours saved in research and development and operations</p>
            </li>
            <li>
            <p>Quality cannabis genetics that could just turn your dreams of have a powerful and organic strain that you
              trust to share with your community, start a multi-million dollar corporation, personal or medical
              improvements
              into a reality.</p>
            </li>
            <li>
            <p>BONUS: An exclusive 5 month masterclass teaching you how to grow quality cannabis products from the comfort of
            your home</p>
            </li>

          </ul>
        </div>
        <div class="col-lg-5">
          <div class="thumb no_shadow">
            <img src="{{asset('welcome_assets/images/thumb2.jpg')}}" alt="">
          </div>
        </div>
      </div>



    </div>
  </div>



  {{-- <div class="info1   p-5">

    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <p>
            But, <strong>DON'T DELAY!</strong>
            If you're ready to start your own high quality cannabis strain for a fraction of the cost - with virtually
            no effort, you'll want to take advantage of our special genetic building software now.
            Because we're expecting a high demand, we can only host a certain amount of plants at our facility. Start
            your genetic today before it's too late!
          </p>
          <button class=" notes_button btn btn-primary btn-block" onclick="redirectToStrainBase()"> BUILD MY STRAIN NOW</button>
        </div>
        <div class="col-lg-5">
          <div class="thumb">
            <img src="{{asset('welcome_assets/images/thumb1.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div> --}}

    <div class="info1 p-5">
    <div class="text-center col-md-7 col-xl-6 mx-auto">
        <h2>Become A Part Of A Revolutionary Plant Growing Service In The Cannabis Industry</h2>
        <iframe class="iframe-custom m-0 d-block border-0 bg-dark shadow rounded" src="https://player.vimeo.com/video/507142863" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""></iframe>
        <button class=" notes_button btn btn-primary btn-block" onclick="redirectToStrainBase()"> REGISTER MY FREE ACCOUNT</button>
      </div>
    </div> -->


     <div class="bg-vido-new">
        <video autoplay muted loop id="myVideo">
        <source src="{{asset('welcome_assets/images/bg-video.mp4')}}" type="video/mp4">
    </div>
    <section class="signin-box">
        <div class="container-fluid">
            <div class="sign-side text-center">
                <h1>The World’s 1st Medical <br>
                    Cannabis NFT Marketplace</h1>
                <h3>Let Us Grow, Earn Cashflow!</h3>
                <h6>The Only Way Online To <span>Own & Sell REAL Medical Cannabis Plants!</span></h6>
                <div class="row justify-content-center">
                  <div class="col-md-4">
                    <div class="medical-cannibas sign-left-side">
                        <div id="signin-error">
                      @error('message')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @if(\Session::has('verify_failed'))
                                <div class="alert alert-danger">
                                   Your email is not verified. Please verify your email. <a href="javascript:;" onclick="openVerificationModal()">Click Here</a> to send the verification link again.
                                </div>
                                @endif
                        </div>
                      <h4>Sign in your account</h4>
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
                                 <div class="mb-3 form-check">
                                     <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                     <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                  </div>
                                <button type="submit" class="btn summit-bt-box mb-4">Login</button><br>
                                <a href="{{route('user.forgot.password')}}">Forget Password?</a>
                            </form>
                  </div>
                </div>

                    <div class="col-md-4">
                    <div class="medical-cannibas sign-left-side">
                      <h4>New grower? Start here:</h4>
                        <a href="{{route('user.register')}}" class="summit-bt-box">GROW PLANTS</a>
                  </div>
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
<script>
function redirectToStrainBase(){
  window.location="{{route('user.register')}}";
}
</script>

<script>


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
