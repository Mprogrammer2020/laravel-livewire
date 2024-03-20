
@extends('layouts.admin_root')

@section('title',"Affiliated Center")


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
									Update Affiliated Center Data</a>  
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
        <form method="post" action="{{route('cms.affiliated.center.update', ['id'=>$affiliatedCenter->id])}}" enctype="multipart/form-data">
        @csrf
		<div class="kt-portlet__body">
	<div class="form-group validated row">

		<div class="form-group col-lg-6">
			<label class="label-required">Video Link</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text"  class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{$affiliatedCenter->video_link}}" placeholder="Video Link *" autocomplete="off">
			@error('video_link')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Step 1 Content</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <textarea name="step1_content" class="form-control @error('step1_content') is-invalid @enderror" placeholder="Step 1 *" autocomplete="off" rows="5">{{$affiliatedCenter->step1_content}}</textarea>
			@error('step1_content')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label class="label-required">Step 2 Content</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <textarea name="step2_content" class="form-control @error('step2_content') is-invalid @enderror" placeholder="Step 2 *" autocomplete="off" rows="5">{{$affiliatedCenter->step2_content}}</textarea>
			@error('step2_content')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label class="label-required">Step 3 Content</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <textarea name="step3_content" class="form-control @error('step3_content') is-invalid @enderror" placeholder="Step 3 *" autocomplete="off" rows="5">{{$affiliatedCenter->step3_content}}</textarea>
			@error('step3_content')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label class="label-required">Video Image</label>
			<input type="file" name="video_thumbnail_image" id="">
			@error('video_thumbnail_image')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="col-lg-6 form-group">
            <label class="">Video Image Preview</label>
            <img src="{{ asset($affiliatedCenter->video_thumbnail_image) }}" width="100" height="100">
        </div>
        <!-- <div class="media">
            <label class="">Video Preview</label>
            <div class="media-body">
                <iframe width="300" height="220" frameborder="0" allow="autoplay;" allowfullscreen src = "{{$affiliatedCenter->video_link}}"></iframe>
            </div>
        </div> -->
		

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
</form>
		<!--end::Form-->
	</div>
@endsection

@push('script-plugins')
@endpush

@push('scripts')
@endpush
