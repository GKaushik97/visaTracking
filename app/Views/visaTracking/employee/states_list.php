<div class="mb-0">
    <label class="form-label mb-0">State&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
    <select class="form-select form-select-sm" name="state" id="state" onchange="getDistricts(this.value)">
        <option value="">Select</option>
        <? if(isset($states) and !empty($states)) {
            foreach ($states as $s_key => $state) { ?>
                <option value="<?= $state['id']; ?>"<? if(set_value('state') == $state['id']){ echo "selected";}?>><?= $state['name']; ?></option>
            <? } 
        } ?>
    </select>
    <span class="text-danger"><?= validation_show_error('state'); ?></span>
</div>