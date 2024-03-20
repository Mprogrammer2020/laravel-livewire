
@extends('layouts.admin_root')

@section('title',"Post Edit")


@push('css-plugins')
@endpush

@push('css-styles')
@endpush

@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								 Posts</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Update Post Data</a>  
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
        {{Form::model($post,['route'=>['posts.update',$post->id],'class'=>'kt-form parsley-validate','method'=>'PATCH', 'files'=>true])}}
		<div class="kt-portlet__body">
	<div class="form-group validated row">

        <div class="form-group col-lg-6">
			<label class="label-required">Title</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" placeholder="Title *" autocomplete="off">
			@error('tracking_title')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Description</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Step 1 *" autocomplete="off" rows="5">{{$post->description}}</textarea>
			@error('description')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="form-group col-lg-6">
			<label class="label-required">Image</label>
			<input type="file" name="image" id="">
			@error('image')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
        <div class="col-lg-6 form-group">
            <label class="">Image Preview</label>
            <img src="{{$post->image}}" width="100" height="100">
        </div>
        <!-- <div class="media">
            <label class="">Video Preview</label>
            <div class="media-body">
                <iframe width="300" height="220" frameborder="0" allow="autoplay;" allowfullscreen src = "{{$post->video_link}}"></iframe>
            </div>
        </div> -->
		

</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" name="update">Update</button>
                <a class="btn btn-secondary" href="{{route('posts.index')}}">Cancel</a>
			</div>
			<div class="col-lg-6 kt-align-right">
				<!-- <button class="btn btn-danger">Cancel</button> -->
			</div>
		</div>
	</div>
</div>

{{Form::close()}}
		<!--end::Form-->
	</div>
@endsection

@push('script-plugins')
@endpush

@push('scripts')
@endpush
