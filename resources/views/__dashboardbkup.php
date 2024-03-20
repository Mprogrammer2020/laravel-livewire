<x-layouts.user>

    <div class="layerOne">
        <div class="row">
        @foreach($details as $dashboardvalue)
            <div class="col-xl-6  ">
                <h4 class="text-primary fw-6 mb-4">{{$dashboardvalue->header_title}}</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="vidBox">
                            <!-- <video src="{{ asset('user_assets/images/bkp-Washed.mp4') }}"></video> -->
                            <img src="{{ asset('user_assets/images/'.$dashboardvalue->video_thumbnail_image) }}" alt="">
                            <a data-fancybox="gallery" class="cover d-flex align-items-center justify-content-center" href="{{$dashboardvalue->video_link}}">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" >
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
                    <div class="col-md-6 longText">
                        <p>{{$dashboardvalue->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-xl-6">
                <div class="h-100 snapShot">
                    <h4 class="text-dark fw-6 mb-4">Harvest Snapshot</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="snapShotBoxOne d-flex flex-column   h-100 p-4">
                                <h6 class="text-primary">Plants</h6>
                                <div class="number">
                                    01
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="snapShotBoxTwo d-flex flex-column   h-100 p-4">
                                <h6 class="text-primary">Progress</h6>
                                <div class="progress ">
                                    <div class="count d-flex align-items-center justify-content-center">
                                        <span> 45%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="snapShotBoxThree d-flex flex-column   h-100 p-4">
                                <h6 class="text-primary mb-auto">Gram Wallet</h6>
                                <div class="smallNumber mb-auto">
                                    10 Grams
                                </div>
                            </div>
                        </div>
                        <div class="col-12  mb-0 pt-4">
                            <button class="btn ">Buy Plants</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layerTwo">
        <div class="socialWrap">
            <div class="caseOne">
                <div class="row align-items-center">
                    <div class="col-auto  title">Social Wall</div>
                    <div class="col-auto ml-auto">
                        <button class="btn   rounded-pill " data-toggle="modal" data-target="#staticBackdrop">
                            Add Post
                        </button>
                    </div>
                </div>
            </div>

            <div class="caseTwo">
            @foreach($posts as $postvalue)
            
                <div class="postRow">
                    <div class="row">
                        <div class="col">
                            <div class="lineOne d-flex flex-wrap">
                                <div class="d-inline-flex align-items-center mr-3">
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 10V9C9 8.46957 8.78929 7.96086 8.41421 7.58579C8.03914 7.21071 7.53043 7 7 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V10M7 3C7 4.10457 6.10457 5 5 5C3.89543 5 3 4.10457 3 3C3 1.89543 3.89543 1 5 1C6.10457 1 7 1.89543 7 3Z"
                                            stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <span>Posted By {{$postvalue->user->name}}</span>
                                </div>
                                <div class="d-inline-flex align-items-center ">
                                    <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.77778 1V2.8M3.22222 1V2.8M1 4.6H9M1.88889 1.9H8.11111C8.60203 1.9 9 2.30294 9 2.8V9.1C9 9.59706 8.60203 10 8.11111 10H1.88889C1.39797 10 1 9.59706 1 9.1V2.8C1 2.30294 1.39797 1.9 1.88889 1.9Z"
                                            stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <span>{{$postvalue->created_at->diffForHumans()}}</span>
                                </div>
                            </div>

                            <div class="lineTwo">
                                <span>{{$postvalue->title}}</span> {{$postvalue->description}}
                            </div>
                            <div class="lineThree">
                                Curabitur nec arcu vitae ligula consectetur

                                <svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 5.5V9.1C1 9.33869 1.09219 9.56761 1.25628 9.7364C1.42038 9.90518 1.64294 10 1.875 10H7.125C7.35706 10 7.57962 9.90518 7.74372 9.7364C7.90781 9.56761 8 9.33869 8 9.1V5.5M6.25 2.8L4.5 1M4.5 1L2.75 2.8M4.5 1V6.85"
                                        stroke="#379633" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <div class="lineFour">
                                <div class="d-inline-flex mr-3 align-items-center">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15 10.3333C15 10.7459 14.8361 11.1416 14.5444 11.4333C14.2527 11.725 13.857 11.8889 13.4444 11.8889H4.11111L1 15V2.55556C1 2.143 1.16389 1.74733 1.45561 1.45561C1.74733 1.16389 2.143 1 2.55556 1H13.4444C13.857 1 14.2527 1.16389 14.5444 1.45561C14.8361 1.74733 15 2.143 15 2.55556V10.3333Z"
                                            stroke="#8A86AF" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class = "commentspan" id="{{$postvalue->id}}" data-target="#commentmodal" data-toggle="modal">1.6k Comments</span>
                                </div>
                                <div class="d-inline-flex mr-3 align-items-center">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.72667 9.057L9.28 11.843M9.27333 4.157L4.72667 6.943M13 3.1C13 4.2598 12.1046 5.2 11 5.2C9.89543 5.2 9 4.2598 9 3.1C9 1.9402 9.89543 1 11 1C12.1046 1 13 1.9402 13 3.1ZM5 8C5 9.1598 4.10457 10.1 3 10.1C1.89543 10.1 1 9.1598 1 8C1 6.8402 1.89543 5.9 3 5.9C4.10457 5.9 5 6.8402 5 8ZM13 12.9C13 14.0598 12.1046 15 11 15C9.89543 15 9 14.0598 9 12.9C9 11.7402 9.89543 10.8 11 10.8C12.1046 10.8 13 11.7402 13 12.9Z"
                                            stroke="#8A86AF" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Share
                                </div>
                                <!-- <div class="d-inline-flex align-items-center">
                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 15L6.5 11.1111L1 15V2.55556C1 2.143 1.16556 1.74733 1.46026 1.45561C1.75496 1.16389 2.15466 1 2.57143 1H10.4286C10.8453 1 11.245 1.16389 11.5397 1.45561C11.8344 1.74733 12 2.143 12 2.55556V15Z"
                                            stroke="#8A86AF" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    Save
                                </div> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="thumb">
                                <img src="{{ asset('user_assets/images/'.$postvalue->image) }}" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
               
                 

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
                <form  id="FrmImgUpload" >
                @csrf
                <div class="modal-body">
                <span id="error"></span>
                    <h5 class="fw-6 mb-3">Write your post here</h5>
                    <div class="form-group">
                        <input class="bg-white border-0 form-control h-auto px-4 py-3 rounded-pill shadow-none"
                            type="text" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" cols="30" rows="6"
                            class="form-control border-0 shadow-none bg-white px-4"
                            placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="bg-white border cp d-block px-4 py-3 rounded-pill w-100" id="clickfile">
                            <input name="image" class="form-control border-0 shadow-none bg-white rounded-pill" type="file" hidden>
                            <span id="filename">Upload File</span>
                        </label>
                    </div>
                    <div class="w-100 pt-4">
                        <button class="btn rounded-pill " id="addpost" type="submit" >
                            Add Post
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="commentmodal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="commentmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  ">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons">
                        close
                    </span>
                </button>
                
             <div class="modal-body">
                <form  id="Frmcomment" method="post">
                @csrf
                <span id="msg"></span>
                    <h5 class="fw-6 mb-3">Write your comment here</h5>

                    <div class="form-group">
                        <textarea name="comment" cols="30" rows="6"
                            class="form-control border-0 shadow-none bg-white px-4"
                            placeholder="Comment"></textarea>
                    </div>
                    <input type="hidden" name="post_id" id="postid">
                    
                    <div class="w-100 pt-4">
                        <button class="btn rounded-pill " id="addcomment" type="submit" >
                            Add Comment
                        </button>
                    </div>
                </form>
                <div class="container">
                    <ul class="categories-list">
                        <li>
                            <p></p>
                        </li>
                    </ul>
                </div>
             </div>
                
            </div>
        </div>
    </div>


@push('scripts')

<script src=//code.jquery.com/jquery-3.5.1.min.js></script>

    <script type="text/javascript">
    $("#clickfile").click(function(){
        $('input[type=file]').change(function() {
        var imagename = $('input[type=file]')[0].files[0];
        $("#filename").empty();
         $("#filename").html(imagename.name);
        });        
    });
    
    // $(".commentspan").click(function(){
    //    $("#postid").val($(this).prop('id'));
    //    $.ajax({  
    //                 url: "{{ route('comment.list') }}",  
    //                 method: "GET",  
    //                 headers: { "Accept": "application/json; odata=verbose" },  
    //                 success: function (data)  
    //                 {  
    //                     $('body').html(JSON.stringify(data));  
    //                     console.log(JSON.stringify(data));  
    //                     $.each(data.d.results, function(index, item){  
    //                     console.log(item.Title);  
    //                 });  
    //             },  
    //             error: function (data)  
    //             {  
    //                 $('body').html(data);  
    //                 console.log("error");  
    //             }  
    //         });  
    // })
    
    Frmcomment.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{ route('comment.save') }}", {
      method: 'POST',
      body: new FormData(Frmcomment)
    });
    
    let result = await response.json();
    console.log(result);
    if(result.status == '200'){
        $("#msg").html(result.message).css('color','green');
        $('#commentmodal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
         });

    }
    else{
        $("#msg").html(result.message).css('color','red');
    }

  }
 

    FrmImgUpload.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{ route('user.post.save') }}", {
      method: 'POST',
      body: new FormData(FrmImgUpload)
    });
    
    let result = await response.json();
    if(result.status == '200'){
        //$("#staticBackdrop").remove();
       // console.log(result);
        jQuery.noConflict();
        $("#filename").empty();
        $("#filename").html('Upload File');
        $('#staticBackdrop').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
         })
        setTimeout($('#staticBackdrop').modal('toggle'),3000);
        // $('#staticBackdrop').on('hide.bs.modal', function (e) {
        //     e.preventDefault();
        // })
        //
        var obj = JSON.parse(JSON.stringify(result))
        var numbers = obj.data;
       // console.log(numbers);
        var options = new Array();
        var data_length = Object.keys(numbers).length;
        for (i = 0; i < data_length; i++) {
           
           options.push('<div class="postRow">'+
                    '<div class="row">'+
                        '<div class="col">'+
                            '<div class="lineOne d-flex flex-wrap">'+
                                '<div class="d-inline-flex align-items-center mr-3">'+
                                    '<svg width="10" height="11" viewBox="0 0 10 11" fill="none"'+
                                        'xmlns="http://www.w3.org/2000/svg">'+
                                        '<path'+
                                            'd="M9 10V9C9 8.46957 8.78929 7.96086 8.41421 7.58579C8.03914 7.21071 7.53043 7 7 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V10M7 3C7 4.10457 6.10457 5 5 5C3.89543 5 3 4.10457 3 3C3 1.89543 3.89543 1 5 1C6.10457 1 7 1.89543 7 3Z"'+
                                            'stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />'+
                                   '</svg>'+

                                    '<span>Posted By '+numbers[i].user.name+'</span>'+
                                '</div>'+
                                '<div class="d-inline-flex align-items-center ">'+
                                    '<svg width="10" height="11" viewBox="0 0 10 11" fill="none"'+
                                        'xmlns="http://www.w3.org/2000/svg">'+
                                        '<path'+
                                            'd="M6.77778 1V2.8M3.22222 1V2.8M1 4.6H9M1.88889 1.9H8.11111C8.60203 1.9 9 2.30294 9 2.8V9.1C9 9.59706 8.60203 10 8.11111 10H1.88889C1.39797 10 1 9.59706 1 9.1V2.8C1 2.30294 1.39797 1.9 1.88889 1.9Z"'+
                                            'stroke="#9A98AD" stroke-linecap="round" stroke-linejoin="round" />'+
                                    '</svg>'+

                                    '<span>'+create_human_readable+'</span>'+
                                '</div>'+
                            '</div>'+

                            '<div class="lineTwo">'+
                               '<span>'+numbers[i].title+'</span>'+numbers[i].description+'</div>'+
                            '<div class="lineThree">'+
                                'Curabitur nec arcu vitae ligula consectetur'+

                                '<svg width="9" height="11" viewBox="0 0 9 11" fill="none"'+
                                    'xmlns="http://www.w3.org/2000/svg">'+
                                    '<path'+
                                       'd="M1 5.5V9.1C1 9.33869 1.09219 9.56761 1.25628 9.7364C1.42038 9.90518 1.64294 10 1.875 10H7.125C7.35706 10 7.57962 9.90518 7.74372 9.7364C7.90781 9.56761 8 9.33869 8 9.1V5.5M6.25 2.8L4.5 1M4.5 1L2.75 2.8M4.5 1V6.85"'+
                                        'stroke="#379633" stroke-linecap="round" stroke-linejoin="round" />'+
                                '</svg>'+

                            '</div>'+
                            '<div class="lineFour">'+
                                '<div class="d-inline-flex mr-3 align-items-center">'+
                                    '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"'+
                                        'xmlns="http://www.w3.org/2000/svg">'+
                                        '<path'+
                                            'd="M15 10.3333C15 10.7459 14.8361 11.1416 14.5444 11.4333C14.2527 11.725 13.857 11.8889 13.4444 11.8889H4.11111L1 15V2.55556C1 2.143 1.16389 1.74733 1.45561 1.45561C1.74733 1.16389 2.143 1 2.55556 1H13.4444C13.857 1 14.2527 1.16389 14.5444 1.45561C14.8361 1.74733 15 2.143 15 2.55556V10.3333Z"'+
                                            'stroke="#8A86AF" stroke-width="2" stroke-linecap="round"'+
                                            'stroke-linejoin="round" />'+
                                    '</svg>'+
                                    '1.6k Comments'+
                                '</div>'+
                                '<div class="d-inline-flex mr-3 align-items-center">'+
                                    '<svg width="14" height="16" viewBox="0 0 14 16" fill="none"'+
                                        'xmlns="http://www.w3.org/2000/svg">'+
                                        '<path'+
                                            'd="M4.72667 9.057L9.28 11.843M9.27333 4.157L4.72667 6.943M13 3.1C13 4.2598 12.1046 5.2 11 5.2C9.89543 5.2 9 4.2598 9 3.1C9 1.9402 9.89543 1 11 1C12.1046 1 13 1.9402 13 3.1ZM5 8C5 9.1598 4.10457 10.1 3 10.1C1.89543 10.1 1 9.1598 1 8C1 6.8402 1.89543 5.9 3 5.9C4.10457 5.9 5 6.8402 5 8ZM13 12.9C13 14.0598 12.1046 15 11 15C9.89543 15 9 14.0598 9 12.9C9 11.7402 9.89543 10.8 11 10.8C12.1046 10.8 13 11.7402 13 12.9Z"'+
                                            'stroke="#8A86AF" stroke-width="2" stroke-linecap="round"'+
                                            'stroke-linejoin="round" />'+
                                    '</svg>'+
                                    'Share'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-auto">'+
                            '<div class="thumb">'+
                                '<img src="{{ asset("user_assets/images/")}}/'+numbers[i].image+'">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>');
           

        } 
        $(".caseTwo").empty('');
        $(".caseTwo").append(options);
        //window.location.href = "{{ route('user.dashboard') }}";
    }
    else{
        $("#error").html(result.message).css('color','red');
    }
    //console.log(result);
  };

    </script>

@endpush
</x-layouts.user>