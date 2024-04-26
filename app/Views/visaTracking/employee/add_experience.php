<!-- add_experience.php -->
<form method="post" id="add_experience" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $id; ?>">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Add Employee Experience</h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="company_name" class="form-label mb-0">Company Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="company_name" name="company_name" value="<?= set_value('company_name'); ?>"placeholder="Enter Company Name">
                        <span class="text-danger"><small><?= validation_show_error('company_name') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="designation" class="form-label mb-0">Designation&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="designation" name="designation" value="<?= set_value('designation'); ?>"placeholder="Enter Designation">
                        <span class="text-danger"><small><?= validation_show_error('designation') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="from_date" class="form-label mb-0">From Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="from_date" name="from_date" placeholder="DD-MM-YYYY" value="<?= set_value('from_date'); ?>">
                            <span class="input-group-text"><span class="input-group-addon"><i class="bi bi-calendar4-week"></i></span></span>
                        </div>                        
                        <span class="text-danger"><small><?= validation_show_error('from_date') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="to_date" class="form-label mb-0">To Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="to_date" name="to_date" placeholder="DD-MM-YYYY" value="<?= set_value('to_date'); ?>">
                            <span class="input-group-text"><span class="input-group-addon"><i class="bi bi-calendar4-week"></i></span></span>
                        </div> 
                        <span class="text-danger"><small><?= validation_show_error('to_date') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="email" class="form-label mb-0">Email&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email">
                        <span class="text-danger"><small><?= validation_show_error('email') ?></small></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="mobile" class="form-label mb-0">Mobile&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" maxlength="10" value="<?= set_value('mobile'); ?>" placeholder="Enter Mobile">
                        <span class="text-danger"><small><?= validation_show_error('mobile') ?></small></span>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="mb-3">
                        <label for="address" class="form-label mb-0">Address&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                        <textarea class="form-control form-control-sm" id="address" name="address" placeholder="Enter Address"><?= set_value('address'); ?></textarea>
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
                                <option value="<?= $country['id']; ?>" <? if(set_value('country')== $country['id']){ echo "selected";}?>><?= $country['name']; ?></option>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="current_organisation" id="current_organisation_yes" value="1" <? if(set_value('current_organisation') == "1"){ echo "checked";}; ?>>
                            <label class="form-check-label" for="current_organisation_yes">Please Select (&nbsp;If Yes&nbsp;)</label>
                        </div>
                    </div>
                    <span class="text-danger"><small><?= validation_show_error('current_organisation1') ?></small></span>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" onclick="insertExperience(<?= $id; ?>)" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
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
