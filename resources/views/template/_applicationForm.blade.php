<div class="modal-content">
  <div class="modal-header Appmodal" style="padding:5px 5px;">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4> Application Form</h4>
  </div>

  <form class="form-horizontal" method="post" action="{{ route('availableforjob.store') }}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="modal-body" style="padding:40px 50px;">
      <input type="hidden" name="_method" value="post">
      <div class="form-group">
        <label for="profession">
          <i class="fa fa-briefcase" aria-hidden="true"></i> Profession : {{ $jobpost->profession}} </label>
        <input type="hidden" class="form-control" name="profession" value="{{$jobpost->profession}}">
      </div>
      <div class="form-group">
        <label for="position">
          <i class="fa fa-user" aria-hidden="true"></i> Position : {{ $jobpost->position }} </label>
        <input type="hidden" class="form-control" name="position" value="{{$jobpost->position}}">
      </div>
      <div class="form-group">
        <label for="location">
          <i class="fas fa-map-marker-alt"></i> Location : {{$jobpost->location}}</label>
        <input type="hidden" class="form-control" name="location" value="{{$jobpost->location}}">
      </div>
      @if($checkApplicant == 0 && $valid_candidate > 0)
       <div class="form-group">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <label for="CV">
              <i class="fas fa-file-pdf"></i> CV
              <span class="required">* </span> : {{$cv}} </label>
          </div>
          <div class="col-md-12 col-sm-12 ">
            <input type="file" name="attachment">
             <input type="hidden" name="prev_cv" value="{{$cv}}">
             <input type="hidden" name="available_post_id" value="{{$available_post_id}}">
            <span style="color:green;font-weight:600;">Edit Your CV </span><span style="color:orange;"> (Maximum 2MB)*</span>
            
          </div>
        </div>
      </div>

      @else
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <label for="CV">
              <i class="fas fa-file-pdf"></i>  CV
              <span class="required">* </span> : </label>
          </div>
          <div class="col-md-9 col-sm-9">
            <input type="file" name="attachment"  required>
            <h6>(Maximum 2MB)*</h6>
          </div>
        </div>
      </div>
      @endif

      



      <div class="form-group">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-lg-4">
            <label for="psw">
              <i class="fas fa-lightbulb" aria-hidden="true"></i> Heighlights : </label>
          </div>
          <div class="col-md-8 col-sm-8 col-lg-8">
            <input type="text" class="form-control" id="highlight" name="highlight" placeholder="Heighlights">
          </div>
        </div>
      </div>
      <input type="hidden" name="jobpost_id" value="{{$jobpost->jobpost_id}}">
    </div>
    <div class="modal-footer Appmodalfoot">
      <div class="col-md-4 col-md-offset-4 pull-right">
        <button type="submit" class="btn btn-success">
          Apply
        </button>
      </div>
    </div>
  </form>


  <!--<div class="modal-footer Appmodalfoot">
    <button type="submit" class="btn btn-success btn-md pull-right" data-dismiss="modal" style="font-size:18px;font-weight:600">Apply</button>

  </div>-->
</div>
