@section('title',"Dashboard")

@push('css-styles')
@endpush

@section('sub-header')
<!-- begin:: Subheader -->
<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Dashboard </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link">
                Dashboard </a>
        </div>
    </div>
</div>
<!-- end:: Subheader -->
@endsection


@section('content')
<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">

                <!--begin:: Widgets/Stats2-1 -->
                <div class="kt-widget1">
                    <div class="kt-widget1__item">
                        <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title">Customers</h3>
                            <span class="kt-widget1__desc">Total customers available in this system</span>
                        </div>
                        <a href="{{route('Customer.list')}}"><span class="kt-widget1__number kt-font-brand">{{$total['customers_count']}}</span></a>
                    </div>
                </div>
                <!-- <div class="kt-widget1">
                    <div class="kt-widget1__item">
                        <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title">Beta requests</h3>
                            <span class="kt-widget1__desc">Total beta requests available in this system</span>
                        </div>
                        <a href=""><span class="kt-widget1__number kt-font-brand">{{$total['beta_requests_count']}}</span></a>
                    </div>
                   
                </div> -->
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">

                <!--begin:: Widgets/Stats2-1 -->
                <!-- <div class="kt-widget1">
                    <div class="kt-widget1__item">
                        <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title">Customers</h3>
                            <span class="kt-widget1__desc">Total customers available in this system</span>
                        </div>
                        <a href=""><span class="kt-widget1__number kt-font-brand">{{$total['customers_count']}}</span></a>
                    </div>
                </div> -->
                <div class="kt-widget1">
                    <div class="kt-widget1__item">
                        <div class="kt-widget1__info">
                            <h3 class="kt-widget1__title">Beta requests</h3>
                            <span class="kt-widget1__desc">Total beta requests available in this system</span>
                        </div>
                        <a href="{{route('Beta.request.list')}}"><span class="kt-widget1__number kt-font-brand">{{$total['beta_requests_count']}}</span></a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    latest Users
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_widget4_tab1_content">
                        <div class="kt-widget4">
                            @foreach ($users as $user)
                            <div class="kt-widget4__item">
                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{substr(ucfirst($user->name), 0, 1)}}</span>
                                </div>
                                <div class="kt-widget4__info">
                                    <a href="#" class="kt-widget4__username">
                                        {{ $user->name }}
                                    </a>
                                    <p class="kt-widget4__text">
                                        {{$user->created_at->diffForHumans()}}
                                    </p>
                                </div>
                                <a href="" class="btn btn-sm btn-label-brand btn-bold">View</a>
                            </div>
                            @endforeach
                        
                        </div>
                        {{-- <a href="{{ route('users.index') }}" class="btn btn-sm btn-label-brand btn-bold mt-3">View All</a> --}}
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="col-xl-6">
    <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Recent Posts
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_widget4_tab1_content">
                <div class="kt-widget4">
                    @foreach ($tickets as $ticket)
                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{substr(ucfirst($ticket->subject), 0, 1)}}</span>
                                </div>
                        <div class="kt-widget4__info">
                            <a href="#" class="kt-widget4__username">
                                {{ $ticket->subject }}
                            </a>
                            <p class="kt-widget4__text">
                                {{$post->created_at->diffForHumans()}}
                            </p>
                        </div>
                        <a href="" class="btn btn-sm btn-label-brand btn-bold">View</a>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection


@push('scripts')
@endpush
