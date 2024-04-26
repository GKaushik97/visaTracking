<div class="mb-0">
    <label class="form-label mb-0">District&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
    <select class="form-select form-select-sm" name="district" id="district">
        <option value="">Select</option>
        <? 
        if(isset($districts) and !empty($districts)) {
            foreach ($districts as $d_key => $district) { ?>
                <option value="<?= $district['id']; ?>"<? if(set_value('district') == $district['id']){ echo "selected";}?>><?= $district['name']; ?></option>
            <? } 
        } ?>
    </select>
    <span class="text-danger"><?= validation_show_error('district'); ?></span>
</div>