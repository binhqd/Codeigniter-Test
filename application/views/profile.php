<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>
<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

</head>
<body>

	<div id="container">
		<h1>
			This is your profile page! <a href='<?php echo base_url()?>logout'>Logout</a>
		</h1>

		<div id="body">
			<table class='table'>
				<tr>
					<td>First name:</td>
					<td><?php echo $userdata['firstname']?></td>
				</tr>
				<tr>
					<td>Last name:</td>
					<td><?php echo $userdata['lastname']?></td>
				</tr>

				<tr>
					<td>Address:</td>
					<td><?php echo $userdata['address']?></td>
				</tr>

				<tr>
					<td>Phone:</td>
					<td><?php echo $userdata['phone']?></td>
				</tr>

				<tr>
					<td>Photo:</td>
					<td><?php echo $userdata['photo']?></td>
				</tr>
			</table>
		</div>

		<h1>Customers</h1>

		<table class='table table-striped'>
			<tr>
				<th>Customer ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Phone number</th>
			</tr>
			<?php foreach ($customers as $row):?>
			<tr>
				<td><?php echo $row->id?></td>
				<td><?php echo $row->firstname ? $row->firstname : '<span style="color:red">N/A</span>'?></td>
				<td><?php echo $row->lastname ? $row->lastname : '<span style="color:red">N/A</span>'?></td>
				<td><?php echo $row->email?></td>
				<td><?php echo $row->phonenumber?></td>
			</tr>
			<?php endforeach;?>
			</table>

		<p class="footer">
			Page rendered in <strong>{elapsed_time}</strong> seconds
		</p>
	</div>
	<script src='<?php echo base_url() ?>assets/jquery/jquery.min.js'></script>
	<script src='<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js'></script>
</body>
</html>