<?php
/**
 * Family Relation View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="familyRelation_body">
    <?= view('visaTracking/familyRelation/familyRelation_body'); ?>
</div>   
<? $this->endSection('content'); ?>