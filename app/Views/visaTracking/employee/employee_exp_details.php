<!-- employee_exp_details.php -->
<div class="mb-1">
	<strong>(&nbsp;<?= $emp_exp_count." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th>Company Name</th>
				<th>Designation</th>
				<th>From Date</th>
				<th>To Date</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>Country</th>
				<th>Status</th>				
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?
			$i=1;
			if(isset($emp_exp_details) and !empty($emp_exp_details))
			{
				foreach ($emp_exp_details as $key => $experience) {?>
					<tr>
						<td class="text-center"><? print $i++; ?></td>
						<td><? print $experience['company_name'];?></td>
						<td><? print $experience['designation'];?></td>
						<td><? print isset($experience['from_date']) ? displayDate($experience['from_date']) : '--'; ?></td>
						<td><? print isset($experience['to_date']) ? displayDate($experience['to_date']) : '--'; ?></td>
						<td><? print $experience['email'];?></td>
						<td><? print $experience['mobile'];?></td>
						<td><? print $experience['address'];?></td>
						<td><? print $countries[$experience['country']]['name']; ?></td>
						<td class="text-center">
                            <? if($experience['current_organisation'] == 1) { ?>
                                <span class="status status-success status-icon-check w-150">Currently Working</span>
                            <? }else { ?>
                                <span></span>
                            <? } ?>
                        </td>						
						<td>
							<a href="javascript:void(0)" onclick="editEmployeeExperience(<? print $experience['id']; ?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
							<a href="javascript:void(0)" onclick="deleteEmployeeExperience(<? print $experience['employee_id']; ?>, <? print $experience['id']; ?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
						</td>
					</tr>
				<?}
			}
			else{?>
				<tr>
					<td colspan="11">
						<div class="alert alert-warning" role="alert">
						  	No Records Found
						</div>
					</td>
				</tr>
			<?}
			?>
		</tbody>
	</table>
</div>