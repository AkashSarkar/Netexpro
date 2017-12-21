<div class="panel panel-default" style=" text-align:justify;">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-lg-9">

            <a href="{{route('getJobpost',['post_id'=>$notification->data['employer'][0]['jobpost_id'],
            'employer_id'=>$notification->data['employer'][0]['id']])}}">
                <p class="panel-heading" style="" >
                    {{$notification->data['employer'][0]['firstname']}} 
                    {{$notification->data['employer'][0]['lastname']}} from
                    {{$notification->data['employer'][0]['company_details']}} <br>
                    wants to hire you as a {{$notification->data['employer'][0]['position']}},
                    {{$notification->data['employer'][0]['profession']}}.
                </p>
            </a>

        </div>

        <div class="col-md-3 col-sm-3 col-lg-3">
             <form method="post"  
             action="{{ route('acceptInvite',['id'=>$notification->data['employer'][0]['jobpost_id']])}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="employer" value="{{$notification->data['employer'][0]['id']}}">
                
                <button class="btn btn-sm btn-primary" 
                 style="float:right; margin-top:25px; margin-right:5px;">Accept Invitation</button>
            </form>
            
        </div>


    </div>
</div>