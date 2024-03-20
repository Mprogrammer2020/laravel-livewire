
@extends('layouts.admin_root')

@section('title',"User Dashboard")


@push('css-plugins')
@endpush

@push('css-styles')
@endpush

@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								 CMS</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Home Page Content</a>
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
@section('content')
<div class="kt-portlet kt-portlet--mobile">

		<!--begin::Form-->
        <form method="post" action="{{route('cms.updateCmsUserdashboard')}}" enctype="multipart/form-data">
        @csrf


		<div class="kt-portlet__body">
		  @if(session('message'))
            <div class = "alert alert-success mb-4">
                 {{session('message')}}
             </div>
        @endif
		  @if(session('error'))
            <div class = "alert alert-danger mb-4">
                 {{session('error')}}
             </div>
        @endif
        <input type="hidden" id="page_type" name="page_type" value="HOME-PAGE"/>
			<div class="form-group validated row">

				<div class="form-group col-lg-6">
					<label class="label-required">Header Title</label>
					<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
					<input type="text"  class="form-control @error('header_title') is-invalid @enderror" name="header_title" value="{{$homePageDetail->header_title}}" placeholder="Header Title *" autocomplete="off">

				</div>
				<div class="form-group col-lg-6">
					<label class="label-required">Description</label>
					<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
					<textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description *" autocomplete="off" rows="5">{{$homePageDetail->description}}</textarea>

				</div>
				<div class="form-group col-lg-6">
					<label>Description Step 1</label>
					<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
					<textarea name="description_step_1" class="form-control @error('description_step_1') is-invalid @enderror" placeholder="Description step one" autocomplete="off" rows="5">{{$homePageDetail->description_step_1}}</textarea>

				</div>

			</div>
	<br>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-lg-6">
						<button  class="btn btn-primary" name="update">Update</button>
					</div>
					<div class="col-lg-6 kt-align-right">
						<!-- <button type="reset" class="btn btn-danger">Delete</button> -->
					</div>
				</div>
			</div>
		</div>
</div>

</form>
		<!--end::Form-->
	</div>
@endsection

@push('script-plugins')
@endpush

@push('scripts')
@endpush
