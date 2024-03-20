<x-layouts.user>
<div id="course_video_id">
      <div class="layerTen pb-4" >
                <div class="row">
                    <div class="col-lg-3 mb-5 mb-lg-0 ">
                        <div class="imgBox shadow h-100">
                            <img src="/uploads/{{$course->image}}" alt="" class="w-100 h-100 d-block">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="h-100  ">
                            <h2 class="text-dark fw-6">{{$course->name}}</h2>
                            <p>
                               {{$course->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="layerOne pt-4">
                <div class="row" v-for="(video,index) in videos">
                    <div class="col-xl-4 mb-5 mb-xl-0 ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="vidBox">
                                    <!-- <video src="{{ asset('user_assets/images/bkp-Washed.mp4') }}"></video> -->
                                    <img :src="'/uploads/'+video.video_thumbnail_image" alt="">
                                    <a data-fancybox="gallery" :href="'/uploads/'+video.video_link"
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
                    <div class="col-xl-8">
                        <div class="h-100">
                            <h2 class="text-dark fw-6  ">@{{video.name}}</h2>
                            <p>
                                @{{video.description}}
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-12   pt-4">
                        <div class="w-100">
                            <div class="fw-6 text-center">Course Progress (@{{progressPercentage}})</div>
                            <div class="progress rounded-pill shadow">
                                <div class="progress-bar progress-bar-striped" :class="getProgressBgColor" role="progressbar"
                                    :style="{width:progressPercentage}" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="row pt-4">
                           
                            <div class="col-12 col-lg-4 pb-3">
                                <a  v-if="videopagination.prev_page_url"  @click="setUrlToVideoLoadingApi(videopagination.prev_page_url,'prev')"
                                    class="btn btn-lg mx-2 text-nowrap text-uppercase fw-4 btn-dark rounded-pill px-3 w-100 "><i style="font-size: 18px;" class="material-icons align-middle">
                                        arrow_back_ios
                                     </i> Prev
                                    Video  </a>
                            </div>
                            <div class="col-12 col-lg-4 pb-3">
                                <a 
                                    class="btn btn-lg mx-2 text-nowrap text-uppercase fw-4  rounded-pill px-3 w-100" :class="{'btn-warning' : checkCompleted=='Mark Complete', 'btn-success' : checkCompleted=='Completed!'  }" @click="markComplete">@{{checkCompleted}} <i style="font-size: 18px;" v-if="checkCompleted=='Completed!'" class="material-icons align-middle">done</i></a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a  v-if="videopagination.next_page_url"  @click="setUrlToVideoLoadingApi(videopagination.next_page_url,'next')"
                                    class="btn btn-lg mx-2 text-nowrap text-uppercase fw-4 btn-dark rounded-pill px-3 w-100 ">Next
                                    Video  <i style="font-size: 18px;" class="material-icons align-middle">arrow_forward_ios</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
             @push('scripts')
    <script>
	new Vue({
	el: '#course_video_id',
	data: {
        videos:[],
        videopagination:{
            prev_page_url:null,
            next_page_url:"{{route('user.education.video.api',['course'=>$course->id])}}"
        },
    },
    mounted(){},
	created(){
		this.loadVideos();
	},
    computed:{
        checkCompleted(){
                return (this.videos.length>0 && this.videos[0].is_complete) ? 'Completed!' : 'Mark Complete';
        },
        progressPercentage(){
            return (this.videos.length>0) ? `${this.videos[0].course_progress_percentage}%` : '0%';
        },
        getProgressBgColor(){
            let color;
            progressPercentage=(this.videos.length>0) ? this.videos[0].course_progress_percentage : 0;
            if(progressPercentage<=25)
                color="bg-danger";
            else if(progressPercentage>25 && progressPercentage<=50)
                color="bg-warning";
            else if(progressPercentage>50 && progressPercentage<=75)
                color="bg-info";
            else
                color="bg-success";
            return color;
        }
    },
	methods:{
        loadVideos(){
			let self=this;
			fetch(self.videopagination.next_page_url)
			.then(res=>res.json())
			.then(function (result) {
				 console.info('result',result);
                 if(result.status){
                   // self.videos=[...self.videos,...result.data.data];
                    self.videos=result.data.data;
                   /* if(markCompleted && result.data.next_page_url == null)
                    {
                        self.videos[0].is_active=false;
                        self.videos[0].is_complete=true;
                    }*/
                    self.videopagination=result.data;
                    console.info('videos',self.videos);
                    self.markActive();
                 }
			});
		},
        markActive(){
            let self=this;
            if(self.videos.length==0) return;
            self.postObject={
                video_id: self.videos[0].id,
                _token: '{{csrf_token()}}'
            };
					fetch("{{route('user.education.video.markactive')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.postObject)}).then(function(response) {  
						return response.json();
					}).then(function(result) {
						console.info('markActive-data',result);
                        if(result.status){ 
                        }
					});
        },
        markComplete(){
            let self=this;
            if(self.videos.length==0 || self.videos[0].is_complete) return;
            self.postObject={
                video_id: self.videos[0].id,
                _token: '{{csrf_token()}}'
            };
					fetch("{{route('user.education.video.markcomplete')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.postObject)}).then(function(response) {  
						return response.json();
					}).then(function(result) {
						console.info('markComplete-data',result);
                        if(result.status){ 
                            self.videopagination.next_page_url=`${self.videopagination.path}?page=${self.videopagination.current_page}`
                            self.loadVideos();
                             /*self.videos[0].is_active=false;
                             self.videos[0].is_complete=true; */
                        }
					});
        },
        setUrlToVideoLoadingApi(url,action){
            let self=this;
            if(!self) return;
            if(self.videos.length>0 && !self.videos[0].is_complete && action=='next'){ 
                return;
            }
            self.videopagination.next_page_url=url;
            self.loadVideos();
        }
    }
    })
</script>
    @endpush
</x-layouts.user>
