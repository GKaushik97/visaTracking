<?php
/**
 * Employee Family,Education,Experience Details
 */ 
?>
<div class="hr1"></div>                                
<h4 class="page-sub-title"><i class="bi bi-people"></i>&nbsp;Family Details</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Name</th>
			<th>Relation</th>
			<th>Date of Birth</th>
			<th>Profession</th>
			<th>Nationality</th>
		</tr>
	</thead>
	<tbody>
		<? 
		$i =1;
		if(isset($family_details) and !empty($family_details)) { 
			foreach ($family_details as $fd_key => $family) { ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $family['fname']." ".$family['lname']; ?></td>
					<td><?= $relations[$family['relation_id']]['name']; ?></td>
					<td><?= displayDate($family['dob']); ?></td>
					<td><?= $family['profession']; ?></td>
					<td><?= $family['nationality']; ?></td>
				</tr>
			<? }
		}else { ?>
			<tr>
				<td colspan="6">
					<div class="alert alert-danger">No Records Found</div>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<div class="hr1"></div>                                
<h4 class="page-sub-title"><i class="bi bi-mortarboard"></i>&nbsp;Educational Details</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Educational Qualification</th>
			<th>University</th>
			<th>Course Name</th>
			<th>Certificate No.</th>
			<th>Start Year</th>
			<th>End Year</th>
			<th>Graduated Year</th>
			<th>Created Date</th>
		</tr>
	</thead>
	<tbody>
		<? 
		$i =1;
		if(isset($education_details) and !empty($education_details)) { 
			foreach ($education_details as $ed_key => $education) { ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $educationalQualification[$education['edu_qualification']]['name']; ?></td>
					<td><?= $education['university']; ?></td>
					<td><?= $education['course']; ?></td>
					<td><?= $education['certificate_no']; ?></td>
					<td><?= $education['start_year']; ?></td>
					<td><?= $education['end_year']; ?></td>
					<td><?= $education['graduated_year']; ?></td>
					<td><?= displayDate($education['created_at']); ?></td>
				</tr>
			<? }
		}else { ?>
			<tr>
				<td colspan="9">
					<div class="alert alert-danger">No Records Found</div>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<div class="hr1"></div>                                
<h4 class="page-sub-title"><i class="bi bi-person-workspace"></i>&nbsp;Experience Details</h4>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Company Name</th>
			<th>Designation</th>
			<th>From Date</th>
			<th>To Date</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Address</th>
			<th>Country</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<? 
		$i =1;
		if(isset($emp_exp_details) and !empty($emp_exp_details)) { 
			foreach ($emp_exp_details as $ex_key => $exp_val) { ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $exp_val['company_name']; ?></td>
					<td><?= $exp_val['designation']; ?></td>
					<td><?= displayDate($exp_val['from_date']); ?></td>
					<td><?= displayDate($exp_val['to_date']); ?></td>
					<td><?= $exp_val['email']; ?></td>
					<td><?= $exp_val['mobile']; ?></td>
					<td><?= $exp_val['address']; ?></td>
					<td><?= $countries[$exp_val['country']]['name']; ?></td>
					<td>
					<? if($exp_val['current_organisation'] == "1") { ?>
                            <span class="status status-success status-icon-check w-150">Currently Working</span>
					<? } else { ?>
							<span></span>
					<? }
					?>
					</td>
				</tr>
			<? }
		}else { ?>
			<tr>
				<td colspan="10">
					<div class="alert alert-danger">No Records Found</div>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>