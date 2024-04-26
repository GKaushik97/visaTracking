<?php
/**
 *Edit Family
 */ 
$id_val = isset($employee_family['id']) ? $employee_family['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$emp_id = isset($employee_family['employee_id']) ? $employee_family['employee_id'] : (isset($_POST['employee_id']) ? $_POST['employee_id'] : '');
$fname_val = isset($employee_family['fname']) ? $employee_family['fname'] : set_value('fname');
$lname_val = isset($employee_family['lname']) ? $employee_family['lname'] : set_value('lname');
$mobile_val = isset($employee_family['mobile']) ? $employee_family['mobile'] : set_value('mobile');
$dob_val = isset($employee_family['dob']) ? displayDate($employee_family['dob']) : set_value('dob');
$nationality_val = isset($employee_family['nationality']) ? $employee_family['nationality'] : set_value('nationality');
$relation_val = isset($employee_family['relation_id']) ? $employee_family['relation_id'] : set_value('relation_id');
$prof_val =  isset($employee_family['profession']) ? $employee_family['profession'] : set_value('profession');
?>
<form method="post" id="edit_employee_family" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $id_val; ?>">
    <input type="hidden" name="employee_id" id="employee_id" value="<?= $emp_id; ?>">
    <div class="card">
        <div class="card-body">
            <div id="employee_family">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="fname" class="form-label mb-0">First Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter First Name" value="<?= $fname_val; ?>">
                            <span class="text-danger"><small><?= validation_show_error('fname') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="lname" class="form-label mb-0">Last Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="lname" name="lname" placeholder="Enter Last Name" value="<?= $lname_val; ?>">
                            <span class="text-danger"><small><?= validation_show_error('lname') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="mobile" class="form-label mb-0">Mobile&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Mobile" value="<?= $mobile_val; ?>">
                            <span class="text-danger"><small><?= validation_show_error('mobile') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="dob" class="form-label mb-0">DOB&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="dob" name="dob" placeholder="DD-MM-YYYY" value="<?= $dob_val; ?>">
                            <span class="text-danger"><small><?= validation_show_error('dob') ?></small></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="relation" class="form-label mb-0">Relation&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <select class="form-select form-select-sm" id="relation_id" name="relation_id">
                                <option value="">Select</option>
                                <?php foreach ($relations as $relation): ?>
                                    <option value="<?= $relation['id']; ?>"<? if($relation_val == $relation['id']){ echo "selected";}?>><?= $relation['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger" id="relation_id_err"><small><?= validation_show_error('relation_id') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="profession" class="form-label mb-0">Profession&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" name="profession" id="profession" value="<?= $prof_val; ?>" placeholder="Enter profession">
                            <span class="text-danger"><small><?= validation_show_error('profession'); ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="nationality" class="form-label mb-0">Nationality&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" name="nationality" id="nationality" value="<?= $nationality_val; ?>" placeholder="Enter Nationality">
                            <span class="text-danger"><small><?= validation_show_error('nationality'); ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="button" onclick="updateFamilyDetails(<?= $emp_id; ?>)" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
            <button type="button" onclick="cancelFamilyDetailsForm()" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i>&nbsp;Cancel</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dob').datepicker({'format' : 'dd-mm-YYYY', autoHide :true});
    })
</script>