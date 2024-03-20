<x-layouts.user>
<div id="dashboard">

    <div class="layerOne">
        <div class="row">
            @foreach ($details as $dashboardvalue)
                <div class="col-xl-6 mb-4 mb-xl-0 ">
                    <h4 class="text-primary fw-6 mb-4">{{ $dashboardvalue->header_title }}</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="vidBox">
                                <!-- <video src="{{ asset('user_assets/images/bkp-Washed.mp4') }}"></video> -->
                                <img src="{{ asset('user_assets/images/' . $dashboardvalue->video_thumbnail_image) }}"
                                    alt="">
                                <a data-fancybox="gallery"
                                    class="cover d-flex align-items-center justify-content-center"
                                    href="{{ $dashboardvalue->video_link }}">
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
                        <div class="col-lg-6 longText pt-4 pt-lg-0">
                            <div>{{$dashboardvalue->description }}</div>
                           <div><b style="color: #928fb3;">Step One:</b>  {{$dashboardvalue->description_step_1 }}</div>
                           <div><b style="color: #928fb3;">Step Two:</b>  {{$dashboardvalue->description_step_2 }}</div>
                           <div><b style="color: #928fb3;">Step Three:</b> {{$dashboardvalue->description_step_3 }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xl-6">
                <div class="h-100 snapShot">
                    <h4 class="text-dark fw-6 mb-4">Harvest Snapshot</h4>
                    <div class="row">
                        <div class="mb-4 mb-sm-0 col-sm-4">
                            <div class="snapShotBoxOne d-flex flex-column   h-100 p-4">
                                <h6 class="text-primary">Plants</h6>
                                <div class="number">
                                    {{$harvestSnapshot['plants'] > 1000 ? (number_format($harvestSnapshot['plants']/1000,1)).'K':$harvestSnapshot['plants']}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 mb-sm-0 col-sm-4">
                            <div class="snapShotBoxTwo d-flex flex-column h-100 p-4">
                                <h6 class="text-primary">Progress</h6>
                                <div class="progress ">
                                    <div class="count d-flex align-items-center justify-content-center">
                                        <span> {{$harvestSnapshot['harvest_progress']}}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="  col-sm-4">
                            <div class="snapShotBoxThree d-flex flex-column   h-100 p-4">
                                <h6 class="text-primary mb-auto">Gram Wallet</h6>
                                <div class="smallNumber mb-auto">
                                    0 Grams
                                </div>
                            </div>
                        </div>
                        <div class="col-12  mb-0 pt-4">
                            <a class="btn btn-green" href="{{route('user.plant.sale')}}">Buy Plants</a>
                            {{-- <a class="btn btn-danger">Sell Plants</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layerTwo mb-5 mb-lg-0">
        <div class="socialWrap">
            <div class="caseOne">
                <div class="row align-items-center">
                    <div class="col-auto  title">Social Wall <i class="fa fa-refresh pl-1" aria-hidden="true" style="color: seagreen;cursor: pointer;" @click="refresh"></i></div>
                    <div class="col-auto ml-auto">
                        <button class="btn rounded-pill" data-toggle="modal" data-target="#staticBackdrop">
                            Add Post
                        </button>
                    </div>
                </div>
            </div>

            <div class="caseTwo">
                    <div class="postRow" v-for="(post,index) in posts">
                        <div class="row">
                            <div class="col-lg">
                            <div class="d-flex h-100 flex-column">
                                <div class="lineOne d-flex flex-wrap">
                                    <div class="d-inline-flex align-items-center mr-3">
                                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 10V9C9 8.46957 8.78929 7.96086 8.41421 7.58579C8.03914 7.21071 7.53043 7 7 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V10M7 3C7 4.10457 6.10457 5 5 5C3.89543 5 3 4.10457 3 3C3 1.89543 3.89543 1 5 1C6.10457 1 7 1.89543 7 3Z"
                                                stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        <span>Posted By @{{post.user.name}}</span>
                                    </div>
                                    <div class="d-inline-flex align-items-center ">
                                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.77778 1V2.8M3.22222 1V2.8M1 4.6H9M1.88889 1.9H8.11111C8.60203 1.9 9 2.30294 9 2.8V9.1C9 9.59706 8.60203 10 8.11111 10H1.88889C1.39797 10 1 9.59706 1 9.1V2.8C1 2.30294 1.39797 1.9 1.88889 1.9Z"
                                                stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        <span>@{{post.create_human_readable}}</span>
                                    </div>
                                </div>

                                <div class="lineTwo">
                                     <span class="text-capitalize">@{{post.title}}</span>
                                     <div v-if="!post.read_more_activated" class="d-inline">@{{post.description.slice(0, 200)}}</div>
                                     <a class="" v-if="!post.read_more_activated && post.description.length>200" @click="activateReadMore(index)" style="color:#007bff; cursor: pointer;">Read more...</a>
                                     <div v-if="post.read_more_activated" v-html="post.description" class="d-inline"></div>
                                </div>
                                <div class="lineThree">
                                </div>
                                <div class="lineFour mt-auto">
                                    <div class="d-inline-flex mr-3 align-items-center cp" data-toggle="modal"
                                        data-target="#commentModal" @click="openModal(post,index,true)">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15 10.3333C15 10.7459 14.8361 11.1416 14.5444 11.4333C14.2527 11.725 13.857 11.8889 13.4444 11.8889H4.11111L1 15V2.55556C1 2.143 1.16389 1.74733 1.45561 1.45561C1.74733 1.16389 2.143 1 2.55556 1H13.4444C13.857 1 14.2527 1.16389 14.5444 1.45561C14.8361 1.74733 15 2.143 15 2.55556V10.3333Z"
                                                stroke="#8A86AF" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        @{{post.comment_count}} Comments
                                    </div>
                                    <div class="d-inline-flex mr-3 align-items-center cp" data-toggle="modal"
                                        data-target="#shareModal" @click="openModal(post,index)">
                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.72667 9.057L9.28 11.843M9.27333 4.157L4.72667 6.943M13 3.1C13 4.2598 12.1046 5.2 11 5.2C9.89543 5.2 9 4.2598 9 3.1C9 1.9402 9.89543 1 11 1C12.1046 1 13 1.9402 13 3.1ZM5 8C5 9.1598 4.10457 10.1 3 10.1C1.89543 10.1 1 9.1598 1 8C1 6.8402 1.89543 5.9 3 5.9C4.10457 5.9 5 6.8402 5 8ZM13 12.9C13 14.0598 12.1046 15 11 15C9.89543 15 9 14.0598 9 12.9C9 11.7402 9.89543 10.8 11 10.8C12.1046 10.8 13 11.7402 13 12.9Z"
                                                stroke="#8A86AF" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Share
                                    </div>
                                    <div v-if="post.user.id==authUserId" class="d-inline-flex mr-3 align-items-center cp" @click="deletPost(post,index)">
<svg fill="#8A86AF" class="mr-1" width="14" height="16" viewBox="-40 0 427 427.00131" width="427pt" xmlns="http://www.w3.org/2000/svg"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>

                                        Delete
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-auto" @mouseover="openModal(post,index)">
                                <div class="shadow thumb h-auto" style="border-radius:40px;cursor: pointer;">
                                        <img :src="post.image" alt="" class="" style="height: 168px;" data-toggle="modal" data-target="#imageDetailModal" @click="openModal(post,index)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 text-center" v-if="postpagination.next_page_url">
                                <button class="btn btn-outline-success rounded-pill" @click="loadPosts">
                                    Load more
                                </button>
                    </div>


            </div>

        </div>
    </div>

<!-- Modal -->
    <div class="modal fade" id="imageDetailModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">
                        close
                    </span>
                </button>
                {{-- <form> --}}
                    <div class="modal-body h-auto">
                    <img :src="selectedPostDetail.image" alt="" class="w-100" style="height:100%;" data-toggle="modal" data-target="#imageDetailModal">
                    </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  ">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">
                        close
                    </span>
                </button>
                {{-- <form> --}}
                    <div class="modal-body">
                        <span id="error"></span>
                        <h5 class="fw-6 mb-3">Write your post here</h5>
                        <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                                type="text" placeholder="Title" name="title" v-model="postObject.title">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="30" rows="6"
                                class="form-control border-0 shadow-none bg-white px-4"
                                placeholder="Description" v-model="postObject.description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="bg-white border cp d-block px-4 py-3 rounded-pill w-100" id="clickfile">
                                <input name="image" class="form-control border-0 shadow-none bg-white rounded-pill"
                                    type="file" hidden @change="previewImage" accept="image/*">
                                <span id="filename">@{{postObject.image ? postObject.image.name : 'Upload File'}}</span>
                            </label>
                        </div>
                         <div class="form-group" v-if="errorMsg">
                            <div class="alert alert-danger rounded-pill" role="alert">
                            <ul>
                                <li v-for="error in errorMsg">
                                    @{{error[0]}}
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="w-100 pt-3">
                            <button class="btn rounded-pill" id="addpost" @click="createPost">
                                @{{createPostLoading? "Please Wait " : "Add Post"}} <i class="fa fa-circle-o-notch fa-spin fa-lg aria-hidden='true'" v-if="createPostLoading"></i>
                            </button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">
                        close
                    </span>
                </button>
                <div class="modal-body">
                    <h5 class="fw-6 mb-3">Share your post</h5>

                    <div class="row pt-md-4">
                        <div class="col-md-6">
                            <a class="w-100 sharePostBtn" @click="facebookInviteFriends">
                                <img src="{{ asset('user_assets/images/share1.png') }}" alt="" class="w-100">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="w-100 sharePostBtn" :href="getTwitterUrl()" target="_blank">
                                <img src="{{ asset('user_assets/images/share2.png') }}" alt="" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- comment Modal -->
    <div class="modal fade commentModal" id="commentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered   modal-xl ">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">
                        close
                    </span>
                </button>
                <div class="modal-body">
                    <h5 class="fw-6 mb-3">Comment </h5>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="h-100">
                                <textarea name="" id="" cols="30" rows="6"
                                    class="form-control border-0 shadow-none bg-white"
                                    placeholder="Type here..." v-model="commentObject.comment"></textarea>
                                <div class="w-100 pt-4">
                                    <button class="btn rounded-pill" @click="postComment">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <figure class="d-block h-auto m-0 shadow" style="border-radius: 25px;">
                                <img :src="selectedPostDetail.image" alt="" class="d-block w-100" style="height: 260px;">
                            </figure>
                        </div>
                        <div class="col-md-12">

                            <ul class="list-unstyled postList">
                                <li class="row mx-auto post-comment-inner" v-for="(comment,index1) in comments">
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <img :src="'/storage/'+comment.user.profile_photo_path"
                                                alt="" class="d-block" v-if="comment.user.profile_photo_path">
                                            <img src="{{ asset('user_assets/images/no-image.jpg') }}"
                                                alt="" class="d-block" v-else>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="h-100">
                                            <h5 class="font-weight-bold mb-0 text-capitalize">@{{comment.user.name}}</h5>
                                            <h6 class="text-muted"><small><i>@{{comment.create_human_readable}} </i></small></h6>
                                            <p class="text-secondary">
                                                <span v-if="(comment.comment).length<120">@{{comment.comment}}</span>
                                                <span v-else>@{{(comment.comment).substring(0,120)}}... <a href="javascript:;" :data-text="comment.comment" onclick="showLongText(this)">read more</a></span><br/>
                                                <a v-if="comment.user_id == ({{auth()->user()->id}})" href="javascript:;" @click="deleteComment(comment,index1)" :id="'delete-comment-'+comment.id"><u>Delete</u></a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="w-100 pt-3 text-center" v-if="commentpagination.next_page_url">
                                <button class="btn rounded-pill" @click="loadCommentsByPostId">
                                    Load more
                                </button>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
    @push('scripts')
    @if(\Session::get('reg_success') && \Session::get('reg_success') == 'yes')
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "RegistrationForm",
                action: "RegistrationSuccessfull"
            })
        </script>
    @endif
    @if(\Session::get('login_success') && \Session::get('login_success') == 'yes')
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "LoginForm",
                action: "LoginSuccessfull"
            })
        </script>
    @endif
