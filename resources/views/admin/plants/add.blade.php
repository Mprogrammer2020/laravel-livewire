
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
								 Plant</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Add Plant Data</a>
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
		<!-- <div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
					Create Admin User
				</h3>
			</div>
		</div> -->

		<!--begin::Form-->
        @if(session('message'))
            <div class = "alert alert-success">
                 {{session('message')}}
             </div>
        @endif
        <form method="post" action="{{route('cms.updateuserdashboard')}}" enctype="multipart/form-data">
        @csrf

<div class="kt-portlet__body">
	<div class="form-group validated row">

		<div class="form-group col-lg-6">
			<label class="label-required">Header Title</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text"  class="form-control @error('header_title') is-invalid @enderror" name="header_title" placeholder="Header Title *">
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Description</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description *" ></textarea>
		</div>
		<div class="form-group col-lg-12">
			<label>Video</label>
            <input type="text" name="video_link" class="form-control @error('video_link') is-invalid @enderror" placeholder="Video Link">
		</div>
        <input type="hidden" name="cms_page_id" value="1">

</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" name="update">Save</button>
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
    @endsection

@push('script-plugins')
@endpush

@push('scripts')
@endpush
