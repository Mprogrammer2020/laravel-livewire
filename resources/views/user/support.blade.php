<x-layouts.user>
<div id="support_id">
 <div class="layerEight mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                 <h4 class="text-primary fw-6 mb-0">Tickets</h4>
            </div>
            <div class="col-6">
             <button class="btn btn-success rounded-pill float-right" data-toggle="modal" data-target="#create-ticket">
                  Create Ticket
             </button>
             </div>
        </div>

 </div>
 <div class="layer11 pb-5">
                <div class="row bg-white mx-0 px-2 py-4 rounded shadow mb-4 text-dark" v-for="(ticket,index) in tickets">
                    <div class="col-md">
                        <div class="cont">
                           <div class="d-flex justify-content-between">
                                <h5 class="fw-6">@{{ticket.subject}}</h5>
                                <b :class="{'text-danger': ticket.status=='Pending' , 'text-success': ticket.status=='Resolved'}">@{{ticket.status}}</b>
                           </div>
                                     <div v-if="!ticket.read_more_activated" class="d-inline">@{{ticket.description.slice(0, 200)}}</div>
                                     <a class="" v-if="!ticket.read_more_activated && ticket.description.length>200" @click="activateReadMore(index)" style="color:#007bff; cursor: pointer;">Read more...</a>
                                     <div v-if="ticket.read_more_activated" v-html="ticket.description" class="d-inline"> </div>
                           {{-- <p class="mb-0">
                               @{{ticket.description}}
                           </p> --}}
                        </div>
                                <div class="mt-1">
                                    <span  style="font-size: 13px;color: #9a98ad;">@{{ticket.create_human_readable}}</span>
                                </div>
                    </div>
                </div>
                <div class="w-100 text-center">
                    <button class="btn btn-success rounded-pill px-4" v-if="ticketpagination.next_page_url" @click="loadTickets">Load More <span class="material-icons align-middle">
                        arrow_drop_down
                        </span></button>
                </div>
        </div>
        <!-- Modal -->
    <div class="modal fade" id="create-ticket" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <h5 class="fw-6 mb-3">Make your ticket here</h5>
                        <div class="form-group">
                            <input name="description" id="" cols="30" rows="6" autofocus
                                class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                                placeholder="Subject" v-model="ticketObject.subject"/>
                        </div>
                        <div class="form-group">
                            <select class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none" v-model="ticketObject.issue_category_id">
                                <option v-for="issueCategory in issueCategories" :value="issueCategory.id">@{{issueCategory.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="30" rows="6"
                                class="form-control border-0 shadow-none bg-white px-4"
                                placeholder="Description" v-model="ticketObject.description"></textarea>
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
                            <button class="btn rounded-pill" id="addpost" @click="createTicket">
                                 @{{createTicketLoading? "Please Wait " : "Create"}} <i class="fa fa-circle-o-notch fa-spin fa-lg aria-hidden='true'" v-if="createTicketLoading"></i>
                            </button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    </div>
     @push('scripts')
<script src="https://connect.facebook.net/en_US/all.js"></script>
    <script>
	new Vue({
	el: '#support_id',
	data: {
        tickets:[],
        ticketpagination:{
            next_page_url:"{{route('user.support.ticket.list')}}"
        },
        ticketObject:{
            subject:"",
            issue_category_id:"",
            description:""
        },
        issueCategories:[],
        errorMsg:null,
        createTicketLoading:false,
        activeClass: 'active',
        PendingClass: 'text-danger'
    },
    mounted(){},
	created(){
		this.loadTickets();
	},
	methods:{
        loadTickets(){
			let self=this;
			fetch(self.ticketpagination.next_page_url)
			.then(res=>res.json())
			.then(function (result) {
				 console.info('loadPosts',result);
                 if(result.status){
                    self.issueCategories=result.issueCategories;
                    self.issueCategories.unshift({id:"",name:"Select an issue category"});
                    console.info('self.issueCategories',self.issueCategories);
                    self.tickets=[...self.tickets,...result.data.data];//self.tickets.push(result.data.data);
                    self.ticketpagination=result.data;
                 }
			});
		},
        createTicket(){
            let self=this;
            self.createTicketLoading=true;
            self.ticketObject={
                ...self.ticketObject,
                user_id: '{{auth()->id()}}',
                _token: '{{csrf_token()}}'
            };
					fetch("{{route('user.support.ticket.save')}}", {method: 'post',
						headers: {
						'Accept': 'application/json',
						'Content-Type': 'application/json'
						},
					credentials: "same-origin",body: JSON.stringify(self.ticketObject)}).then(function(response) {
						return response.json();
					}).then(function(result) {
						console.info('postComment-data',result);
                        if(result.status){
                            self.errorMsg=null;
                            self.ticketObject.subject="";
                            self.ticketObject.issue_category_id="";
                            self.ticketObject.description="";
                            self.tickets=[];
                            self.ticketpagination.next_page_url=self.ticketpagination.first_page_url;
                            self.loadTickets();
                            $('#create-ticket').modal('hide');
                            self.createTicketLoading=false;
                        }
                        else{
                            self.errorMsg=result.message;
                            self.createTicketLoading=false;

                        }
					});
        },
        activateReadMore(index){
             this.tickets[index].read_more_activated=true;
        }
    }
    })
</script>
    @endpush
</x-layouts.user>
