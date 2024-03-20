@extends('layouts.welcome')

@section('title',$page->title)

@section('meta_description')
        {{$page->meta_description}}
@endsection
@section('meta_keywords')
         {{$page->meta_keywords}}
@endsection

@push('css-styles')
@endpush

@section('content')

<div class="container-fluid" id="build_strain_id">
  <div class="loader" v-bind:class="{ show: loading }">
       <img src="{{asset('welcome_assets/images/loader.gif')}}" alt="">
       <p>We are finding the best strain for you, Please Wait..</p>
  </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row stepper_holder">

          <div class="side-content">
            <div class="vertical-stepper ">
              <ul role="tablist " class="nav">
                <li>
                  <a class="active" href="#tab1" role="tab" data-toggle="tab">
                    <div class="cirlce_icon">
                      <span class="count">1</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Strain Base</span>
                  </a>
                  <div class="divider"></div>
                </li>



                <li>
                  <!-- data-target="#step2" -->
                  <a href="#tab2" class="disabled" data-toggle="tab" role="tab">
                    <div class="cirlce_icon">
                      <span class="count">2</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>

                    </div>
                    <span>Effects</span>
                  </a>
                  <div class="divider"></div>
                </li>



                <li>
                  <!-- data-target="tab3" -->
                  <a href="#tab3" class="disabled" data-toggle="tab" role="tab">
                    <div class="cirlce_icon">
                      <span class="count">3</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Select Your Strain</span>
                  </a>
                  <div class="divider"></div>
                </li>


                <!-- <li>
                  <a href="#tab4" class="disabled" data-toggle="tab" role="tab">
                    <div class="cirlce_icon">
                      <span class="count">4</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Price Plan</span>
                  </a>
                  <div class="divider"></div>
                </li> -->


                <li>
                  <!-- data-target="tab5" -->
                  <a href="#tab5" class="disabled" data-toggle="tab" role="tab">
                    <div class="cirlce_icon">
                      <span class="count">4</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Contact</span>
                  </a>
                  <div class="divider"></div>
                </li>


                <li>
                  <!-- data-target="tab6" -->
                  <a href="#tab6" class="disabled" data-toggle="tab" role="tab">
                    <div class="cirlce_icon">
                      <span class="count"> 5 </span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Congratulations</span>
                  </a>
                  <!-- <div class="divider"></div> -->
                </li>


                <!-- <li>
                  <a href="#tab7" class="disabled" data-toggle="tab">
                    <div class="cirlce_icon">
                      <span class="count">7</span>
                      <span class="check">
                        <svg>
                          <use href="#check" /> </svg>
                      </span>
                    </div>
                    <span>Payment</span>
                  </a>
                </li> -->

              </ul>
            </div>
          </div>

          <div class="right_side_content">
            <div class="tab-content">

              <div class="tab-pane active" id="tab1">
                <div class="step_count">Step 1</div>
                <div class="step_title">Pick Your Strain Base</div>
                <div class="step_content full step_one">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4" v-for="(strainBase, index) in strainBases">
                      <div class="box_radio_item">
                        <h4>@{{strainBase.name}}</h4>
                        <p>@{{strainBase.short_description}}</p>
                        <div class="radio_item">
                          <input type="radio" :id="'step_1_radio_'+index" name="step_1">
                          <label data-toggle="modal" data-target="#stepOneModal" :data-id="'step_1_radio_'+index" @click="clickedStrainBase=strainBase;">
                            <label class="check_mark" for="step_1_radio"></label>
                            <img :src="'/uploads/'+strainBase.image" alt="">
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 mt-4">
                      <div class="box_radio_item">
                        <h4>Indica</h4>
                        <p>Suitable for a colder climates with shorter season</p>
                        <div class="radio_item">
                          <input type="radio" id="step_1_radio_1" name="step_1">
                          <label for="" data-toggle="modal" data-target="#stepOneModal" data-id="step_1_radio_1">
                            <label for="step_1_radio_1" class="check_mark"></label>
                            <img src="{{asset('welcome_assets/images/step_1_2.png')}}" alt="">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4">
                      <div class="box_radio_item">
                        <h4>Hybrid</h4>
                        <p>Grown on farms or greenhouses from a combination of sativa and indica strains.</p>
                        <div class="radio_item">
                          <input type="radio" id="step_1_radio_2" name="step_1">
                          <label for="" data-toggle="modal" data-target="#stepOneModal" data-id="step_1_radio_2">
                            <label for="step_1_radio_2" class="check_mark"></label>
                            <img src="{{asset('welcome_assets/images/step_1_3.png')}}" alt="">
                          </label>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="d-flex justify-content-end step_action mt-5">
                    <button type="button" class="mt-4 btn btn-primary w-50 text-uppercase btn-block next-step" @click="nextFromStrainBase">
                      Next
                      <svg>
                        <use href="#arraow" /> </svg>
                    </button>
                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="tab2">
                <div class="step_pattarn">
                  <div class="step_count">Step 2</div>
                  <div class="step_title">Your Desired Effects</div>
                  <div class="step_content step_two">
                    <div class="row">
                      <div class="col-lg-9 col-md-8 check_box_list_items">
                        <div class="check_box_list ">

                          <div class="item" v-for="(effect,index) in effects">
                            <div class="box" @click="selectEffect(effect)">
                              <input type="checkbox" :id="index" v-model="effect.selected">
                              <label :for="index">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>@{{capitalize(effect.name)}}</h4>
                                <p>
                                @{{effect.description}}
                                </p>
                              </label>
                            </div>
                          </div>

                          <!-- <div class="item">
                            <div class="box">
                              <input type="checkbox" id="2">
                              <label for="2">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Clarity</h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="3">
                              <label for="3">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Focus </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="4">
                              <label for="4">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Sleep</h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="5">
                              <label for="5">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Pain</h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="6">
                              <label for="6">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Anxiety</h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="7">
                              <label for="7">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Euphoria </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="8">
                              <label for="8">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Drowsiness </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="9">
                              <label for="9">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Relaxation </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="10">
                              <label for="10">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Option 10 </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="11">
                              <label for="11">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Option 11 </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div>

                          <div class="item">
                            <div class="box">
                              <input type="checkbox" id="12">
                              <label for="12">
                                <div class="checkmark">
                                  <svg>
                                    <use href="#check" /> </svg> </svg>
                                </div>
                                <h4>Option 12 </h4>
                                <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                              </label>
                            </div>
                          </div> -->

                        </div>
                      </div>
                      <div class="selected_check_box col-lg-3 col-md-4">
                        <h4>SELECTED EFFECTS</h4>
                        <p>Youe have selected this following.</p>
                        <div class="items" v-for="selectedEffect in selectedEffects">
                          <div class="item">
                            <div class="item_title">@{{capitalize(selectedEffect.name)}}</div>
                            <div class="item_action" style="cursor: pointer;" @click="removeSelectionOfEffect(selectedEffect)">
                              <a>
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                              </a>
                            </div>
                          </div>
                          <!-- <div class="item">
                            <div class="item_title">Pain</div>
                            <div class="item_action">
                              <a>
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                              </a>
                            </div>
                          </div>
                          <div class="item">
                            <div class="item_title">Drowsiness</div>
                            <div class="item_action">
                              <a>
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                              </a>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-9  ">
                        <div class="d-flex justify-content-end step_action mt-5" data-target="tab2">
                          <button type="button" class="mt-4 btn-prev btn btn-outline-primary prev-step">
                            <svg>
                              <use href="#arraow" /> </svg>
                            Back
                          </button>

                          <button type="button" class="mt-4 btn btn-primary next-step" @click="nextFromEffect">
                            Next
                            <svg>
                              <use href="#arraow" /> </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
              <div class="tab-pane fade" id="tab3">
                <div class="step_three_patarn">
                  <div class="step_count">Step 3</div>
                  <div class="step_title">Your Strain Options</div>
                  <div class="step_desc">Recommendations based on your preferences</div>
                  <div class="step_content">
                    <div class="strain_list">

                    <div class="row" style="margin-top: 15px;" v-if="strainOptions.length==0">
                          <div class="container">
                          <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>Please select some effect from previous step. </p>
                        </div>
                          </div>
                    </div>
                      <div class="row" v-if="strainOptions.length>0">
                        <div class="col-lg-4 col-md-6 flex-box" v-for="(strainOption,index) in strainOptions">
                          <div class="strain_box">
                            <div class="thumb">
                              <img :src="'/uploads/'+strainOption.image" alt="">
                            </div>
                            <div class="strain_title">@{{strainOption.name}}</div>
                            <div class="strain_desc">@{{strainOption.description}}</div>
                            <button type="button" class="btn btn-primary btn-block next-step" @click="nextFromStrainOption(strainOption)">Grow this strain</button>
                          </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6">
                          <div class="strain_box">
                            <div class="thumb">
                              <img src="{{asset('welcome_assets/images/strain2.png')}}" alt="">
                            </div>
                            <div class="strain_title">GCC 2</div>
                            <div class="strain_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <button type="button" class="btn btn-primary btn-block next-step">Grow this strain</button>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="strain_box">
                            <div class="thumb">
                              <img src="{{asset('welcome_assets/images/strain3.png')}}" alt="">
                            </div>
                            <div class="strain_title">GCC 3</div>
                            <div class="strain_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <button type="button" class="btn btn-primary btn-block next-step">Grow this strain</button>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="strain_box">
                            <div class="thumb">
                              <img src="{{asset('welcome_assets/images/strain4.png')}}" alt="">
                            </div>
                            <div class="strain_title">GCC 4</div>
                            <div class="strain_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <button type="button" class="btn btn-primary btn-block next-step">Grow this strain</button>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <div class="strain_box">
                            <div class="thumb">
                              <img src="{{asset('welcome_assets/images/strain5.png')}}" alt="">
                            </div>
                            <div class="strain_title">GCC 5</div>
                            <div class="strain_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <button type="button" class="btn btn-primary btn-block next-step">Grow this strain</button>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- <div class="tab-pane fade" id="tab4">
                <div class="step_four_pattarn">
                  <div class="step_count">Step 4</div>
                  <div class="step_title">Customize your strain</div>
                  <div class="step_content">
                    <div class="row justify-content-center">
                      <div class="col-lg-6 price_package">
                        <div class="package_icon">
                          <img src="{{asset('welcome_assets/images/send.png')}}" alt="">
                        </div>
                        <div class="package_box standard">
                          <div class="packagbe_bg ">
                            <svg viewBox="0 0 393 479" width="393" height="479">
                              <use href="#bg_shap" /> </svg>
                          </div>
                          <h2>Standard</h2>
                          <div class="package_price">Free</div>
                          <div class="package_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          </div>
                          <div class="package_action">
                            <button type="button" class="btn btn-block next-step">SELECT</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 price_package">
                        <div class="package_icon">
                          <img src="{{asset('welcome_assets/images/rocket.png')}}" alt="">
                        </div>
                        <div class="package_box premium">
                          <div class="packagbe_bg ">
                            <svg viewBox="0 0 393 479" width="393" height="479">
                              <use href="#bg_shap" /> </svg>
                          </div>
                          <h2>Premium</h2>
                          <div class="package_price">$497.00</div>
                          <div class="package_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.
                          </div>
                          <div class="package_action">
                            <button type="button" class="btn btn-block next-step">SELECT</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-lg-6 price_package  step_action mt-5" data-target="tab2">
                        <button type="button" class="mt-4 btn-prev btn btn-outline-primary prev-step">
                          <svg>
                            <use href="#arraow" /> </svg>
                          Back
                        </button>
                      </div>
                      <div class="col-lg-6 price_package"></div>
                    </div>

                  </div>
                </div>
              </div> -->
              <div class="tab-pane" id="tab5">
                <div class="step_five_pattarn">
                  <div class="step_count">Step 4</div>
                  <div class="step_title">Enter your contact information</div>
                  <div class="step_content">
                    <div class="step_slider_box">
                    <div class="row" style="margin-top: 15px;" v-if="strainOptions.length==0">
                          <div class="container">
                          <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>Please select a strain from previous step. </p>
                        </div>
                          </div>
                    </div>
                      <div class="step_slider slick-slider slick-dotted" v-show="strainOptions.length>0">
                        <div class="step_slide_item">
                          <div class="email_box ">
                          <h2>Step 1</h2>
                            <div class="container-fluid">
                              <div class="row align-items-end">
                                <div class="col-lg-7">
                                  <div class="form-group">
                                    <h4> Email</h4>
                                    <label>Please enter your email address</label>
                                    <input class="form-control" type="email" v-model="user.email" placeholder="">
                                  </div>
                                </div>
                                <div class="col-lg-5 box_pattarn">
                                  <img src="{{asset('welcome_assets/images/email.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="step_slide_item">
                          <div class="email_box ">
                            <h2>Step 2</h2>
                            <div class="container-fluid">
                              <div class="row align-items-end">
                                <div class="col-lg-7 col-md-12">
                                  <div class="form-group">
                                    <h4> Name</h4>
                                    <label>Please enter your full name</label>
                                    <input class="form-control" type="text" v-model="user.name" placeholder="">
                                  </div>
                                </div>
                                <div class="col-5 box_pattarn">
                                  <img src="{{asset('welcome_assets/images/name.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="step_slide_item">
                          <div class="email_box ">
                            <h2>Step 3</h2>
                            <div class="container-fluid">
                              <div class="row align-items-end">
                                <div class="col-lg-7 col-md-12">
                                  <div class="form-group">
                                    <h4> Phone</h4>
                                    <label>Please enter your phone number</label>
                                    <input class="form-control" type="tel" v-model="user.phone" placeholder="">
                                  </div>
                                </div>
                                <div class="col-5 box_pattarn">
                                  <img src="{{asset('welcome_assets/images/phone.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="step_slide_item">
                          <div class="email_box ">
                            <h2>Step 4</h2>
                            <div class="container-fluid">
                              <div class="row align-items-end">
                                <div class="col-lg-7 col-md-12">
                                  <div class="form-group">
                                    <h4>Business Name Or DBA</h4>
                                    <label>Please enter the name of your business</label>
                                    <input class="form-control" type="text" v-model="user.business_name" placeholder="">
                                  </div>
                                </div>
                                <div class="col-5 box_pattarn">
                                  <img src="{{asset('welcome_assets/images/business.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="step_slider_action">
                        <button @click="contactInfoPrev" class="step_slider_prev contactInfoBtn"> <svg width="15">
                            <use href="#arraow" /> </svg></button>
                        <button @click="contactInfoNext" class="step_slider_next contactInfoBtn">
                        <svg width="15">
                            <use href="#arraow" /> </svg>
                        </button>
                      </div>
                      <!-- <div class="step_slider_action">
                        <div class="step_slider_prev" >
                          <svg width="15">
                            <use href="#arraow" /> </svg>
                        </div>
                        <div class="step_slider_next">
                          <svg width="15">
                            <use href="#arraow" /> </svg>
                        </div>
                       
                      </div> -->
                    </div>
                   

                    <div class="d-flex justify-content-end step_action mt-5" data-target="tab2">
                      <button type="button" class="mt-4 btn-prev btn btn-outline-primary prev-step">
                        <svg>
                          <use href="#arraow" /> </svg>
                        Back
                      </button>

                      <button type="button" class="mt-4 btn btn-primary next-step" v-if="user.email && user.name && user.phone && user.business_name" @click="nextFromContactInfo">
                        Submit
                        <svg>
                          <use href="#arraow" /> </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab6">
                <div class="step_six_pattarn">
                  <div class="step_count">Step 5</div>
                  <div class="step_title">Watch explainer video</div>
                  <div class="step_content mt-3">
                    <div class="video bg-dark p-1">
                    <iframe src="https://player.vimeo.com/video/489074213" style="width: 100%;" frameborder="0" allow="autoplay; encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                      <!-- <img src="{{asset('welcome_assets/images/video.png')}}" alt="">
                      <div class="overlay">
                        <button class="video_play"> <svg width="130" height="130" viewBox="0 0 130 130">
                            <use href="#multi_circle" /> </svg></button>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="video_content">
                          <!-- <h4>The smart way to run your own cannabis company!</h4> -->
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <button  class="btn btn-primary btn-block mb-2" onclick="window.open('{{route('welcome.apply')}}', '_blank')">APPLY NOW!</button>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <button  class="btn btn-warning btn-block mb-2" onclick="window.open('https://www.gentlemencompany.com/webinar', '_blank')">LEARN MORE</button>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                      <div class="btn-block d-flex justify-content-end step_action" style="margin: 0px !important;">
                                      <button  class="btn btn-block btn-primary" @click="backToHime()" style="max-width: 100%;">BACK TO HOME<svg>
                                      <use href="#arraow"></use> </svg>
                                      </button>
                                      </div>
                                </div>
                            </div>
                          <!-- <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry’s standard dummy text ever. Lorem ipsum dolor sit amet, consectetur adipiscing.
                          </p> -->
                        </div>
                      </div>
                      <!-- <div class="col-lg-5">
                        <div class="d-flex justify-content-end step_action mt-5" data-target="tab2">
                          <button type="submit" class="btn btn-primary btn-dashboard" style="margin-top: 8px;" @click="backToHime()">
                            Back to Home
                            <svg>
                              <use href="#arraow" /> </svg>
                          </button>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="tab-pane fade" id="tab7">
                <div class="step_count">Step 7</div>
                <div class="step_title">Payment Details </div>
                <div class="step_content payment_details">
                  <div class="row">
                    <div class="col-lg-7 ">
                      <div class="form-group">
                        <label>Contact Information</label>
                        <input class="form-control" type="email" placeholder="Email Address ">
                        <div class="c_checkbox">
                          <input type="checkbox" id="uptodate">
                          <label for="uptodate">
                            <div class="c_checkbox_checkmark"></div>
                            <div class="c_checkbox_label">Keep me up to date on news and exclusive offers</div>
                          </label>
                        </div>
                      </div>
                      <div class="form-group m-0">
                        <label>Shipping Address</label>
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="First Name">
                          </div>
                          <div class="col-md-6 form-group">
                            <input class="form-control" type="text" placeholder="Last Name">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Company (Optional)">
                          </div>
                        </div>
                      </div>


                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Address">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Apartment, Suits, etc (optional) ">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <select class="form-control" name="" id="">
                              <option value="">Country/Region</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <select class="form-control" name="" id="">
                              <option value="">State/Territory</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <select class="form-control" name="" id="">
                              <option value="">City</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Postal Code">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Phone Number">
                          </div>
                        </div>
                      </div>
                      <div class="c_checkbox">
                        <input type="checkbox" id="Termsonditions">
                        <label for="Termsonditions">
                          <div class="c_checkbox_checkmark"></div>
                          <div class="c_checkbox_label">
                            I agree to the <a href="">Terms & Conditions</a>
                          </div>
                        </label>
                      </div>


                    </div>
                    <div class="col-lg-5">
                      <div class="video_content">
                        <h4>Lorem Ipsum is simply dummy</h4>
                        <p>
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                      </div>
                      <div class="video">
                        <img src="{{asset('welcome_assets/images/video.png')}}" alt="">
                        <div class="overlay">
                          <button class="video_play small"> <svg width="130" height="130" viewBox="0 0 130 130">
                              <use href="#multi_circle" /> </svg></button>
                        </div>
                      </div>

                      <div class="payment_breakdown">
                        <div class="payment_item">
                          <div class="payment_item_label">Order Amount </div>
                          <div class="payment_item_amount">$ 187.00</div>
                        </div>
                        <div class="payment_item">
                          <div class="payment_item_label">
                            Discount Coupon Applied
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                          </div>
                          <div class="payment_item_amount">
                            <strong>- $ 41.00</strong>
                          </div>
                        </div>
                        <div class="payment_item">
                          <div class="payment_item_label">Sales Tax</div>
                          <div class="payment_item_amount">$ 10.22</div>
                        </div>
                        <div class="payment_item">
                          <div class="payment_item_label">Total Payable Amount</div>
                          <div class="payment_item_amount"><strong>$ 156.22</strong></div>
                        </div>
                      </div>
                      <div class="payment_method">
                        <fieldset>
                          <legend>EXPRESS CHECKOUT</legend>
                          <img src="{{asset('welcome_assets/images/payment_method.png')}}" alt="">
                        </fieldset>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end step_action mt-5" data-target="tab2">

                    <button type="button" class="mt-4 btn btn-primary btn-dashboard ">
                      Continue to dashboard
                      <svg>
                        <use href="#arraow" /> </svg>
                    </button>
                  </div>
                </div>

              </div> -->
            </div>

          </div>
        </div>
      </div>
    </div>

 <!-- Modal -->
 <div class="modal fade step_modal" id="stepOneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" v-if="clickedStrainBase">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="d-flex">
          <!-- <div class="step_bg">
            <img :src="'/uploads/'+clickedStrainBase.image" alt="">
          </div> -->
          <div class="modal_body">
            <div class="modal-header">
              <div class="header-img">
            <img :src="'/uploads/'+clickedStrainBase.image" alt="">
              </div>
              <div class="modal-title">
                <h2>@{{clickedStrainBase.name}}</h2>
                <p>@{{clickedStrainBase.short_description}}</p>
              </div>
              <button type="button" class="modal_close" data-dismiss="modal" aria-label="Close">
                <svg width="15" hight="15">
                  <use href="#close" /> </svg>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">

                <div class="col-6">
                  <div class="box">
                    <h4>Origin</h4>
                    <p>
                    @{{clickedStrainBase.origin}}
                    </p>
                  </div>
                </div>

                <div class="col-6">
                  <div class="box">
                    <h4>Effects of Use</h4>
                    <p>
                    @{{clickedStrainBase.effects_of_use}}
                    </p>
                  </div>
                </div>

                <div class="col-6">
                  <div class="box">
                    <h4>Plant description</h4>
                    <p>
                    @{{clickedStrainBase.plant_description}}
                    </p>
                  </div>
                </div>

                <div class="col-6">
                  <div class="box">
                    <h4>Recommended Timings</h4>
                    <p>
                    @{{clickedStrainBase.recommended_timings}}
                    </p>
                  </div>
                </div>

                <div class="col-6">
                  <div class="box">
                    <h4>CBD to THC ratio</h4>
                    <p>
                    @{{clickedStrainBase.cbd_to_thc_ratio}}
                    </p>
                  </div>
                </div>

                <div class="col-6">
                  <div class="box">
                    <h4>Popular strains</h4>
                    <p>
                    @{{clickedStrainBase.popular_strains}}
                    </p>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary btn_select" @click="selectStrainBase">SELECT</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  </div>

 


  <div class="svg d-none">

    <svg xmlns="http://www.w3.org/2000/svg">
      <g id="multi_circle" data-name="Group 12216" transform="translate(-448.908 -997.552)">
        <circle id="Ellipse_80" data-name="Ellipse 80" cx="45.5" cy="45.5" r="45.5"
          transform="translate(468.908 1017.552)" fill="#fff" />
        <path id="Polygon_1" data-name="Polygon 1" d="M12.5,0,25,18H0Z"
          transform="translate(523.908 1050.552) rotate(90)" fill="#2f2f2f" />
        <g id="Ellipse_81" data-name="Ellipse 81" transform="translate(461.908 1010.552)" fill="none" stroke="#fff"
          stroke-width="1" opacity="0.75">
          <circle cx="52.5" cy="52.5" r="52.5" stroke="none" />
          <circle cx="52.5" cy="52.5" r="52" fill="none" />
        </g>
        <g id="Ellipse_82" data-name="Ellipse 82" transform="translate(454.908 1003.552)" fill="none" stroke="#fff"
          stroke-width="1" opacity="0.6">
          <circle cx="59.5" cy="59.5" r="59.5" stroke="none" />
          <circle cx="59.5" cy="59.5" r="59" fill="none" />
        </g>
        <g id="Ellipse_83" data-name="Ellipse 83" transform="translate(448.908 997.552)" fill="none" stroke="#fff"
          stroke-width="1" opacity="0.2">
          <circle cx="65" cy="65" r="65" stroke="none" />
          <circle cx="65" cy="65" r="64.5" fill="none" />
        </g>
      </g>
    </svg>




    <svg xmlns="http://www.w3.org/2000/svg" width="9.714" height="9.714" viewBox="0 0 9.714 9.714">
      <g id="close" data-name="Group 12136" transform="translate(-751.747 -1163.098) rotate(45)" opacity="0.494">
        <line id="Line_61" data-name="Line 61" y2="11.737" transform="translate(1360.869 285)" fill="none"
          stroke="#707070" stroke-linecap="round" stroke-width="1" />
        <line id="Line_62" data-name="Line 62" y2="11.737" transform="translate(1366.737 290.869) rotate(90)"
          fill="none" stroke="#707070" stroke-linecap="round" stroke-width="1" />
      </g>
    </svg>


    <svg xmlns="http://www.w3.org/2000/svg" width="15.572" height="9.492" viewBox="0 0 15.572 9.492">
      <g id="arraow" data-name="Group 11864" transform="translate(-646.65 -413.536)">
        <path id="Path_1417" data-name="Path 1417"
          d="M3.546,4.142.1,7.793a.387.387,0,0,0,.279.65.392.392,0,0,0,.282-.12L4.613,4.131.657.106A.384.384,0,0,0,.109.644Z"
          transform="translate(656.915 414.085)" fill="none" stroke-width="1" opacity="0.997" />
        <line id="Line_22" data-name="Line 22" x1="13" transform="translate(647.5 418.5)" fill="none"
          stroke-linecap="round" stroke-width="1.7" />
      </g>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="13.673" height="9.551" viewBox="0 0 13.673 9.551">
      <path id="check" data-name="Path 8129"
        d="M44.559,40.412a.949.949,0,0,0-1.342-1.341l-7.18,7.18L32.783,43a.949.949,0,1,0-1.341,1.341l3.59,3.59a1.423,1.423,0,0,0,2.012,0Z"
        transform="translate(-31.164 -38.793)" />
    </svg>



    <svg viewBox="0 0 393 479" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path id="bg_shap"
        d="M385.5 0.51001H282.41L196.5 49.381L111.7 0.51001H7.5C3.634 0.51001 0.5 4.84301 0.5 10.187V468.887C0.5 474.232 3.634 478.564 7.5 478.564H385.5C389.366 478.564 392.5 474.231 392.5 468.887V10.187C392.5 4.84301 389.366 0.51001 385.5 0.51001Z" />
    </svg>




  </div>

