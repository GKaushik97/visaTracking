<!-- edit_experience.php -->
/**
 * Edit Experience Form
 **/
<?php
$compamy_val = isset($employeeexperience['company_name']) ? $employeeexperience['company_name'] : set_value('company_name');
$designation_val = isset($employeeexperience['designation']) ? $employeeexperience['designation'] : set_value('designation');
$from_val = isset($employeeexperience['from_date']) ? date('d-m-Y', strtotime($employeeexperience['from_date'])) : set_value('from_date');
$to_val = isset($employeeexperience['to_date']) ? date('d-m-Y', strtotime($employeeexperience['to_date'])) : set_value('to_date');
$email_val = isset($employeeexperience['email']) ? $employeeexperience['email'] : set_value('email');
$mobile_val = isset($employeeexperience['mobile']) ? $employeeexperience['mobile'] : set_value('mobile');
$address_val = isset($employeeexperience['address']) ? $employeeexperience['address'] : set_value('address');
$country_val = isset($employeeexperience['country']) ? $employeeexperience['country'] : set_value('country');
$current_val = isset($employeeexperience['current_organisation']) ? $employeeexperience['current_organisation'] : set_value('current_organisation');

$id_val = isset($employeeexperience['id']) ? $employeeexperience['id'] : (isset($params['id']) ? $params['id'] : '');
$employee_id_val = isset($employeeexperience['employee_id']) ? $employeeexperience['employee_id'] : (isset($params['employee_id']) ? $params['employee_id'] : '');
?>
<form method="post" id="edit_experience" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $id_val; ?>">
    <input type="hidden" name="employee_id" id="employee_id" value="<?= $employee_id_val; ?>">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Edit Employee Experience</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="company_name" class="form-label mb-0">Company Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="company_name" name="company_name" placeholder="Enter Company Name" value="<?= $compamy_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('company_name') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="designation" class="form-label mb-0">Designation &nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="designation" name="designation" placeholder="Enter Designation" value="<?= $designation_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('designation') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="from_date" class="form-label mb-0">From Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="from_date" name="from_date" value="<?= $from_val; ?>"placeholder="DD-MM-YYYY">
                        <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                    </div>
                        <span class="text-danger"><small><?= validation_show_error('from_date') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="to_date" class="form-label mb-0">To Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" id="to_date" name="to_date" value="<?= $to_val; ?>"placeholder="DD-MM-YYYY">
                        <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                    </div>
                        <span class="text-danger"><small><?= validation_show_error('to_date') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="email" class="form-label mb-0">Email&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Email" value="<?= $email_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('email') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="mobile" class="form-label mb-0">Mobile&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Mobile" maxlength="10" value="<?= $mobile_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('mobile') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="address" class="form-label mb-0">Address&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <textarea class="form-control form-control-sm" id="address" name="address" placeholder="Enter Address"><?= $address_val; ?></textarea>
                        <span class="text-danger"><small><?= validation_show_error('address') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="country" class="form-label mb-0">Country&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <select id="country" name="country" class="form-select">
                            <option value="">Select Country</option>
                            <?php
                            if (isset($countries) AND !empty($countries)) {
                             foreach ($countries as $country){ ?>
                                <option value="<?= $country['id']; ?>" <?php if($country['id'] == $country_val) echo 'selected'; ?>><?= $country['name']; ?></option>
                            <?php 
                                }
                            }
                             ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('country') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label class="form-label mb-0">Current Organisation&nbsp;<span class="text-danger">*</span>&nbsp;:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="current_organisation" id="current_organisation" value="1" <?php echo ($current_val == '1') ? 'checked' : ''; ?>>
                        </div>
                    </div>
                    <span class="text-danger"><small><?= validation_show_error('current_organisation1') ?></small></span>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="button" onclick="updateExperience(<?= $employee_id_val; ?>)" class="btn btn-primary btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
            <button type="button" onclick="cancelEmployeeExperience()" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i>&nbsp;Cancel</button>
        </div>
    </div>
</form>


<script>
$(document).ready(function(){
    $('#from_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
    });

    $('#to_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        endDate: 'today'
    });
});
</script>