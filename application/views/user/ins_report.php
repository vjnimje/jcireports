<section>
  <div class="container py-4">
    <div class="row">
      <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
        <h3 class="text-center">Plan of Action Reporting</h3>
        <p align="justify">Note - Items marked with <span class="text-primary imp">*</span>are required.</p>
        <form role="form" id="contact-form" method="POST" autocomplete="on" action="<?php echo base_url();?>reporting/insert_report">
          <div class="card-body">
            <div class="row">
            	<?php foreach ($head as $head) {?>
            	<div class="col-md-4">
	              <div class="input-group input-group-static mb-4">
	                <label>Region Name <span class="text-primary imp">*</span></label>
	                <input type="text" class="form-control" name="region_name" value="<?php echo $head->region_name;?>" readonly/>
	              </div>
	            </div>
              <div class="col-md-4 ps-2">
              	<div class="input-group input-group-static mb-4">
						      <label>Region Head <span class="text-primary imp">*</span></label>
						      <input type="text" class="form-control" name="region_head" value="<?php echo $head->region_head;?>" readonly/>
						    </div>
              </div>
              <div class="col-md-4 ps-2">
              	<div class="input-group input-group-static mb-4">
						      <label>Region Head Email <span class="text-primary imp">*</span></label>
						      <input type="text" class="form-control" name="head_email" value="<?php echo $head->head_email;?>" readonly/>
						    </div>
              </div>
              <?php }?>
            </div>
            <div class="row">
              	<?php foreach ($lom as $lom) {?>
              	<div class="col-md-4 ps-2">
	                <div class="input-group input-group-static mb-4">
	                  <label>LOM Name <span class="text-primary imp">*</span></label>
	                  <input type="text" class="form-control" name="lom_name" value="<?php echo $lom->lom_name;?>" readonly/>
	                </div>
              	</div>
              	<div class="col-md-4 ps-2">
	                <div class="input-group input-group-static mb-4">
	                  <label>LOM Head <span class="text-primary imp">*</span></label>
	                  <input type="text" class="form-control" name="lom_head" value="<?php echo $lom->lom_head;?>" readonly/>
	                </div>
              	</div>
              	<div class="col-md-4 ps-2">
	                <div class="input-group input-group-static mb-4">
	                  <label>LOM Head Email <span class="text-primary imp">*</span></label>
	                  <input type="text" class="form-control" name="lom_email" value="<?php echo $lom->head_email;?>" readonly/>
	                </div>
              	</div>
              	<?php }?>
            </div>
            <div class="row">
            	<label>Category of Project <span class="text-primary imp">*</span></label>
            	<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Project Area" required/>
							  <label class="custom-control-label">Program Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value=" Training Area">
							  <label class="custom-control-label" for="customRadio1">Training Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Management Area">
							  <label class="custom-control-label">Management Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="">
							  <label class="custom-control-label">Business Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Growth and Development Area">
							  <label class="custom-control-label">Growth and Development Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Public Relationship Program">
							  <label class="custom-control-label">Public Relationship Program</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Junior JC Area">
							  <label class="custom-control-label">Junior JC Area</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="JCRT Programs">
							  <label class="custom-control-label">JCRT Programs</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="project_category" value="Need Blood Call JCI">
							  <label class="custom-control-label">Need Blood Call JCI</label>
							</div>
            </div>
            <div class="row">
            	<div class="input-group input-group-static mb-4 ps-2">
	                <label>Title of the Project /Theme Name <span class="text-primary imp">*</span></label>
	                <input type="text" class="form-control" name="project_title" value="<?php set_value('project_title');?>" required/>
	                <span class="text-danger"><?php echo form_error("project_title"); ?></span>
	            </div>
            </div>
            <div class="row">
       			<div class="col-md-4">
       				<div class="input-group input-group-static my-3">
					      <label>Month</label>
					      <input type="month" name="reporting_month" class="form-control" value="<?php set_value('reporting_month');?>">
					      <span class="text-danger"><?php echo form_error("reporting_month"); ?></span>
					    </div>
       			</div>
       			<div class="col-md-4">
       				<div class="input-group input-group-static my-3">
					      <label>Start Date of project <span class="text-primary imp">*</span></label>
					      <input type="date" name="start_date"class="form-control" value="<?php set_value('start_date');?>" required/>
					      <span class="text-danger"><?php echo form_error("start_date"); ?></span>
					    </div>
       			</div> 
       			<div class="col-md-4">
       				<div class="input-group input-group-static my-3">
					      <label>End Date of Project <span class="text-primary imp">*</span></label>
					      <input type="date" name="end_date" class="form-control" value="<?php set_value('end_date');?>" required/>
					      <span class="text-danger"><?php echo form_error("end_date"); ?></span>
					    </div>
       			</div>          	
            </div>
            <div class="row">
            	<div class="col-md-6 ps-2">
	              <div class="input-group input-group-static mb-4">
	                <label>Members Attended <span class="text-primary imp">*</span></label>
	                <input type="text" name="attended_no" value="<?php set_value('attended_no');?>" class="form-control">
	                <span class="text-danger"><?php echo form_error("attended_no"); ?></span>
	              </div>
              </div>
              <div class="col-md-6 ps-2">
	              <div class="input-group input-group-static mb-4">
	                <label>Budget (In numbers only) <span class="text-primary imp"></span></label>
	                <input type="text" name="budget" class="form-control" value="<?php set_value('budget');?>">
	                <span class="text-danger"><?php echo form_error("budget"); ?></span>
	              </div>
              </div>
            </div>
            <div class="row">
            	<label>Activity/Events under ZP Plan of Action <span class="text-primary imp">*</span></label>
            	<span class="text-danger"><?php echo form_error("under_activity"); ?></span>
            	<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="under_activity" value="Yes" required/>
							  <label class="custom-control-label" >Yes</label>
							</div>
							<div class="col-md-6 form-check">
							  <input class="form-check-input" type="radio" name="under_activity" value="No">
							  <label class="custom-control-label">No</label>
							</div>
							<div class="col-md-2 form-check">
								<input class="form-check-input" type="radio" name="under_activity" value="Other">
							  <label class="custom-control-label">Other</label>
							</div>
							<div class="col-md-10 input-group input-group-static mb-4">
							  		<input type="text" class="form-control" name="other_under_activity">
							</div>
            </div>
            <div class="row">
            	<label>Sustainable Development Goal <span class="text-primary imp">*</span></label>
            	<span class="text-danger"><?php echo form_error("goal"); ?></span>
            	<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 1: No Poverty" required/>
							  <label class="custom-control-label">GOAL 1: No Poverty</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 2: Zero Hunger">
							  <label class="custom-control-label">GOAL 2: Zero Hunger</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 3: Good Health and Well-being">
							  <label class="custom-control-label">GOAL 3: Good Health and Well-being</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 4: Quality Education">
							  <label class="custom-control-label">GOAL 4: Quality Education</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 5: Gender Equality">
							  <label class="custom-control-label">GOAL 5: Gender Equality</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 6: Clean Water and Sanitation">
							  <label class="custom-control-label">GOAL 6: Clean Water and Sanitation</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 7: Affordable and Clean Energy">
							  <label class="custom-control-label">GOAL 7: Affordable and Clean Energy</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 8: Decent Work and Economic Growth">
							  <label class="custom-control-label">GOAL 8: Decent Work and Economic Growth</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 9: Industry, Innovation and Infrastructure">
							  <label class="custom-control-label">GOAL 9: Industry, Innovation and Infrastructure</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 10: Reduced Inequality">
							  <label class="custom-control-label">GOAL 10: Reduced Inequality</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 11: Sustainable Cities and Communities">
							  <label class="custom-control-label">GOAL 11: Sustainable Cities and Communities</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 12: Responsible Consumption and Production">
							  <label class="custom-control-label">GOAL 12: Responsible Consumption and Production</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 13: Climate Action">
							  <label class="custom-control-label">GOAL 13: Climate Action</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 14: Life Below Water">
							  <label class="custom-control-label">GOAL 14: Life Below Water</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 15: Life on Land">
							  <label class="custom-control-label">GOAL 15: Life on Land</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 16: Peace and Justice Strong Institutions">
							  <label class="custom-control-label">GOAL 16: Peace and Justice Strong Institutions</label>
							</div>
							<div class="col-md-12 form-check">
							  <input class="form-check-input" type="radio" name="goal" value="GOAL 17: Partnerships to achieve the Goal">
							  <label class="custom-control-label">GOAL 17: Partnerships to achieve the Goal</label>
							</div>
            </div>
            <div class="row">
            	<div class="input-group input-group-static mb-4 ps-2">
	                <label>Target Population <span class="text-primary imp">*</span></label><br>
	                <input type="text" class="form-control" name="target_population" value="<?php set_value('target_population');?>">
	                <span class="small">Please enter the total number of people targeted (in number format)</span>
	                <span class="text-danger"><?php echo form_error("target_population"); ?></span>
	            </div>
            </div>
            <div class="row">
            	<div class="input-group input-group-static mb-4 ps-2">
	                <label>Purpose <span class="text-primary imp">*</span></label>
	                <input type="text" class="form-control" name="purpose" value="<?php set_value('purpose');?>">
	                <span class="text-danger"><?php echo form_error("purpose"); ?></span>
	            </div>
            </div>
            <div class="row">
            	<div class="input-group input-group-static mb-4 ps-2">
	                <label>Overview <span class="text-primary imp">*</span></label>
	                <input type="text" class="form-control" name="overview" value="<?php set_value('overview');?>">
	                <span class="text-danger"><?php echo form_error("overview"); ?></span>
	            </div>
            </div>
            <div class="row">
            	<label>Event Images <span class="text-primary imp">*</span></label>
            	<div class="form-group form-file-upload form-file-multiple">
						    <input type="file" name="images" multiple="" class="inputFileHidden" value="<?php set_value('images');?>" required/>
						    <div class="input-group">
						        <input type="text" class="form-control inputFileVisible" placeholder="Multiple Files" multiple>
						        <span class="input-group-btn">
						            <button type="button" class="btn btn-fab btn-round btn-primary">
						                <i class="material-icons">image</i>
						            </button>
						        </span>
						    </div>
						  </div>
            </div>
            <div class="row">
            	<label>Event Videos</label>
            	<div class="form-group form-file-upload form-file-multiple">
						    <input type="file" name="videos" multiple="" class="inputFileHidden" value="<?php set_value('videos');?>">
						    <div class="input-group">
						        <input type="text" class="form-control inputFileVisible" placeholder="Multiple Files" multiple>
						        <span class="input-group-btn">
						            <button type="button" class="btn btn-fab btn-round btn-primary">
						                <i class="material-icons">slideshow</i>
						            </button>
						        </span>
						    </div>
						  </div>
            </div>
            <div class="row">
            	<div class="input-group input-group-static mb-4 ps-2">
	                <label>Remarks</label>
	                <input type="text" class="form-control" name="remarks" value="<?php set_value('remarks');?>">
	                <span class="text-danger"><?php echo form_error("remarks"); ?></span>
	            </div>
            </div>
            <div class="row">
            	<label>Report Submitter Info</label>
            	<div class="col-md-4">
	              <div class="input-group input-group-static mb-4">
	                <label>Name <span class="text-primary imp">*</span></label>
	                <input type="text" name="submitter_name" class="form-control" value="<?php set_value('submitter_name');?>" required/>
	                <span class="text-danger"><?php echo form_error("submitter_name"); ?></span>
	              </div>
	            </div>
              <div class="col-md-4 ps-2">
              	<div class="input-group input-group-static mb-4">
					      	<label>Designation <span class="text-primary imp">*</span></label>
					      	<input type="text" name="submitter_designation" class="form-control" value="<?php set_value('submitter_designation');?>" required/>
					      	<span class="text-danger"><?php echo form_error("submitter_designation"); ?></span>
				    		</div>
              </div>
              <div class="col-md-4 ps-2">
              	<div class="input-group input-group-static mb-4">
				      		<label>Email <span class="text-primary imp">*</span></label>
				      		<input type="text" name="submitter_email" class="form-control" value="<?php set_value('submitter_email');?>" required/>
				      		<span class="text-danger"><?php echo form_error("submitter_email"); ?></span>
				    		</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>