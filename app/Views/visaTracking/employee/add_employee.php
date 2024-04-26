<?
/**
 * Add Employee
 **/
?>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form method="post" onsubmit="return false" id="add_employee" name="add_employee" enctype="multipart/form-data">
  	   		<?= csrf_field() ?>
  	  		<div class="modal-header">
  	  		  <h5 class="modal-title">Add Employee</h5>
  	  		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	  		</div>
  	  		<div class="modal-body">
  	  			<div class="row">
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
  	  		  			  	<label for="fname" class="form-label mb-0">First Name&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
  	  		  			  	<input type="text" class="form-control form-control-sm" name="fname" id="fname" value="<?= set_value('fname'); ?>" placeholder="Please Enter First Name">
  	  						<span class="text-danger"><?= validation_show_error('fname'); ?></span>
  	  		  			</div>
  	  		  		</div>
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
  	  		  			  	<label for="lname" class="form-label mb-0">Last Name&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
  	  		  			  	<input type="text" class="form-control form-control-sm" name="lname" id="lname" value="<?= set_value('lname'); ?>" placeholder="Please Enter Last Name">
  	  						<span class="text-danger"><?= validation_show_error('lname'); ?></span>
  	  		  			</div>
  	  		  		</div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
  	  		  			  	<label for="gender" class="form-label mb-0">Gender&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label><br/>
  	  		  			  	<input type="radio" class="form-radio" name="gender" id="male" value="1"<? if(set_value('gender') == "1"){ echo "checked";}?>>&nbsp;Male
  	  		  			  	<input type="radio" class="form-radio" name="gender" id="female" value="2"<? if(set_value('gender') == "2"){ echo "checked";}?>>&nbsp;Female
  	  		  			  	<input type="radio" class="form-radio" name="gender" id="others" value="0"<? if(set_value('gender') == "0"){ echo "checked";}?>>&nbsp;Others
  	  		  			</div>
  	  					<span class="text-danger"><?= validation_show_error('gender'); ?></span>
  	  		  		</div>
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
      	  		  		<div class="mb-0">
      	  		  		  	<label for="dob" class="form-label mb-0">Date of Birth&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="dob" id="dob" class="form-control" value="<?= set_value('dob'); ?>" placeholder="DD-MM-YYYY">
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
                            <input type="text" class="form-control form-control-sm" name="mobile" id="mobile" value="<?= set_value('mobile'); ?>" placeholder="Please Enter Mobile">
                            <span class="text-danger"><?= validation_show_error('mobile'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="alt_mobile" class="form-label mb-0">Alternate Mobile&nbsp;<span class="text-danger"></span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="alt_mobile" id="alt_mobile" value="<?= set_value('alt_mobile'); ?>" placeholder="Please Enter Alternate Mobile">
                            <span class="text-danger"><?= validation_show_error('alt_mobile'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="email" class="form-label mb-0">Email&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Please Enter Email">
                            <span class="text-danger"><?= validation_show_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="pob" class="form-label mb-0">Place of Birth&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="pob" id="pob" value="<?= set_value('pob'); ?>" placeholder="Please Enter Place of Birth">
                            <span class="text-danger"><?= validation_show_error('pob'); ?></span>
                        </div>
                    </div>
  	  		  	</div>
                <div class="hr1"></div>
  	  		  	<div class="row">
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
  	  		  			  	<label for="passport_no" class="form-label mb-0" title="Project Management Consultant">Passport Number&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
  	  		  			  	<input type="text" class="form-control form-control-sm" name="passport_no" value="<?= set_value('passport_no'); ?>" placeholder="Please Enter Passport Number">
  	  						<span class="text-danger"><?= validation_show_error('passport_no'); ?></span>
  	  		  			</div>
  	  		  		</div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Passport Type&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="passport_type" id="passport_type">
                                <option value="">Select</option>
                                <? foreach ($passport_types as $p_key => $p_type) { ?>
                                    <option value="<?= $p_type['id']; ?>"<?if(set_value('passport_type') == $p_type['id']){ echo "selected";}?>><?= $p_type['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('passport_type'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="pid" class="form-label mb-0">Passport Issued Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="pid" id="pid" class="form-control" value="<?= set_value('pid'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('pid'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="ped" class="form-label mb-0">Passport Expiry Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="ped" id="ped" class="form-control" value="<?= set_value('ped'); ?>" placeholder="DD-MM-YYYY">
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
                            <input type="text" class="form-control form-control-sm" name="place_of_issue" id="place_of_issue" value="<?= set_value('place_of_issue'); ?>" placeholder="Please Enter Passport Issue Place">
                            <span class="text-danger"><?= validation_show_error('place_of_issue'); ?></span>
                        </div>
                    </div>
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
                            <label for="address1" class="form-label mb-0">Address1&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address1" id="address1" value="<?= set_value('address1'); ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address1'); ?></span>
                        </div>
  	  		  		</div>
  	  		  		<div class="col-md-3 col-sm-6 col-xs-12">
  	  		  			<div class="mb-0">
                            <label for="address2" class="form-label mb-0">Address2&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address2" id="address2" value="<?= set_value('address2'); ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address2'); ?></span>
                        </div>
  	  		  		</div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="city" class="form-label mb-0">City&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="city" id="city" value="<?= set_value('city'); ?>" placeholder="Please Enter City">
                            <span class="text-danger"><?= validation_show_error('city'); ?></span>
                        </div>                     
                    </div>
  	  		  	</div>
                <div class="hr1"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Country&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="country" id="country" onchange="getStates(this.value)">
                                <option value="">Select</option>
                                <? foreach ($countries as $c_key => $country) { ?>
                                    <option value="<?= $country['id']; ?>"<? if(set_value('country') == $country['id']){ echo "selected";}?>><?= $country['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('country'); ?></span>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div id="states_body">
                            <? echo view('visaTracking/employee/states_list'); ?>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div id="districts_body">
                            <? echo view('visaTracking/employee/districts_list'); ?>                            
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="pincode" class="form-label mb-0">Pincode&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="pincode" id="pincode" value="<?= set_value('pincode'); ?>" placeholder="Please Enter Pincode">
                            <span class="text-danger"><?= validation_show_error('pincode'); ?></span>
                        </div>                     
                    </div>
                </div>
                <div class="hr1"></div>
  	  		  	<div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                         <div class="mb-0">
                            <label for="nationality" class="form-label mb-0">Nationality&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="nationality" id="nationality" value="<?= set_value('nationality'); ?>" placeholder="Please Enter Nationality">
                            <span class="text-danger"><?= validation_show_error('nationality'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="nationality" class="form-label mb-0">Marital Status&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" class="" name="marital_status" id="married" value="1"<? if(set_value('marital_status') == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="married">Married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marital_status" id="unmarried" value="2"<? if(set_value('marital_status') == "2"){ echo "checked";}?>>
                                    <label class="form-check-label" for="unmarried">UnMarried</label>
                                </div>
                            </div>
                        </div>                     
                        <span class="text-danger"><?= validation_show_error('marital_status'); ?></span>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Education Qualification&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="edu_qualification" id="edu_qualification">
                                <option value="">Select</option>
                                <? foreach ($edu_qualifications as $edu_key => $edu_type) { ?>
                                    <option value="<?= $edu_type['id']; ?>"<?if(set_value('edu_qualification') == $edu_type['id']){ echo "selected";}?>><?= $edu_type['name']; ?></option>
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
                            <label for="employee" class="form-label mb-0">Employee Experience&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employee" id="yes" value="1"<? if(set_value('employee') == "1"){ echo "checked";}?>>
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employee" id="no" value="2"<? if(set_value('employee') == "2"){ echo "checked";}?>>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                            <span class="text-danger"><?= validation_show_error('employee'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="d-none" id="emp_exp">
                            <div class="mb-0">
                                <label for="emp_experience" class="form-label mb-0">Total Experience in Years&nbsp;<span class="text-danger">*&nbsp;</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="emp_experience" class="form-control" id="emp_experience" value="<? echo set_value('emp_experience'); ?>">
                                    <span class="input-group-text">Years</span>
                                    <span class="text-danger"><?= validation_show_error('emp_experience'); ?></span>
                                </div>
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
                            <span class="text-danger"><?= validation_show_error('photo'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="hr1"></div>                
                <h4 class="page-sub-title">Visa Details</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-2">
                            <label for="visa_no" class="form-label mb-0">Visa Number&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="visa_no" id="visa_no" value="<?= set_value('visa_no'); ?>" placeholder="Please Enter Visa Number">
                            <span class="text-danger"><?= validation_show_error('visa_no'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-2">
                            <label class="form-label mb-0">Visa Type&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="visa_type" id="visa_type">
                                <option value="">Select</option>
                                <? foreach ($visa_types as $v_key => $visa) { ?>
                                    <option value="<?= $visa['id']; ?>"<? if(set_value('visa_type') == $visa['id']){ echo "selected";}?>><?= $visa['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('visa_type'); ?></span>
                        </div>                   
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-2">
                            <label for="applied_date" class="form-label mb-0">Applied Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="applied_date" id="applied_date" class="form-control" value="<?= set_value('applied_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('applied_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-2">
                            <label for="issued_date" class="form-label mb-0">Issued Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="issued_date" id="issued_date" class="form-control" value="<?= set_value('issued_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('issued_date'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-2">
                            <label for="start_date" class="form-label mb-0">Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="start_date" id="start_date" class="form-control" value="<?= set_value('start_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('start_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-2">
                            <label for="end_date" class="form-label mb-0">End Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="end_date" id="end_date" class="form-control" value="<?= set_value('end_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('end_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="mb-2">
                            <label for="duration" class="form-label mb-0">Duration&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="duration" id="duration" class="form-control" value="<?= set_value('duration'); ?>" placeholder="Please enter Duration">
                                <span class="input-group-text" >Months</span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('duration'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-2">
                            <label for="purpose" class="form-label mb-0">Purpose&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="purpose" id="purpose" value="<?= set_value('purpose'); ?>" placeholder="Please Enter Purpose">
                            <span class="text-danger"><?= validation_show_error('purpose'); ?></span>
                        </div>                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-2">
                            <label for="address" class="form-label mb-0">Address&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="address" id="address" value="<?= set_value('address'); ?>" placeholder="Please Enter Address">
                            <span class="text-danger"><?= validation_show_error('address'); ?></span>
                        </div>                     
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="mb-2">
                            <label for="place_of_issue1" class="form-label mb-0">Place of Issue&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" class="form-control form-control-sm" name="place_of_issue1" id="place_of_issue1" value="<?= set_value('place_of_issue1'); ?>" placeholder="Please Enter Pincode">
                            <span class="text-danger"><?= validation_show_error('place_of_issue1'); ?></span>
                        </div>                     
                    </div>
                </div>
  	  		</div>
  	  		<div class="modal-footer">
  	  		  	<button type="button" onclick="insertEmployee()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add Employee</button>
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
        $('#start_date').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
        $('#end_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#applied_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#issued_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        emp = document.forms["add_employee"]["employee"].value;
        if(emp == "1"){
            $('#emp_exp').removeClass('d-none');
        }else {
            $('#emp_exp').addClass('d-none');
        }
        $('input[name="employee"]').click(function(){
            emp = document.forms["add_employee"]["employee"].value;
            if(emp == "1"){
                $('#emp_exp').removeClass('d-none');
            }else {
                $('#emp_exp').addClass('d-none');
            }
        });
    });
</script>
