<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Customer Contact Requests</h2>
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
<div class = "row" style="background: #fff;">
	<table class = "table table-bordered table-hover">
		<thead>
			<th>#</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Other Names</th>
			<th>Email Address</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php echo $user_table; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	
</script>