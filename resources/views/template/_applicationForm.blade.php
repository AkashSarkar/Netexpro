<div class="modal-content">
<div class="modal-header Appmodal" style="padding:5px 5px;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4> Application Form</h4>
</div>
<div class="modal-body" style="padding:40px 50px;">
  <form role="form">
    <div class="form-group">
      <label for="usrname"><i class="fa fa-briefcase" aria-hidden="true"></i> Profession : {{ $jobpost->profession}} </label>
      <input type="hidden" class="form-control" id="usrname" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="psw"><i class="fa fa-user" aria-hidden="true"></i> Position : {{  $jobpost->position }} </label>
      <input type="hidden" class="form-control" id="psw" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="psw">
        <i class="fas fa-map-marker-alt"></i> Location :  {{$jobpost->location}}</label>
      <input type="hidden" class="form-control" id="psw" placeholder="Enter password">
    </div>
    
    <div class="form-group">
        <div class="row">
    <div class="col-md-3 col-sm-3">  
    <label for="psw"><i class="fas fa-file-pdf"></i> CV <span class="required">* </span> : </label>
</div>
    <div class="col-md-8 col-sm-9">   
    <input type="file" name="attachment" required>
        <h6>(Maximum 2MB)*</h6>
</div>
     </div>
     </div>


    <div class="form-group">
    <div class="row">
    <div class="col-md-3 col-sm-3">  
      <label for="psw"><i class="fas fa-lightbulb"></i> Heilights : </label>
</div>
<div class="col-md-9 col-sm-9">  
      <input type="text" class="form-control" id="psw" placeholder="Enter password">
</div>
    </div>
    </div>
      
  </form>
</div>

<div class="modal-footer Appmodalfoot">
  <button type="submit" class="btn btn-success btn-md pull-right" data-dismiss="modal" style="font-size:18px;font-weight:600">Apply</button>
  
</div>
</div>
</div>
</div>   