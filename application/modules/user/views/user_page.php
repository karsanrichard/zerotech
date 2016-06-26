<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Customers Listing</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url(); ?>admin">Dashboard</a>
			</li>
			<li class="active">
				<strong>Users Page</strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div style="background: #fff;">
	<table class = "table table-bordered table-hover">
		<thead>
			<th>#</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Other Names</th>
			<th>Email Address</th>
			<th>Confirmed Status</th>
			<th>Active Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php echo $user_table; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	
</script>