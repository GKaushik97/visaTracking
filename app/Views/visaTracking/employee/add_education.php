<form method="post" id="add_education" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= set_value('id', isset($emp_id) && !empty($emp_id) ? $emp_id : '0'); ?>">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Add Employee Education</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="edu_qualification" class="form-label mb-0">Education Qualification&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <select id="edu_qualification" name="edu_qualification" class="form-select">
                            <option value="">Select Qualification</option>
                            <?php
                            if (isset($educationalQualification) AND !empty($educationalQualification)) {
                                
                             foreach ($educationalQualification as $edu_qualification){ ?>
                                <option value="<?= $edu_qualification['id']; ?>" <? if(set_value('edu_qualification')== $edu_qualification['id']){ echo "selected";}?>><?= $edu_qualification['name']; ?></option>
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
                        <input type="text" class="form-control form-control-sm" id="course" name="course" placeholder="Enter Course Name" value="<?= set_value('course'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('course') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="certificate_no" class="form-label mb-0">Certificate Number&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="certificate_no" name="certificate_no" placeholder="Enter Certificate Number" value="<?= set_value('certificate_no'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('certificate_no') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="start_year" class="form-label mb-0">Start Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="start_year" name="start_year" placeholder="Enter Start Year" value="<?= set_value('start_year'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('start_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="end_year" class="form-label mb-0">End Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="end_year" name="end_year" placeholder="Enter End Year" value="<?= set_value('end_year'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('end_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="graduate_year" class="form-label mb-0">Graduated Year&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="graduate_year" name="graduate_year" placeholder="Enter Graduate Year" value="<?= set_value('graduate_year'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('graduate_year') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="university" class="form-label mb-0">University&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="university" name="university" placeholder="Enter University" value="<?= set_value('university'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('university') ?></small></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" onclick="insertEducationDetails(<?= $emp_id; ?>)" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
            <button type="button" onclick="cancelEmployeeDetailsForm()" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i>&nbsp;Cancel</button>
        </div>
    </div>
</form>

<!-- <script type="text/javascript">
    $(document).ready(function () {
        // Initialize datepicker for "Start Year" field
        $('#start_year').datepicker({
            format: 'dd-mm-yyyy',
            endDate: 'today', 
            autoHide: true,
        });
    
        // Initialize datepicker for "End Year" field
        $('#end_year').datepicker({
            format: 'dd-mm-yyyy',
            autoHide: true,
        });
        // Initialize datepicker for "Graduate year" field
        $('#graduated_year').datepicker({
            format : 'dd-mm-yyyy',
            autoHide : true,
        });
    
    });
</script> -->