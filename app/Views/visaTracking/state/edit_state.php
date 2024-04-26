
<?php

/**
 * Edit state Form
 **/
$id_val = isset($state['id']) ? $state['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$country_id_val = isset($state['country_id']) ? $state['country_id'] : set_value('country_id');
$name_val = isset($state['name']) ? $state['name'] : set_value('name');
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="editStateForm" onsubmit="return false">
            <input type="hidden" name="id" value="<?= $id_val; ?>">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Edit State</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="country_id" class="col-sm-3 col-form-label text-end">Country&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select name="country_id" class="form-select form-select-sm">
                            <option value="">Select</option>
                            <?php foreach($countries as $country): ?>
                                <option value="<?= $country['id']; ?>" <?= ($country['id'] == $country_id_val) ? 'selected' : '' ?>><?= $country['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><?= validation_show_error('country_id'); ?></span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label text-end">State&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="updateState()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
