<?php $applicant_count=0; $fla=0 ;$fname="";$lname="";?> 
    @foreach($job_applicants as $applicant_info) 
        @if($applicant_info->jobpost_id==$jobpost->jobpost_id)


            <?php $applicant_count=$applicant_count+1; $job_post_id=$applicant_info->jobpost_id?>
            
            <?php ;
             $fname=$applicant_info->firstname;
             $lname=$applicant_info->lastname;

            ?>
           

        @endif 
    @endforeach 
@if($applicant_count!=0)
        <!--<span data-toggle="modal" data-target="#applicantModal<?php echo  $job_post_id ;echo $applicant_count;?>"
         style="color:#F39C12;font-weight:400;">-->

        <span data-toggle="modal" data-target=""
         style="color:#F39C12;font-weight:400;">
            
        <span style="font-weight:800; font-size:18px; color:#F37C12" ><i class="fa fa-user-circle" aria-hidden="true"></i></span>
             <span style="font-weight:600; color:#365899;margin-left:4px;" >{{$fname}} {{$lname}}</span>
            
             <span style="font-weight:600; color:#365899">
             @if($applicant_count>1 )
              and  {{$applicant_count-1}} others
            @endif
            apply for this job</span>
        </span>
        <div class="modal fade" id="applicantModal<?php echo  $job_post_id ;echo $applicant_count;?>"  role="dialog">
            <div class="modal img-modal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <ul class="img-comment-list">
                                        @foreach($job_applicants as $applicant_info)
                                        @if($applicant_info->jobpost_id==$jobpost->jobpost_id)
                                        <li>
                                            <div class="comment-img">
                                                <img src="/uploads/profile/{{$applicant_info->p_pic}}" >
                                            </div>
                                            <div class="comment-text">
                                                <strong>
                                                    <a href="{{route('public_view',['id'=>$applicant_info->user_id,
                                                    'jobpost_id'=>$jobpost->jobpost_id,'employer_id'=>$jobpost->user_id])}}">{{$applicant_info->firstname}} {{$applicant_info->lastname}}</a>
                                                </strong>
                                                <p></p>
                                                <span class="date sub-text">{{$applicant_info->created_at}}</span>
                                            </div>
                                            <?php $hireflag=0 ;?>
                                            @foreach($is_hired as $is_hire)
                                           
                                            @if($is_hire->employee_id==$applicant_info->user_id && $is_hire->hire_post_id==$applicant_info->jobpost_id)
                                                <button type="submit" class="btn btn-info btn-sm pull-right disabled " 
                                                style="margin-top: -40px;cursor:pointer;">Invitation Sent</button>
                                            <?php $hireflag++; ?>
                                            @break;
                                            @endif 
                                            @endforeach
                                            @if($hireflag==0)                
                                             <form method="post"  action="{{ url('/hire_employee')}}">
                                                    {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="employer" value="{{$jobpost->user_id}}">
                                                <input type="hidden" name="employee" value="{{$applicant_info->user_id}}">
                                                <input type="hidden" name="hire_post_id" value="{{$jobpost->jobpost_id}}">
                                                <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-top: -40px;">Hire</button>
                                            </form> 
                                            @endif
                                        </li>
                                        @endif 
                                        
                                        @endforeach
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