@endsection



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
new Vue({
	el: '#build_strain_id',
	data: {
		strainBases:[],
    effects:[],
    clickedStrainBase:{},
    selectedStrainBase:{},
    selectedStrainOption:{},
    strainOptions:[],
    saveLead:false,
    contactWizardNext:false,
    user:{
      email:"",
      name:"",
      phone:"",
      business_name:"",
    },
    emailReg: /(.+)@(.+){2,}\.(.+){2,}/,
    phoneReg:/^\d+$/,
    loading:false
	},
	created(){
		this.fetchDataFromApi();

//     // Display a warning toast, with no title
// toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
// // Display a success toast, with a title
// toastr.success('Have fun storming the castle!', 'Miracle Max Says')
// // Display an error toast, with a title
// toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
// // Immediately remove current toasts without using animation
// toastr.remove()
// // Remove current toasts using animation
// toastr.clear()
// // Override global options
// toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})

  },
  computed:{
    selectedEffects(){
      return this.effects.filter((effect)=>effect.selected)
    }
  },
	mounted(){
    let self=this;
    // if(localStorage.hasOwnProperty('selectedStrainBase'))
    // console.info(JSON.parse(localStorage.getItem("selectedStrainBase")));
    // if(localStorage.hasOwnProperty('selectedStrainOption'))
    // console.info(JSON.parse(localStorage.getItem("selectedStrainOption")));
    // if(localStorage.hasOwnProperty('user'))
    // console.info(JSON.parse(localStorage.getItem("user")));

    (function($) {
  'use strict';

  $(function() {

      $(document).ready(function() {

            var iframe = document.querySelector('iframe');
            var player = new Vimeo.Player(iframe);

            player.on('play', function() {
            console.log('played the video!');
            });

            player.getVideoTitle().then(function(title) {
            console.log('title:', title);
            });

          $(document).on('click','.step_slider_next',function() {
            console.info('Outer fn');
            $('.step_slider_next').css('pointer-events', 'all');
          })
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

          // $btn_next.on('click', function() {
          //     $tab_active = $progressWizard.find('li a.active');
          //     $tab_active.parent().next().find('a').removeClass('disabled');
          //     $tab_next = $tab_active.parent().next().find('a[data-toggle="tab"]');
          //     triggerClick($tab_next);

          // });
          $btn_prev.click(function() {
              $tab_active = $progressWizard.find('li a.active');
              $tab_prev = $tab_active.parent().prev().find('a[data-toggle="tab"]');
              triggerClick($tab_prev);
          })
          $(".step_slider").slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll:1,
            swipe:false,
            draggable:false,
            // loop: false,
            // centerMode: true,
            dots: true,
            centerPadding: '0',
            ocusOnSelect: true,
            // fade: true,
            // cssEase: 'linear',
            prevArrow: false,//$('.step_slider_prev'),
            nextArrow: false//$('.step_slider_next')
           });


      });
  });

}(jQuery, this));


var modalData; 


$(".check_mark").click((event) => {
    event.stopPropagation();
});
 
$(".btn_select").click((event) => {
    var currectRadio = document.getElementById(modalData);
    currectRadio.click()
    $('#stepOneModal').modal('hide');
});

$(document).on("click", ".radio_item label", function () {
    modalData = $(this).data('id');
     // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});

  },
	methods:{
  // syncDataWithLocalStorage(){
  //   localStorage.setItem("selectedStrainBase", JSON.stringify(this.selectedStrainBase));
  //   localStorage.setItem("selectedStrainOption", JSON.stringify(this.selectedStrainOption));
  //   localStorage.setItem("user", JSON.stringify(this.user));
  // },
  contactInfoNext(){
      //this.contactWizardNext=true;
      let index=$(".slick-slider").slick('slickCurrentSlide');
      console.info('Outer fn',$(".slick-slider").slick('slickCurrentSlide'));
      if(index==0) {
           if(this.user.email==""){
              toastr.warning("Email is required");
              return;
           }
           else if(!this.emailReg.test(this.user.email)) {
            toastr.warning("Invalid Email format");
            return;
           }
      }
      if(index==1) {
           if(this.user.name==""){
              toastr.warning("Name is required");
              return;
           }
      }
      if(index==2) {
           if(this.user.phone==""){
              toastr.warning("Phone is required");
              return;
           }
           else if(!this.phoneReg.test(this.user.phone)) {
            toastr.warning("Invalid Phone format");
            return;
           } 
      }
      if(index==3) {
           if(this.user.business_name==""){
              toastr.warning("Business name is required");
              return;
           }
      }
      $(".slick-slider").slick('slickNext')

      //$('.step_slider_next').css('pointer-events', 'all');

  },
  contactInfoPrev(){
    console.info('Outer fn',$(".slick-slider").slick('slickCurrentSlide'));
    $(".slick-slider").slick('slickPrev')
  },
  selectStrainBase(){
      this.selectedStrainBase=this.clickedStrainBase;
     // console.info('this.selectedStrainBase',this.selectedStrainBase);
  },
  selectEffect(effect){
      this.selectedEffects.push(effect);
     // console.info(this.selectedEffects);
  },
  removeSelectionOfEffect(selectedEffect){
    index=this.selectedEffects.findIndex((selectedEffectItem)=>selectedEffectItem.id==selectedEffect.id);
    //console.info(index);
    if(index>-1)
    this.selectedEffects[index].selected=false;
  },
  capitalize(s){
    if (typeof s !== 'string') return ''
    return s.charAt(0).toUpperCase() + s.slice(1)
  },
		fetchDataFromApi(){
				let self=this;
				fetch(`{{route('strain.bases.effects')}}`)
				.then(res=>res.json())
				.then(function (result) {
         // console.info('result',result);
          self.strainBases=result.strainBases;
          self.effects=result.effects;
				}).then(function () {
					
				}); 
    },
    getStrainOptionsByEffects(){
      let self=this;
      let postObj={ 
        "_token": '{{csrf_token()}}',
        effects:this.selectedEffects
      };
					fetch("{{route('strain.options')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(postObj)}).then(function(response) {  //, {method: 'post',body: JSON.stringify(opts)}
						return response.json();
					}).then(function(result) {
						self.strainOptions=result.data;
					}).then(()=>{
            self.next();
          });
    },
    saveLeadDetail(){
      let self=this;
      let postObj={ 
        "_token": '{{csrf_token()}}',
        user:this.user,
        strainBase:this.selectedStrainBase,
        strainOption:this.selectedStrainOption,
        effects:this.selectedEffects.map((effect)=>effect.id),
        saveLead:this.saveLead
      };
      console.info('postObj',postObj);
					fetch("{{route('lead.save')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(postObj)}).then(function(response) {  //, {method: 'post',body: JSON.stringify(opts)}
						return response.json();
					}).then(function(result) {
              console.info(result);
              if(!result.status){
                toastr.warning(result.message);
              }
              else{
                toastr.success('Information has been saved successfully.', 'Success!', {timeOut: 9000})
                  // self.clickedStrainBase={};
                  // self.selectedStrainBase={};
                  self.selectedStrainOption={};
                  self.strainOptions=[];
                  self.user={
                    email:"",
                    name:"",
                    phone:"",
                    business_name:"",
                  }
                self.next();
              }
					})
    },
    next(){
      // this.syncDataWithLocalStorage();
      var $progressWizard = $('.stepper_holder'),
              $tab_active,
              $tab_prev,
              $tab_next,
              $btn_prev = $progressWizard.find('.prev-step'),
              $btn_next = $progressWizard.find('.next-step'),
              $tab_toggle = $progressWizard.find('[data-toggle="tab"]'),
              $tooltips = $progressWizard.find('[data-toggle="tab"][title]');
        $tab_active = $progressWizard.find('li a.active');
        $tab_active.parent().next().find('a').removeClass('disabled');
        $tab_next = $tab_active.parent().next().find('a[data-toggle="tab"]');

        this.switchTab($tab_next);
    },
    prev(){

    },
    switchTab(elem){
      $(elem).click();
      $(".step_slider").slick('refresh');
    },
		nextFromStrainBase(){
      if(!this.badEmptyCheck(this.selectedStrainBase))
      this.next();
      else
      toastr.warning('Please select a strain base first!')
    },
    nextFromEffect(){
        if(this.selectedEffects.length>0){
          this.loading=true;
          setTimeout(() => {
            this.loading=false;
            this.getStrainOptionsByEffects();
          }, 5000);
        }
        else
        toastr.warning('Please select an effect!')
    },
    nextFromStrainOption(selectedStrainOption){
        this.selectedStrainOption=selectedStrainOption;
        if(!this.badEmptyCheck(this.selectedStrainOption))
        this.next();
    },
    nextFromContactInfo(){
      this.saveLeadDetail();
      // this.next();
    },
    backToHime(){
            window.location="/";
          },
   badEmptyCheck(value) {
    return Object.keys(value).length === 0;
    }
	}
	})
</script>

@endpush
