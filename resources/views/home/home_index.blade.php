@extends('layouts.app') @section('page-title') Home @endsection @section('content')
<!--style-->
<style>
  
</style>
<!--script-->
<!--end script -->
<!--End Style-->
<!--Main content-->
<div class="container">
  <div class="row content">
    <!--side bar content-->

    <div class="col-md-3 col-sm-3 bg-light sidebar">
      <nav class="nav-sidebar">
        <div class="collapse navbar-collapse" id="side-navbar-collapse">
          <ul class="nav">
            <li>
              <!--profile button-->
              <div class="media button_profile button_m " id="bp">
                <a href="{{ url('profile') }}">
                  <div class="media-left ">
                    <img class="media-object photo-profile img-circle" src="/uploads/profile/{{$user['p_pic']}}" width="20"
                      height="20" alt="...">
                  </div>
                  <div class="media-body" data-toggle="tooltip" data-placement="bottom" title="{{$user->firstname }} {{$user->lastname }}">
                    <h5 class="media-heading"> {{$user->firstname }} {{$user->lastname }}</h5>
                  </div>
                </a>
              </div>
              <!--end profile button-->

            </li>
            <br>
            <form action="{{ route('home.index')}}">

              <button type="submit" class="button_connection button_m btn" id="bm" name="connection" value="{{$interest->profession}}"
                data-toggle="tooltip" data-placement="bottom" title="{{$interest->profession}}">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                </i> {{$interest->profession}}</button>
              <br>

              <button type="submit" class="button_connection button_m  btn" id="bm1" name="connection" value="{{$interest->industry}}"
                data-toggle="tooltip" data-placement="bottom" title="{{$interest->industry}}">
                <i class="fa fa-industry" aria-hidden="true"></i> {{$interest->industry}}</button>
              <br>

              <button type="submit" class="button_connection button_m  btn" id="bm2" name="connection" value="{{$user->education}}" data-toggle="tooltip"
                data-placement="bottom" title="{{$user->education}}">
                <i class="fa fa-university" aria-hidden="true"></i> {{$user->education}}</button>
              <br>
            </form>
            <br>
            <section>
              <a href="{{ url('jobpost') }}" class="button_connection button_m  btn" 
                 data-placement="bottom" title= 'All Jobposts' data-toggle="tooltip"
                 style="color: inherit; text-decoration: inherit;">
                 
               <i class="fa fa-briefcase" aria-hidden="true"></i>  All Jobposts</a>
              <br>
            </section>

          </ul>

        </div>
      </nav>
    </div>

    <!--end side bar-->

    <!--post body-->
    <div class="col-md-7 col-sm-7 col-lg-7 show_home_post" id="h_post">
      <div class="panel panel-default" data-toggle="modal" data-target="#myModal" style="background-color: white; border-width:5px;border-style:outset; padding: 10px;  box-shadow: 10px 10px 5px #888888;">
        <div class="panel-heading">
          <div class="btn-group btn-group-md">
            <button type="button" class="btn btn-link">Make post</button>
          </div>
        </div>
        <div class="panel-body">
          <textarea class="form-control  p-text-area" rows="2" placeholder="Write something" style="resize: none;" id="user_post" disabled></textarea>
        </div>
        <div class="panel-heading">
          <div class="btn-group btn-group-md">

          </div>
        </div>
      </div>
      <!--postshow rating comments -->
      <div id="post_view">
       @include('template.PostsShowInterface')

     </div>
      <!--end post show rating comments-->

    
    </div>
    
    <!--post body end-->
      
       <!--Post Modal-->
       @include('template.postModal')
 

      <!--modal-->
     
  </div>
  
  
  
</div>

