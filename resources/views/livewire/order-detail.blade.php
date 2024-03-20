<style>
    .content h4 {
        font-size: 21px;
        color: #787878;
    }
    .content span {
    font-size: 22px;
    font-weight: 700;
    color: #5867dd;
    }
    .content h5 {
    color: #1d1c1c;
    font-weight: 300;   
    }   
    .content{
        margin-top: 20px;
    }
</style>
<div>

    @section('sub-header')
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Order List</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-home"><i
                        class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    Dashboard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Order List </a>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" data-placement="left">
                    <a href="javascript:;" onclick="showTransferModal()" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-bitcoin"></i>
                        Transfer To Master Wallet
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    @endsection

    <div class="kt-portlet kt-portlet--mobile">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Quantity</th>
                        <th class="text-center" scope="col">Unit Price </th>
                        <th class="text-center" scope="col">Plant Name</th>
                        <th class="text-center" scope="col">Total Amount</th>
                        <th class="text-center" scope="col">Transaction Hash</th>
                        <th class="text-center" scope="col">Payment Status</th>
                        <th class="text-center" scope="col">Referrer</th>
                        <th class="text-center" scope="col">Commission</th>
                        <th class="text-ce nter" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($order_details) && !empty($order_details) && count($order_details) > 0)
                    @foreach ($order_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->id }}</td>
                        <td>{{ $order_detail->order_number }}</td>
                        <td class="text-center">{{ $order_detail->quantity }}</td>
                        <td class="text-center">{{ $order_detail->currency }}
                            {{ $order_detail->unit_price }}</td>

                        <td class="text-center">{{ $order_detail->plant->name }}</td>
                        <td class="text-center">{{ $order_detail->total_amount }}</td>
                        <td class="text-center">{!! $order_detail->transaction_hash != null ? '<a target="_blank" title="'.$order_detail->transaction_hash.'" data-value="'.$order_detail->transaction_hash.'" onclick="copyText(this)" href="'.env("EHTERSCAN_URL").$order_detail->transaction_hash.'">'.substr($order_detail->transaction_hash,0,8).'...</a>' : '-' !!}</td>
                        <td class="text-center">
                            {{ $order_detail->is_completed == 1 ? 'Payment completed' : 'Payment Pending' }}
                        </td>
                        <td>
                            {{ ($order_detail->affiliateCommission != null && $order_detail->affiliateCommission->userDetail != null) ? $order_detail->affiliateCommission->userDetail->name : '-'}}
                        </td>
                        <td>
                            {{ $order_detail->affiliateCommission != null ? $order_detail->currency.' '.rtrim(rtrim(sprintf("%.18f",$order_detail->affiliateCommission->commission_amount),"0"),".") : '-'}}
                        </td>
                        <td class="text-center">

                                <!--<a  type="button" wire:click="orderIds({{ $order_detail->id }})" class="generate_hash"><i-->
                            <!--class="fa fa-eye" aria-hidden="true"></i></a>-->
                            @if($order_detail->is_completed == 1 && $order_detail->transaction_hash == null)                
                            <a title="Transfer to master wallet" type="button" wire:click="transferPayment('{{ $order_detail->id }}')" class="transfer_payment"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    @endif


                </tbody>
            </table>
            {{ $order_details->links() }}

        </div>
    </div>

</div>



<div wire:ignore.self class="modal" id="admin-transfer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Transfer to Master Wallet</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>
            <form>
                @csrf
                <div class="modal-body">

                    <div class="form-group content mb-0">
                        <!--<label>-->
                            <h4>Current Gas Price : <span id="current-gas-price"></span></h4>
                            <h5>Will be refreshing in <strong id="refreshing_at">10</strong> seconds</h5>
                            <input type="hidden" value="" id="current_gas_price"/>
                            <hr/>
                            <h5>No. of Orders Remaining to Transfer : <span>{{$remainingOrdersToTransfer}}</span></h5>
                        <!--</label>-->
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" onclick="transferToMasterWallet()" class="btn btn-primary">Transfer</button>

                </div>
            </form>
        </div>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.1/web3.min.js"></script>
<script type="text/javascript">
window.copyText = function (that) {
    navigator.clipboard.writeText($(that).data('value'));
    $(that).tooltip('hide')
            .attr('data-original-title', 'Copied')
            .tooltip('show');

    setTimeout(function () {
        $(that).tooltip('hide')
                .tooltip('hide');
    }, 2000);
}

var gasPriceInterval = null;
var timer = null;
var web3 = new Web3();
var i = 10;

window.showTransferModal = function () {
    $("#refreshing_at").text('10');
    clearInterval(timer);
    getGasPrice($("#current-gas-price"));
    setTimer(10);
    gasPriceInterval = setInterval(function () {
//        clearInterval(timer);
//        setTimer(10);
        getGasPrice($("#current-gas-price"));
        ;
    }, 11000);
    $("#admin-transfer-modal").modal('show');
}

window.setTimer = function (i) {
    timer = setInterval(function () {
        console.log(i);
        $("#refreshing_at").text(i);
        i--;
        if (i < 0) {
            i = 10;
        }
    }, 1000);
}

window.getGasPrice = function (id) {

    web3.setProvider('https://rinkeby.infura.io/v3/162f2b69e8eb48a2bcd15dca05a3b996');
    web3.eth.getGasPrice()
            .then(result => {
                console.log(result);
                id.text(result);
                $("#admin-transfer-modal").find("#current_gas_price").val(result);
            });
}


$("#admin-transfer-modal").on('hide.bs.modal', function () {
    clearInterval(timer);
    clearInterval(gasPriceInterval);
});
window.transferToMasterWallet = function () {
    if(confirm("Are you sure to transfer?")){
        $.ajax({
            url: '{{url("/admin/order/transfer-admin-wallet")}}',
            method: "post",
            data: {
                gas_price : $("#admin-transfer-modal").find("#current_gas_price").val(),
                _token: $("input[name=_token]").val()
            },
            success: function (result) {
                console.log(result);
                if (result.type == 'success') {
                    toastr['success']('Transfers Queueued. It will take some to credit onto master wallet.','Transfer Queued');
                    $("#admin-transfer-modal").modal('hide');
                }else{
                    alert('Server Error');
                }
            },
            error: function (XMLHttpRequest, textStatus, error) {
                console.log(XMLHttpRequest)
                alert(XMLHttpRequest.responseJSON.msg);
            }
        });
    }
}
</script>

