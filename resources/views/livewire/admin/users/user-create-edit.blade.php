
@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								{{$edit ? 'Edit' : 'Create'}} User</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									User</a>  
								</div>
							</div>
							<!-- <div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left">
									<a href="{{route('strain.base.create.edit')}}" class="btn btn-brand btn-elevate btn-icon-sm">
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
	<div class="form-group validated row">

	<div class="form-group col-lg-6">
			<label class="label-required">Name</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name here *" autocomplete="off">
			@error('name')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label class="label-required">Email</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email here *" autocomplete="off">
			@error('email')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label>Street</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="street" class="form-control @error('Street') is-invalid @enderror" placeholder="Enter street address here" autocomplete="off">
			@error('Street')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label>House Number</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="house_number" class="form-control @error('house_number') is-invalid @enderror" placeholder="Enter house number here" autocomplete="off">
			@error('house_number')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Address</label>
            <textarea  wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address here" autocomplete="off"></textarea>
			@error('address')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
          <div class="form-group col-lg-6">
			<label>Zip Code</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="zip_code" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Enter zip code here" autocomplete="off">
			@error('zip_code')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
          <div class="form-group col-lg-6">
			<label>City</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="city" class="form-control @error('city') is-invalid @enderror" placeholder="Enter city here" autocomplete="off">
			@error('city')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
          <div class="form-group col-lg-6">
			<label>Country</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="country" class="form-control @error('country') is-invalid @enderror" placeholder="Enter country name here" autocomplete="off">
			@error('country')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

         <div class="form-group col-lg-6">
			<label>State</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="state" class="form-control @error('state') is-invalid @enderror" placeholder="Enter state name here" autocomplete="off">
			@error('state')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
          <div class="form-group col-lg-6">
			<label>Harvest Progress(%)</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="harvest_progress" class="form-control @error('harvest_progress') is-invalid @enderror" placeholder="Enter harvest progress here" autocomplete="off">
			@error('harvest_progress')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" wire:loading.attr="disabled" wire:click="saveOrUpdate">{{$edit ? 'Update' : 'Save'}}</button>
				<a href="{{route('user.list',['role'=>'USER'])}}" class="btn btn-secondary">Cancel</a>
			</div>
			<div class="col-lg-6 kt-align-right">
				<!-- <button type="reset" class="btn btn-danger">Delete</button> -->
			</div>
		</div>
	</div>
</div>

		

		<!--end::Form-->
	</div>
