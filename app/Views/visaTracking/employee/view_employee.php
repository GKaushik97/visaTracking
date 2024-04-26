<?php
/**
 * view employee details
 */
$tab_id = isset($tab_id) ? $tab_id : 1;
$gender = array('1' => 'Male', '2' => 'Female', '3' => 'Others');
?>
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <?php if (isset($employee) && isset($employee['code'])): ?>
            <h5 class="modal-title">Employee Details - #<?= $employee['code'];?></h5>
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="candidate-details-header">
                <nav class="employee-tabs profile-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <? if($tab_id == 1) { echo 'active'; } ?>" id="nav-employee-tab" data-bs-toggle="tab" data-bs-target="#nav-employee" type="button" role="tab" aria-controls="nav-employee" aria-selected="true"><i class="bi bi-person-circle"></i>&nbsp;Details</button>
                        <button class="nav-link <? if($tab_id == 2) { echo 'active'; } ?>" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-document" aria-selected="false"><i class="bi bi-filetype-doc"></i>&nbsp;Documents</button>
                        <button class="nav-link <? if($tab_id == 3) { echo 'active'; } ?>" id="nav-employee-education-tab" data-bs-toggle="tab" data-bs-target="#nav-employee-education" type="button" role="tab" aria-controls="nav-employee-education" aria-selected="false"><i class="bi bi-people"></i>&nbsp;Family Details</button>
                        <button class="nav-link <? if($tab_id == 4) { echo 'active'; } ?>" id="nav-education-details-tab" data-bs-toggle="tab" data-bs-target="#nav-education-details" type="button" role="tab" aria-controls="nav-education-details" aria-selected="false"><i class="bi bi-mortarboard"></i>&nbsp;Education Details</button>
                        <button class="nav-link <? if($tab_id == 5) { echo 'active'; } ?>" id="nav-employee-experience-tab" data-bs-toggle="tab" data-bs-target="#nav-employee-experience" type="button" role="tab" aria-controls="nav-employee-experience" aria-selected="false"><i class="bi bi-person-workspace"></i>&nbsp;Experience Details</button>
                        <button class="nav-link" id="nav-refresh-tab" data-bs-toggle="tab" data-bs-target="#nav-refresh" type="button" onclick="viewEmployee(<?= $employee['id']; ?>,1)" role="tab" aria-controls="nav-refresh" aria-selected="false"><i class="bi bi-arrow-clockwise"></i>&nbsp;Refresh</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade <? if($tab_id == 1) { echo 'show active'; } ?>" id="nav-employee" role="tabpanel" aria-labelledby="nav-employee-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="p-card p-card-height">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <?
                                        $emp_img = DOCUMENTROOT."employee_images/".$employee['photo'];
                                        if(file_exists($emp_img)) { ?>
                                            <div class="p-card-img mb-2">
                                                <img src="<? echo WEBROOT; ?>employee_images/<? echo $employee['photo']; ?>" class="img-fluid" alt="profile image">
                                            </div>
                                        <? }else { ?>
                                            <div class="p-card-img mb-2">
                                                <img src="<? echo WEBROOT; ?>assets/images/default/default_img.png" class="img-fluid" alt="profile image">
                                            </div>
                                        <? } ?>
                                    </div>
                                    <div class="p-card-details text-center">
                                        <div class="p-name"><?php echo (isset($employee['fname']) ? $employee['fname'] : 'N/A') .''. (isset($employee['lname']) ? $employee['lname'] : '')?></div>
                                        <div class="p-number"><?= $employee['code'];?></div>
                                        <div class="p-status"><span class="status status-success status-icon-check w-90">Active</span></div>
                                        <div class="hr1"></div>
                                        <div class="table-responsive p-card-table text-start">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="110">Gender</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['gender']) ? $gender[$employee['gender']] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['mobile']) ? $employee['mobile'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alt.Mobile</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['alt_mobile']) ? $employee['alt_mobile'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['email']) ? $employee['email'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Place of Birth</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['place_of_birth']) ? $employee['place_of_birth'] : 'N/A';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <!-- <h4 class="page-sub-title"><i class="bi bi-person-lines-fill"></i>&nbsp;&nbsp;Personal Details:</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="130">Name</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo (isset($employee['fname']) ? $employee['fname'] : 'N/A') .''. (isset($employee['lname']) ? $employee['lname'] : '')?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['gender']) ? $gender[$employee['gender']] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['mobile']) ? $employee['mobile'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alt.Mobile</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['alt_mobile']) ? $employee['alt_mobile'] : 'N/A';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="160">Email</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['email']) ? $employee['email'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Place of Birth</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['place_of_birth']) ? $employee['place_of_birth'] : 'N/A';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>  
                                <div class="hr1"></div> -->
                                <h4 class="page-sub-title"><i class="bi bi-passport"></i>&nbsp;Passport Details</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="130">Passport Number</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['passport_no']) ? $employee['passport_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport Type</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['passport_type']) ? $passport_type[$employee['passport_type']]['name'] : '--';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="160">Passport Issued Date</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['passport_issued_date']) ? displayDate($employee['passport_issued_date']) : '--';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Passport Expiry Date</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['passport_expiry_date']) ? displayDate($employee['passport_expiry_date']) : '--';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Place of Issue</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['place_of_issue']) ? $employee['place_of_issue'] : '--';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr1"></div>
                                <h4 class="page-sub-title"><i class="bi bi-house-door"></i>&nbsp;Present Address:</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="130">Address1</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['address1']) ? $employee['address1'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address2</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['address2']) ? $employee['address2'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['city']) ? $employee['city'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['country']) ? $countries[$employee['country']]['name'] : 'N/A';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="160">State</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($employee['state']) ? $states[$employee['state']]['name'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>District</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['district']) ? $districts[$employee['district']]['name'] : 'N/A';?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PinCode</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($employee['pincode']) ? $employee['pincode'] : 'N/A';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>   
                                <div class="hr1"></div>     
                                <h4 class="page-sub-title"><i class="bi bi-pip"></i>&nbsp;Visa Details</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="130">Visa Number</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['visa_no']) ? $visa_details[$employee['id']]['visa_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Visa Type</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['visa_type']) ? $visa_types[$visa_details[$employee['id']]['visa_type']]['name'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Applied Date</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['applied_date']) ? displayDate($visa_details[$employee['id']]['applied_date']) : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Issued Date</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['issued_date']) ? displayDate($visa_details[$employee['id']]['issued_date']) : 'N/A'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="160">Start Date</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['start_date']) ? displayDate($visa_details[$employee['id']]['start_date']) : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>End Date</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['end_date']) ? displayDate($visa_details[$employee['id']]['end_date']) : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Purpose</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['purpose']) ? $visa_details[$employee['id']]['purpose'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Place of Issue</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($visa_details[$employee['id']]['place_of_issue']) ? $visa_details[$employee['id']]['place_of_issue'] : 'N/A'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr1"></div>                                
                                <h4 class="page-sub-title"><i class="bi bi-telephone"></i>&nbsp;Emergency Contact Details</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="130">Name</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($emergency_details['fullname']) ? $emergency_details['fullname'] : '--'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Relation</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($emergency_details['relation']) ? $emergency_details['relation'] : '--'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($emergency_details['mobile']) ? $emergency_details['mobile'] : '--'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="table-responsive p-card-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td width="160">Date of Birth</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo isset($emergency_details['dob']) ? displayDate($emergency_details['dob']) : '--'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nationality</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($emergency_details['nationality']) ? $emergency_details['nationality'] : '--'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession</td>
                                                        <td>:</td>
                                                        <td><?php echo isset($emergency_details['profession']) ? $emergency_details['profession'] : '--'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <? echo view('visaTracking/employee/additional_details'); ?>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="tab-pane fade <? if($tab_id == 2) { echo 'show active'; } ?>" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" tabindex="0">
                        <div class="clearfix">
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn-success" onclick="addEmployeeDocument(<? echo $employee['id']; ?>)"><span class="bi bi-plus-square"></span>&nbsp;Add Document</button>
                            </div>
                        </div>
                        <div class="hr1"></div>
                        <div id="documents_form"></div>
                        <div id="employee-document">
                            <? echo view('visaTracking/employee/employee_document');?>
                        </div>
                    </div>                
                    <div class="tab-pane fade <? if($tab_id == 3) { echo 'show active'; } ?>" id="nav-employee-education" role="tabpanel" aria-labelledby="nav-employee-education" tabindex="0">
                        <div class="clearfix">
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn-success" onclick="addFamilyDetails(<? echo $employee['id']; ?>)"><span class="bi bi-plus-square"></span>&nbsp;Add Family Details</button>
                            </div>
                        </div>
                        <div class="hr1"></div>
                        <div id="family_details_form"></div>
                        <div id="employee_details">
                            <? echo view('visaTracking/employee/employee_family');?>
                        </div>
                    </div>
                    <div class="tab-pane fade <? if($tab_id == 4) { echo 'show active'; } ?>" id="nav-education-details" role="tabpanel" aria-labelledby="nav-education-details-tab" tabindex="0">
                        <div class="clearfix">
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn-success" onclick="addEducationDetails(<? echo $employee['id']; ?>)"><span class="bi bi-plus-square"></span>&nbsp;Add Education Details</button>
                            </div>
                        </div>
                        <div class="hr1"></div>
                        <div id="emp_education_form"></div>
                        <div id="education_details">
                            <? echo view('visaTracking/employee/educational_details');?>
                        </div>
                    </div>
                    <div class="tab-pane fade <? if($tab_id == 5) { echo 'show active'; } ?>" id="nav-employee-experience" role="tabpanel" aria-labelledby="nav-employee-experience-tab" tabindex="0">
                         <div class="clearfix">
                            <div class="float-end">
                                <button type="button" class="btn btn-sm btn-success" onclick="addExperienceDetails(<? echo $employee['id']; ?>)"><span class="bi bi-plus-square"></span>&nbsp;Add Experience Details</button>
                            </div>
                        </div>
                        <div class="hr1"></div>
                        <div id="emp_experience_form"></div>
                        <div id="emp_exp_details">
                            <? echo view('visaTracking/employee/employee_exp_details');?>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade < if($tab_id == 6) { echo 'show active'; } ?>" id="nav-refresh" role="tabpanel" aria-labelledby="nav-employee-experience-tab" tabindex="0">
                        .....
                    </div> -->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x-square"></span>&nbsp;Close</button>
        </div>
    </div>
</div>