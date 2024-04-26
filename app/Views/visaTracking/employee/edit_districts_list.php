<?php
/**
 * Edit Districts List
 */ 
$district_val = isset($employee['district']) ? $employee['district'] : set_value('district');
?>
<div class="mb-0">
    <label class="form-label mb-0">District&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
    <select class="form-select form-select-sm" name="district" id="district">
        <option value="">Select</option>
        <? foreach ($districts as $d_key => $district) { ?>
            <option value="<?= $district['id']; ?>"<? if($district_val == $district['id']){ echo "selected";}?>><?= $district['name']; ?></option>
        <? } ?>
    </select>
    <span class="text-danger"><?= validation_show_error('district'); ?></span>
</div>