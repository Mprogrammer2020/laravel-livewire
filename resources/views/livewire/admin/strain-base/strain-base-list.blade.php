<div>

@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
								Strain Base List</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="{{route('dashboard')}}" class="kt-subheader__breadcrumbs-link">
									Dashboard </a>  
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
									Strain Base List </a>  
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<div class="dropdown dropdown-inline" data-toggle="kt-tooltip"  data-placement="left">
									<a href="{{route('strain.base.create.edit')}}" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													Add New Strain Base
												</a>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

@endsection

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable table-striped" >
        <thead>
                                <tr>
                                    <th style="width: 30%;">Name</th>
                                    <th>Short Description</th>
                                    <th class="align-center" style="width: 12%;">Action</th>
                                    <!-- <th class="align-center" style="width: 5%;">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($strainBases as $strainBase)
                                <tr>
                                    <td>{{$strainBase->name}}</td>
                                    <td>{{$strainBase->short_description}}</td>
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
                                                            <a class="dropdown-item" href="{{route('strain.base.create.edit', ['strain_base_id' => $strainBase->id])}}" ><i class="la la-edit"></i> Edit</a>
                                                            <a href="#" class="dropdown-item" data-toggle="modal" wire:click="deleteAttempt({{$strainBase->id}})" data-target="#delete_confirm_modal"><i class="fa fa-trash" ></i> Delete</a>
                                                        </div>
                                                    </span>
                                     </td>
                                </tr>
                                @endforeach
                                @if(count($strainBases)==0)
                                 <tr>
                                     <td colspan="5" class="align-center">No records available</td>
                                 </tr>
                                 @endif
                            </tbody>
        </table>
        <!--end: Datatable -->
        <div>
        {{ $strainBases->links() }}
        </div>
    </div>
</div>
                       
</div>