<script type="text/javascript">
  //shows projects fields
  $(document).ready(function () {
    $("#show_porjectFields").hide();
    $('#url').removeAttr('required');
    $("input[name='post_type']").click(function () {
      var post_type = $("input[name='post_type']:checked").val();
      if (post_type == "project") {
        $('#url').attr('required', true);
        $("#show_porjectFields").show();

      } else {

        $('#url').removeAttr('required');
        $("#show_porjectFields").hide();

      }

    });

    //select all check box

    $("#btn_text").html("All Connection  <span class='caret'></span>");
    $("#selectall").click(function () {
      $("#btn_text").html("All Connection  <span class='caret'></span>");
      if (this.checked) {

        $('.checkItem').each(function () {
          this.checked = true;


        })
      } else {
        $("#btn_text").html("Select Connection <span class='caret'></span>");
        $('.checkItem').each(function () {
          this.checked = false;
        })
      }
    });

    $(".checkItem").click(function () {
      $('#selectall').removeAttr('checked');
      $('.checkItem').removeAttr('checked');
      var checkedItems = $('.checkItem:checked');
      if (checkedItems.length > 0) {
        var res = "";
        checkedItems.each(function () {
          res += $(this).val() + " ";
        });
        $("#btn_text").html(res + "<span class='caret'></span>");
      } else {
        $("#btn_text").html("Select Connection <span class='caret'></span>");
      }


    });
    //end select all check box

    //image show while select
    // $('input[type="file"]').change(function(e){

    // var fileName = e.target.files;
    // $('#show_imageFields').html(fileName.length +" Images Selected");
    /*for(var i=0;i<fileName.length;i++){
      console.log(fileName[i].name);
    }*/
    // });
    //end image show while select


    $('input[type="file"]').change(function (e) {
      if(this.files.length>5)
      {
         $("#error").html('Maximum 5 image');
         $(':input[type="submit"]').prop('disabled', true);
      }
      else if(this.files.length<=5)
      {
        $("#error").empty();
        $(':input[type="submit"]').prop('disabled', false);
      }
      $('#image_preview').empty();
      for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        var reader = new FileReader();
        reader.onload = function (e) {

          $('<img />', {
            "src": e.target.result,
            "width": "15%",
            "height": "100px",
            "style": "padding:2px; width:20% ; height:100px;",
          }).appendTo(image_preview);
        }

        reader.readAsDataURL(this.files[i]);
      }
    });
    
   
     

    //get posts by ajax
     
      var last_p_id= $("#last_post_id").text();
      //console.log(last_p_id);
      var page=0;
      $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
         page++;
         if(page>0){
            var page_id=page-1;
            var ajax_last_p_id=$("#ajax_last_post_id"+page_id).text();
            //console.log(ajax_last_p_id +"new last id");
            if(ajax_last_p_id){
              last_p_id=ajax_last_p_id;
            }
       }
        //console.log(last_p_id);
        fetchPosts(last_p_id,page);
      }
    });
    
 
    function fetchPosts(last_p_id,page) {
      
      clearTimeout( $.data( this, "scrollCheck" ) );

      $.data( this, "scrollCheck", setTimeout(function() {
        
        $.ajax({
            url: "{{url('/home/get_post')}}",
            type: 'GET',
            
            data: {
              'last_p_id': last_p_id,
              'page':page
            },
            success: function (data) {
                $('#post_view').append(data.posts);
                //console.log(data);
            },
            error: function(data){
                console.log(data + "error");
            }
            
        });

      
      },50))
 
        
    }
    //end get post by ajax
  });//end document ready

 //ajax rating post 
  function rate(post_id, rating) {

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "<?php echo url('/rating') ?>",
      data: "rating=" + rating + "&post_id=" + post_id,
      async:false,
      success: function (data) {

        console.log("inserted");
       
      }
    });

     //get avg rating
        $.ajax({
          url: "{{url('/rating/getdata')}}",
          type: 'GET',
          data: {
            'post_id': post_id
          },
          success: function (response) {
            console.log(response); 
             
            
            $("#"+post_id).html(response);
            $("#hoverDisable"+post_id).removeClass("HeaderBarThreshold");

            $("#after_rate"+post_id).html("Rated ");
            $("#after_user_rate"+post_id).html('<i class="active fa fa-star" aria-hidden="true" style="color:#F39C12;font-weight:400;"></i>  You rated this project ');
            $("#after_user_rate_modal"+post_id).html('You , ');
          }
        });
        //end avg rating

  } //end ajax post

  /*//get posts by ajax
    var page = 1; //track user scroll as page number, right now page number is 1
    get_post(page); //initial content load
    $(window).scroll(function() { //detect page scroll
      if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
        page++; //page number increment
        //get_post(page); //load content
       
      }
    }); 

    function get_post(page) {
       $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            beforeSend: function()
            {
                $('.ajax-loading').show();
            }
        })
         .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-loading').html("No more records found");
	                return;
	            }
	            $('.ajax-loading').hide();
	            $("#post-data").append(data.html);
	        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
    }   
  //end get post by ajax*/

  //check if user likes a post or not
  /* $(function(){
     $.ajax({
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               type: "GET",
               url: "<?php echo url('/rating/showlikedPost') ?>",
              
               success: function(e) {
                 console.log(e);
               }
       });
   });*/
  //end if user likes a post or not


  //handles visivility validation
  $(function () {

    var requiredCheckboxes = $(':checkbox[required]');
    requiredCheckboxes.change(function () {

      if (requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
      } else {
        requiredCheckboxes.attr('required', 'required');

      }
    });
  });



  function upload_image() {
    document.getElementById('my_images').click();
  }

  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });


</script>


@endsection