<div class="panel panel-default" style="text-align:justify;width:550px; word-wrap:break-word;overflow-wrap: break-word; ">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-lg-9" style=" ">
          <div class="panel-heading">
            <a href="{{route('getJobpost',['post_id'=>$notification->data['employer'][0]['jobpost_id'],
            'employer_id'=>$notification->data['employer'][0]['id']])}}" class="wrap">
                
                    {{$notification->data['employer'][0]['firstname']}} 
                    {{$notification->data['employer'][0]['lastname']}} from
                    {{$notification->data['employer'][0]['company_details']}} 
                    wants to hire you as a {{$notification->data['employer'][0]['position']}},
                    {{$notification->data['employer'][0]['profession']}}.
                
            </a>
            </div>

        </div>

        <div class="col-md-3 col-sm-3 col-lg-3" style="">
             <form method="post"  
             action="{{ route('acceptInvite',['id'=>$notification->data['employer'][0]['jobpost_id']])}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="employer" value="{{$notification->data['employer'][0]['id']}}">
                <div class="panel-heading">
                <button class="btn btn-sm btn-primary" 
                 style="float:right;">Accept Invitation</button>
                </div>
            </form>
            
        </div>


    </div>
</div>