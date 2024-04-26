<?php
/**
 * Edit States List
 */ 
$state_val = isset($employee['state']) ? $employee['state'] : set_value('state');
?>
<div class="mb-0">
    <label class="form-label mb-0">State&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
    <select class="form-select form-select-sm" name="state" id="state" onchange="editDistricts(this.value)">
        <option value="">Select</option>
        <? foreach ($states as $s_key => $state) { ?>
            <option value="<?= $state['id']; ?>"<? if($state_val == $state['id']){ echo "selected";}?>><?= $state['name']; ?></option>
        <? } ?>
    </select>
    <span class="text-danger"><?= validation_show_error('state'); ?></span>
</div> 