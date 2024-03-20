
@extends('layouts.admin_root')

@section('title',"Post List")


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
									Post List</a>  
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
		<div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable table-striped" id="post_table_id">
                <thead>
                    <tr>
                        <th style="width: 30%;">Title</th>
                        <th style="width: 15%;">Posted By</th>
                        <th>Created At</th>
                        <th class="align-center" style="width: 12%;">Action</th>
                        <!-- <th class="align-center" style="width: 5%;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <!-- <td class="align-center"> 
                                          <span class="badge badge-success">Active</span>
                                          <span class="badge badge-danger">Inactive</span>
                                        </td> -->
                            <td class="align-center">
                                <span class="dropdown">
                                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"
                                        aria-expanded="true">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- <a class="dropdown-item" href="{{ route('posts.edit',$post->id) }}"><i class="la la-edit"></i> Edit</a> --}}
                                        <a class="dropdown-item" href="{{ route('posts.view',['id'=>$post->id]) }}"><i class="la la-eye"></i> View Post</a>
                                        <a class="del_ dropdown-item" href="{{route('posts.destroy', $post->id)}}" data-toggle="modal" data-target="#delete_confirm_modal"><i class="la la-trash"></i> Delete</a>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    @if (count($posts) == 0)
                        <tr>
                            <td colspan="5" class="align-center">No records available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!--end: Datatable -->
            <div>
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>
	</div>
@endsection

@push('script-plugins')
@endpush

@push('scripts')
<script>
    $('#post_table_id').on('click', '.del_' ,function(e){
        e.preventDefault();
        console.log($(this).attr('href'));
        $('#delete_confirm_form').attr('action',$(this).attr('href'));
    });
</script>
@endpush
