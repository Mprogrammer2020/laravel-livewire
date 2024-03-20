<x-layouts.user>
                    <div class="row" id="settings">
                    <div class="col-md-12 mb-1">
                        <h4>General Information</h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="name *"  v-model="userObject.name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="email"  v-model="userObject.email" disabled>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Phone"  v-model="userObject.phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row align-items-center">

                                <div class="col pr-0">
                                <div class="form-group mb-0">
                                <label class="bg-white mb-0 border cp d-block px-4 py-3 rounded-pill w-100" id="clickfile">
                                    <input name="image" class="form-control border-0 shadow-none bg-white rounded-pill"
                                        type="file" hidden @change="previewImage" accept="image/*">
                                    <span id="filename">@{{userObject.profile_photo_file ? userObject.profile_photo_file.name : 'Profile photo'}}</span>
                                </label>
                            </div>
                                </div>
                                <div class="col-auto">
                                <div class="profileBox">
                            <img :src="'/storage/'+userObject.profile_photo_path" v-if="userObject.profile_photo_path" alt="" style="width: 60px;height: 60px;" class="rounded-pill"/>
                            <img src="{{ asset('user_assets/images/no-image.jpg') }}" style="width: 60px;height: 60px;" v-else alt=""   />

                        </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 mt-5 mb-1">
                        <h4>Shipping Address</h4>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Street Address *"  v-model="userObject.street">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="House Number *"  v-model="userObject.house_number">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Address *"  v-model="userObject.address">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="City *"  v-model="userObject.city">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="State *"  v-model="userObject.state">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Postal Code *"  v-model="userObject.zip_code">
                            </div>
                        </div>
                        
                         <div class="col-lg-6">
                            <div class="form-group">
                            <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Country *"  v-model="userObject.country">
                            </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group w-50" v-if="errorMsg">
                            <div class="alert alert-danger rounded-pill" role="alert">
                            <ul class="ml-4">
                                <li v-for="error in errorMsg">
                                    @{{error[0]}}
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                         <div class="col-lg-12 pt-4">
                           <button class="btn btn-lg btn-success rounded-pill px-4" @click="submit">
                                        @{{submitLoading? "Please Wait " : "Save & Update"}} <i class="fa fa-circle-o-notch fa-spin fa-lg aria-hidden='true'" v-if="submitLoading"></i>
                           </button>
                        </div>

                    </div>
@push('scripts')
    <script>
	new Vue({
	el: '#settings',
	data: {
        userObject:{
            name: "{{auth()->user()->name}}",
            email:"{{auth()->user()->email}}",
            phone:"{{auth()->user()->phone}}",
            profile_photo_file:"",
            profile_photo_path: "{{auth()->user()->profile_photo_path}}",
            street:"{{auth()->user()->street}}",
            house_number:"{{auth()->user()->house_number}}",
            address:"{{auth()->user()->address}}",
            city:"{{auth()->user()->city}}",
            state:"{{auth()->user()->state}}",
            zip_code:"{{auth()->user()->zip_code}}",
            country:"{{auth()->user()->country}}"
        },
        submitLoading:false,
        errorMsg:null,

    },
	created(){
	},
	methods:{
        submit(){
			let self=this;
            self.submitLoading=true;
            self.userObject={
                ...self.userObject,
                _token: '{{csrf_token()}}'
            };
            console.info('data',self.postObject);
            const formData  = new FormData();

            for(const name in self.userObject) {
                formData.append(name, self.userObject[name]);
            }

					fetch("{{route('user.settings.save')}}", {method: 'post',body: formData}).then(function(response) {
						return response.json();
					}).then(function(data) {
						console.info('data',data);
                        if(data.status){
                             self.errorMsg=null;
                            self.submitLoading=false;
                            window.location = "{{route('user.dashboard')}}";
                        }
                        else
                        self.errorMsg=data.message;
                        self.submitLoading=false;
					});
		},
        previewImage(event){
            console.log(event.target.files);
            this.userObject.profile_photo_file=event.target.files[0];
        }
    }
    })
</script>
@endpush
</x-layouts.user>
