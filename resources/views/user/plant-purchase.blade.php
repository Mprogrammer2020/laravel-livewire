
<x-layouts.user>
 <div class="congrats" style="display: none">
            <img src="{{asset('user_assets/images/congrats.gif')}}" alt="gif">
        </div>
    <div id="plant_sale_id">
        @push('css')

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

        <div class="layerThree loader" style="display:none;">
            <div class="purchase-area-box text-center">
                <h2 class="upcoming-heading">Plant Purchase With
                    {{ $order_detail->currency === 'BTC' ? 'Bitcoin' : 'Ethereum' }}</h2>
                <img src="{{ asset('user_assets/images/loader.gif') }}" alt="plant">
                <p>Please wait a moment...</p>
            </div>
        </div>


        <div class="payment-section barcode_page" style="display: none;">
            <div class="container">
                <div class="logo-text-new">
                    <div class="logo-new">
                        <img src="{{ asset('user_assets/images/ethereum_new.png') }}" alt="plant">
                    </div>
                    <div class="bitcoin-text">
                        <div class="bit-coin-logo">
                            @if ($order_detail->currency == 'BTC')
                                <img src="{{ asset('user_assets/images/bitcoin.png') }}" alt="plant">
                            @else
                                <img src="{{ asset('user_assets/images/ethrem.png') }}" alt="plant">
                            @endif
                        </div>
                        <div class="text">
                            <h3> {{ $order_detail->currency === 'BTC' ? 'Bitcoin' : 'Ethereum' }} Payment</h3>

                        </div>
                    </div>
                </div>
                <div class="scanner">
                    @if($order_detail->is_completed != '1')
                    <h6 id="counter">30 : 20s</h6>
                    @endif

                    <div id="qrcode" style="display: -webkit-inline-box"></div>

                </div>
                <div class="content-section">
                    <h4>{{ $order_detail->total_amount }}<img
                            src="{{ asset('user_assets/images/icon-img_new.svg') }}" class="ml-3  copy"
                            alt="Copy to Clipboard" data-clipboard-text="{{ $order_detail->total_amount }}" style="cursor: pointer">
                        </h5>
                        <h6>{{ $order_detail->currency === 'BTC' ? 'Bitcoin' : 'Ethereum' }} Amount</h6>
                        <div class="vector-text">
                            <div class="text-no">
                                <h5 id="address_code"></h5>
                                {{-- <input type="text" value="" id="address_code_" style="display: none;"> --}}

                            </div>

                            <div class="icon">
                                <img src="{{ asset('user_assets/images/icon-img_new.svg') }}" alt="Copy to Clipboard"
                                    style="cursor: pointer" class="copy1" data-clipboard-text="hi">
                            </div>
                        </div>
                        <hr>
                        <h5>Only <span>{{ $order_detail->currency === 'BTC' ? 'Bitcoin' : 'Ethereum' }}</span>
                            blockchain</h5>
                        <h5>Sending cryptocurrencies on the wrong network will result in loss of funds !</h5>
                        <div class="information">
                            <div class="order">
                                <h5>Order ID</h5>
                            </div>
                            <div class="border-box">

                            </div>
                            <div class="id">
                                <h5>{{ $order_detail->order_number }}</h5>
                            </div>
                        </div>

                        <div class="information">
                            <div class="order">
                                <h5>Date</h5>
                            </div>
                            <div class="border-box">

                            </div>
                            <div class="id">
                                <h5>{{ $order_detail->created_at }}</h5>
                            </div>
                        </div>

                        <div class="information">
                            <div class="order">
                                <h5>Status</h5>
                            </div>
                            <div class="border-box">

                            </div>
                            <div class="id">
                                <h5 class="total_done" {!! ($order_detail->is_completed == '1' ? '' : 'style="display:none"') !!}><?php if ($order_detail->is_completed == 0) {
                                    echo 'Awaiting payment' . '( ' . '<span class="pending_pay">' .
                                        $order_detail->total_amount . '</span> ) ';
                                    } else {
                                    echo 'Payment successful!';
                                    } ?>
                                </h5>
                            </div>
                        </div>
                        <div class="row redirect-message" style="display:none">
                            <div class="col-12">You will be redirecting in <span id="red-sec">7</span> s </div>
                        </div>
                </div>
            </div>
            <div class="word">
                <h2>Plant</h2>
            </div>
            <hr>
            <div class="end">
                <div class="end-bx-1">
                    <div class="end-image"></div>
                    <!--<img style="height:50px;width:50px" src="{{ asset('user_assets/images/leave-img_new.png') }}" alt="plant">-->
                    <img style="height:50px;width:55px" src="{{ asset('uploads') }}/{{ $order_detail->plant->image ?? '' }}" alt="plant">
                    <div class="name">
                        <h5> &nbsp;&nbsp;{{ $order_detail->plant->name ?? '' }} </h5>
                    </div>
                    <div class="number">
                        <h5>&nbsp; X {{$order_detail->quantity}}</h5>
                    </div>
                </div>
                <div class="end-bx-2">
                    <h5>{{ $order_detail->total_amount }} {{ $order_detail->currency }}</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">

            <script src="https://cdn.jsdelivr.net/gh/JDMcKinstry/JavaScriptDateFormat@master/dateFormat.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>


            @push('scripts')
                <script>
                    
                     var item = 
                        {
                           item_id: "{{isset($order_detail->plant->id) ? $order_detail->plant->id : ''}}",
                            item_name: "{{isset($order_detail->plant->name) ? $order_detail->plant->name : ''}}",
                            affiliation: "Gentlemens Cannabis",
                            coupon: "",
                            currency: "USD",
                            discount: 0,
                            index: 0,
                            price: {{isset($order_detail->unit_price) ? $order_detail->unit_price : 0}},
                            quantity: {{isset($order_detail->quantity) ? $order_detail->quantity : 0}}
                    };
                    
                    
                    var clipboard = new ClipboardJS('.copy1');

                    clipboard.on('success', function(e) {
                        setTooltip1('Copied!');
                        hideTooltip1();
                        e.clearSelection();
                    });

                    clipboard.on('error', function(e) {
                        console.error('Action:', e.action);
                        console.error('Trigger:', e.trigger);
                    });

                    function setTooltip1(message) {
                        $('.copy1').tooltip('hide')
                            .attr('data-original-title', message)
                            .tooltip('show');
                    }

                    function hideTooltip1() {
                        setTimeout(function() {
                            $('.copy1').tooltip('hide');
                        }, 1000);
                    }

                    $('.copy').tooltip({
                        trigger: 'click',
                        placement: 'bottom'
                    });

                    function setTooltip(message) {
                        $('.copy').tooltip('hide')
                            .attr('data-original-title', message)
                            .tooltip('show');
                    }

                    function hideTooltip() {
                        setTimeout(function() {
                            $('.copy').tooltip('hide');
                        }, 1000);
                    }

                    // Clipboard
                    var clipboard = new ClipboardJS('.copy');

                    clipboard.on('success', function(e) {
                        setTooltip('Copied!');
                        hideTooltip();

                    });

                    clipboard.on('error', function(e) {
                        setTooltip('Failed!');
                        hideTooltip();

                    });


                    // var clipboard = new ClipboardJS('button');

                    // clipboard.on('success', function(e) {
                    //   setTooltip('Copied!');
                    //   hideTooltip();
                    // });

                    // clipboard.on('error', function(e) {
                    //   setTooltip('Failed!');
                    //   hideTooltip();
                    // });
                    {{-- var now = new Date();
                    var utc = new Date(now.getTime() + now.getTimezoneOffset() * 60000);
                    var current_date = dateFormat(utc, 'Y-m-d h:i:s'); --}}
                    var second_date = '{{ $order_detail->expired_at }}';
                    const dt = new Date();
                    const la = dt.toLocaleString('en-US', {
                        timeZone: 'America/Los_Angeles'
                    });
                    let start_date = new Date(la);
                    let end_date = new Date(second_date);

                    console.log('start_date', start_date);
                    console.log('end_date', end_date);

                    let msDifference = end_date - start_date;

                    console.log(msDifference);


                    let sminutes = Math.floor(msDifference / 1000 / 60);
                    console.log(sminutes)

                    var fiveMinutes = (sminutes * 60) + (msDifference / 1000 % 60);
                    console.log(fiveMinutes);

                    display = $('#counter'),
                        interval = null;

                    startTimer(fiveMinutes, display);


                    $('.loader').show();
                    var url = "{{ route('create.wallet') }}";

                    var _token = "{{ csrf_token() }}";
                    var myTimeout = setTimeout(ajaxCal,
                        2000);

                    function startTimer(duration, display) {
                        var timer = duration,
                            minutes, seconds;
                        interval = setInterval(function() {
                            minutes = parseInt(timer / 60, 10)
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? "0" + minutes : minutes;
                            seconds = seconds < 10 ? "0" + seconds : seconds;

                            display.text(minutes + ":" + seconds + "s");

                            if (--timer < 0) {
                                timer = duration;
                                {{-- $('#resend-otp').show(); --}}
                                $('#counter').hide();

                                clearInterval(interval);
                            }
                        }, 1000);
                    }




                    function ajaxCal() {
                        var order_id = "{{ Request::segment(3) }}";
                        $.ajax({
                            url: url,
                            method: 'post',
                            data: {
                                order_id: order_id,
                                _token: _token
                            },
                            success: function(result) {
                                console.log(result);
                                const qrcode = new QRCode(document.getElementById('qrcode'), {
                                    text: result.data,
                                    width: 128,
                                    height: 128,
                                    colorDark: '#000',
                                    colorLight: '#fff',
                                    correctLevel: QRCode.CorrectLevel.H
                                });
                                $('#address_code').html(result.data)
                                //load the balance just after load page
                                @if($order_detail->is_completed != '1')
                                    ajaxCalAfterFiveMIn();
                                @endif

                                $('.loader').hide();
                                $('.barcode_page').show();
                                $('.copy1').attr('data-clipboard-text', result.data)
                            }
                        });
                    }

                    window.ajaxCalAfterFiveMIn = function(){
                            var _token = "{{ csrf_token() }}";
                            var address = $('#address_code').html();
                            var url = "{{ route('get.balance') }}";
                            var price = "{{ $order_detail->total_amount }}";
                            var order_id = "{{ $order_detail->id }}";

                            $.ajax({
                                url: url,
                                method: 'post',
                                data: {
                                    address_id: address,
                                    price: price,
                                    order_id: order_id,
                                    _token: _token
                                },
                                success: function(result) {
                                    var balance = result.balance;
                                    var total = result.total;

                                    if (total <= balance) {
                                        $('.congrats').show();
                                        $('.total_done').html('Payment successful!');
                                        purchaseEvent();
                                        clearInterval(interval);
                                        $("#counter").html('');
                                        clearInterval(myTimeout);
                                        startRedirectTimer();
                                    } else {
                                        var difference = (total * Math.pow(10,18)) - (balance * Math.pow(10,18));
                                        $('.pending_pay').html(difference/Math.pow(10,18));
                                    }
                                    $('.total_done').show();
                                },
                                error: function(XMLHttpRequest, textStatus, error) {
                                    $('.total_done').show();
//                                alert(XMLHttpRequest.responseJSON.message);
                                }
                            });
                        }
                        
                        
                @if($order_detail->is_completed != '1')
                    var myTimeout = setInterval(ajaxCalAfterFiveMIn,
                        10000);
                @endif

            window.startRedirectTimer = function(){
                $(".redirect-message").show();
                var redSeconds = 7;
                var redirectSec = setInterval(function(){
                    console.log(redSeconds);
                    redSeconds--;
                    if(redSeconds < 0){
                        clearInterval(redirectSec);
                        window.location.href='{{url("/user/order-detail")}}';
                        return;
                    }
                    $(".redirect-message").find("#red-sec").text(redSeconds);
                },1000);
            }
            
            window.purchaseEvent = function(){
                console.log(item);
               dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                dataLayer.push({
                  event: "purchase",
                  ecommerce: {
                      transaction_id: "{{isset($order_detail->id) ? $order_detail->id : ''}}",
                      affiliation: "Gentlemens Cannabis",
                      value: '{{isset($order_detail->total_amount) ? $order_detail->total_amount : 0}}',
                      tax: 0,
                      shipping: 0,
                      currency: "USD",
                      coupon: "",
                      items: [
                          item
                       ]
                  }
                }); 
            }
            
       </script>



            @endpush
</x-layouts.user>
