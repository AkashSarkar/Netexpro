<?php $rate_count=0; $fla=0?> 
    @foreach($user_rate_info as $rate_info) 
        @if($rate_info->post_id==$userpost->post_id)


            <?php $rate_count=$rate_count+1; $rating_post_id=$rate_info->post_id?>
            @if($rate_info->user_id==$user->id)
            <?php ;
             $fname="You";
             $lname=" ";
             $fla=$fla+1;
            ?>
            @elseif($fla==0)
            <?php ;
             $fname=$rate_info->firstname;
             $lname=$rate_info->lastname;

            ?>
            @endif

        @endif 
    @endforeach 
@if($rate_count!=0)
        <span data-toggle="modal" data-target="#rateModal<?php echo  $rating_post_id ;echo $rate_count;?>" style="color:#F39C12;font-weight:400;">
            <i class="active fa fa-star" aria-hidden="true"></i> 
            
             <span style="font-weight:600; color:#365899" id="after_user_rate_modal{{$userpost->post_id}}"> {{$fname}} {{$lname}}</span>
             <span style="font-weight:600; color:#365899">
             @if($rate_count>1)
              and  {{$rate_count-1}} others
            @endif
            rated this project</span>
        </span>
        <div class="modal fade" id="rateModal<?php echo  $rating_post_id ;echo $rate_count;?>" role="dialog">
            <div class="modal img-modal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <ul class="img-comment-list">
                                        @foreach($user_rate_info as $rate_info) @if($rate_info->post_id==$rating_post_id)
                                        <li>
                                            <div class="comment-img">
                                                <img src="/uploads/profile/{{$rate_info->p_pic}}" >
                                            </div>
                                            <div class="comment-text">
                                                <strong>
                                                    <a href="">{{$rate_info->firstname}} {{$rate_info->lastname}}</a>
                                                </strong>
                                                <p></p>
                                                <span class="date sub-text">{{$rate_info->created_at}}</span>
                                            </div>
                                        </li>
                                        @endif @endforeach
                                    </ul>
                                </div>



                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
      </div>

@endif