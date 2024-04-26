<?php
/**
 * Edit Employee
 **/
$id_val = isset($employee['id']) ? $employee['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$fname_val = isset($employee['fname']) ? $employee['fname'] : set_value('fname');
$lname_val = isset($employee['lname']) ? $employee['lname'] : set_value('lname');
$gender_val = isset($employee['gender']) ? $employee['gender'] : set_value('gender');
$dob_val = isset($employee['dob']) ? $employee['dob'] : set_value('dob');
$mobile_val = isset($employee['mobile']) ? $employee['mobile'] : set_value('mobile');
$alt_mobile_val = isset($employee['alt_mobile']) ? $employee['alt_mobile'] : set_value('alt_mobile');
$email_val = isset($employee['email']) ? $employee['email'] : set_value('email');
$pob_val = isset($employee['place_of_birth']) ? $employee['place_of_birth'] : set_value('pob');
$passport_val = isset($employee['passport_no']) ? $employee['passport_no'] : set_value('passport_no');
$passport_type_val = isset($employee['passport_type']) ? $employee['passport_type'] : set_value('passport_type');
$pid_val = isset($employee['passport_issued_date']) ? displayDate($employee['passport_issued_date']) : set_value('pid');
$ped_val = isset($employee['passport_expiry_date']) ? displayDate($employee['passport_expiry_date']) : set_value('ped');
$place_val = isset($employee['place_of_issue']) ? $employee['place_of_issue'] : set_value('place_of_issue');
$address1_val = isset($employee['address1']) ? $employee['address1'] : set_value('address1');
$address2_val = isset($employee['address2']) ? $employee['address2'] : set_value('address2');
$city_val = isset($employee['city']) ? $employee['city'] : set_value('city');
$country_val = isset($employee['country']) ? $employee['country'] : set_value('country');
/*$state_val = isset($employee['state']) ? $employee['state'] : set_value('state');
$district_val = isset($employee['district']) ? $employee['district'] : set_value('district');*/
$pincode_val = isset($employee['pincode']) ? $employee['pincode'] : set_value('pincode');
$nationality_val = isset($employee['nationality']) ? $employee['nationality'] : set_value('nationality');
$marital_val = isset($employee['marital_status']) ? $employee['marital_status'] : set_value('marital_status');
$emp_exp_val = isset($employee['emp_experience']) ? $employee['emp_experience'] : set_value('emp_experience');
$photo_val = isset($employee['photo']) ? $employee['photo'] : set_value('photo');
$employee_status = isset($employee['employee_status']) ? $employee['employee_status'] : set_value('employee_status');
$details_val = isset($employee['emergency_id']) ? $employee['emergency_id'] : set_value('emergency_id');
$edu_qualification_val = isset($employee['edu_qualification']) ? $employee['edu_qualification'] : set_value('edu_qualification');

// Visa Details
$visa_id_val = isset($employee_visa[0]['id']) ? $employee_visa[0]['id'] : (isset($_POST['visa_id']) ? $_POST['visa_id'] : '');
$visa_no_val = isset($employee_visa[0]['visa_no']) ? $employee_visa[0]['visa_no'] : set_value('visa_no');
$visa_type_val = isset($employee_visa[0]['visa_type']) ? $employee_visa[0]['visa_type'] : set_value('visa_type');
$applied_date_val = isset($employee_visa[0]['applied_date']) ? displayDate($employee_visa[0]['applied_date']) : set_value('applied_date');
$issued_date_val = isset($employee_visa[0]['issued_date']) ? displayDate($employee_visa[0]['issued_date']) : set_value('issued_date');
$start_date_val = isset($employee_visa[0]['start_date']) ? displayDate($employee_visa[0]['start_date']) : set_value('start_date');
$end_date_val = isset($employee_visa[0]['end_date']) ? displayDate($employee_visa[0]['end_date']) : set_value('end_date');
$duration_val = isset($employee_visa[0]['duration']) ? $employee_visa[0]['duration'] : set_value('duration');
$purpose_val = isset($employee_visa[0]['purpose']) ? $employee_visa[0]['purpose'] : set_value('purpose');
$address_val = isset($employee_visa[0]['address']) ? $employee_visa[0]['address'] : set_value('address');
$poi_val = isset($employee_visa[0]['place_of_issue']) ? $employee_visa[0]['place_of_issue'] : set_value('place_of_issue');

if($emp_exp_val > 0 OR $emp_exp_val == '') {
    $employee = 1;
} else {
    $employee = 2;
}
?>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form method="post" id="edit_employee" onsubmit="return false">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $id_val; ?>">
            <input type="hidden" name="visa_id" value="<?= $visa_id_val; ?>">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="fname" class="form-label mb-0">First Name&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="fname" id="fname" value="<?= $fname_val; ?>" placeholder="Please Enter First Name">
                            <span class="text-danger"><?= validation_show_error('fname'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="lname" class="form-label mb-0">Last Name&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="lname" id="lname" value="<?= $lname_val; ?>" placeholder="Please Enter Last Name">
                            <span class="text-danger"><?= validation_show_error('lname'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="gender" class="form-label mb-0">Gender&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input form-radio" name="gender" id="male" value="1"<? if($gender_val == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input form-radio" name="gender" id="female" value="2"<? if($gender_val == "2"){ echo "checked";}?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input form-radio" name="gender" id="others" value="0"<? if($gender_val == "0"){ echo "checked";}?>>
                                    <label class="form-check-label" for="others">Others</label>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger"><?= validation_show_error('gender'); ?></span>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="dob" class="form-label mb-0">Date of Birth&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="dob" id="dob" class="form-control" value="<?= $dob_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('dob'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>                
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="mobile" class="form-label mb-0">Mobile&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="mobile" id="mobile" value="<?= $mobile_val; ?>" placeholder="Please Enter Mobile">
                            <span class="text-danger"><?= validation_show_error('mobile'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="alt_mobile" class="form-label mb-0">Alternate Mobile&nbsp;<span class="text-danger"></span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="alt_mobile" id="alt_mobile" value="<?= $alt_mobile_val; ?>" placeholder="Please Enter Alternate Mobile">
                            <span class="text-danger"><?= validation_show_error('alt_mobile'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="email" class="form-label mb-0">Email&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?= $email_val; ?>" placeholder="Please Enter Email">
                            <span class="text-danger"><?= validation_show_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="pob" class="form-label mb-0">Place of Birth&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="pob" id="pob" value="<?= $pob_val; ?>" placeholder="Please Enter Place of Birth">
                            <span class="text-danger"><?= validation_show_error('pob'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="passport_no" class="form-label mb-0" title="Project Management Consultant">Passport Number&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="passport_no" value="<?= $passport_val; ?>" placeholder="Please Enter Passport Number">
                            <span class="text-danger"><?= validation_show_error('passport_no'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Passport Type&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="passport_type" id="passport_type">
                                <option value="">Select</option>
                                <? foreach ($passport_types as $p_key => $p_type) { ?>
                                    <option value="<?= $p_type['id']; ?>"<?if($passport_type_val == $p_type['id']){ echo "selected";}?>><?= $p_type['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('passport_type'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="pid" class="form-label mb-0">Passport Issued Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="pid" id="pid" class="form-control" value="<?= $pid_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('pid'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="ped" class="form-label mb-0">Passport Expiry Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="ped" id="ped" class="form-control" value="<?= $ped_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('ped'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="place_of_issue" class="form-label mb-0">Place of Issue&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="place_of_issue" id="place_of_issue" value="<?= $place_val; ?>" placeholder="Please Enter Passport Issue Place">
                            <span class="text-danger"><?= validation_show_error('place_of_issue'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="address1" class="form-label mb-0">Address1&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address1" id="address1" value="<?= $address1_val; ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address1'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="address2" class="form-label mb-0">Address2&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address2" id="address2" value="<?= $address2_val; ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address2'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="city" class="form-label mb-0">City&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="city" id="city" value="<?= $city_val; ?>" placeholder="Please Enter City">
                            <span class="text-danger"><?= validation_show_error('city'); ?></span>
                        </div>                     
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Country&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="country" id="country" onchange="editStates(this.value)">
                                <option value="">Select</option>
                                <? foreach ($countries as $c_key => $country) { ?>
                                    <option value="<?= $country['id']; ?>"<? if($country_val == $country['id']){ echo "selected";}?>><?= $country['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('country'); ?></span>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div id="edit_states_body">
                            <? echo view('visaTracking/employee/edit_states'); ?>
                        </div>                  
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div id="edit_districts_body"> 
                            <? echo view('visaTracking/employee/edit_districts_list'); ?>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="pincode" class="form-label mb-0">Pincode&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="pincode" id="pincode" value="<?= $pincode_val; ?>" placeholder="Please Enter Pincode">
                            <span class="text-danger"><?= validation_show_error('pincode'); ?></span>
                        </div>                     
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="nationality" class="form-label mb-0">Nationality&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="nationality" id="nationality" value="<?= $nationality_val; ?>" placeholder="Please Enter Nationality">
                            <span class="text-danger"><?= validation_show_error('nationality'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="nationality" class="form-label mb-0">Marital Status&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="marital_status" id="married" value="1"<? if($marital_val == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="married">Married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="marital_status" id="unmarried" value="2"<? if($marital_val == "2"){ echo "checked";}?>>
                                    <label class="form-check-label" for="unmarried">UnMarried</label>
                                </div>
                            </div>
                        </div>                     
                        <span class="text-danger"><?= validation_show_error('marital_status'); ?></span>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="employee_status" class="form-label mb-0">Employee Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="enable" name="employee_status" value="1"<? if($employee_status == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="enable">Enable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="disable" name="employee_status" value="0"<? if($employee_status == "0"){ echo "checked";}?>>
                                    <label class="form-check-label" for="disable">Disable</label>
                                </div>
                            </div>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Education Qualification&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="edu_qualification" id="edu_qualification">
                                <option value="">Select</option>
                                <? foreach ($edu_qualifications as $edu_key => $edu_type) { ?>
                                    <option value="<?= $edu_type['id']; ?>"<?if($edu_qualification_val == $edu_type['id']){ echo "selected";}?>><?= $edu_type['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('edu_qualification'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="employee" class="form-label mb-0">Employee Experience&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="employee" id="yes" value="1"<? if($employee == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="employee" id="no" value="2"<? if($employee == "2"){ echo "checked";}?>>
                                    <label class="form-check-label" for="no">No</label>
                                </div>                      
                            </div>
                            <span class="text-danger"><?= validation_show_error('employee'); ?></span>
                        </div>                     
                    </div>
                    
                    <div class="d-none col-md-3 col-sm-12 col-xs-12" id="emp_exp">
                        <div class="mb-0">
                            <label for="emp_experience" class="form-label mb-0">Total Experience in Years&nbsp;<span class="text-danger">*&nbsp;</span></label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="emp_experience" class="form-control" id="emp_experience" value="<? echo $emp_exp_val; ?>">
                                <span class="input-group-text">Years</span>
                                <span class="text-danger"><?= validation_show_error('emp_experience'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="photo" class="form-label mb-0">Photo</label>
                            <input type="file" class="form-control form-control-sm" name="photo" id="photo">
                            <span><?= $photo_val; ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <h4 class="page-sub-title">Emergency Contact Details</h4>                
                <div class="row">
                    <? if(isset($family_details) and !empty($family_details)) { ?>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="mb-0">
                                <label class="form-label mb-0">Emergency Contact&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                                <select class="form-select form-select-sm" name="emergency_id" id="emergency_id">
                                    <option value="">Select</option>
                                    <? foreach ($family_details as $f_key => $details) { ?>
                                        <option value="<?= $details['id']; ?>"<? if($details_val == $details['id']){ echo "selected";}?>><?= $relations[$details['relation_id']]['name']; ?></option>
                                    <? } ?>
                                </select>
                                <span class="text-danger"><?= validation_show_error('emergency_id'); ?></span>
                            </div>                   
                        </div>
                    <? }else { ?>
                        <div class="alert alert-warning">
                            <span>No Family Details Found.</span>
                        </div>
                    <? } ?>
                </div>
                <div class="hr1"></div>
                <h4 class="page-sub-title">Visa Details</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="visa_no" class="form-label mb-0">Visa Number&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="visa_no" id="visa_no" value="<?= $visa_no_val; ?>" placeholder="Please Enter Visa Number">
                            <span class="text-danger"><?= validation_show_error('visa_no'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Visa Type&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="visa_type" id="visa_type">
                                <option value="">Select</option>
                                <? foreach ($visa_types as $v_key => $visa) { ?>
                                    <option value="<?= $visa['id']; ?>"<? if($visa_type_val == $visa['id']){ echo "selected";}?>><?= $visa['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('visa_type'); ?></span>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="applied_date" class="form-label mb-0">Applied Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="applied_date" id="applied_date" class="form-control" value="<?= $applied_date_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('applied_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="issued_date" class="form-label mb-0">Issued Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="issued_date" id="issued_date" class="form-control" value="<?= $issued_date_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('issued_date'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="start_date" class="form-label mb-0">Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="start_date" id="start_date" class="form-control" value="<?= $start_date_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('start_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="end_date" class="form-label mb-0">End Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="end_date" id="end_date" class="form-control" value="<?= $end_date_val; ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('end_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="duration" class="form-label mb-0">Duration&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="duration" id="duration" class="form-control" value="<?= $duration_val; ?>" placeholder="Please enter Duration">
                                <span class="input-group-text" >Months</span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('duration'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="purpose" class="form-label mb-0">Purpose&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="purpose" id="purpose" value="<?= $purpose_val; ?>" placeholder="Please Enter Purpose">
                            <span class="text-danger"><?= validation_show_error('purpose'); ?></span>
                        </div>                     
                    </div>
                </div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="address" class="form-label mb-0">Address&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address" id="address" value="<?= $address_val; ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="place_of_issue1" class="form-label mb-0">Place of Issue&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="place_of_issue1" id="place_of_issue1" value="<?= $poi_val; ?>" placeholder="Please Enter Pincode">
                            <span class="text-danger"><?= validation_show_error('place_of_issue1'); ?></span>
                        </div>                     
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateEmployee()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dob').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
        $('#pid').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
        $('#ped').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#applied_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#issued_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#start_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#end_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        emp = document.forms["edit_employee"]["employee"].value;
        if(emp == "1"){
            $('#emp_exp').removeClass('d-none');
        }else {
            $('#emp_exp').addClass('d-none');
        }
        $('input[name="employee"]').click(function(){
            emp = document.forms["edit_employee"]["employee"].value;
            if(emp == "1"){
                $('#emp_exp').removeClass('d-none');
            }else {
                $('#emp_exp').addClass('d-none');
            }
        });
    });
</script>
