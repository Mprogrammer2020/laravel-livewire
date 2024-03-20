<x-layouts.user>
    <div class="layerOne">
        <div class="row">
            <div class="col-xl-4 mb-5 mb-xl-0 ">
                <h4 class="text-primary fw-6 mb-4">Affiliate Center</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="vidBox">
                            <!-- <video src="{{ asset('user_assets/images/bkp-Washed.mp4') }}"></video> -->
                            <img src="{{ asset($affiliatedCenter->video_thumbnail_image ?? '') }}" alt="">
                            <a data-fancybox="gallery" href="{{ $affiliatedCenter->video_link ?? '' }}"
                                class="cover d-flex align-items-center justify-content-center">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M56.6799 16.2689C54.579 12.1943 51.5151 8.5962 47.82 5.86361C47.2777 5.46272 46.5133 5.57729 46.1122 6.11941C45.7111 6.66153 45.8259 7.42608 46.368 7.82718C49.7638 10.3384 52.579 13.6444 54.5096 17.3882C56.5324 21.311 57.558 25.5542 57.558 30.0002C57.558 45.1957 45.1955 57.5582 30 57.5582C14.8045 57.5582 2.44199 45.1957 2.44199 30C2.44199 14.8043 14.8045 2.44199 30 2.44199C30.6742 2.44199 31.221 1.89518 31.221 1.22099C31.221 0.546801 30.6742 0 30 0C13.458 0 0 13.458 0 30C0 46.542 13.458 60 30 60C46.542 60 60 46.542 60 30C60 25.2292 58.8521 20.4811 56.6799 16.2689Z"
                                        fill="white" />
                                    <path
                                        d="M22.3236 16.0701C21.9419 16.2872 21.706 16.6926 21.706 17.1315V43.927C21.706 44.6014 22.2528 45.148 22.927 45.148C23.6012 45.148 24.148 44.6014 24.148 43.927V19.2795L42.2254 30.0411L28.932 38.6058C28.3653 38.971 28.2017 39.7266 28.567 40.2934C28.9324 40.8603 29.6878 41.0239 30.2548 40.6585L45.2048 31.0262C45.5601 30.7973 45.7718 30.4009 45.7642 29.9782C45.7567 29.5556 45.5312 29.1669 45.168 28.9506L23.5515 16.0823C23.1738 15.8578 22.7054 15.853 22.3236 16.0701Z"
                                        fill="white" />
                                </svg>

                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 " id="trackingSectionId">
                <div class="h-100 justify-content-center d-flex flex-column trackingLinkWrap">
                    <h4 class="text-dark fw-6  ">Tracking Link</h4>
                    <div class="textBox   bg-white d-flex flex-column py-5">
                        <div class="w-100 mb-5 "> <a class="m-0 d-block m-0 px-5 text-truncate" @click="copyToClipboard">
                            <span class="material-icons align-middle" style="cursor: pointer;">
                                content_copy
                                </span>
                            <span ref="myTrackingLink">{{auth()->user()->tracking_link}}</span>
                            </a></div>
                                <!-- <div class="w-100">
                                    <hr>
                                </div> -->
                        <div class="row justify-content-around mx-0 px-4">
                            <div class="col-lg-3 mb-5 mb-lg-0 text-center text-info  ">
                               <div class="  px-3 py-4 rounded-custom shadow-lg">
                                <h5 style="font-weight: 600;" class="text-uppercase mb-1">Signup</h5>
                                <hr class="my-2 ">
                                <h1 class="mb-0 pt-2 font-weight-light">{{auth()->user()->referrals()->count()}}</h1>
                               </div>
                            </div>
                            <div ropstenclass="col-lg-3 mb-5 mb-lg-0 text-center text-danger">
                                <div class="  px-3 py-4 rounded-custom shadow-lg">
                                <h5 style="font-weight: 600;" class="text-uppercase mb-1">Sales</h5>
                                <hr class="my-2 ">
                                <h1 class="mb-0 pt-2 font-weight-light">{{$salesCount}}</h1>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center text-success">
                                <div class="  px-3 py-4 rounded-custom shadow-lg">
                                <h5 style="font-weight: 600;" class="text-uppercase   mb-1">Commission </h5>
                                <hr class="my-2 ">
                                <h1 class="mb-0 pt-2 font-weight-light">{{$totalCommission}} ETH</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layerSeven mb-5 mb-xl-0">
        <div class="innerHWork">
            <h3 class="text-center">How It Works</h3>
            <ul class="list-unstyled mb-0 row text-center text-sm-left">
                <li class="col-xl-4">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <div class="iconBox mx-auto mb-3 mb-sm-0 d-flex align-items-center justify-content-center">
                                {{-- <img src="{{ asset('user_assets/images/leaf3.svg') }}" alt=""
                                    class="d-block w-auto h-auto"> --}}
                                <span class="material-icons align-middle text-white h2 m-0">
                                    flag
                                </span>
                            </div>
                        </div>
                        <div class="col-sm">
                            <h6 class="">Step 1</h6>
                            <p class="">
                                {{ $affiliatedCenter->step1_content ?? ''}}
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-xl-4">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <div class="iconBox mx-auto mb-3 mb-sm-0 d-flex align-items-center justify-content-center">
                                <span class="material-icons align-middle text-white h2 m-0">
                                    keyboard_arrow_right
                                </span>
                            </div>
                        </div>
                        <div class="col-sm">
                            <h6 class="">Step 2</h6>
                            <p class="">
                                {{ $affiliatedCenter->step2_content  ?? ''}}
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-xl-4">
                    <div class="row align-items-center">
                        <div class="col-sm-auto">
                            <div class="iconBox mx-auto mb-3 mb-sm-0 d-flex align-items-center justify-content-center">
                                <span class="material-icons align-middle text-white h2 m-0">
                                    keyboard_arrow_right
                                </span>
                            </div>
                        </div>
                        <div class="col-sm">
                            <h6 class="">Step 3</h6>
                            <p class="">
                                {{ $affiliatedCenter->step3_content  ?? ''}}
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


@push('scripts')
    <script>
    new Vue({
	el: '#trackingSectionId',
	data: {},
    mounted(){},
	created(){},
	methods:{
        copyToClipboard(){
            //console.info('this.$refs.myTrackingLink',this.$refs.myTrackingLink.innerHTML);
            var Url = this.$refs.myTrackingLink.innerHTML;
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(Url).select();
            document.execCommand("copy");
            $temp.remove();
        }
    }
    });
    </script>
@endpush

</x-layouts.user>


