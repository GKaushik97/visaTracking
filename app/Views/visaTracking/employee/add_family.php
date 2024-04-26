<form method="post" id="add_employee_family" onsubmit="return false">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" id="id" value="<?= $id; ?>">
    <div class="card">
        <div class="card-body">
            <div id="employee_family">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="fname" class="form-label mb-0">First Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter First Name" value="<?= set_value('fname'); ?>">
                            <span class="text-danger"><small><?= validation_show_error('fname') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="lname" class="form-label mb-0">Last Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="lname" name="lname" placeholder="Enter Last Name" value="<?= set_value('lname'); ?>">
                            <span class="text-danger"><small><?= validation_show_error('lname') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="mobile" class="form-label mb-0">Mobile&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Enter Mobile" value="<?= set_value('mobile'); ?>">
                            <span class="text-danger"><small><?= validation_show_error('mobile') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="dob" class="form-label mb-0">DOB&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm" id="dob" name="dob" placeholder="DD-MM-YYYY" value="<?= set_value('dob'); ?>">
                                <span class="input-group-text">
                                    <span class="input-group-addon"><i class="bi bi-calendar4-week"></i></span>
                                </span>
                            </div>
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
                                    <option value="<?= $relation['id']; ?>"<? if(set_value('relation_id') == $relation['id']){ echo "selected";}?>><?= $relation['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="text-danger" id="relation_id_err"><small><?= validation_show_error('relation_id') ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="profession" class="form-label mb-0">Profession&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" name="profession" id="profession" value="<?= set_value('profession'); ?>" placeholder="Enter profession">
                            <span class="text-danger"><small><?= validation_show_error('profession'); ?></small></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-3">
                            <label for="nationality" class="form-label mb-0">Nationality&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <input type="text" class="form-control form-control-sm" name="nationality" id="nationality" value="<?= set_value('nationality'); ?>" placeholder="Enter Nationality">
                            <span class="text-danger"><small><?= validation_show_error('nationality'); ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="button" onclick="insertFamilyDetails(<?= $id; ?>)" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
            <button type="button" onclick="cancelFamilyDetailsForm()" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i>&nbsp;Cancel</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dob').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
    });
</script>