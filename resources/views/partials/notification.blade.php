  <div class="row">
        <div class="col-md-9 col-sm-9 col-lg-9" style=" ">
          <div class="panel-heading">
            <a href="{{route('getJobpost',['post_id'=>$notification->data['employer'][0]['jobpost_id'],
            'employer_id'=>$notification->data['employer'][0]['id'],
            'notification_type'=>$notification->type,'id'=>$notification->id])}}" class="wrap">
                
                    {{$notification->data['employer'][0]['firstname']}} 
                    {{$notification->data['employer'][0]['lastname']}} from
                    {{$notification->data['employer'][0]['company_details']}} 
                    wants to hire you as a {{$notification->data['employer'][0]['position']}},
                    {{$notification->data['employer'][0]['profession']}}.
                
            </a>
            </div>

        </div>

        <div class="col-md-3 col-sm-3 col-lg-3" style="">
            
            <?php $hireflag=0 ;?>
        
          @foreach($is_hired as $is_hire)
            @if($notification->data['employer'][0]['jobpost_id']==$is_hire->hire_post_id 
            && $is_hire->is_invitaion_accepted==1)
            
               <button class="btn btn-sm btn-success" 
                 style="float:right; margin-top:25px; margin-right:5px;" disable>Accepted</button>
            
             <?php $hireflag++; ?>
            @break
            @endif
          @endforeach
       
          @if($hireflag==0)
             <form method="post"  
             action="{{ route('acceptInvite',['id'=>$notification->data['employer'][0]['jobpost_id']])}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="employer" value="{{$notification->data['employer'][0]['id']}}">
                <input type="hidden" name="notify_id" value="{{$notification->id}}">
                <div class="panel-heading">
                <button class="btn btn-sm btn-primary" 
                 style="float:right;">Accept Invitation</button>
                </div>
            </form>
            @endif
            
        </div>


    </div>
