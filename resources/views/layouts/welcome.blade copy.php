<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <title>Cannabis</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('welcome_assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/style.css')}}">
  <livewire:styles />
</head>

<body>

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
            <li class="nav-item active">
              <a class="nav-link" href="{{route('welcome.index')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  {{ $slot }}
  <footer class="footer">
    <div class="container-fulid">
      <div class="">
        <div class="row row-cols-5">
          <div class="col-sm">
            <div class="col_box">
              <h3>Company</h3>
              <ul>
                <li>
                  <a href="">About us</a>
                </li>
                <li>
                  <a href="">Planning for growth</a>
                </li>
                <li>
                  <a href="">Financial consultants</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm">
            <div class="col_box">
              <h3>Product</h3>
              <ul>
                <li>
                  <a href="">How it works</a>
                </li>
                <li>
                  <a href="">Documentation</a>
                </li>
                <li>
                  <a href="">Pricing</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm">
            <div class="col_box">
              <h3>Legal</h3>
              <ul>
                <li>
                  <a href="">Terms of use</a>
                </li>
                <li>
                  <a href="">Privacy policy</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm">
            <div class="col_box">
              <h3>Contact</h3>
              <ul>
                <li>
                  <a href="mailTo:info@gentlemen.com">
                    <img src="{{asset('welcome_assets/images/email.svg')}}" alt="">
                    <span>info@gentlemen.com</span>
                  </a>
                </li>
                <li>
                  <a href="tel:+1 202 555 0191">
                    <img src="{{asset('welcome_assets/images/tel.svg')}}" alt="">
                    +1 202 555 0191
                  </a>
                </li>
                <li>
                  <img src="{{asset('welcome_assets/images/map.svg')}}" alt="">
                  <span>
                    1234 Park Blvd, Palo Alto CA 94306, United States
                  </span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm">
            <div class="col_box">
              <h3>Social</h3>
              <p>
                Follow us to stay tuned about our latest feature.
              </p>
              <ul class="d-flex social">
                <li>
                  <a href="" target="_blank" class="twitter">
                    <svg>
                      <use href="#twitter" />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="" target="_blank" class="facebook">
                    <svg>
                      <use href="#facebook" />
                    </svg>
                  </a>
                </li>
                <li>
                  <a href="" target="_blank" class="instagram">
                    <svg>
                      <use href="#instagram" />
                    </svg>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="copy_right">
          <p>
            &copy; Copyright 2020 Gentlemen’s Cannabis Company, Inc.
          </p>
        </div>
      </div>
    </div>
  </footer>




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
  <script>
  window.addEventListener('modal-open-strain-detail', event  => {
      $('#stepOneModal').modal('show');
  });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/jquery-3.5.1.slim.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/slick.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('welcome_assets/js/common.js')}}"></script>
  <script>
  (function($) {
  'use strict';

  $(function() {

      $(document).ready(function() {
          function triggerClick(elem) {
              $(elem).click();
               $(".step_slider").slick('refresh');
              
          }
          var $progressWizard = $('.stepper_holder'),
              $tab_active,
              $tab_prev,
              $tab_next,
              $btn_prev = $progressWizard.find('.prev-step'),
              $btn_next = $progressWizard.find('.next-step'),
              $tab_toggle = $progressWizard.find('[data-toggle="tab"]'),
              $tooltips = $progressWizard.find('[data-toggle="tab"][title]');

          // To do:
          // Disable User select drop-down after first step.
          // Add support for payment type switching.

          //Initialize tooltips
          $tooltips.tooltip();

          //Wizard
          $tab_toggle.on('show.bs.tab', function(e) {
              var $target = $(e.target);
              $progressWizard.find('li.active').removeClass('active')
              if (!$target.parent().hasClass('active, disabled')) {
                $target.parent().addClass('active')
                   $target.parent().prev().addClass('completed');
              }
              if ($target.parent().hasClass('disabled')) {
                  return false;
              }
          });

          // $tab_toggle.on('click', function(event) {
          //     event.preventDefault();
          //     event.stopPropagation();
          //     return false;
          // });
          window.addEventListener('get-input-Contact', event  => {
            window.livewire.emit('getInputOfContact', $('.#email').val, $('.name').val) ;
          });
          window.addEventListener('next-btn-clicked', event  => {
              $tab_active = $progressWizard.find('li a.active');
              $tab_active.parent().next().find('a').removeClass('disabled');
              $tab_next = $tab_active.parent().next().find('a[data-toggle="tab"]');
              triggerClick($tab_next);
          });
          window.addEventListener('prev-btn-clicked', event  => {
              $tab_active = $progressWizard.find('li a.active');
              $tab_prev = $tab_active.parent().prev().find('a[data-toggle="tab"]');
              triggerClick($tab_prev);
          });

          
          // $btn_next.on('click', function() {});
          // $btn_prev.click(function() { });
      });
  });

}(jQuery, this));
  </script>
  <livewire:scripts />
</body>

</html>