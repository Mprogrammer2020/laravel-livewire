
@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								{{$edit ? 'Edit' : 'Create'}} Meta Data</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Add Meta Data</a>  
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
			<label class="label-required">Page Name</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="name" disabled class="form-control @error('name') is-invalid @enderror" placeholder="PageName *" autocomplete="off">
			@error('name')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Title</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title *" autocomplete="off">
			@error('title')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-12">
			<label>Meta Keywords</label>
            <textarea  wire:model="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" placeholder="Meta keywords" autocomplete="off"></textarea>
			@error('meta_keywords')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-12">
			<label>Meta Description</label>
            <textarea  wire:model="meta_description" class="form-control @error('description') is-invalid @enderror" placeholder="Meta Description" autocomplete="off"></textarea>
			@error('description')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" wire:click="saveOrUpdate">{{$edit ? 'Update' : 'Save'}}</button>
				<a href="{{route('meta.data.list')}}" class="btn btn-secondary">Cancel</a>
			</div>
			<div class="col-lg-6 kt-align-right">
				<!-- <button type="reset" class="btn btn-danger">Delete</button> -->
			</div>
		</div>
	</div>
</div>

		

		<!--end::Form-->
	</div>
