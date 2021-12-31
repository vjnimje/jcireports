<section>
  <div class="container py-4">
    <div class="row">
      <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
        <h3 class="text-center">Plan of Action Reporting</h3>
        <form role="form" id="contact-form" method="POST" autocomplete="off" action="<?php echo base_url();?>reporting/report">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5 ps-2">
                <div class="input-group input-group-dynamic my-3">
                  <select class="form-control" name="region" id="region">
                    <option value="">Select region</option>
                    <?php foreach ($regions->result() as $row) {?>
                     <option value="<?php echo $row->region_id?>"><?php echo $row->region_name?></option> 
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-5 ps-2">
                <div class="input-group input-group-dynamic my-3">
                  <select class="form-control" name="lom" id="lom" disabled="" >
                    <option value="">Select LOM</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn bg-gradient-primary w-100">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>