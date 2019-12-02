<body>
	<div class="w-75 m-auto">

		<div class="mt-1">
			<ol class="breadcrumb">
			  	<li class="breadcrumb-item active text-primary d-flex">ShoutOut Admin Page</li>
			</ol>
		</div>
		<div class="card">
			<div class="card-header font-weight-bold">User List
					<button style="float:right;" class="btn btn-primary rounded-pill shadow" onclick="location.href='<? echo base_url();?>logout'">Logout</button>
			</div>

			<div class="card-body">
				<div class="w-100 table-responsive">
					<table class="table" id="admin-table">
						<thead>
							<tr>
								<td>Profile</td>
								<td>Name</td>
								<td>Email</td>
								<td>Address</td>
							</tr>
						</thead>
						<tbody>
							<? foreach ($users as $key => $user) {?>
								<tr>
									<td><img src="<? echo base_url().'uploads/'.$user['image'];?>" widht="50" height="50" ></td>
									<td><? echo $user['name'];?></td>
									<td><? echo $user['email'];?></td>
									<td><? echo $user['Address'];?></td>
								</tr>
							<? } ?>
							
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>