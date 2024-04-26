/**
 * Add District Form
 **/
 
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="add_district" onsubmit="return false">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title fs-5">Add District</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="state_id" class="col-sm-3 col-form-label text-end">States&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="state_id" id="state_id">
                            <option value="">Select</option>
                            <?php foreach ($state as $key => $value): ?>
                                <option <?= set_value('name') == $value['id'] ? 'selected' : '' ?> value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?= validation_show_error('name'); ?></small>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= set_value('name'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="insertDistrict()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
