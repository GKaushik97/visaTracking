<?php
/**
 * Edit District Form
 **/
$id_val = isset($district['id']) ? $district['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$state_id_val = isset($district['state_id']) ? $district['state_id'] : set_value('state_id');
$name_val = isset($district['name']) ? $district['name'] : set_value('name');
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="edit_district" onsubmit="return false">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $id_val; ?>">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Edit District</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="state_id" class="col-sm-3 col-form-label text-end">State&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select name="state_id" class="form-select form-select-sm">
                            <option value="">Select</option>
                            <?php foreach($state as $value): ?>
                                <option value="<?= $value['id']; ?>" <?= ($value['id'] == $state_id_val) ? 'selected' : '' ?>><?= $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><?= validation_show_error('state_id'); ?></span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label text-end">District&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="updateDistrict()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
