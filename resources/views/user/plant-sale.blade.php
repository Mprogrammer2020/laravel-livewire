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
        <marquee width="100%" behavior="scroll" scrolldelay="1" bgcolor="crimson" direction="left" loop="infinite">
            @if(!empty($announcements))
                @foreach($announcements as $description)
                    {!! $description !!}.. &nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
            @endif
        </marquee>
        <h2 class="upcoming-heading">Plant Marketplace</h2>
      <div class="market-nft-place">
         
        @isset($allPlants)
        <div class="row mt-4">
            <div class="col-lg-7 col-xl-5">
                <div class="farmer-nft-left gradient-box">
                    <h3 class="farmer-nft-heading">{{ isset($allPlants->name) ? $allPlants->name : '' }}</h3>
                    <div class="img-video-one">
                        <video width="100%" autoplay="autoplay" loop>
                          <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                          <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                        </video>
                    </div>
                    <div class="nft-details">
                        <div class="mint-box">
                            <h4>Mint Price</h4>
                            <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> {{ isset($allPlants->eth_price) ? $allPlants->eth_price : '0' }} ETH</p>
                        </div>
                        <div class="mint-box mint-two-box">
                            <h4>Plants Qty.</h4>
                            <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> {{ isset($allPlants->available_quantity) ? $allPlants->quantity : '0' }}</p>
                        </div>
                        <div class="mint-box">
                            <h4>Owners</h4>
                            <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> {{isset($allPlants->ownerCount)?$allPlants->ownerCount:0}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-7">
                <div class="farmer-nft-right gradient-box">
                    <h3 class="farmer-nft-heading">Harvest Overview</h3>
                    <div class="harves-grams-box">
                        <div>
                            <p>Grams/Harvest</p>
                            <h6>{{ isset($allPlants->revenue) ? $allPlants->revenue : '0' }}</h6>
                        </div>
                        <div>
                            <p>THC/CBD</p>
                            <h6>{{ isset($allPlants->thc) ? $allPlants->thc.'%' : '' }} / {{ isset($allPlants->cbd) ? $allPlants->cbd.'%' : '' }}</h6>
                        </div>
                    </div>
                     <div class="harves-grams-box">
                        <div>
                            <p>Harvest/Year</p>
                            <h6>{{ isset($allPlants->harvest_per_year) ? $allPlants->harvest_per_year : '0' }}</h6>
                        </div>
                        <div>
                            <p>Annual Return</p>
                            <h6 class="green-tag">{{ isset($allPlants->annual_return) ? $allPlants->annual_return.'%' : '' }}</h6>
                        </div>
                    </div>
                    <div class="harves-grams-box">
                        <div>
                            <p>Revenue/Harvest</p>
                            <h6 class="green-tag">{{ isset($allPlants->revenue_per_harvest) ? $allPlants->revenue_per_harvest : '' }}</h6>
                        </div>
                        <div>
                            <p>Harvest Date</p>
                            <h6>{{ isset($allPlants->start_date) && $allPlants->start_date != null ? date('d/m/Y',strtotime($allPlants->start_date)) : '' }}</h6>
                        </div>
                    </div>
                </div>
                <a @click="redirectToView('{{$allPlants->id}}')" href="javascript:;" class="grow-bt">Grow Now!</a>
            </div>
        </div>
        @endisset
      </div>

      <div class="nft-collection"    style="position: relative;">
            <h2 class="upcoming-heading mt-5">Explore Past Collections</h2>
            <div class="search-bar-area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="search-decending">
                            <form style="position: relative;">
                                <input type="text" class="form-control" placeholder="Search Collection">
                                <i class="fa fa-search search-icon" aria-hidden="true"></i>
                            </form>
                            <div class="form-group">
                                <select class="form-control descending-select" id="exampleFormControlSelect1">
                                  <option>Descending</option>
                                  <option>Ascending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="search-decending-right">
                            <h5>Showing <span>6</span> of <span>10</span> Collections</h5>
                             <div class="list-grid-view">
                                <button class="list-bt" type="button"><img src="{{ asset('user_assets/images/grid-view.png') }}" alt="list"></button>
                                <button class="list-bt" type="button"><img src="{{ asset('user_assets/images/list-view.png') }}" alt="list"></button>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="row opacity-box">
                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                          <!--   <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                           <!--  <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                          <!--   <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                            <!-- <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                            <!-- <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="farmer-nft-two">
                        <h5>Founding Farmers NFT</h5>
                        <div class="nft-two-img">
                            <!-- <video width="100%" autoplay="autoplay" loop>
                              <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                              <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                            </video> -->
                        </div>
                        <div class="nft-details">
                            <div class="mint-box mint-box-new-copy">
                                <h4>Floor Price</h4>
                                <!-- <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p> -->
                                <p><img src="{{ asset('user_assets/images/eth.png')}}" class="img-fluid"> 0.005 ETH</p>
                            </div>
                            <div class="mint-box mint-two-box mint-box-new-copy">
                                <h4>Plants Qty.</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png')}}" class="img-fluid"> 5000</p>
                            </div>
                            <div class="mint-box mint-box-new-copy mint-border-right">
                                <h4>Owners</h4>
                                <p><img src="{{ asset('user_assets/images/plant.png')}}" class="img-fluid"> 5000</p>
                            </div>
                             <div class="mint-box mint-box-new-copy">
                                <h4>Volume Traded</h4>
                                <p><img src="{{ asset('user_assets/images/eth.png')}}" class="img-fluid"> 12 ETH</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <h4 class="coming-soon-box">Coming Soon !</h4>

      </div>
    <!-- <div class="list-view-box-tab">
            <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="farmer-nft-two">
                    <h5>Founding Farmers NFT</h5>
                    <div class="nft-two-img">
                        <video width="100%" autoplay="autoplay" loop>
                             <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                            <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                        </video>
                    </div>
                    <div class="nft-details">
                        <div class="mint-box mint-box-new-copy">
                            <h4>Floor Price</h4>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                        </div>
                        <div class="mint-box mint-two-box mint-box-new-copy">
                             <h4>Plants Qty.</h4>
                             <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy mint-border-right">
                            <h4>Owners</h4>
                            <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy">
                            <h4>Volume Traded</h4>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-6 col-lg-4">
              <div class="farmer-nft-two">
                    <h5>Founding Farmers NFT</h5>
                    <div class="nft-two-img">
                        <video width="100%" autoplay="autoplay" loop>
                             <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                            <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                        </video>
                    </div>
                    <div class="nft-details">
                        <div class="mint-box mint-box-new-copy">
                            <h4>Floor Price</h4>
                            <p><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid"> 0.005 ETH</p>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                        </div>
                        <div class="mint-box mint-two-box mint-box-new-copy">
                             <h4>Plants Qty.</h4>
                             <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy mint-border-right">
                            <h4>Owners</h4>
                            <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy">
                            <h4>Volume Traded</h4>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-6 col-lg-4">
              <div class="farmer-nft-two">
                    <h5>Founding Farmers NFT</h5>
                    <div class="nft-two-img">
                        <video width="100%" autoplay="autoplay" loop>
                             <source src="{{ asset('user_assets/images/foundingfarmer.mp4') }}" type="video/mp4">
                            <source src="{{ asset('user_assets/images/foundingfarmer.ogg') }}" type="video/ogg">
                        </video>
                    </div>
                    <div class="nft-details">
                        <div class="mint-box mint-box-new-copy">
                            <h4>Floor Price</h4>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 0.005 ETH</p>
                        </div>
                        <div class="mint-box mint-two-box mint-box-new-copy">
                             <h4>Plants Qty.</h4>
                             <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy mint-border-right">
                            <h4>Owners</h4>
                            <p><img src="{{ asset('user_assets/images/plant.png') }}" class="img-fluid"> 5000</p>
                        </div>
                        <div class="mint-box mint-box-new-copy">
                            <h4>Volume Traded</h4>
                            <p><img src="{{ asset('user_assets/images/eth.png') }}" class="img-fluid"> 12 ETH</p>
                        </div>
                    </div>
                </div>
             </div>
          </div>
      
       </div>-->
      
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
//        this.stripe.stripe =  Stripe("{{config('services.stripe.key')}}");
//        this.stripe.elements = this.stripe.stripe.elements();
//
//        this.stripe.cardNumber = this.stripe.elements.create('cardNumber', {style: this.stripe.style});
//        this.stripe.cardNumber.mount('#card-number');
//
//        this.stripe.cardExpiry = this.stripe.elements.create('cardExpiry', {style: this.stripe.style});
//        this.stripe.cardExpiry.mount('#card-expiry');
//
//        this.stripe.cardCvc = this.stripe.elements.create('cardCvc', {style: this.stripe.style});
//        this.stripe.cardCvc.mount('#card-cvc');

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
        },
        redirectToView(id){
            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            let item = {
                item_id: "{{isset($allPlants->id) ? $allPlants->id : ''}}",
                item_name: "{{isset($allPlants->name) ? $allPlants->name : ''}}",
                affiliation: "Gentlemens Cannabis",
                coupon: "",
                currency: "USD",
                discount: 0,
                index: 0,
    //          item_brand: "Google",
    //          item_category: "Apparel",
    //          item_category2: "Adult",
    //          item_category3: "Shirts",
    //          item_category4: "Crew",
    //          item_category5: "Short sleeve",
    //          item_list_id: "related_products",
    //          item_list_name: "Related Products",
    //          item_variant: "green",
    //          location_id: "L_12345",
                price: {{isset($allPlants->eth_price) ? $allPlants->eth_price : 0}},
                quantity: 1
            };
            //view item event
            dataLayer.push({
            event: "view_item",
            ecommerce: {
              items: [
                  item
              ]
            }
          });
          //add to cart event
          dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
          dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    items: [item]
                }
            });
            console.log(item);
          window.location.href = '{{url("/")}}/user/plant-buy/'+id;
        }
    }
    })
</script>

<!--ecommerce tracking code-->
<script>
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.

$(document).ready(function(){
    dataLayer.push({
      event: "view_item_list",
      ecommerce: {
      currency: "USD",
        items: [
         {
          item_id: "{{isset($allPlants->id) ? $allPlants->id : ''}}",
          item_name: "{{isset($allPlants->name) ? $allPlants->name : ''}}",
          affiliation: "Gentlemens Cannabis",
          coupon: "",
          currency: "USD",
          discount: 0,
          index: 0,
//          item_brand: "Google",
//          item_category: "Apparel",
//          item_category2: "Adult",
//          item_category3: "Shirts",
//          item_category4: "Crew",
//          item_category5: "Short sleeve",
//          item_list_id: "related_products",
//          item_list_name: "Related Products",
//          item_variant: "green",
//          location_id: "L_12345",
            price: {{isset($allPlants->eth_price) ? $allPlants->eth_price : 0}},
            quantity: 1//"{{isset($allPlants->quantity) ? $allPlants->quantity : 0}}"
        }]
        }
    });
});

//window.getUsdPrice(ethPrice){
//    var usd = 0;
//    
//}
</script>
    @endpush
    </div>
</x-layouts.user>
