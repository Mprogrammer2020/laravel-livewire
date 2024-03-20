@extends('layouts.admin.admin')

@section('title',"Customer Management")


@push('css-plugins')
@endpush

@push('css-styles')
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
.select2-container{
    width: 100% !important;
}
</style>
@endpush


@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Customer List </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{route('admin.dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{Route('admin.dashboard')}}" class="kt-subheader__breadcrumbs-link">
                Dashboard </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>

            <a href="{{Route('Customer.list')}}" class="kt-subheader__breadcrumbs-link">
                Customer List </a>

        </div>
    </div>
   
</div>

<!-- end:: Subheader -->
@endsection

@section('content')
<div class="kt-portlet kt-portlet--mobile">
@can('user-list')
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Join</th>
                    <!-- <th>Status</th>
                    <th>Action</th> -->
                </tr>
            </thead>
        </table>
        <!--end: Datatable -->
    </div>
    @endcan
</div>
<!-- </div> -->
@endsection

@push('script-plugins')
@endpush

@push('scripts')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('assets/app/custom/general/crud/datatables/data-sources/ajax-server-side.js')}}" type="text/javascript"></script> -->

<script>
    var KTDatatablesDataSourceAjaxServer = function() {

        var initTable1 = function() {
            var table = $('#kt_table_1');

            // begin first table
            table.DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: "{{ route('Customer.list') }}",
                columns: [{
                        data: 'full_name',width: 200
                    },
                    {
                        data: 'email',
                        width: 150
                    },
                    {
                        data: 'created_at',
                        className: "text-center",
                        width: 150
                    },
                    // {
                    //     data: 'status'
                    // },
                    // {
                    //     data: 'action',
                    //     width: 20,
                    //     className: "text-center"
                    // }
                ],
                columnDefs: [],
            });
        };

        return {

            //main function to initiate the module
            init: function() {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function() {
        KTDatatablesDataSourceAjaxServer.init();
        $('#grade_modal_form').hide();
        let $modal = $('#delete_confirm_modal');
        // show the modal when delete button clicked
        $('#kt_table_1').on('click', '.del_', function(e) {
            e.preventDefault();
            //console.log();
            $('#delete_confirm_form').attr('action', $(this).attr('href'));
        });
    });
</script>
@endpush
