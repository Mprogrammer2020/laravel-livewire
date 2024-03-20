<x-layouts.user>
    <div id="plant_sale_id">
        @push('css')
            <style>
                .cursor-pointer {
                    cursor: pointer;
                }

                .buyBtn-custom {
                    background-color: var(--primary) !important;
                    color: #fff !important;
                    width: 140px;
                    padding: 13px 0;
                    border-radius: 100px !important;
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

                .l_error {
                    color: #c00;
                }

                .c_error {
                    outline: 2px solid #c00;
                }

            </style>
        @endpush
        <div class="layerThree">
            <div class="row">
                {{-- {{ $plant }} --}}
                <div class="col-lg-8">
                    <h2 class="upcoming-heading">Plant Detail</h2>
                    <div class="plant-sale-two">
                        <div class="row">
                            <div class="col-md-4 plant-left">
                                <h4 style="text-transform: capitalize">{{ $plant->name ?? '' }}</h4>
                                <div class="img-responsive">
                                    <div class="description-images-box" style="">
                                            <img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" class="img-fluid">
                                    </div>
                                    {{-- <img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}" alt="plant"> --}}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Harvest per year</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three"> {{ $plant->harvest_per_year ?? '' }}</span>
                                </div>
                                {{-- {"id":5,"name":"sdsadasd",
                                "image":"33c0b8e9841dec95fc4266f878d37de5.png",
                                "image1":"","image2":"","image3":"","image4":"",
                                "price":"0.001","description":"weqeqwe",
                                "feature1":"qwewqe",
                                "feature2":"qwewqe",
                                "feature3":"qweqwe",
                                "benefit1":"qweqwe",
                                "benefit2":"qweqweq",
                                "benefit3":"qweqw",
                                "earn_cash_text1":"qweeq",
                                "earn_cash_text2":"qweqwe",
                                "earn_cash_text3":"qweqwewq",
                                "what_you_get_text1":"eqweqwe",
                                "what_you_get_text2":"qweqwe",
                                "what_you_get_text3":"qweqweqweqe",
                                "harvest_per_year":3,
                                "revenue":12,
                                "quantity":12,
                                "sell_price":12
                                ,"start_date":"2022-03-12","end_date":"2022-03-19","eth_price":46,"created_at":"2022-03-11T07:47:01.000000Z","updated_at":"2022-03-11T07:48:30.000000Z"} --}}
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Revenue (per harvest)</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three plant-detail-revenue text-primary" style="font-weight:800">{{ $plant->revenue ?? '' }}Gms</span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Sell price</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">${{ $plant->sell_price ?? '' }}/Gms</span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Start date</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">{{ $plant->start_date ?? '' }}</span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">End date</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">{{ $plant->end_date ?? '' }}</span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Plant Name</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">{{ $plant->name ?? '' }}</span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Price</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">{{ $plant->eth_price ?? '' }} ETH 
                                        {{-- <span>|</span> --}}
                                        {{-- {{ $plant->price ?? '' }} BTC --}}
                                    </span>
                                </div>
                                <div class="detail-plant">
                                    <span class="detail-plant-one">Quantity</span>
                                    <span class="detail-plant-two"></span>
                                    <span class="detail-plant-three">{{ $plant->available_quantity.'/'.$plant->quantity ?? '' }} <span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plant-sale-two mt-4">
                        <div class="description-box">
                            <p>Description :</p>
                            <h6>{{ $plant->description != null ? $plant->description : '' }}</h6>
                        </div>
                        <div class="description-box">
                            <p>Features :</p>
                            <ul>
                                @if($plant->feature1 != null)<li>{{ $plant->feature1 ?? '' }}</li>@endif
                                @if($plant->feature2 != null)<li>{{ $plant->feature2 ?? '' }}</li>@endif
                                @if($plant->feature3 != null)<li>{{ $plant->feature3 ?? '' }}</li>@endif
                            </ul>
                        </div>
                        <div class="description-box">
                            <p>Benefits :</p>
                            <ul>
                                @if($plant->benefit1 != null)<li>{{ $plant->benefit1 ?? '' }}</li>@endif
                                @if($plant->benefit2 != null)<li>{{ $plant->benefit2 ?? '' }}</li>@endif
                                @if($plant->benefit3 != null)<li>{{ $plant->benefit3 ?? '' }}</li>@endif
                            </ul>
                        </div>
                        <div class="description-box">
                            <p>Earn Cash :</p>
                            <ul>

                                @if($plant->earn_cash_text1 != null)<li>{{ $plant->earn_cash_text1 ?? '' }}</li>@endif
                                @if($plant->earn_cash_text2 != null)<li>{{ $plant->earn_cash_text2 ?? '' }}</li>@endif
                                @if($plant->earn_cash_text3 != null)<li>{{ $plant->earn_cash_text3 ?? '' }}</li>@endif
                            </ul>
                        </div>
                        <div class="description-box">
                            <p>What you get :</p>
                            <ul>

                                @if($plant->what_you_get_text1 != null)<li>{{ $plant->what_you_get_text1 ?? '' }}</li>@endif
                                @if($plant->what_you_get_text2 != null)<li>{{ $plant->what_you_get_text2 ?? '' }}</li>@endif
                                @if($plant->what_you_get_text3 != null)<li>{{ $plant->what_you_get_text3 ?? '' }}</li>@endif

                            </ul>
                        </div>

                        <div class="description-images-box">
                            <ul>
                                @if($plant->image != null && file_exists(public_path('/uploads/'.$plant->image)))
                                    <li><img src="{{ asset('uploads') }}/{{ $plant->image ?? '' }}"></li>
                                @endif
                                @if($plant->image1 != null && file_exists(public_path('/uploads/'.$plant->image1)))
                                    <li><img src="{{ asset('uploads') }}/{{ $plant->image1 ?? '' }}"></li>
                                @endif
                                @if($plant->image2 != null && file_exists(public_path('/uploads/'.$plant->image2)))
                                    <li><img src="{{ asset('uploads') }}/{{ $plant->image2 ?? '' }}"></li>
                                @endif
                                @if($plant->image3 != null && file_exists(public_path('/uploads/'.$plant->image3)))
                                    <li><img src="{{ asset('uploads') }}/{{ $plant->image3 ?? '' }}"></li>
                                @endif
                                @if($plant->image4 != null && file_exists(public_path('/uploads/'.$plant->image4)))
                                    <li><img src="{{ asset('uploads') }}/{{ $plant->image4 ?? '' }}"></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="change-currency">
                        {{-- <h5>Change Currency</h5> --}}
                        <h5>&nbsp;</h5>
                        {{-- <div class="btn-group btn-toggle"> --}}
                            {{-- <button class="btn btn-default">ETH</button>
                            <button class="btn btn-primary active">BTC</button> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="plant-sale-two">
                        <h4 class="text-right">Total</h4>
                        <div class="plantbill-name">
                            <div>
                                <h5>{{ $plant->name ?? '' }}</h5>
                                <p>Grow Projections (Per Harvest)</p>
                            </div>
                            <div class="text-right">
                                <h5><span class="main_quan">1</span><span>X</span> <span
                                        class="main_price">{{ $plant->eth_price ?? '' }}</span> <span
                                        class="sidebar_change_cur">ETH</span></h5>
                                        <h6><span class="main_quan">1</span> <span>X</span> <span
                                        class="">{{ $plant->revenue ?? '' }}Gms</span></h6>
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="plantbill-name">
                            <div>
                                <h5>Charge From
                                    Balance</h5>
                            </div>
                            <div class="text-right">
                                <h5>1 <span>X</span> 0.001 BTC</h5>
                            </div>
                        </div> --}}
                        {{-- <hr> --}}
                        <div class="plany-many">
                            <p class="text-center">How Many Plants</p>
                            <div class="add-minus-box">
                                <i class="fa fa-minus minus_quan" aria-hidden="true" style="cursor: pointer"></i>
                                <span class="product-quantity _product_quantity">1</span>
                                <i class="fa fa-plus plus_quan" aria-hidden="true" style="cursor: pointer"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="plantbill-name">
                            <div>
                                <h5>Total Amount</h5>
                            </div>
                            <div class="text-right">
                                <h4><span class="plant_price">{{ $plant->eth_price }}</span><span
                                        class="show_currency">ETH</span></h4>
                            </div>
                        </div>
                        <hr>

                        <input type="hidden" name="" id="plant_id" value="{{ $plant->id }}">
                        <input type="hidden" name="" id="currency" value="ETH">

                        <span class="purchase-bt-box" style="cursor:pointer">Purchase</span>
                    </div>
                </div>
            </div>

            <input type="hidden" name="" id="change_price_" value="{{ $plant->eth_price }}">
            <input type="hidden" name="" id="avail_quantity" value="{{ $plant->available_quantity }}">
            @push('scripts')
                <script type="text/javascript">
                    $('.btn-toggle').click(function() {
                        var btc = "{{ $plant->price }}";
                        var eth = "{{ $plant->eth_price }}";
                        var price = "{{ $plant->price }}"
                        var curr = 'ETH';
                        if ($(this).find('.active').html() === 'BTC') {
                            curr = 'ETH';
                            price = eth;
                        } else {
                            curr = 'BTC';
                            price = btc;

                        }
                        $('#change_price_').val(price);
                        var _product_quantity = $('._product_quantity').html();
                        var actual_price = $('#change_price_').val();
                        var qua = parseInt(_product_quantity);
                        $('.show_currency').html('');
                        $('.sidebar_change_cur').html(curr);
                        $('.main_price').html(price);
                        $('.plant_price').html(price * qua)
                        $('#currency').val(curr);
                        $('.show_currency').html(curr);
                        $(this).find('.btn').toggleClass('active');

                        if ($(this).find('.btn-primary').length > 0) {
                            $(this).find('.btn').toggleClass('btn-primary');
                        }
                        if ($(this).find('.btn-danger').length > 0) {
                            $(this).find('.btn').toggleClass('btn-danger');
                        }
                        if ($(this).find('.btn-success').length > 0) {
                            $(this).find('.btn').toggleClass('btn-success');
                        }
                        if ($(this).find('.btn-info').length > 0) {
                            $(this).find('.btn').toggleClass('btn-info');
                        }

                        $(this).find('.btn').toggleClass('btn-default');

                    });

                    $('form').submit(function() {
                        var radioValue = $("input[name='options']:checked").val();
                        if (radioValue) {
                            alert("You selected - " + radioValue);
                        };
                        return false;
                    });

                </script>
            @endpush
        </div>
        @push('scripts')
            <script>
                                
                    var item = 
                        {
                           item_id: "{{isset($plant->id) ? $plant->id : ''}}",
                            item_name: "{{isset($plant->name) ? $plant->name : ''}}",
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
                            price: {{isset($plant->eth_price) ? $plant->eth_price : 0}},
                            quantity: 1
                    };
                    
                $(document).ready(function() {

                    $('.plus_quan').on('click', function() {
                        console.log("plus_quan")
                        var _product_quantity = $('._product_quantity').html();
                        var actual_price = $('#change_price_').val();
                        var qua = parseInt(_product_quantity) + 1;
                        if (parseInt($("#avail_quantity").val()) < qua) {
                            console.log('max quantity exceeded');
                            return false;
                        }
                        if (qua > 5) {
                            console.log('max quantity exceeded');
                            return false;
                        }
                        $('._product_quantity').html(parseInt(_product_quantity) + 1); 
                        var result = (actual_price * Math.pow(10,18)) * qua;
                        $('.plant_price').html(result / Math.pow(10,18));
                        $('.main_quan').html(qua);
                        addToCartEvent(qua,(result / Math.pow(10,18)));
                    })
                    $('.minus_quan').on('click', function() {
                        var _product_quantity = $('._product_quantity').html();
                        if (parseInt(_product_quantity) <= 1) {
                            return false;
                        }
                        $('._product_quantity').html(parseInt(_product_quantity) - 1);
                        var actual_price = "{{ $plant->eth_price ?? '' }}";
                        var qua = parseInt(_product_quantity) - 1;
                        var result = (actual_price * Math.pow(10,18)) * qua;
                        $('.plant_price').html(result / Math.pow(10,18));
                        $('.main_quan').html(qua);
                        removeFromCartEvent(qua,(result / Math.pow(10,18)));

                    })
                    $('.change-currency').on('chnage', function() {
                        alert(this.value)
                    })
                    $('.purchase-bt-box').on('click', function(e) {
                        e.preventDefault();
                        var url = "{{ route('user.create.order') }}";
                        var _token = "{{ csrf_token() }}";
                        var plant_id = $("#plant_id").val();
                        var quantity = $("._product_quantity").html();
                        var currency = $('#currency').val();
                        $.ajax({
                            url: url,
                            method: "post",
                            data: {
                                quantity: quantity,
                                plant_id: plant_id,
                                currency: currency,
                                _token: _token
                            },
                            success: function(result) {
                                if (result.status) {
                                    beginCheckoutEvent(parseInt(quantity),parseFloat($('.plant_price').text()));
                                    location.href = result.data;
                                }
                            },
                            error: function(XMLHttpRequest, textStatus, error) { 
                                alert(XMLHttpRequest.responseJSON.message);
                            } 
                        });
                    });
                        
                    //add event on page load
                    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                    console.log(item);
                    dataLayer.push({
                      event: "view_cart",
                      ecommerce: {
                        currency: "USD",
                        value: {{isset($plant->eth_price) ? $plant->eth_price : 0}},
                        items: [
                            item
                        ]
                      }
                    });
                });
                
//add to cart event for ecommerce tracking
window.addToCartEvent = function(quantity,price){
    item.quantity = parseInt(quantity);
//    item.price = parseFloat(price);
    console.log(item);
    //add to cart event
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "add_to_cart",
      ecommerce: {
        items: [
            item
        ]
      }
    });
}
                
//add to cart event for ecommerce tracking
window.removeFromCartEvent = function(quantity,price){
     item.quantity = parseInt(quantity);
//    item.price = parseFloat(price);
    console.log(item);
    //add to cart event
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "remove_from_cart",
      ecommerce: {
        items: [
            item
        ]
      }
    });
}
                
//begin checkout event for ecommerce tracking
window.beginCheckoutEvent = function(quantity,price){
    item.quantity = parseInt(quantity);
//    item.price = parseFloat(price);
    console.log(item);
    //add to cart event
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "begin_checkout",
      ecommerce: {
        items: [
            item
        ]
      }
    });
}

</script>
        @endpush
</x-layouts.user>
