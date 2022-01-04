<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<table class="table">
		<tr>
			<td>Id</td>
			<td>Report Id</td>
			<td>Region Name</td>
			<td>Region Head</td>
			<td>Region Head Email</td>
			<td>LOM Name</td>
			<td>LOM Head</td>
			<td>LOM Head Email</td>
			<td>Project Category</td>
			<td>Project Title</td>
			<td>Reporting Month</td>
			<td>Start Date</td>
			<td>End date</td>
			<td>Members Attended</td>
			<td>Budget</td>
			<td>Activity/Events under ZP Plan of Action</td>
			<td>Sustainable Development Goal *</td>
			<td>Target Population</td>
			<td>Purpose</td>
			<td>Overview</td>
			<td>Event Images </td>
			<td>Event Videos</td>
			<td>Remarks</td>
			<td>Submitter Name</td>
			<td>Submitter Deignation</td>
			<td>Submitter Email</td>
			<td>Created At</td>
			<td>IP Address</td>
		</tr>
		<?php 
		foreach ($entries->result() as $row) {?>
		<tr>
			<td><?php echo $row->id;?></td>
			<td><?php echo $row->report_id;?></td>
			<td><?php echo $row->region_name;?></td>
			<td><?php echo $row->region_head;?></td>
			<td><?php echo $row->head_email;?></td>
			<td><?php echo $row->lom_name;?></td>
			<td><?php echo $row->lom_head;?></td>
			<td><?php echo $row->lom_email;?></td>
			<td><?php echo $row->project_category;?></td>
			<td><?php echo $row->project_title;?></td>
			<td><?php echo $row->reporting_month;?></td>
			<td><?php echo $row->start_date;?></td>
			<td><?php echo $row->end_date;?></td>
			<td><?php echo $row->attended_no;?></td>
			<td><?php echo $row->budget;?></td>
			<td><?php echo $row->under_activity;?></td>
			<td><?php echo $row->goal;?></td>
			<td><?php echo $row->target_population;?></td>
			<td><?php echo $row->purpose;?></td>
			<td><?php echo $row->overview;?></td>
			<td><?php echo $row->images;?></td>
			<td><?php echo $row->videos;?></td>
			<td><?php echo $row->remarks;?></td>
			<td><?php echo $row->submitter_name;?></td>
			<td><?php echo $row->submitter_designation;?></td>
			<td><?php echo $row->submitter_email;?></td>
			<td><?php echo $row->created_at;?></td>
			<td><?php echo $row->ip_address;?></td>
		</tr>
		<?php }?>
	</table>
</body>
</html>