<x-layouts.user>
<div id="plant_sale_id">
    @push('css')
    <style>
    .cursor-pointer{
        cursor: pointer;
    }
    .buyBtn-custom{
    background-color: var(--primary)!important;
    color: #fff!important;
    width: 140px;
    padding: 13px 0;
    border-radius: 100px!important;
    font-weight: 600;
    }
    </style>

<style type="text/css">
    .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid #ced4da;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
.l_error{
    color:#c00;
}
.c_error{
    outline: 2px solid #c00;
}
</style>
    @endpush
    <div class="layerThree">
        <h1>ghfjdgfd</h1>
        <div class="buyPlatBox bg-white">
            <div class="h4 text-primary font-weight-bold text-center mb-4">Virtual Cannabis Investment</div>
            <div class="row">
                <div class="layerOne col-xl-4">
                   <div class="vidBox">
                                <!-- <video src="{{ asset('user_assets/images/bkp-Washed.mp4') }}"></video> -->
                                <img src="{{ asset('user_assets/images/1618521716.png') }}"
                                    alt="">
                                <a data-fancybox="gallery"
                                    class="cover d-flex align-items-center justify-content-center"
                                    href="https://player.vimeo.com/video/507142863">
                                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M56.6799 16.2689C54.579 12.1943 51.5151 8.5962 47.82 5.86361C47.2777 5.46272 46.5133 5.57729 46.1122 6.11941C45.7111 6.66153 45.8259 7.42608 46.368 7.82718C49.7638 10.3384 52.579 13.6444 54.5096 17.3882C56.5324 21.311 57.558 25.5542 57.558 30.0002C57.558 45.1957 45.1955 57.5582 30 57.5582C14.8045 57.5582 2.44199 45.1957 2.44199 30C2.44199 14.8043 14.8045 2.44199 30 2.44199C30.6742 2.44199 31.221 1.89518 31.221 1.22099C31.221 0.546801 30.6742 0 30 0C13.458 0 0 13.458 0 30C0 46.542 13.458 60 30 60C46.542 60 60 46.542 60 30C60 25.2292 58.8521 20.4811 56.6799 16.2689Z"
                                            fill="white" />
                                        <path
                                            d="M22.3236 16.0701C21.9419 16.2872 21.706 16.6926 21.706 17.1315V43.927C21.706 44.6014 22.2528 45.148 22.927 45.148C23.6012 45.148 24.148 44.6014 24.148 43.927V19.2795L42.2254 30.0411L28.932 38.6058C28.3653 38.971 28.2017 39.7266 28.567 40.2934C28.9324 40.8603 29.6878 41.0239 30.2548 40.6585L45.2048 31.0262C45.5601 30.7973 45.7718 30.4009 45.7642 29.9782C45.7567 29.5556 45.5312 29.1669 45.168 28.9506L23.5515 16.0823C23.1738 15.8578 22.7054 15.853 22.3236 16.0701Z"
                                            fill="white" />
                                    </svg>
                                </a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="bigProd h-100 mx-0 row">
                        <div class="col-md-4">
                        <div class="h4 fw-6 text-nowrap">Next Harvest</div>
                        <div class="h5 fw-6 text-nowrap text-primary">August 2021</div>

                        <div class="h4 fw-6 text-nowrap mt-4">Plant SPOS</div>
                        <div class="h5 fw-6 text-nowrap text-primary">500</div>
                        </div>
                        <div class="col-md-8 px-0 cursor-pointer">
                            <img src="{{ asset('user_assets/images/1618521716.png') }}" class="w-100 h-100">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="layerFour">
        <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="platDescrip">
                    <div class="Boxtitle text-primary fw-7">{{ $selectedPlant->name }} Description</div>
                    <div class="longText">
                        {{ $selectedPlant->description }}
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="listTitle">
                                Feature
                            </div>
                            <ul class="list-unstyled">
                                <li>{{ $selectedPlant->feature1 }}</li>
                                <li>{{ $selectedPlant->feature2 }}</li>
                                <li>{{ $selectedPlant->feature3 }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="listTitle">
                                Benefits
                            </div>
                            <ul class="list-unstyled">
                                <li>{{ $selectedPlant->benefit1 }}</li>
                                <li>{{ $selectedPlant->benefit2 }}</li>
                                <li>{{ $selectedPlant->benefit3 }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="longText">
                        Donec mattis facilisis dictum. Phasellus eget turpis sit amet justo lobortis lobortis
                        quis venenatis ipsum. Aenean semper, lorem nec convallis pellentesque, massa nibh
                        gravida diam, nec porta arcu ligula nec lacus. Aenean congue lectus sed ipsum tincidunt,
                        eget euismod nisi tristique. Praesent nec consectetur nibh, et dapibus sem. Phasellus
                        rhoncus rutrum justo.
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="grphBox">
                    <h6 class="fw-6 text-center">Grams/Plant</h6>
                    <div class="chartCustom row flex-nowrap mb-4">
                        <div class="col-auto">
                            <div class="weightLine d-flex flex-column justify-content-between">

                                <div class="text-center">70 Gram</div>
                                <div class="text-center">60 Gram</div>
                                <div class="text-center">50 Gram</div>
                                <div class="text-center">40 Gram</div>
                                <div class="text-center">30 Gram</div>
                                <div class="text-center">20 Gram</div>
                                <div class="text-center">10 Gram</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex h-100 lineBox  justify-content-between">
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 70%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">10</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 60%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">20</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 75%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">30</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 35%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">40</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 87%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">50</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 65%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">60</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 55%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">70</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 40%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">80</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 60%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">90</span>
                                        <span class="d-block">Plants</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- <img src="images/test1.svg" alt="" class="w-100"> -->
                    <div class="py-4"></div>
                    <h6 class="fw-6 text-center">Gross Profit/Gram</h6>
                    <!-- <img src="images/test1.svg" alt="" class="w-100"> -->
                    <div class="chartCustom row flex-nowrap mb-4">
                        <div class="col-auto">
                            <div class="weightLine d-flex flex-column justify-content-between">

                                <div class="text-center">70 Gram</div>
                                <div class="text-center">60 Gram</div>
                                <div class="text-center">50 Gram</div>
                                <div class="text-center">40 Gram</div>
                                <div class="text-center">30 Gram</div>
                                <div class="text-center">20 Gram</div>
                                <div class="text-center">10 Gram</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex h-100 lineBox  justify-content-between">
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 20%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$3</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 60%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$4</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 75%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$5</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 95%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$6</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 37%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$6</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 65%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$7</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 55%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$8</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 40%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$9</span>
                                    </div>
                                </div>
                                <div class="col-auto text-center">
                                    <div class="line"><i style="height: 60%;"></i></div>
                                    <div class="data">
                                        <span class="d-block">$10</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="layerFive">
        <h3 class="text-white">Let Us Grow, Earn Cash Flow</h3>
        <p class="text-white border border-white rounded-pill py-3 px-3 py-lg-4 px-lg-5 shadow text-left"
            style="background-color: rgba(255,255,255,0.2)">1. <i>{{ $selectedPlant->earn_cash_text1 }}</i></p>
        <p class="text-white border border-white rounded-pill py-3 px-3 py-lg-4 px-lg-5 shadow text-left"
            style="background-color: rgba(255,255,255,0.2)">2. <i>{{ $selectedPlant->earn_cash_text2 }}</i></p>
        <p class="text-white border border-white rounded-pill py-3 px-3 py-lg-4 px-lg-5 shadow text-left"
            style="background-color: rgba(255,255,255,0.2)">3. <i>{{ $selectedPlant->earn_cash_text3 }}</i></p>
    </div> --}}

    <div class="layerSix">
        <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="whatUGet h-100">
                    <div class="row mx-0">
                        <div class="col-xl-12">
                            <h4 class="text-primary fw-6">Here’s What You Get:</h4>

                        </div>
                        <div class="col-xl-12">
                            <img src="{{ asset('user_assets/images/1618521716.png') }}" alt="" class="" style="height: 170px;">
                        </div>
                        <div class="col-xl-12 mt-4">
                        <ul class="list-unstyled">
                                <li>{{ $selectedPlant->what_you_get_text1 ?? '' }}</li>
                                <li>{{ $selectedPlant->what_you_get_text2  ?? ''}}</li>
                                <li>{{ $selectedPlant->what_you_get_text3 ?? ''}}</li>
                            </ul>
                            <h5 class="fw-6">Total Value</h5>
                            <div class="h1 fw-6">$@{{totalCalculatedPrice}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="orderYourPlant h-100">
                    <h4 class="text-primary fw-6">Order Form</h4>

                    <div class="row btnTwo">
                        <div class="col-sm-6 mb-4 mb-sm-0">
                            <button class="btn" :class="{active:crypto_payment_selected}" @click="wire_transfer_payment_selected=false;crypto_payment_selected=true">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.5 33C12.0927 33 7.94913 31.2837 4.8327 28.1673C1.71626 25.0509 0 20.9073 0 16.5C0 12.0927 1.71632 7.9492 4.8327 4.8327C7.94907 1.71619 12.0927 0 16.5 0C20.9073 0 25.0509 1.71626 28.1673 4.8327C31.2837 7.94913 33 12.0927 33 16.5C33 20.9073 31.2837 25.0508 28.1673 28.1673C25.0509 31.2838 20.9073 33 16.5 33ZM16.5 2.0625C8.53914 2.0625 2.0625 8.53914 2.0625 16.5C2.0625 24.4609 8.53914 30.9375 16.5 30.9375C24.4609 30.9375 30.9375 24.4609 30.9375 16.5C30.9375 8.53914 24.4609 2.0625 16.5 2.0625Z"
                                        fill="#171631" />
                                    <path
                                        d="M20.2553 16.5C21.1134 15.7435 21.6562 14.6374 21.6562 13.4062C21.6562 11.6786 20.5882 10.1966 19.0781 9.58334V8.25C19.0781 7.68049 18.6164 7.21875 18.0469 7.21875C17.4773 7.21875 17.0156 7.68049 17.0156 8.25V9.28125H14.9531V8.25C14.9531 7.68049 14.4914 7.21875 13.9219 7.21875C13.3523 7.21875 12.8906 7.68049 12.8906 8.25V9.28125H10.8281C10.2586 9.28125 9.79688 9.74299 9.79688 10.3125C9.79688 10.882 10.2586 11.3438 10.8281 11.3438H11.8594V21.6562H10.8281C10.2586 21.6562 9.79688 22.118 9.79688 22.6875C9.79688 23.257 10.2586 23.7188 10.8281 23.7188H12.8906V24.75C12.8906 25.3195 13.3523 25.7812 13.9219 25.7812C14.4914 25.7812 14.9531 25.3195 14.9531 24.75V23.7188H17.0156V24.75C17.0156 25.3195 17.4773 25.7812 18.0469 25.7812C18.6164 25.7812 19.0781 25.3195 19.0781 24.75V23.4167C20.5882 22.8034 21.6562 21.3214 21.6562 19.5938C21.6562 18.3626 21.1134 17.2565 20.2553 16.5ZM13.9219 11.3438H17.5312C18.6685 11.3438 19.5938 12.269 19.5938 13.4062C19.5938 14.5435 18.6685 15.4688 17.5312 15.4688H13.9219V11.3438ZM17.5312 21.6562H13.9219V17.5312H17.5312C18.6685 17.5312 19.5938 18.4565 19.5938 19.5938C19.5938 20.731 18.6685 21.6562 17.5312 21.6562Z"
                                        fill="#171631" />
                                </svg>

                                <span>Crypto</span>
                            </button>
                        </div>
                        <div class="col-sm-6 mb-4 mb-sm-0">
                            <button class="btn" :class="{active:wire_transfer_payment_selected}" @click="wire_transfer_payment_selected=true;crypto_payment_selected=false">
                                <svg width="32" height="28" viewBox="0 0 32 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.9333 5.92393H9.06667C8.77212 5.92393 8.53333 6.16501 8.53333 6.46239C8.53333 6.75978 8.77212 7.00086 9.06667 7.00086H12.2907C9.92378 8.52146 8.50288 11.1687 8.53333 14.0009C8.50288 16.8332 9.92378 19.4804 12.2907 21.001H1.06667V7.00086H6.4C6.69455 7.00086 6.93333 6.75978 6.93333 6.46239C6.93333 6.16501 6.69455 5.92393 6.4 5.92393H1.06667C0.477563 5.92393 0 6.40609 0 7.00086V21.001C0 21.5958 0.477563 22.0779 1.06667 22.0779H30.9333C31.5224 22.0779 32 21.5958 32 21.001V7.00086C32 6.40609 31.5224 5.92393 30.9333 5.92393ZM9.6 14.0009C9.6 10.1412 12.4709 7.00086 16 7.00086C19.5291 7.00086 22.4 10.1412 22.4 14.0009C22.4 17.8607 19.5291 21.001 16 21.001C12.4709 21.001 9.6 17.8607 9.6 14.0009ZM30.9333 21.001H19.7093C22.0762 19.4804 23.4971 16.8332 23.4667 14.0009C23.4971 11.1687 22.0762 8.52146 19.7093 7.00086H30.9333V21.001Z"
                                        fill="#171631" />
                                    <path
                                        d="M28.1259 0.113867C27.8734 -0.0137068 27.5811 -0.0350068 27.3131 0.054636L15.8251 3.94183C15.5452 4.0364 15.3943 4.34209 15.488 4.62461C15.5817 4.90712 15.8844 5.05949 16.1643 4.96492L27.6491 1.07772L28.8277 4.62568C28.8882 4.80844 29.0407 4.94473 29.2277 4.98321C29.4147 5.02169 29.6079 4.95652 29.7344 4.81225C29.8609 4.66797 29.9016 4.46651 29.8411 4.28376L28.6619 0.737951C28.574 0.46538 28.3807 0.240281 28.1259 0.113867Z"
                                        fill="#171631" />
                                    <path
                                        d="M15.8357 23.0375L4.35093 26.9241L3.17227 23.3762C3.07875 23.0937 2.77609 22.9412 2.49627 23.0356C2.21644 23.13 2.06541 23.4356 2.15893 23.7181L3.336 27.2628C3.42324 27.5349 3.61554 27.7599 3.86933 27.8869C4.01699 27.9611 4.17962 27.9998 4.34453 28C4.45918 28.0002 4.57312 27.982 4.68213 27.9461L16.1701 24.059C16.45 23.9644 16.6009 23.6587 16.5072 23.3762C16.4135 23.0937 16.1108 22.9413 15.8309 23.0359L15.8357 23.0375Z"
                                        fill="#171631" />
                                    <path
                                        d="M17.6 12.1163C17.6 12.4137 17.8388 12.6548 18.1333 12.6548C18.4279 12.6548 18.6667 12.4137 18.6667 12.1163C18.6152 10.9093 17.7182 9.91107 16.5333 9.7422V9.6932C16.5333 9.39581 16.2946 9.15473 16 9.15473C15.7054 9.15473 15.4667 9.39581 15.4667 9.6932V9.7422C14.2818 9.91107 13.3848 10.9093 13.3333 12.1163C13.3848 13.3233 14.2818 14.3215 15.4667 14.4904V17.1488C14.8732 17.0129 14.439 16.4988 14.4 15.8856C14.4 15.5882 14.1612 15.3471 13.8667 15.3471C13.5721 15.3471 13.3333 15.5882 13.3333 15.8856C13.3848 17.0926 14.2818 18.0908 15.4667 18.2597V18.3087C15.4667 18.6061 15.7054 18.8471 16 18.8471C16.2946 18.8471 16.5333 18.6061 16.5333 18.3087V18.2597C17.7182 18.0908 18.6152 17.0926 18.6667 15.8856C18.6152 14.6785 17.7182 13.6803 16.5333 13.5115V10.8531C17.1269 10.989 17.561 11.5031 17.6 12.1163ZM14.4 12.1163C14.439 11.5031 14.8732 10.989 15.4667 10.8531V13.3795C14.8732 13.2436 14.439 12.7295 14.4 12.1163ZM17.6 15.8856C17.561 16.4988 17.1269 17.0129 16.5333 17.1488V14.6223C17.1269 14.7583 17.561 15.2724 17.6 15.8856Z"
                                        fill="#171631" />
                                    <path
                                        d="M27.2 19.9241H29.3333C29.6279 19.9241 29.8667 19.683 29.8667 19.3856V17.2317C29.8667 16.9343 29.6279 16.6933 29.3333 16.6933C29.0388 16.6933 28.8 16.9343 28.8 17.2317V18.8471H27.2C26.9054 18.8471 26.6667 19.0882 26.6667 19.3856C26.6667 19.683 26.9054 19.9241 27.2 19.9241Z"
                                        fill="#171631" />
                                    <path
                                        d="M2.66667 16.6933C2.37211 16.6933 2.13333 16.9343 2.13333 17.2317V19.3856C2.13333 19.683 2.37211 19.9241 2.66667 19.9241H4.8C5.09455 19.9241 5.33333 19.683 5.33333 19.3856C5.33333 19.0882 5.09455 18.8471 4.8 18.8471H3.2V17.2317C3.2 16.9343 2.96122 16.6933 2.66667 16.6933Z"
                                        fill="#171631" />
                                    <path
                                        d="M4.8 8.07779H2.66667C2.37211 8.07779 2.13333 8.31887 2.13333 8.61626V10.7701C2.13333 11.0675 2.37211 11.3086 2.66667 11.3086C2.96122 11.3086 3.2 11.0675 3.2 10.7701V9.15473H4.8C5.09455 9.15473 5.33333 8.91365 5.33333 8.61626C5.33333 8.31887 5.09455 8.07779 4.8 8.07779Z"
                                        fill="#171631" />
                                    <path
                                        d="M27.2 9.15473H28.8V10.7701C28.8 11.0675 29.0388 11.3086 29.3333 11.3086C29.6279 11.3086 29.8667 11.0675 29.8667 10.7701V8.61626C29.8667 8.31887 29.6279 8.07779 29.3333 8.07779H27.2C26.9054 8.07779 26.6667 8.31887 26.6667 8.61626C26.6667 8.91365 26.9054 9.15473 27.2 9.15473Z"
                                        fill="#171631" />
                                </svg>


                                <span>Credit Card</span>
                            </button>
                        </div>
                    </div>

                    <div class="plantCount d-sm-flex align-items-center">
                        <div class="h5 fw-6 text-nowrap">How Many Plants?</div>
                        <div class="count align-items-center d-flex justify-content-around">



                            <span class="up" @click="buyStepSub"><i class="material-icons align-middle">keyboard_arrow_up</i></span>
                            <input type="text"  class="form-control" v-model="plant_want_to_buy" readonly>
                            <span class="down" @click="buyStepAdd"><i class="material-icons align-middle">keyboard_arrow_down</i></span>
                        </div>
                            {{-- <div class="h5 fw-6 ml-2">$@{{totalCalculatedPrice}}</div> --}}
                    </div>
                    <div class="bg-light my-4 p-4 rounded row shadow" v-show="!crypto_payment_selected">
                    <div class="col-md-12 mb-3">
                     {{-- <div id="card-element" style="width: 100%;">
                                         A Stripe Element will be inserted here.
                     </div>   --}}
                    <h5 class="text-primary fw-6">Credit Card Form</h5>
                     <label for="card-number">Card Number</label>
                       <div id="card-number" style="width: 100%;">
                                        {{-- Card Number --}}
                       </div>
                     <div style="color: red;" role="alert" v-if="stripe.error.incomplete_number">@{{stripe.error.incomplete_number}}</div>
                     </div>
                       <div class="col-md-6 mb-2">
                      <label for="card-expiry">Expiry</label>
                        <div id="card-expiry" style="width: 50%;">
                                        {{-- Card Expiry --}}
                       </div>
                     <div style="color: red;" role="alert" v-if="stripe.error.incomplete_expiry">@{{stripe.error.incomplete_expiry}}</div>

                       </div>
                       <div class="col-md-6">
                      <label for="card-cvc">CVC</label>
                       <div id="card-cvc" style="width: 50%;">
                                        {{-- Card Cvc --}}
                       </div>
                     <div style="color: red;" role="alert" v-if="stripe.error.incomplete_cvc">@{{stripe.error.incomplete_cvc}}</div>
                       </div>
                    </div>
                    <div class="w-100">


                    <form method="POST" v-if="crypto_payment_selected"  onsubmit="onBTCPayFormSubmit(event);return false"  action="https://btcpay.gentlemencannabis.co/api/v1/invoices" class="btcpay-form btcpay-form--block">
                    <input type="hidden" name="storeId" value="7fikgoVd3GUdptQ1p4cmWdt69HnibVFndE9wWtQR2hBP" />
                    <input type="hidden" name="jsonResponse" value="true" />
                    <input type="hidden" name="browserRedirect" value="https://gentlemens.dedicateddevelopers.us/user/plant-sale" />
                    <input type="hidden" name="price" v-model="totalCalculatedPrice" />
                    <input type="hidden" name="currency" value="USD" />
                    <a href="{{ route('crypto.payment') }}" class="btn buyBtn-custom" name="submit" style="min-width:146px; min-height:40px; border-radius: 4px;border-style: none;background-color: #0f3b21;" alt="Pay with BtcPay, Self-Hosted Bitcoin Payment Processor"><span style="color:#fff">Buy Now</span></a>
                    </form>


                    <button  v-else  class="btn buyBtn-custom mt-2" :disabled="paymentProcessing" @click="createTokenStripe" style="min-width:146px; min-height:40px; border-radius: 4px;border-style: none;background-color: #0f3b21;" alt="Pay with BtcPay, Self-Hosted Bitcoin Payment Processor"><span style="color:#fff">@{{paymentProcessing? "Processing" : "Buy Now"}} <i class="fa fa-circle-o-notch fa-spin fa-lg aria-hidden='true'" v-if="paymentProcessing"></i></span>

                    </div>

                    <div class="alert mt-5" :class="{'alert-warning':paymentWarning, 'alert-success':paymentSuccess}" role="alert" v-if="paymentSuccess || paymentWarning">
                            <h4 class="alert-heading" v-if="paymentSuccess">Payment Successful!</h4>
                            <h4 class="alert-heading" v-if="paymentWarning">Warning!</h4>
                            <p>@{{infoMessage}}</p>
                            <hr>
                            </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <div class="layerSix mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="whatUGet h-100">
                    <div class="row mx-0">
                        <div class="col-xl-12">
                            <h4 class="h4 text-primary font-weight-bold text-center mb-2">Virtual Cannabis Investing</h4>

                        </div>
                        <div class="col-xl-12 mt-4">
                        <ul class="list-unstyled">
                                <li>{{ $selectedPlant->what_you_get_text1  ?? ''}}</li>
                                <li>{{ $selectedPlant->what_you_get_text2 ?? '' }}</li>
                                <li>{{ $selectedPlant->what_you_get_text3  ?? ''}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




 @push('scripts')
 <script src="https://js.stripe.com/v3/"></script>
 <script>if(!window.btcpay){    var head = document.getElementsByTagName('head')[0];   var script = document.createElement('script');   script.src='https://btcpay.gentlemencannabis.co/modal/btcpay.js';   script.type = 'text/javascript';   head.append(script);}function onBTCPayFormSubmit(event){    var xhttp = new XMLHttpRequest();    xhttp.onreadystatechange = function() {        if (this.readyState == 4 && this.status == 200) {            if(this.status == 200 && this.responseText){                var response = JSON.parse(this.responseText);                window.btcpay.showInvoice(response.invoiceId);            }        }    };    xhttp.open("POST", event.target.getAttribute('action'), true);    xhttp.send(new FormData( event.target ));}</script><style type="text/css"> .btcpay-form { display: inline-flex; align-items: center; justify-content: center; } .btcpay-form--inline { flex-direction: row; } .btcpay-form--block { flex-direction: column; } .btcpay-form--inline .submit { margin-left: 15px; } .btcpay-form--block select { margin-bottom: 10px; } .btcpay-form .btcpay-custom-container{ text-align: center; }.btcpay-custom { display: flex; align-items: center; justify-content: center; } .btcpay-form .plus-minus { cursor:pointer; font-size:25px; line-height: 25px; background: #DFE0E1; height: 30px; width: 45px; border:none; border-radius: 60px; margin: auto 5px; display: inline-flex; justify-content: center; } .btcpay-form select { -moz-appearance: none; -webkit-appearance: none; appearance: none; color: currentColor; background: transparent; border:1px solid transparent; display: block; padding: 1px; margin-left: auto; margin-right: auto; font-size: 11px; cursor: pointer; } .btcpay-form select:hover { border-color: #ccc; } #btcpay-input-price { -moz-appearance: none; -webkit-appearance: none; border: none; box-shadow: none; text-align: center; font-size: 25px; margin: auto; border-radius: 5px; line-height: 35px; background: #fff; } #btcpay-input-price::-webkit-outer-spin-button, #btcpay-input-price::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
    <script>
	new Vue({
	el: '#plant_sale_id',
	data: {
        default_image:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ?  $selectedPlant->image : '' }}",
        image:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ? $selectedPlant->image : ''  }}",
        image1:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ? $selectedPlant->image1 : ''  }}",
        image2:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ? $selectedPlant->image2 : ''  }}",
        image3:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ? $selectedPlant->image3 : ''  }}",
        image4:"{{ asset('uploads') . '/' .count(array($selectedPlant)) > 0 ?  $selectedPlant->image4 : '' }}",
        plant_price: "{{ count(array($selectedPlant)) > 0 ?  $selectedPlant->price : ''  }}",
        plant_want_to_buy:1,
        crypto_payment_selected:true,
        wire_transfer_payment_selected:false,
        paymentProcessing:false,
        paymentSuccess:false,
        paymentWarning:false,
        infoMessage:"",
        stripe:{
            error: {
                incomplete_number: "",
                incomplete_expiry: "",
                incomplete_cvc : ""
            },
            stripe:"",
            elements:"",
            style:{
                    base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                    color: '#aab7c4'
                    }
                    },
                    invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                    }
                    },
            card:"",
            cardNumber:"",
            cardExpiry:"",
            cardCvc:"",
            stripeToken:"",
        }
    },
    mounted(){
        this.stripe.stripe =  Stripe("{{config('services.stripe.key')}}");
        this.stripe.elements = this.stripe.stripe.elements();

        this.stripe.cardNumber = this.stripe.elements.create('cardNumber', {style: this.stripe.style});
        this.stripe.cardNumber.mount('#card-number');

        this.stripe.cardExpiry = this.stripe.elements.create('cardExpiry', {style: this.stripe.style});
        this.stripe.cardExpiry.mount('#card-expiry');

        this.stripe.cardCvc = this.stripe.elements.create('cardCvc', {style: this.stripe.style});
        this.stripe.cardCvc.mount('#card-cvc');

       // this.stripe.card = this.stripe.elements.create('card', {style: this.stripe.style});
        //this.stripe.card.mount('#card-element');
    },
	created(){},
    computed:{
        totalCalculatedPrice(){
            return this.plant_price * this.plant_want_to_buy;
        }
    },
	methods:{
        createTokenStripe() {
            let self=this;
            self.paymentProcessing=true;
            self.paymentWarning=false;
            console.info('this.stripe.cardNumber',this.stripe.cardNumber);
            let elements=[this.stripe.cardNumber,this.stripe.cardExpiry,this.stripe.cardCvc];
            this.stripe.error.incomplete_number="";
            this.stripe.error.incomplete_expiry="";
            this.stripe.error.incomplete_cvc="";
            this.stripe.stripe.createToken(elements[0]).then(function(result) {
                if (result.error) {
                    console.info('result',result);
                    var errorElement = document.getElementById('card-errors');
                   // errorElement.textContent = result.error.message;
                    self.stripe.error[result.error.code]=result.error.message;
                    self.paymentProcessing=false;
                } else {
                     self.stripe.stripeToken=result.token;
                     console.info('self.stripe.stripeToken',self.stripe.stripeToken);
                     self.creditCardPayment();
                }
            });
        },
        setAsDefaultImage(image){
            this.image=image;
        },
        buyStepAdd(){
            this.plant_want_to_buy+=1;
            this.setSessionPlantWantToBuy();
        },
        buyStepSub(){
            if(this.plant_want_to_buy>1){
                this.plant_want_to_buy-=1;
                this.setSessionPlantWantToBuy();
            }
        },
        creditCardPayment(){
            let self=this;
            self.postObject={
                plant_want_to_buy:self.plant_want_to_buy,
                total_amount:self.totalCalculatedPrice,
                selectedPlantId:"{{count(array($selectedPlant)) > 0 ? $selectedPlant->id : ''}}",
                stripeToken:this.stripe.stripeToken.id ?? '',
                _token: '{{csrf_token()}}'
            };
            console.info('postObject',self.postObject);
					fetch("{{route('user.credit.card.payment.received')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.postObject)}).then(function(response) {
						return response.json();
					}).then(function(result) {
						console.info('creditCardPayment',result);
                        if(result.status){
                            self.plant_want_to_buy=1;
                            self.paymentSuccess=true;
                            self.stripe.cardNumber.clear();
                            self.stripe.cardExpiry.clear();
                            self.stripe.cardCvc.clear();
                           // window.location.href = "{{ route('user.dashboard') }}";
                        }else self.paymentWarning=true;

                        self.infoMessage=result.message;
                        self.paymentProcessing=false;
					});
        },
        setSessionPlantWantToBuy(){
            let self=this;
            self.postObject={
                plant_want_to_buy:self.plant_want_to_buy,
                _token: '{{csrf_token()}}'
            };
					fetch("{{route('user.plant.set.session')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.postObject)}).then(function(response) {
						return response.json();
					}).then(function(result) {
						console.info('setSessionPlantWantToBuy',result);
                        if(result.status){
                        }
					});
        }
    }
    })
</script>
    @endpush
    </div>
</x-layouts.user>
