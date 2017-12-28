<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12" >
        <div class="panel-heading">
        <a href="{{route('getJobpost',['post_id'=>$notification->data['value'][0]['jobpost_id'],
        'employer_id'=>$notification->data['value'][0]['id'],
        'notification_type'=>$notification->type,'id'=>$notification->id])}}" class="wrap">
            
                {{$notification->data['employee']['firstname']}} 
                {{$notification->data['employee']['lastname']}} has
                accepted your job offer as a 
                {{$notification->data['value'][0]['position']}},
                {{$notification->data['value'][0]['profession']}}.
            
        </a>
        </div>

    </div>
</div>
