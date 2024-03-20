
@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								{{$edit ? 'Edit' : 'Create'}} Strain Base</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Add Strain Base</a>  
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
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Strain Base Name *" autocomplete="off">
			@error('name')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Short Description</label>
            <textarea  wire:model="short_description" class="form-control @error('short_description') is-invalid @enderror" placeholder="Short Description" autocomplete="off"></textarea>
			@error('short_description')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Origin</label>
            <textarea  wire:model="origin" class="form-control @error('origin') is-invalid @enderror" placeholder="Origin" autocomplete="off"></textarea>
			@error('origin')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Effects of use</label>
            <textarea  wire:model="effects_of_use" class="form-control @error('effects_of_use') is-invalid @enderror" placeholder="Effects of use" autocomplete="off"></textarea>
			@error('effects_of_use')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Plant Description</label>
            <textarea  wire:model="plant_description" class="form-control @error('plant_description') is-invalid @enderror" placeholder="Plant description" autocomplete="off"></textarea>
			@error('plant_description')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Recommended Timings</label>
            <textarea  wire:model="recommended_timings" class="form-control @error('recommended_timings') is-invalid @enderror" placeholder="Recommended timings" autocomplete="off"></textarea>
			@error('recommended_timings')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>CBD to THC ratio</label>
            <textarea  wire:model="cbd_to_thc_ratio" class="form-control @error('cbd_to_thc_ratio') is-invalid @enderror" placeholder="CBD to THC ratio" autocomplete="off"></textarea>
			@error('cbd_to_thc_ratio')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label>Popular strains</label>
            <textarea  wire:model="popular_strains" class="form-control @error('popular_strains') is-invalid @enderror" placeholder="Popular strains" autocomplete="off"></textarea>
			@error('popular_strains')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Image</label>
			<input type="file"  wire:model="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
			<span class="form-text text-muted">We recommend to use a 375 x 286 pixels resolution.</span>
			@error('image')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			@if(!is_string($image))
			<span style="display: block;" class="mt-2">Photo Preview:</span>	
			<img src="{{ $image->temporaryUrl() }}" width="100" height="100">
			@elseif(is_string($image) && $image!="")
			<span style="display: block;" class="mt-2">Photo Preview:</span>	
			<img src="/uploads/{{ $image }}" width="100" height="100">
			@endif
		</div>
		

</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" wire:loading.attr="disabled" wire:click="saveOrUpdate">{{$edit ? 'Update' : 'Save'}}</button>
				<a href="{{route('strain.base.list')}}" class="btn btn-secondary">Cancel</a>
			</div>
			<div class="col-lg-6 kt-align-right">
				<!-- <button type="reset" class="btn btn-danger">Delete</button> -->
			</div>
		</div>
	</div>
</div>

		

		<!--end::Form-->
	</div>
