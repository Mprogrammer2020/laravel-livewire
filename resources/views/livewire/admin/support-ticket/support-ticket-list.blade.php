<div>

<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								Tickets</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="#" class="kt-subheader__breadcrumbs-link" >
									Tickets </a> 
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									{{-- <div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left" >
									<a href="#" class="btn btn-info btn-elevate btn-icon-sm" wire:click="exportToExcel">
													<i class="la la-download"></i>
													Export to Excel
									</a>
									</div> --}}
								</div>
							</div>
</div>
						<!-- end:: Subheader -->


<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
										<div class="row align-items-center">
											<div class="col-xl-8 order-2 order-xl-1">
												<div class="row align-items-center">
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<div class="kt-input-icon kt-input-icon--left">
															<input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search..." id="generalSearch">
															<span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
														</div>
													</div>
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
													</div>
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
													</div>
												</div>
											</div>
										</div>
									</div>
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable table-striped" >
        <thead>
                                <tr>
                                    <th style="width: 15%;">Subject <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('subject')"></i></th>
                                    <th style="width: 10%;">Issue Category</th>
                                    <th style="width: 45%;">Description <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('description')"></i></th>
                                    <th style="width: 10%;">Created by</th>
                                    <th style="width: 10%;">Created At</th>
                                    <th style="width: 10%;" class="align-center">Status</th>
                                    <th class="align-center" style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->subject}}</td>
                                    <td>{{$ticket->issueCategory->name}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td>{{$ticket->user->name}}</td>
                                    <td>{{$ticket->created_at->format('d-m-Y h:i A')}}</td>
                                    <td class="@if($ticket->status=='Pending')text-danger @else text-success @endif font-weight-bold align-center">{{$ticket->status}}</td>
                                    <td class="align-center">
                                                    <span class="dropdown">
                                                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item" data-toggle="modal" wire:click="takeAction('{{$ticket->id}}','Pending')" ><i class="fas fa-hourglass-end"></i> Pending</a>
                                                        <a href="#" class="dropdown-item" data-toggle="modal" wire:click="takeAction('{{$ticket->id}}','Resolved')"><i class="fa fa-check" ></i> Resolved</a>
                                                        </div>
                                                    </span>
                                     </td>
                                </tr>
                                @endforeach
                                @if(count($tickets)==0)
                                 <tr>
                                     <td colspan="9" class="align-center">No records available</td>
                                 </tr>
                                 @endif
                            </tbody>
        </table>
        <!--end: Datatable -->
        <div>
        {{ $tickets->links() }}
        </div>
    </div>
</div>
                       
</div>
