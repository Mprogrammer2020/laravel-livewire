<div>

    @section('sub-header')
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Affiliate Commissions</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-home"><i
                        class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    Dashboard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Affiliate Commission List </a>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" data-placement="left">
                    <a href="javascript:;" id="show-commission-modal" data-value="{{$commissionPercentage}}" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#admin-commission-modal">
                        <i class="la la-edit"></i>
                        Change Commission (<span id="head-com-per">{{$commissionPercentage}}</span>%)
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
                        <th scope="col">Order Number</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Affiliate</th>
                        <th scope="col">Referrer</th>
                        <th scope="col">Commission Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($affiliateCommissions) && !empty($affiliateCommissions) && count($affiliateCommissions) > 0)
                    @foreach ($affiliateCommissions as $affiliateCommission)
                    <tr>
                        <td>{{ $affiliateCommission->orderDetail != null ? $affiliateCommission->orderDetail->order_number:'' }}</td>
                        <td>{{ $affiliateCommission->orderDetail != null ? $affiliateCommission->orderDetail->quantity:'' }}</td>
                        <td>{{ $affiliateCommission->orderDetail != null ? ($affiliateCommission->orderDetail->currency.' '.$affiliateCommission->orderDetail->total_amount) :'' }}</td>
                        <td>{{ ($affiliateCommission->orderDetail != null && $affiliateCommission->orderDetail->userDetail != null) ? $affiliateCommission->orderDetail->userDetail->name : '' }}</td>
                        <td>{{ $affiliateCommission->userDetail != null ? $affiliateCommission->userDetail->name:'' }}</td>
                        <td>{{$affiliateCommission->orderDetail != null ? $affiliateCommission->orderDetail->currency : ''}} {{ rtrim(rtrim(sprintf("%.18f",$affiliateCommission->commission_amount),"0"),".") }} </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" align="center">No Data</td>
                    </tr>
                    @endif


                </tbody>
            </table>
            {{ $affiliateCommissions->links() }}

        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="admin-commission-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Change Commission value</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>
                <form wire:submit.prevent="updateCommissionValue">
                    <div class="modal-body">

                        <div class="form-group">

                            <label for="commission_value">Commission Value (%)</label>

                            <input type="number" class="form-control @error('commission_value') is-invalid @enderror" wire:model="commission_value" id="commission_value" placeholder="Commission Value" min="0.1" step="0.05" max="100" required>

                            @error('commission_value') <span class="invalid-feedback">{{ $message }}</span>@enderror

                        </div>
                        <div class="form-group">
                            <h5>Current Commission Value : <i class="text-success"><span id="modal-current-commission">{{$commissionPercentage}}</span>%</i></h4>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button class="btn btn-primary">Update</button>

                    </div>
                </form>
            </div>

        </div>

    </div>

</div>     
<script>
    window.addEventListener('valueUpdated', event => {
        $("#head-com-per").text(event.detail.commission_value);
        $("#admin-commission-modal").find('#commission_value').val('');
        $("#admin-commission-modal").modal('hide');
    })
</script>