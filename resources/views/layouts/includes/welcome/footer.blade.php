<footer class="footer">
    <div class="container-fulid">
      <div class="">
        <div class="row">
          <!-- <div class="col-sm">
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
          </div> -->
          <div class="col-md-4">
            <div class="col_box">
              <h3>Legal</h3>
              <ul>
                <li>
                  <a href="{{route('welcome.terms-of-use')}}">Terms of use</a>
                </li>
                <li>
                  <a href="{{route('welcome.privacy-policy')}}">Privacy policy</a>
                </li>
                <!-- <li>
                  <a href="https://blog-gentlemens.dedicateddevelopers.us/" target="_blank">Blog</a>
                </li> -->
                {{-- <li>
                <a  target="_blank" href="https://gentlemens.idevaffiliate.com">Affiliates</a>
                </li> --}}
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col_box">
              <h3>Contact</h3>
              <ul>
                <li>
                  <a href="mailTo:hey@gentlemenscannabis.com">
                    <img src="{{asset('welcome_assets/images/email-new.png')}}" alt="">
                    <span>hey@gentlemenscannabis.com</span>
                  </a>
                </li>
                {{-- <li>
                  <a href="tel:+12025550191">
                    <img src="{{asset('welcome_assets/images/tel.svg')}}" alt="">
                    <span>+1 202 555 0191</span>
                  </a>
                </li> --}}
                <li>
                  <img src="{{asset('welcome_assets/images/map.png')}}" alt="" style="margin-right: 4px;">
                  <span>8 The Green, Suite B, Dover, Delaware 19901</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="col_box">
              <h3>Social</h3>
              <p>
                Follow us to stay tuned about our latest feature.
              </p>
              <ul class="d-flex social">
                <li>
                  <a href="https://www.twitter.com/GentlemensGCC" target="_blank" class="twitter">
                    <img src="{{asset('welcome_assets/images/tweet.png')}}" alt="" style="margin-right: 4px;">
                  </a>
                </li>
                <li>
                  <a href="https://www.facebook.com/GentlemensGCC" target="_blank" class="facebook">
                    <img src="{{asset('welcome_assets/images/fb.png')}}" alt="" style="margin-right: 4px;">
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/gentlemencannabis" target="_blank" class="instagram">
                    <img src="{{asset('welcome_assets/images/insta.png')}}" alt="" style="margin-right: 4px;">
                  </a>
                </li>
                <li>
                  <a href="https://www.youtube.com/channel/UCLvYoSthowV-c-sv42BhNUg" target="_blank" class="instagram">
                    <img src="{{asset('welcome_assets/images/youtube.png')}}" alt="" style="margin-right: 4px;">
                  </a>
                </li>
                <li>
                  <a href="https://tinyurl.com/gcc-discord" target="_blank" class="instagram">
                    <img src="{{asset('welcome_assets/images/podcast.png')}}" alt="" style="margin-right: 4px;">
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="copy_right">
          <p>
            &copy; Copyright {{date("Y",strtotime("-1 year"))}}-{{date("Y")}} Gentlemen’s Cannabis Company, Inc.
          </p>
        </div>
      </div>
    </div>
  </footer>