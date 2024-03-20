@section('sub-header')
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                {{ $edit ? 'Edit' : 'Create' }} Plant</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-home"><i
                        class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    Dashboard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Add Plant</a>
            </div>
        </div>
        <!-- <div class="kt-subheader__toolbar">
                                                                                                                                                                                    <div class="kt-subheader__wrapper">
                                                                                                                                                                                     <div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left">
                                                                                                                                                                                     <a href="{{ route('strain.base.create.edit') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                                                                                                                                                                         <i class="la la-plus"></i>
                                                                                                                                                                                         Add New Strain Base
                                                                                                                                                                                        </a>
                                                                                                                                                                                     </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                   </div> -->
    </div>

    <!-- end:: Subheader -->

@endsection

<div class="kt-portlet kt-portlet--mobile">
    <!-- <div class="kt-portlet__head kt-portlet__head--lg">
   <div class="kt-portlet__head-label">
    <h3 class="kt-portlet__head-title">
     Create Admin User
    </h3>
   </div>
  </div> -->

    <!--begin::Form-->
    <div class="kt-portlet__body">
        <form wire:submit.prevent="saveOrUpdate">
            <div class="form-group validated row">
                <div class="form-group col-lg-6">
                    <label class="label-required">Name</label>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Plant Name *" autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group col-lg-3">
                    <label class="label-required">BTC Price</label> --}}
                    <input type="hidden" min="0.000000000000000001" step="0.000000000000000001" wire:model="price" class="form-control @error('price') is-invalid @enderror"
                        placeholder="BTC Price *" autocomplete="off">
                    {{-- @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                  <div class="form-group col-lg-6">
                    <label class="label-required">ETH Price</label>
                    <input type="number" min="0.000000000000000001" step="0.000000000000000001" wire:model="eth_price" class="form-control @error('eth_price') is-invalid @enderror"
                        placeholder="ETH price *" autocomplete="off">
                    @error('eth_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- @vikas --}}
                <div class="form-group col-lg-6">
                    <label class="label-required">Harvest per year</label>
                    <input type="number" wire:model="harvest_per_year" class="form-control @error('harvest_per_year') is-invalid @enderror"
                        placeholder="Harvest per year *" autocomplete="off">
                    @error('harvest_per_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Revenue</label>
                    <input type="text" wire:model="revenue" class="form-control @error('revenue') is-invalid @enderror"
                        placeholder="Revenue *" autocomplete="off">
                    @error('revenue')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Quantity @if($edit) (Qty Sold : <span>{{ $orderedQty }}</span>)@endif </label>
                    <input type="text" wire:model="quantity" class="form-control @error('quantity') is-invalid @enderror"
                        placeholder="Quantity *" autocomplete="off">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Sell price</label>
                    <input type="text" wire:model="sell_price" class="form-control @error('sell_price') is-invalid @enderror"
                        placeholder="Sell price *" autocomplete="off">
                    @error('sell_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">THC (%) </label>
                    <input type="number" min="0" max="100" wire:model="thc" class="form-control @error('thc') is-invalid @enderror"
                        placeholder="THC *" autocomplete="off">
                    @error('thc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">CBD (%)</label>
                    <input type="number" min="0" max="100" wire:model="cbd" class="form-control @error('cbd') is-invalid @enderror"
                        placeholder="CBD *" autocomplete="off">
                    @error('cbd')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Revenue/Harvest </label>
                    <input type="text" wire:model="revenue_per_harvest" class="form-control @error('revenue_per_harvest') is-invalid @enderror"
                        placeholder="Revenue/Harvest *" autocomplete="off">
                    @error('revenue_per_harvest')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Annual Return (%)</label>
                    <input type="number" min="0" max="1000" wire:model="annual_return" class="form-control @error('annual_return') is-invalid @enderror"
                        placeholder="Annual Return *" autocomplete="off">
                    @error('annual_return')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Start date</label>
                    <input type="date" wire:model="start_date" class="form-control @error('start_date') is-invalid @enderror"
                        placeholder="Start date *" autocomplete="off">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                 <div class="form-group col-lg-6">
                    <label class="label-required">End date</label>
                    <input type="date" wire:model="end_date" class="form-control @error('end_date') is-invalid @enderror"
                        placeholder="End date *" autocomplete="off">
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- @endvikas --}}

                <div class="form-group col-lg-12">
                    <label class="label-required">Description</label>
                    <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description" autocomplete="off"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Feature 1</label>
                    <textarea wire:model="feature1" class="form-control @error('feature1') is-invalid @enderror"
                        placeholder="Description" autocomplete="off"></textarea>
                    @error('feature1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Feature 2</label>
                    <textarea wire:model="feature2" class="form-control @error('feature2') is-invalid @enderror"
                        placeholder="Description" autocomplete="off"></textarea>
                    @error('feature2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Feature 3</label>
                    <textarea wire:model="feature3" class="form-control @error('feature3') is-invalid @enderror"
                        placeholder="Description" autocomplete="off"></textarea>
                    @error('feature3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Benefit 1</label>
                    <textarea wire:model="benefit1" class="form-control @error('benefit1') is-invalid @enderror"
                        placeholder="benefit1" autocomplete="off"></textarea>
                    @error('benefit1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Benefit 2</label>
                    <textarea wire:model="benefit2" class="form-control @error('benefit2') is-invalid @enderror"
                        placeholder="Benefit 2" autocomplete="off"></textarea>
                    @error('benefit2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Benefit 3</label>
                    <textarea wire:model="benefit3" class="form-control @error('benefit3') is-invalid @enderror"
                        placeholder="Benefit 3" autocomplete="off"></textarea>
                    @error('benefit3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Earn cash text 1</label>
                    <textarea wire:model="earn_cash_text1"
                        class="form-control @error('earn_cash_text1') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('earn_cash_text1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Earn cash text 2</label>
                    <textarea wire:model="earn_cash_text2"
                        class="form-control @error('earn_cash_text2') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('earn_cash_text2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Earn cash text 3</label>
                    <textarea wire:model="earn_cash_text3"
                        class="form-control @error('earn_cash_text3') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('earn_cash_text3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-lg-6">
                    <label class="label-required">What you get text 1</label>
                    <textarea wire:model="what_you_get_text1"
                        class="form-control @error('what_you_get_text1') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('what_you_get_text1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>What you get text 2</label>
                    <textarea wire:model="what_you_get_text2"
                        class="form-control @error('what_you_get_text2') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('what_you_get_text2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>What you get text 3</label>
                    <textarea wire:model="what_you_get_text3"
                        class="form-control @error('what_you_get_text3') is-invalid @enderror" placeholder="Benefit 3"
                        autocomplete="off"></textarea>
                    @error('what_you_get_text3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label class="label-required">Image(Default)</label>
                    <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                        accept="image/*">
                    <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if (!is_string($image))
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="{{ $image->temporaryUrl() }}" width="100" height="100">
                    @elseif(is_string($image) && $image!="")
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="/uploads/{{ $image }}" width="100" height="100">
                    @endif
                </div>



                <div class="form-group col-lg-6">
                    <label class="label">Image 1</label>
                    <input type="file" wire:model="image1" class="form-control @error('image1') is-invalid @enderror"
                        accept="image/*">
                    <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span>
                    @error('image1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div style="position: relative">
                    @if (!is_string($image1) && $image1 != null && $image != "")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image1')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        
                        <img src="{{ $image1->temporaryUrl() }}" width="100" height="100">
                        
                    @elseif(is_string($image1) && $image1!="")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image1')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="/uploads/{{ $image1 }}" width="100" height="100">
                    @endif
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="label">Image 2</label>
                    <input type="file" wire:model="image2" class="form-control @error('image2') is-invalid @enderror"
                        accept="image/*">
                    <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span>
                    @error('image2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                     <div style="position: relative">
                    @if (!is_string($image2) && $image2 != "")
                     <i class="fa fa-times cross-icon" wire:click="clearImage('image2')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="{{ $image2->temporaryUrl() }}" width="100" height="100">
                    @elseif(is_string($image2) && $image2!="")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image2')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="/uploads/{{ $image2 }}" width="100" height="100">
                    @endif
                     </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="label">Image 3</label>
                    <input type="file" wire:model="image3" class="form-control @error('image3') is-invalid @enderror"
                        accept="image/*">
                    <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span>
                    @error('image3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                     <div style="position: relative">
                    @if (!is_string($image3) && $image3 != "")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image3')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="{{ $image3->temporaryUrl() }}" width="100" height="100">
                    @elseif(is_string($image3) && $image3!="")
                     <i class="fa fa-times cross-icon" wire:click="clearImage('image3')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="/uploads/{{ $image3 }}" width="100" height="100">
                    @endif
                     </div>
                </div>

                <div class="form-group col-lg-6">
                    <label class="label">Image 4</label>
                    <input type="file" wire:model="image4" class="form-control @error('image4') is-invalid @enderror"
                        accept="image/*">
                    <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span>
                    @error('image4')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                     <div style="position: relative">
                    @if (!is_string($image4) && $image4 != "")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image4')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="{{ $image4->temporaryUrl() }}" width="100" height="100">
                    @elseif(is_string($image4) && $image4!="")
                        <i class="fa fa-times cross-icon" wire:click="clearImage('image4')" aria-hidden="true"></i>
                        <span style="display: block;" class="mt-2">Photo Preview:</span>
                        <img src="/uploads/{{ $image4 }}" width="100" height="100">
                    @endif
                     </div>
                </div>



            </div>
            <br>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary" wire:loading>Please Wait..</button>
                            <button class="btn btn-primary"
                                wire:loading.remove>{{ $edit ? 'Update' : 'Save' }}</button>
                            <a href="{{ route('plant.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <!-- <button type="reset" class="btn btn-danger">Delete</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!--end::Form-->
    </div>
