<div class="panel panel-default" style="width:450px; text-align:justify;">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-lg-9">

            <a href="{{route('getJobpost',['post_id'=>$notification->data['employer'][0]['jobpost_id'],
            'employer_id'=>$notification->data['employer'][0]['id']])}}">
                <p class="panel-heading">
                    {{$notification->data['employer'][0]['firstname']}} 
                    {{$notification->data['employer'][0]['lastname']}} from
                    {{$notification->data['employer'][0]['company_details']}} 
                    wants to hire you as a {{$notification->data['employer'][0]['position']}},
                    {{$notification->data['employer'][0]['profession']}}.
                </p>
            </a>

        </div>

        <div class="col-md-3 col-sm-3 col-lg-3">
            <button class="btn btn-sm" style="float:right; margin-top:6px; margin-right:5px;">Accept Invitation</button>
        </div>


    </div>
</div>