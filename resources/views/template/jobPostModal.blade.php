<div id="jobModal" class="modal fade" role="dialog" style="margin-top:10%;">
    <div class="modal-dialog">

      <!--Job Modal content-->
      <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>

          <div class="modal-body">
            <p> 
              <label><input type="radio" name="job_post_option" value="1">Available for job</label> 
              <br>
              <label><input type="radio" name="job_post_option" value="2">Want to hire</label>
            </p>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>

      </div>

    </div>
  </div>

<!-- If available for job is selected -->
<div id="available_job_modal" class="modal fade" role="dialog" style="margin-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Available for job =><strong>Enter Info here</strong></h4>
          </div>

        <div class="modal-body">
               <?php
                  $professions = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );

                  $locations = array(
                    "Dhaka",
                    "Chittagong",
                    "Comilla",
                    "Sylhet",
                    "Rangpur"
                );

                  $positions = array(
                    "Manager",
                    "HR",
                    "Executive"  
                 );
               ?>
                  <form class="form-horizontal"  method="post" action="{{ route('availableforjob.store') }}" enctype="multipart/form-data">
               
                                {{ csrf_field() }}
                        <input type="hidden" name="_method" value="post">


                        
                        <!--Position start -->
                        <div class="form-group">
                        <label for="position" class="col-md-4 control-label">Preferred Job Position<span class="required">*</span></label>
                               <div class="col-md-6" >
                                    <select class="form-control" name="position"  value="{{ old('position') }}" >
                                        <span class="caret"></span>
                                        @foreach( $positions as $position)
                                        <option>{{ $position }}</option>
                                        @endforeach
                                    </select>
                               </div>
                        </div>       
                        <!--Position end -->
                      
                       
                        <!--Profession start -->
                        <div class="form-group">
                        <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                               <div class="col-md-6">
                                    <select class="form-control" name="profession"  value="{{ old('profession') }}">
                                        <span class="caret"></span>
                                        @foreach( $professions as $profession)
                                        <option>{{ $profession }}</option>
                                        @endforeach
                                    </select>
                               </div><!--End of col-md-6-->
                        </div>       
                        <!--Profession end -->
                               
                        
                        <!--cv start -->
                        <div class="form-group">
                              <label for="CV" class="col-md-4 control-label">CV <span class="required">*</span></label>
                              <div class="col-md-6">
                                <input type="file" name="attachment" required>
                                <h6>(Maximum 2MB)*</h6>
                              </div>
                        </div>
                        <!--cv end-->
                               
                        
                        <!-- highlight start-->
                        <div class="form-group">
                                <label for="highlight" class="col-md-4 control-label">Highlight </label>

                                <div class="col-md-6">
                                    <input placeholder="anything to highlight??" id="highlight" type="text" class="form-control" 
                                    name="highlight" value=""  autofocus  style="width:110px;">
                                </div>
                        </div>
                        <!--highlight end-->

                               
                        <!--location start-->
                        <div class="form-group">
                        <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                              <div class="col-md-6">
                                    <select class="form-control" name="location"  value="{{ old('location') }}">
                                        <span class="caret"></span>
                                        @foreach( $locations as $location)
                                        <option>{{ $location }}</option>
                                        @endforeach
                                    </select>
                              </div>
                          </div>
                        <!--location end-->

                                  
                          

          </div><!--Available for job End of modal body-->

                    <div class="modal-footer">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                           <button type="submit" class="btn btn-primary">
                             Done
                           </button>
                        </div>
                    </div>
                   

                </form><!--Available for job End of form-->
      </div><!--Available for job End of modal content-->
  </div><!--Available for job End of modal-dialog-->
</div><!--Available for job End of modal fade-->



