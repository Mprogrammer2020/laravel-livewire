<x-layouts.user>
            <div class="layer11 pb-5" id="education_id">
                <h2 class="text-dark fw-6 mb-4 ">Education Center</h2>
                <a :href="'/user/education/course-video/'+course.id" v-for="(course,index) in courses" class="row bg-white mx-0 px-2 py-4 rounded shadow mb-4 text-dark">
                    <div class="col-md-auto">
                        <div class="pic">
                            <img :src="'/uploads/'+course.image" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="cont">
                           <div class="d-lg-flex justify-content-between">
                                <h5 class="fw-6">@{{course.name}}</h5>
                                <h6 class="text-muted"><small>@{{course.completed_videos}} of @{{course.total_videos}} Completed</small></h6>
                           </div>
                           <p class="mb-0">
                               @{{course.description}}
                           </p>
                        </div>
                    </div>
                </a>
                {{-- <a href="{{route('user.education.course-video')}}" class="row bg-white mx-0 px-2 py-4 rounded shadow mb-4 text-dark">
                    <div class="col-md-auto">
                        <div class="pic">
                            <img src="{{ asset('user_assets/images/img1.png') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="cont">
                           <h5 class="fw-6">Topic Title</h5>
                           <p class="mb-0">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perspiciatis accusamus temporibus dolorem tenetur nulla maxime aliquid, doloribus distinctio illo facere nemo iure id atque necessitatibus assumenda, corrupti tempora optio.
                           </p>
                        </div>
                    </div>
                </a>

                <a href="{{route('user.education.course-video')}}" class="row bg-white mx-0 px-2 py-4 rounded shadow mb-4 text-dark">
                    <div class="col-md-auto">
                        <div class="pic">
                            <img src="{{ asset('user_assets/images/img1.png') }}" alt="" class="">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="cont">
                           <h5 class="fw-6">Topic Title</h5>
                           <p class="mb-0">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perspiciatis accusamus temporibus dolorem tenetur nulla maxime aliquid, doloribus distinctio illo facere nemo iure id atque necessitatibus assumenda, corrupti tempora optio.
                           </p>
                        </div>
                    </div>
                </a> --}}

                <div class="w-100 text-center">
                    <button class="btn btn-success rounded-pill px-4" v-if="coursepagination.next_page_url" @click="loadCourses">Load More <span class="material-icons align-middle">
                        arrow_drop_down
                        </span></button>
                </div>
        </div>
         @push('scripts')
    <script>
	new Vue({
	el: '#education_id',
	data: {
        courses:[],
        coursepagination:{
            next_page_url:"{{route('user.education.course.list')}}"
        },
    },
    mounted(){},
	created(){
		this.loadCourses();
	},
	methods:{
        loadCourses(){
			let self=this;
			fetch(self.coursepagination.next_page_url)
			.then(res=>res.json())
			.then(function (result) {
				 console.info('result',result);
                 if(result.status){
                    self.courses=[...self.courses,...result.data.data];//self.courses.push(result.data.data);
                    self.coursepagination=result.data;
                 }
			});
		},
        activateReadMore(index){
             this.courses[index].read_more_activated=true;
        }
    }
    })
</script>
    @endpush
</x-layouts.user>
