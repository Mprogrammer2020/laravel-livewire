
@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								{{$edit ? 'Edit' : 'Create'}} Video</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Add Video</a>  
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
			<label class="label-required">Lesson</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
           <select wire:model.defer="course_id"  class="form-control @error('course_id') is-invalid @enderror">
		   <option value="">Select a lesson</option>
		   @foreach($courses as $course)
				<option value="{{$course->id}}">{{$course->name}}</option>
		   @endforeach
		   </select>
			@error('course_id')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
	</div>
	    <div class="form-group col-lg-6">
			<label class="label-required">Name</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="Video name *" autocomplete="off">
			@error('name')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-12">
			<label>Description</label>
            <textarea  wire:model.defer="description" class="form-control @error('description') is-invalid @enderror" placeholder="Video description" autocomplete="off"></textarea>
			@error('description')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
         <div class="form-group col-lg-6">
			<label class="label-required">Video (URL)</label>
			<!-- <input type="text" class="form-control" placeholder="Enter category name" name="name"> -->
            <input type="text" wire:model.defer="video_link" class="form-control @error('video_link') is-invalid @enderror" placeholder="Ex. https://player.vimeo.com/video/489074213" autocomplete="off">
			@error('video_link')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="form-group col-lg-6">
			<label class="label-required">Video Thumbnail Image</label>
			<input type="file"  wire:model.defer="video_thumbnail_image" class="form-control @error('video_thumbnail_image') is-invalid @enderror" accept="image/*">
			{{-- <span class="form-text text-muted">We recommend to use a 328 x 150 pixels resolution.</span> --}}
			@error('video_thumbnail_image')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			@if(!is_string($video_thumbnail_image))
			<span style="display: block;" class="mt-2">Photo Preview:</span>	
			<img src="{{ $video_thumbnail_image->temporaryUrl() }}" width="100" height="100">
			@elseif(is_string($video_thumbnail_image) && $video_thumbnail_image!="")
			<span style="display: block;" class="mt-2">Photo Preview:</span>	
			<img src="/uploads/{{ $video_thumbnail_image }}" width="100" height="100">
			@endif
		</div>
		

</div>
<br>
<div class="kt-portlet__foot">
	<div class="kt-form__actions">
		<div class="row">
			<div class="col-lg-6">
				<button  class="btn btn-primary" wire:loading.attr="disabled" wire:click="saveOrUpdate">{{$edit ? 'Update' : 'Save'}}</button>
				<a href="{{route('education.video.list')}}" class="btn btn-secondary">Cancel</a>
			</div>
			<div class="col-lg-6 kt-align-right">
				<!-- <button type="reset" class="btn btn-danger">Delete</button> -->
			</div>
		</div>
	</div>
</div>

		

		<!--end::Form-->
	</div>
