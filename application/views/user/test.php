<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="<?php echo base_url();?>reporting/test" method="post">
		<select name="region" id="region">
			<option value="">Select Region</option>
			<?php foreach ($regions->result() as $row) {?>
	            <option value="<?php echo $row->region_id?>"><?php echo $row->region_name?></option> 
	         <?php } ?>	
		</select>
		<select name="lom" id="lom" disabled="">

		</select>
		<input type="submit" name="submit">
	</form>
</body>
</html>
<script src="<?php echo base_url();?>assets/front/js/plugins/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#region').on('change',function(){
            var region_id = $(this).val();
            if(region_id == '')
            {
              $('#lom').prop('disabled', true);
            }
            else
            {
               $('#lom').prop('disabled', false);
                $.ajax({
                    url:"<?php echo base_url();?>reporting/get_loms",
                    type: "POST",
                    data: {'region_id' : region_id},
                    // datatype: 'json',
                    success: function(data){
                        $('#lom').html(data);
                    },
                    error: function(){
                        alert('Error occured .....');
                    }
                });
            }
        });

    });
</script>