<script src="https://connect.facebook.net/en_US/all.js"></script>
    <script>
        function showLongText(that){
            var text = $(that).data('text'); 
            $(that).closest('span').html(text);
        }
        
        
	new Vue({
	el: '#dashboard',
	data: {
        authUserId : "{{auth()->id()}}",
        posts:[],
        postpagination:{
            next_page_url:"{{route('user.post.list')}}"
        },
        selectedPostDetail:{},
        selectedPostIndexOfPostsArray:0,
        postObject:{
            title:"",
            description:"",
            image:""
        },
        commentObject:{
            comment:""
        },
        comments:[],
        commentpagination:{
            next_page_url:""
        },
        errorMsg:null,
        createPostLoading:false
    },
    mounted(){
        FB.init({
        appId:'2867394716907798',
        cookie:true,
        status:true,
        xfbml:true
        });
    },
	created(){
		this.loadPosts();
	},
	methods:{
        getTwitterUrl(){
            return `https://twitter.com/intent/tweet?text=${this.selectedPostDetail.description}%20%23${this.camelize(this.selectedPostDetail.title)}&url=${this.selectedPostDetail.image}`;
        },
        loadPosts(){
			let self=this;
			fetch(self.postpagination.next_page_url)
			.then(res=>res.json())
			.then(function (result) {
				 console.info('loadPosts',result);
                 if(result.status){
                    self.posts=[...self.posts,...result.data.data];
                    self.postpagination=result.data;
                 }
			});
		},
         loadCommentsByPostId(){
			let self=this;
			fetch(self.commentpagination.next_page_url)
			.then(res=>res.json())
			.then(function (result) {
				 console.info('loadCommentsByPostId',result);
                 if(result.status){
                    self.comments=[...self.comments,...result.data.data];
                    self.commentpagination=result.data;
                 }
			});
		},
        createPost(){
			let self=this;
            self.createPostLoading=true;
            self.postObject={
                ...self.postObject,
                _token: '{{csrf_token()}}'
            };
            console.info('data',self.postObject);
            const formData  = new FormData();

            for(const name in self.postObject) {
                formData.append(name, self.postObject[name]);
            }

					fetch("{{route('user.post.save')}}", {method: 'post',body: formData}).then(function(response) {
						return response.json();
					}).then(function(data) {
						console.info('data',data);
                        if(data.status){
                            self.errorMsg=null;
                            self.postObject.title="";
                            self.postObject.description="";
                            self.postObject.image="";
                            self.posts=[];
                            self.postpagination.next_page_url=self.postpagination.first_page_url;
                            self.loadPosts();
                            self.createPostLoading=false;
                            $('#staticBackdrop').modal('hide');
                        }
                        else
                        self.errorMsg=data.message;
                        self.createPostLoading=false;
					});
		},
        openModal(post,index,loadComment=false){
            console.info('openModal',post);
            this.selectedPostDetail=post;
            this.selectedPostIndexOfPostsArray=index;
            if(loadComment){
                this.comments=[];
                this.commentpagination.next_page_url=`/user/commentlist/${post.id}`;
                this.loadCommentsByPostId();
            }
        },
        deletPost(post,index){
                let self=this;
                Swal.fire({
                    icon: "warning",
                    title:"Are you sure?",
                    html:"You won't be able to recover this post!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:"Yes, delete it!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
			           let data={ "_token": '{{csrf_token()}}'};
					fetch(`/user/post-delete/${post.id}`, {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(data)}).then(function(response) {  //, {method: 'post',body: JSON.stringify(opts)}
						return response.json();
					}).then(function(data) {
						if(data.status){
                                Swal.fire({
                                icon:"success",
                                title:"Success!",
                                html:"Post has been deleted successfully"
                                })
                            self.posts=[];
                            self.postpagination.next_page_url=self.postpagination.first_page_url;
                            self.loadPosts();
                        }
                        else
                        self.errorMsg=data.message;
					});
                }
                })
        },
        deleteComment(comment,index){
                let self=this;
                Swal.fire({
                    icon: "warning",
                    title:"Are you sure?",
                    html:"You won't be able to recover this comment!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:"Yes, delete it!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
			           let data={ "_token": '{{csrf_token()}}'};
					fetch(`/user/comment-delete/${comment.id}`, {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(data)}).then(function(response) {  //, {method: 'post',body: JSON.stringify(opts)}
						return response.json();
					}).then(function(data) {
						if(data.status){
                                Swal.fire({
                                icon:"success",
                                title:"Success!",
                                html:"Comment has been deleted successfully"
                                });
                                console.log(`#delete-comment-${comment.id}`);
//                              $(`#delete-comment-${comment.id}`).closest('.post-comment-inner').remove(); 
                            self.comments=[];
                            self.commentpagination.next_page_url=self.commentpagination.first_page_url;
                            self.loadCommentsByPostId();
                            self.posts[self.selectedPostIndexOfPostsArray].comment_count=data.data.comment_count;
//                            self.comments=[];
//                            self.postpagination.next_page_url=self.postpagination.first_page_url;
//                            self.loadCommentsByPostId();
                        }
                        else
                        self.errorMsg=data.message;
					});
                }
                })
        },
        refresh(){
            this.posts=[];
            this.readMoreActivated=false;
            this.postpagination.next_page_url=this.postpagination.first_page_url;
            this.loadPosts();
        },
        postComment(){
            let self=this;
            self.commentObject={
                ...self.commentObject,
                post_id: self.selectedPostDetail.id,
                _token: '{{csrf_token()}}'
            };
					fetch("{{route('comment.save')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.commentObject)}).then(function(response) {
						return response.json();
					}).then(function(result) {
						console.info('postComment-data',result);
                        if(result.status){
                            self.commentObject.comment="";
                            self.comments=[];
                            self.commentpagination.next_page_url=self.commentpagination.first_page_url;
                            self.loadCommentsByPostId();
                            self.posts[self.selectedPostIndexOfPostsArray].comment_count=result.data.comment_count;
                            //self.postpagination.next_page_url=self.postpagination.current_page;
                            //self.loadPosts();
                        }
					});
        },
        facebookInviteFriends(){
            let self=this;
            let hashtagText=`#${self.camelize(self.selectedPostDetail.title)}`;
            console.info('hashtagText',hashtagText);
            FB.ui({
                method: 'share',
                href: self.selectedPostDetail.image,//'https://gentlemens.dedicateddevelopers.us/user/dashboard',
                redirect_uri:'{{auth()->user()->tracking_link}}',
                hashtag: hashtagText,
                quote : self.selectedPostDetail.description
            }, function(response){
            console.log(response);
            });
        },
        camelize(str) {
            if(!str) return false;
            return str.replace(/(?:^\w|[A-Z]|\b\w|\s+)/g, function(match, index) {
            if (+match === 0) return ""; // or if (/\s+/.test(match)) for white spaces
            return index === 0 ? match.toLowerCase() : match.toUpperCase();
            });
        },
        activateReadMore(index){
             this.posts[index].read_more_activated=true;
        },
        previewImage(event){
            console.log(event.target.files);
            this.postObject.image=event.target.files[0];
        }
    }
    })
</script>
    @endpush
</x-layouts.user>