<!-- If want to hire is selected -->
<div id="want_to_hire_modal" class="modal fade" role="dialog" style="overflow: auto;">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content" >
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Want to hire ><strong>Enter Info here</strong></h4>
          </div>
        <div class="modal-body">
               <?php
                 $professions = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );

                 $locations = array(
                    "Dhaka",
                    "Chittagong",
                    "Comilla",
                    "Sylhet",
                    "Rangpur"
                 );

                 $positions = array(
                    "Manager",
                    "HR",
                    "Executive"  
                 );

                 $departments = array(
                    "IT",
                    "Networking",
                    "Marketing",
                    "HR and Admin",
                    "Finance"
                  );


                 $job_types=array(
                     "Full time",
                     "Part time",
                     "Temporary",
                     "Contractual",
                     "Remote"
                  );

                 $job_levels=array(
                     "Entry level",
                     "Mid level",
                     "Senior level",
                     "C level"
                  );

                 $bsc = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );

                 $msc = array(
                      "CSE",
                      "EEE",
                      "BBA",
                      "MBA",
                      "MSCSE"
                  );


                 $industry = array(
                      "Software",
                      "Garments",
                      "Telecommunication",
                      "Network Operations",
                      "Finance"
                  );

               ?>

          <form class="form-horizontal"  method="post" action="{{ route('jobpost.store') }}">
                            {{ csrf_field() }}
              <input type="hidden" name="_method" value="post">

                          <!-- Job type start --> 
                          <div class="form-group" style="margin-top:10px;">
                          <label for="job_type" class="col-md-4 control-label">Job type:<span class="required">*</span></label>
                            <div class="col-md-6">
                                 <select class="form-control" name="job_type"  value="{{ old('job_type') }}" required>
                                     <span class="caret"></span>
                                     @foreach( $job_types as $job_type)
                                     <option>{{ $job_type }}</option>
                                     @endforeach
                                 </select>
                            </div>
                          </div>
                          <!-- Job type end -->


                          <!-- Position start --> 
                          <div class="form-group">
                          <label for="position" class="col-md-4 control-label">Available Job Position<span class="required">*</span></label>
                            <div class="col-md-6">
                                 <select class="form-control" name="position"  value="{{ old('position') }}" required>
                                     <span class="caret"></span>
                                     @foreach( $positions as $position)
                                     <option>{{ $position }}</option>
                                     @endforeach
                                 </select>
                            </div>
                          </div>
                          <!-- Position end -->
             
                          
                          <!-- Profession start -->
                          <div class="form-group">
                          <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>
                             <div class="col-md-6">
                                  <select class="form-control" name="profession"  value="{{ old('profession') }}" required>
                                      <span class="caret"></span>
                                      @foreach( $professions as $profession)
                                      <option>{{ $profession }}</option>
                                      @endforeach
                                  </select>
                             </div>
                          </div>
                          <!-- Profession end -->

                          <!-- Department start -->
                          <div class="form-group">
                          <label for="department" class="col-md-4 control-label">Department</label>
                             <div class="col-md-6">
                                  <select class="form-control" name="department"  value="{{ old('department') }}">
                                      <span class="caret"></span>
                                      @foreach( $departments as $department)
                                      <option>{{ $department }}</option>
                                      @endforeach
                                  </select>
                             </div>
                          </div>
                          <!-- Department end -->
     
                          <!-- Vacancy number start -->
                          <div class="form-group">
                                <label for="vacancy_number" class="col-md-4 control-label">No. of Vacancy</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="vacancy_number" type="text" class="form-control" 
                                    name="vacancy_number" value="" autofocus>
                                </div>
                          </div>
                          <!-- Vacancy number end -->

                          <!-- Job level start --> 
                          <div class="form-group">
                          <label for="job_level" class="col-md-4 control-label">Job Level:<span class="required">*</span></label>
                            <div class="col-md-6">
                                 <select class="form-control" name="job_level"  value="{{ old('job_level') }}" required>
                                     <span class="caret"></span>
                                     @foreach( $job_levels as $job_level)
                                     <option>{{ $job_level }}</option>
                                     @endforeach
                                 </select>
                            </div>
                          </div>
                          <!-- Job level end -->

                          <!-- Job details start -->
                          <div class="form-group">
                                <label for="circular" class="col-md-4 control-label">Circular</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="circular" type="text" class="form-control" 
                                    name="circular" value=""  autofocus >
                                </div>
                          </div>
                          <!-- job details end -->

                          <!-- company details start -->
                          <div class="form-group">
                                <label for="company_details" class="col-md-4 control-label">Company Details</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="company_details" type="text" class="form-control" 
                                    name="company_details" value=""  autofocus >
                                </div>
                            </div>
                          <!-- company details end -->

                            
                         
                          <!-- Job details start -->
                          <div class="form-group">
                                <label for="job_details" class="col-md-4 control-label">Job Details</label>

                                <div class="col-md-6">
                                    <input placeholder="" id="job_details" type="text" class="form-control" 
                                    name="job_details" value=""  autofocus >
                                </div>
                          </div>
                          <!-- job details end -->

                          <!-- Salary Range start -->
                          <div class="form-group">
                                <label for="salary_range" class="col-md-4 control-label">Salary Range<span class="required">*</span></label></label>

                                <div class="col-md-6">
                                    <input placeholder="" id="salary_range" type="text" class="form-control" 
                                    name="salary_range" value=""  autofocus required>
                                </div>
                          </div>
                          <!-- Salary Range end -->

                          <!-- Experience start -->
                          <div class="form-group">
                                <label for="experience" class="col-md-4 control-label">Experience<span class="required">*</span></label></label>

                                <div class="col-md-6">
                                    <input placeholder="" id="experience" type="text" class="form-control" 
                                    name="experience" value=""  autofocus required>
                                </div>
                          </div>
                          <!-- Experience end -->

                          <!-- educational background under grad start-->
                           <div class="form-group">
                              <label for="under_grad" class="col-md-4 control-label">Educational Backgroud(BSc/Equivalent)</label>

                              <div class="col-md-6">
                                    <select class="form-control" name="under_grad"  value="{{ old('under_grad') }}">
                                        <span class="caret"></span>
                                        @foreach( $bsc as $bsc)
                                        <option>{{ $bsc }}</option>
                                        @endforeach
                                    </select>
                              </div>
                           </div>
                          <!-- educational background under grad end -->

                           <!-- educational background under grad start-->
                           <div class="form-group">
                              <label for="post_grad" class="col-md-4 control-label">Educational Backgroud(Msc/euivalent)</label>

                              <div class="col-md-6">
                                    <select class="form-control" name="post_grad"  value="{{ old('post_grad') }}">
                                        <span class="caret"></span>
                                        @foreach( $msc as $msc)
                                        <option>{{ $msc }}</option>
                                        @endforeach
                                    </select>
                              </div>
                            
                          </div>
                          <!-- educational background under grad end -->

                          <!-- Industry start-->
                           <div class="form-group">
                              <label for="industry" class="col-md-4 control-label">Industry</label>

                              <div class="col-md-6">
                                    <select class="form-control" name="post_grad"  value="{{ old('industry') }}">
                                        <span class="caret"></span>
                                        @foreach( $industry as $industry)
                                        <option>{{ $industry }}</option>
                                        @endforeach
                                    </select>
                              </div>
                            
                          </div>
                          <!-- Industry end -->

                            
                          <!-- Location start -->
                          <div class="form-group">
                          <label for="location" class="col-md-4 control-label">Prefered Location<span class="required">*</span></label>
                            <div class="col-md-6">
                                  <select class="form-control" name="location"  value="{{ old('location') }}">
                                      <span class="caret"></span>
                                      @foreach( $locations as $location)
                                      <option>{{ $location }}</option>
                                      @endforeach
                                  </select>
                            </div>
                            </div>
                          <!-- Location end -->

                     </div><!--Hire for job End of modal body-->
                    <!--<div class="modal-footer">-->
                    <!--  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>-->
                    <div class="modal-footer">
                        <div class="col-md-6 col-md-offset-4 pull-right">
                           <button type="submit" class="btn btn-primary">
                             Done
                           </button>
                        </div>
                    </div>
                  </div><!-- Hire for job End of footer-->
         
            </form><!-- Hire for job End of form-->    
      </div><!--Hire for job End of modal content-->
   </div><!--Hire for job End of modal-dialog-->
</div><!--Hire for job End of modal fade-->

