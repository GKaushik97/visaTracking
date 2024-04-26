<div class="mb-1">
	<strong>(&nbsp;<?= $tRecords." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th>Name</th>
				<th>Relation</th>
				<th>Mobile</th>
				<th>Date of birth</th>
				<th>Profession</th>
				<th>Nationality</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?
			$i=1;
			if(isset($family_details) and !empty($family_details))
			{
				foreach ($family_details as $key => $details) {?>
					<tr>
						<td class="text-center"><? print $i++; ?></td>
						<td><? print $details['fname']." ".$details['lname'];?></td>
						<td><? print $relations[$details['relation_id']]['name'];?></td>
						<td><? print $details['mobile'];?></td>
						<td><? print isset($details['dob']) ? displayDate($details['dob']) : ''; ?></td>
						<td><? print $details['profession'];?></td>
						<td><? print $details['nationality'];?></td>
						<td>
							<a href="javascript:void(0)" onclick="editFamilyDetails(<? print $details['id']; ?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
							<a href="javascript:void(0)" onclick="deleteFamilyDetails(<? print $details['employee_id']; ?>, <? print $details['id']; ?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
						</td>
					</tr>
				<?}
			}
			else{?>
				<tr>
					<td colspan="8">
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