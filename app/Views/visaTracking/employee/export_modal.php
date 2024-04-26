<?php
/**
 * Load Export Modal
 */
$tRecords = $params['tRecords'];
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="post" id="export_employee">
            <?= csrf_field(); ?>
            <input type="hidden" name="params" value='<?php print json_encode($params);?>' >
            <div class="modal-header">
                <h5 class="modal-title fs-5">Employee Export</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="page-sub-title">Choose columns to export</h4>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked="checked" value="1" id="this-all" onchange="$('.check-col').prop('checked',($('#this-all:checked').val() == 1) ? true : false);">
                            <label class="form-check-label" for="this-all">Check all</label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[fname]" id="fname" value="<? echo "fname"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "First Name";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[lname]" id="lname" value="<? echo "lname"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Last Name";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[gender]" id="gender" value="<? echo "gender"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Gender";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[dob]" id="dob" value="<? echo "dob"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "DOB";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[mobile]" id="mobile" value="<? echo "mobile"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Mobile";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[alt_mobile]" id="alt_mobile" value="<? echo "alt_mobile"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Alt. Mobile";?></label>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[email]" id="email" value="<? echo "email"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Email";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[place_of_birth]" id="place_of_birth" value="<? echo "place_of_birth"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Place Of Birth";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[passport_no]" id="passport_no" value="<? echo "passport_no"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Passport No.";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[passport_issued_date]" id="passport_issued_date" value="<? echo "passport_issued_date"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Passport Issued Date";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[passport_expiry_date]" id="passport_expiry_date" value="<? echo "passport_expiry_date"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Passport Expiry Date";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[place_of_issue]" id="place_of_issue" value="<? echo "place_of_issue"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Place Of Issue";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[address1]" id="address1" value="<? echo "address1"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Address1";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[address2]" id="address2" value="<? echo "address2"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Address2";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[city]" id="city" value="<? echo "city"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "City";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[district]" id="district" value="<? echo "district"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "District";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[state]" id="state" value="<? echo "state"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "State";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[country]" id="country" value="<? echo "country"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Country";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[pincode]" id="pincode" value="<? echo "pincode"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Pincode";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[nationality]" id="nationality" value="<? echo "nationality"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Nationality";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[marital_status]" id="marital_status" value="<? echo "marital_status"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Marital Status";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[emp_experience]" id="emp_experience" value="<? echo "emp_experience"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Employee Experience";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[contact_name]" id="contact_name" value="<? echo "contact_name"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Contact Name";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[contact_relation]" id="contact_relation" value="<? echo "contact_relation"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Contact Relation";?></label>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-check">
                            <input class="form-check-input check-col" type="checkbox" name="rights[contact_no]" id="contact_no" value="<? echo "contact_no"; ?>" checked="checked">
                            <label class="form-check-label"><?php print "Contact Number";?></label>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <h4 class="page-sub-title">XLS Files</h4>
                <div class="F-space">
                    <div class="row">
                        <?php
                        if ($tRecords > 10000) {
                            $files = ceil($tRecords/10000);
                            for ($i=0; $i < $files; $i++) { ?>
                                <div class="col-md-3 col-sm-6 col-xs-4">
                                    <a href="#" class="btn btn-sm btn-outline-secondary" onclick="generate_employees_xls(<?php print $i+1; ?>)" title="<?php print _("xls");?>"><i class="bi bi-file-earmark-arrow-down" aria-hidden="true">&nbsp;</i>xls&nbsp;-&nbsp;<?php print $i+1; ?></a>
                                </div>
                            <?php }
                        }
                        else { ?>
                            <div class="col-md-3 col-sm-6 col-xs-4">
                                <a href="#" class="btn btn-sm btn-outline-secondary" onclick="generate_employees_xls(1)" title="<?php print _("xls");?>"><i class="bi bi-file-earmark-arrow-down" aria-hidden="true">&nbsp;</i>xls</a>
                            </div>
                        <?php } ?>            
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="submit_content" class="d-none"></button>
                <!-- <button type="submit" onclick="employeeExport()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Export</button> -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
        <!-- <button id="exportButton" class="btn-btn-info">Xls</button> -->
    </div>
</div>
<script type="text/javascript">
    function generate_employees_xls(i){
        if($("#export_employee").attr("action",WEBROOT+'employee/employeesExportXls/'+i)){
            $("#submit_content").click();
        }
    }
    function generate_consumers_csv(i){
        if($("#export_employee").attr("action",WEBROOT+'employee/employeesExportCsv/'+i)){
            $("#submit_content").click();
        }
    }
</script>