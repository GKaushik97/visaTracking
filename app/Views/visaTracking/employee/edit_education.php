<?php
$edu_qualification_val = isset($education['edu_qualification']) ? $education['edu_qualification'] : set_value('edu_qualification');
$course_val = isset($education['course']) ? $education['course'] : set_value('course');
$certificate_val = isset($education['certificate_no']) ? $education['certificate_no'] : set_value('certificate_no');
$start_val = isset($education['start_year']) ? $education['start_year'] : set_value('start_year');
$end_val = isset($education['end_year']) ? $education['end_year'] : set_value('end_year');
$graduated_val = isset($education['graduated_year']) ? $education['graduated_year'] : set_value('graduated_year');
?>
<form method="post" id="edit_education" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= isset($education['id']) ? $education['id'] : '0'; ?>">
    <input type="hidden" name="employee_id" id="employee_id" value="<?= isset($education['employee_id']) ? $education['employee_id'] : '0'; ?>">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Edit Employee Education</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="edu_qualification" class="form-label mb-0">Education Qualification&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <select id="edu_qualification" name="edu_qualification" class="form-select">
                            <option value="">Select Education Qualification</option>
                            <?php
                            if (isset($educationalQualification) AND !empty($educationalQualification)) {
                             foreach ($educationalQualification as $edu_qualification){ ?>
                                <option value="<?= $edu_qualification['id']; ?>" <?php if($edu_qualification['id'] == $edu_qualification_val) echo 'selected'; ?>><?= $edu_qualification['name']; ?></option>
                            <?php 
                                }
                            }
                             ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('edu_qualification') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="course" class="form-label mb-0">Course Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" name="course" id="course" value="<?= $course_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('course') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="certificate_no" class="form-label mb-0">Certificate Number&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="certificate_no" name="certificate_no" placeholder="Enter Certificate Number" value="<?= $certificate_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('certificate_no') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="start_year" class="form-label mb-0">Start Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="start_year" name="start_year" placeholder="Enter Start Year" value="<?= $start_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('start_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="end_year" class="form-label mb-0">End Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="end_year" name="end_year" placeholder="Enter End Year" value="<?= $end_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('end_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="graduated_year" class="form-label mb-0">Graduate Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="graduated_year" name="graduated_year" placeholder="Enter Graduate Year" value="<?= $graduated_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('graduated_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="university" class="form-label mb-0">University&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="university" name="university" placeholder="Enter University" value="<?= isset($education['university']) ? $education['university'] : ''; ?>">
                        <span class="text-danger"><small><?= validation_show_error('university') ?></small></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" onclick="updateEmployeeEducation(<?= $education['employee_id']; ?>)" class="btn btn-primary btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
            <button type="button" onclick="cancelEmployeeDetailsForm()" class="btn btn-secondary btn-sm"><i class="bi bi-x-square"></i>&nbsp;Cancel</button>
        </div>
    </div>
</form>
