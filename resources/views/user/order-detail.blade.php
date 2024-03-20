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

                .modal-close {
                    position: unset !important;
                    width: auto !important;
                    height: auto !important;
                    background-color: #fff !important;
                }

                .congrats img {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                .congrats {
                    position: unset;
                    background: none;
                    height: auto;
                    width: 100%;
                    z-index: 1026;
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

                .btn-validate-hash {
                    background: #379633;
                    border: none;
                    color: #fff !important;
                    font-size: 18px;
                    font-weight: 600;
                    border-radius: 30px;
                    height: 44px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

            </style>
        @endpush
        <div class="layerThree">
            <div class="row justify-content-center">
                <div class="col menus">
                    <h2 class="upcoming-heading">Order History</h2>
                </div>
                <div class="col-auto ">
                    <a id="validate_hash" class="btn btn-validate-hash" href="javascript:;">
                        Validate Transaction Hash
                    </a>
                </div>
            </div>

            <div class="plant-sale-two">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Quantity</th>
                                <th class="text-center" scope="col">Unit Price </th>
                                <th class="text-center" scope="col">Plant Name</th>
                                <th class="text-center" scope="col">Total Amount</th>
                                <th class="text-center" scope="col">Payment Status</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($order_details) && !empty($order_details) && count($order_details) > 0)
                                @foreach ($order_details as $order_detail)
                                    <tr>
                                        <td>{{ $order_detail->order_number }}</td>
                                        <td class="text-center">{{ $order_detail->quantity }}</td>
                                        <td class="text-center">{{ $order_detail->currency }}
                                            {{ $order_detail->unit_price }}</td>

                                        <td class="text-center">{{ $order_detail->plant->name }}</td>
                                        <td class="text-center">${{ $order_detail->total_amount }}</td>
                                        <td class="text-center">
                                            {{ $order_detail->is_completed == 1 ? 'Payment completed' : 'Payment Pending' }}
                                        </td>
                                        <td class="text-center"><a
                                                href="{{ route('user.plant.purchase', $order_detail->order_number) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif


                        </tbody>
                    </table>

                </div>
                <center>{{ $order_details->links('pagination::bootstrap-4') }}</center>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="validate-hash-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg ">
                <div id=support_id class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons">
                            close
                        </span>
                    </button>
                    <form id="validate-transaction-hash-form" method="post" action="">
                        <div class="modal-body">
                            <div class="congrats" style="display: none">
                                <img src="{{ asset('user_assets/images/congrats.gif') }}" alt="gif">
                            </div>
                            <span id="error"></span>
                            <h5 class="fw-6 mb-3">Validate Transaction Hash</h5>
                            <div class="form-group">
                                <input name="transaction_hash" id="transaction_hash" autofocus autocomplete="off"
                                    class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                                    placeholder="Transaction Hash" required />
                            </div>
                            <div class="w-100 pt-3">
                                <button type="button" class="btn rounded-pill" id="sumit-validate-hash"
                                    onclick="validateTransactionHash()">
                                    Validate
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table id="show-order-detail" class="table"></table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        @push('scripts')
            <script>
                $("#validate_hash").on('click', function() {
                    $("#validate-hash-modal").find("#show-order-detail").hide();
                    $("#validate-hash-modal").find("#show-order-detail").html('');
                    $("#validate-hash-modal").find(".congrats").hide();
                    $("#validate-hash-modal").find("#transaction_hash").val('');
                    $("#validate-hash-modal").find("#error").html('');
                    $("#validate-hash-modal").modal('show');
                });


                window.validateTransactionHash = function() {
                    var url = "{{ route('user.ajax.validateHash') }}";
                    var _token = "{{ csrf_token() }}";
                    var transaction_hash = $("#validate-hash-modal").find("#transaction_hash").val();
                    $.ajax({
                        url: url,
                        method: "post",
                        data: {
                            transaction_hash: transaction_hash,
                            _token: _token
                        },
                        success: function(result) {
                            console.log(result);
                            if (result.status) {
                                $("#validate-hash-modal").find("#error").html(
                                    '<div class="alert alert-success"><a href="#" class="close modal-close" data-dismiss="alert" aria-label="close">&times;</a>Order Detail Found</div>'
                                );
                                var html =
                                    '<tr><th>Order Number</th><th>Quantity</th><th>Plant Name</th><th>Total Price</th><th>Pending Amount</th><th>Payment Status</th><th></th></tr>';
                                html += '<tr><td>' + result.data.order_number + '</td>\n\
                                    <td>' + result.data.quantity + '</td>\n\
                                    <td>' + result.data.plant.name + '</td>\n\
                                    <td>' + result.data.total_amount + ' ' + result.data.currency + '</td>\n\
                                    <td>' + result.data.pending_amount + ' ' + result.data.currency + '</td>\n\
                                    <td>' + (result.data.is_completed == '1' ? 'Payment Completed' : 'Payment Pending') + '</td>\n\
                                    <td><a href="{{ url('/user/') }}/plant-purchase/' + result.data.order_number + '">\n\
                                                        <i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>';
                                $("#validate-hash-modal").find("#show-order-detail").html(html);
                                $("#validate-hash-modal").find("#show-order-detail").show();
                                $("#validate-hash-modal").find(".congrats").show();
                                setTimeout(function() {
                                    $("#validate-hash-modal").find(".congrats").hide();
                                }, 7000);
                            } else {
                                $("#validate-hash-modal").find("#error").html(
                                    '<div class="alert alert-danger"><a href="#" class="close modal-close" data-dismiss="alert" aria-label="close">&times;</a>Record not found!!!</div>'
                                );
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, error) {
                            $("#validate-hash-modal").find("#error").html(
                                '<div class="alert alert-danger"><a href="#" class="close modal-close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                XMLHttpRequest.responseJSON.message + '</div>');
                        }
                    });
                }

            </script>
        @endpush
    </div>
</x-layouts.user>
