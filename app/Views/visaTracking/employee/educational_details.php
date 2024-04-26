<div class="mb-1">
    <strong>(&nbsp;<?= $education_count." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>Educational Qualification</th>
                <th>Course Name</th>
                <th>Certificate No.</th>
                <th>Period</th>
                <th>Graduated Year</th>
                <th>University</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?
            $i=1;
            if(isset($education_details) and !empty($education_details))
            {
                foreach ($education_details as $key => $details) {?>
                    <tr>
                        <td class="text-center"><? print $i++; ?></td>
                        <td><? print $educationalQualification[$details['edu_qualification']]['name']; ?></td>
                        <td><? print $details['course']; ?></td>
                        <td><? print $details['certificate_no'];?></td>
                        <td><? print isset($details['start_year']) ? ($details['start_year'].' - '.$details['end_year']) : ''; ?></td>
                        <td><? print isset($details['graduated_year']) ? ($details['graduated_year']) : ''; ?></td>
                        <td><? print $details['university']; ?></td>
                        <td><? print isset($details['created_at']) ? displayDate($details['created_at']) : ''; ?></td>
                        <td>
                            <a href="javascript:void(0)" onclick="editEmployeeEducation(<? print $details['id']; ?>)" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <a href="javascript:void(0)" onclick="deleteEmployeeEducation(<? print $details['employee_id']; ?>, <? print $details['id']; ?>)" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?}
            }
            else{?>
                <tr>
                    <td colspan="9">
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
