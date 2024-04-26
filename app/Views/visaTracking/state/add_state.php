<?
/**
 * Add state Form
 **/
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="addStateForm" onsubmit="return false">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Add State</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="country_id" class="col-sm-3 col-form-label text-end">Countries&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="country_id" id="country_id">
                            <option value="">Select</option>
                            <?php foreach ($countries as $key => $country): ?>
                                <option <?= set_value('name') == $country['id'] ? 'selected' : '' ?> value="<?= $country['id']; ?>"><?= $country['name']; ?></option>
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
                <button type="submit" onclick="saveState()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
