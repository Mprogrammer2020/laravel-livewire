<div>

<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								Lead List</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="#" class="kt-subheader__breadcrumbs-link" >
									Lead List </a> 
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left" >
									 @if($role=='CLIENT')
									<a href="#" class="btn btn-info btn-elevate btn-icon-sm" wire:click="exportToExcel">
													<i class="la la-download"></i>
													Export to Excel
									</a>
									@endif
									</div>
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
															<input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search by name" id="generalSearch">
															<span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
														</div>
													</div>
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<!-- <div class="kt-form__group kt-form__group--inline">
															<div class="kt-form__label">
																<label>Status:</label>
															</div>
															<div class="kt-form__control">
																<div class="dropdown bootstrap-select form-control"><select class="form-control bootstrap-select" id="kt_form_status" tabindex="-98">
																	<option value="">All</option>
																	<option value="1">Pending</option>
																	<option value="2">Delivered</option>
																	<option value="3">Canceled</option>
																	<option value="4">Success</option>
																	<option value="5">Info</option>
																	<option value="6">Danger</option>
																</select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="kt_form_status" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
															</div>
														</div> -->
													</div>
													<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
														<!-- <div class="kt-form__group kt-form__group--inline">
															<div class="kt-form__label">
																<label>Type:</label>
															</div>
															<div class="kt-form__control">
																<div class="dropdown bootstrap-select form-control"><select class="form-control bootstrap-select" id="kt_form_type" tabindex="-98">
																	<option value="">All</option>
																	<option value="1">Online</option>
																	<option value="2">Retail</option>
																	<option value="3">Direct</option>
																</select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="kt_form_type" title="All"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">All</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
															</div>
														</div> -->
													</div>
												</div>
											</div>
											<!-- <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
												<a href="#" class="btn btn-default kt-hidden">
													<i class="la la-cart-plus"></i> New Order
												</a>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
											</div> -->
										</div>
									</div>
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable table-striped" >
        <thead>
                                <tr>
                                    <th style="width: 15%;">Name <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('name')"></i></th>
                                    <th style="width: 18%;">Email <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('email')"></i></th>
                                    @if($role=='CLIENT')
									<th>Phone <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('phone')"></i></th>
                                    <th>Business <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('business_name')"></i></th>
                                    <th>Strain Base</th>
                                    <th>Effects</th>
                                    <th>Strain Option</th>
									@else 
                                    <th>Signup</th>
                                    <th>Sales</th>
                                    <th>Commission</th>
									@endif
                                    <th style="width: 8%;">Created At</th>
                                    <th class="align-center" style="width: 5%;">Action</th>
                                    <!-- <th class="align-center" style="width: 5%;">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
									@if($role=='CLIENT')
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->business_name}}</td>
                                    <td>{{$user->strainBase()->exists() ? $user->strainBase->name : ""}}</td>
                                    <td>
                                    @foreach ($user->desiredEffects as $key => $effect) 
                                    <span class="kt-badge kt-badge--brand  kt-badge--inline" style="margin-top:4px;">
                                    {{$effect->name}}
                                    </span>
                                    @endforeach
                                    </td>
                                    <td>{{$user->strainOption()->exists() ? $user->strainOption->name : ""}}</td>
									@else
                                    <td>{{$user->referrals()->count()}}</td>
                                    <td>{{$this->getSalesByUser($user)}}</td>
                                    <td>${{$user->commission_earned}}</td>
									@endif
                                    <td>{{$user->created_at->format('d-m-Y h:i A')}}</td>
                                    <!-- <td class="align-center"> 
                                      <span class="badge badge-success">Active</span>
                                      <span class="badge badge-danger">Inactive</span>
                                    </td> -->
                                    <td class="align-center">
                                                    <span class="dropdown">
                                                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
														 @if($role=='USER')
                                                        <a href="{{route('user.create.edit',['user_id'=>$user->id])}}" class="dropdown-item" ><i class="fa fa-edit" ></i> Edit</a>
                                                        @endif
														<a href="#" class="dropdown-item" data-toggle="modal" wire:click="deleteAttempt({{$user->id}})" data-target="#delete_confirm_modal"><i class="fa fa-trash" ></i> Delete</a>
                                                        </div>
                                                    </span>
                                     </td>
                                </tr>
                                @endforeach
                                @if(count($users)==0)
                                 <tr>
                                     <td colspan="9" class="align-center">No records available</td>
                                 </tr>
                                 @endif
                            </tbody>
        </table>
        <!--end: Datatable -->
        <div>
        {{ $users->links() }}
        </div>
    </div>
</div>
                       
</div>