@extends('layouts.admin_root')

@section('title',"Post List")


@push('css-plugins')
@endpush

@push('css-styles')
@endpush

@section('sub-header')
<div>

    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Announcements</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-home"><i
                        class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    Dashboard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Manage Announcements </a>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" data-placement="left">

                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    @endsection
    @section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <form id="announcement-form" action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-12" id="message"></div>
                </div>
                <div id="clonebox">
                    @if($data->count() > 0)
                    @foreach($data as $i => $announcement)
                    <div class="add-input mt-3">

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Enter Announcement" name="text[]" value="{{$announcement->description}}" required>

                                </div>

                            </div>
                            <div class="col-12 text-right">

                                <button type="button" onclick="clone_component(this)" class="btn add-comp text-white btn-info btn-sm">Add</button>
                                <button type="button" onclick="remove_component(this)" class="btn remove-comp text-white btn-danger btn-sm" style="{{($data->count() > 1 ) ? '' : 'display:none'}}">Remove</button>

                            </div>

                        </div>

                    </div>
                    @endforeach
                    @else
                    <div class="add-input mt-3">

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Enter Announcement" name="text[]">
                                </div>

                            </div>
                            <div class="col-12 text-right">

                                <button type="button" onclick="clone_component(this)" class="btn add-comp text-white btn-info btn-sm">Add</button>
                                <button type="button" onclick="remove_component(this)" class="btn remove-comp text-white btn-danger btn-sm" style="display: none">Remove</button>
                            </div>

                        </div>

                    </div>
                    @endif
                </div>
                <hr/>
                <div class="row">

                    <div class="col-md-12 text-center">

                        <button type="button" id="submit-button" onclick="store()" class="btn btn-success btn-sm">Submit</button>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@push('script-plugins')
@endpush

@push('scripts')

<script>
    window.clone_component = function (that) {
        var clone = $(that).closest('.add-input').clone()
        clone.appendTo("#clonebox");
        clone.find('input').val('');
        if ($('#clonebox').find(".remove-comp").length > 1) {
            $('#clonebox').find(".remove-comp").show();
        } else {
            $('#clonebox').find(".remove-comp").hide();
        }
    }
    window.remove_component = function (that) {
        var clone = $(that).closest('.add-input').remove();
        if ($('#clonebox').find(".remove-comp").length <= 1) {
            $('#clonebox').find(".remove-comp").hide();
        }
    }

    window.store = function () {
        $.ajax({
            url: '{{route("admin.announcement.store")}}',
            method: 'post',
            data: $("#announcement-form").serialize(),
            success: function (result) {
                if (result.status) {
                    $('#message').html('<div class="alert alert-success">Announcement Added Successfully!</div>');
                } else {
                    $('#message').html('<div class="alert alert-danger">Server Error</div>');
                }
            },
            error: function (XMLHttpRequest, textStatus, error) {
                console.log(XMLHttpRequest.responseJSON.errors);
                var errors = '';
                $.each(XMLHttpRequest.responseJSON.errors, function (i, v) {
                    errors += v + "<br/>";
                });
                $('#message').html('<div class="alert alert-danger">' + errors + '</div>');
            }
        });

    }

</script>
@endpush
