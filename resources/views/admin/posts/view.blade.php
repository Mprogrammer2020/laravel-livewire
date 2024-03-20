
@extends('layouts.admin_root')

@section('title',"Post View")


@push('css-plugins')
@endpush

@push('css-styles')
@endpush

@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								 Post Details of {{$post->user->name}}</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Post Data</a>  
								</div>
							</div>

							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left">
									<a href="{{route('posts.index')}}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-angle-left"></i>
													Back
												</a>
									</div>
								</div>
							</div>

						</div>

						<!-- end:: Subheader -->

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--mobile" >
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                {{ $post->title }}
                    <!-- <small>portlet sub title</small> -->
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered table-head-solid">
                            <tbody>
                                <tr>
                                    <th>Posted by</th>
                                    <td>{{ $post->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $post->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $post->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Post Details</th>
                                    <td>{{ $post->description }}</td>
                                </tr>
                                <tr>
                                    <th>Created</th>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="kt-portlet kt-portlet--mobile" >
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                    Photo
                        <!-- <small>portlet sub title</small> -->
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <img src="{{$post->image}}" width="300" alt="" class="ml-7">
            </div>
        </div>
    </div>

    <div class="col-md-12">
	    <div class="kt-portlet kt-portlet--mobile" >
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">Comments</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="row">
                                    <div class="col-12">
                        <div id="message"></div>
					<div class="table-responsive">
						<table class="table table-bordered table-head-solid">
							<thead>
								<tr>
								<th style="width: 15%">Name</th>
								<th style="width: 20%">Email</th>
								<th style="width: 50%">Comment</th>
								<th>Created</th>
                                                                <th>Action</th>
								</tr>
								</thead>
								<tbody>
                                
                                    @forelse($post->comments as $commentItem)
                                    
                                    <tr id="comment-delete-{{$commentItem->id}}">
                                         <td class="ta-c">{{ $commentItem->user->name }}</td> 
                                         <td class="ta-c">{{ $commentItem->user->email }}</td>
                                        <td class="ta-c">{{ $commentItem->comment }}</td>
                                        <td class="ta-c">{{ $commentItem->created_at->diffForHumans()  }}</td>
                                        <td class="ta-c">
                                            <span class="dropdown">
                                                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 27px, 0px);">
														 														<a href="#" class="dropdown-item" onclick="showCommentDeleteConfirm('{{$commentItem->id}}')"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="align-center">No records available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                                    </div>
                </div>
            </div>
	    </div>
    </div>
       
</div>
 <div class="modal fade" id="comment_delete_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    You will not be able to recover this record!
                    <input type="hidden" id="item_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="deleteCommentConfirm()" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-plugins')
@endpush

@push('scripts')
   
    <script>
        window.showCommentDeleteConfirm = function(id){
            $("#comment_delete_confirm_modal").find("#item_id").val(id);
            $("#comment_delete_confirm_modal").modal('show');
        }
        
        //delete the comments
        window.deleteCommentConfirm = function(){
            var id = $("#comment_delete_confirm_modal").find("#item_id").val();
             $.ajax({
                            url: '{{url("/admin/comment-delete/")}}/'+id,
                            method: 'post',
                            data: {
                                _token: '{{csrf_token()}}'
                            },
                            success: function(result) {
                                if(result.status){
                                    $("#comment-delete-"+id).remove();
                                    $("#message").html('<div class = "alert alert-success">Deleted Successfully</div>')
                                }else{
                                    $("#message").html('<div class = "alert alert-danger">Something went wrong</div>')
                                }
                            }
                        });
        }
    </script>
@endpush
