<section>
  <div class="container py-4">
    <div class="row">
      <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
        <h3 class="text-center">Plan of Action Reporting</h3>
        <form role="form" id="contact-form" method="POST" autocomplete="off" action="<?php echo base_url();?>reporting/report">
          <div class="card-body">
            <div class="row">
            	<?php foreach ($head as $head) { 
            		foreach ($lom as $lom) {
            		?>
            		
            	
            	<div class="col-md-6">
	                <div class="input-group input-group-static mb-4">
	                  <label>Region Name</label>
	                  <input type="text" class="form-control" value="<?php echo $head->region_name;?>" disabled>
	                </div>
	              </div>
	              <div class="col-md-6 ps-2">
	                <div class="input-group input-group-static mb-4">
	                  <label>LOM Name</label>
	                  <input type="text" class="form-control" value="<?php echo $lom->lom_name;?>" disabled>
	                </div>
              	</div>
              	<div class="col-md-6 ps-2">
              		<div class="input-group input-group-static mb-4">
				      <label>Region Head</label>
				      <input type="text" class="form-control" value="<?php echo $head->region_head;?>" disabled>
				    </div>
              	</div>
              	<?php } } ?>
            </div>
            <div class="row">
            	<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
				  <label class="custom-control-label" for="customRadio1">Program Area</label>
				</div>
				<div class="form-check mb-3">
				  <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
				  <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
				</div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>