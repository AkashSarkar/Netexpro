<a href="#">
 <span>{{$notification->data['employer'][0]['firstname']}}</span> 
 <span>{{$notification->data['employer'][0]['lastname']}}</span>
 from <span>{{$notification->data['employer'][0]['company_details']}}</span>
 wants to hire you as a 
 <span>{{$notification->data['employer'][0]['position']}},</span>
 <span>{{$notification->data['employer'][0]['profession']}}.</span>

</a>
<button class="btn btn-sm" style="float:right; display:inline;">Accept</button>