<?php
/**
 * VisaTracking
 * Employees Body
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$page_no = isset($params['page_no']) ? $params['page_no'] : 1;
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : 'fname';
$sort_order = isset($params['sort_order']) ? ($params['sort_order'] == 'asc' ? 'asc' : 'desc') : 'desc';
$sort_order_alt = ($params['sort_order'] == 'desc') ? 'asc' : 'desc';
$arrow = ($params['sort_order'] == 'desc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';
$rows = isset($params['rows']) ? $params['rows'] : 10;
$total_records = isset($tRecords) ? intval($tRecords) : 0;
$country_filter = isset($params['country_id']) ? $params['country_id'] : 0;
$emp_status_val = isset($params['emp_status']) ? $params['emp_status'] : "";
// Calculating the total pages
$total_pages = $rows > 0 ? ceil($total_records / $rows) : 1;
$code_val = isset($params['code']) ? $params['code'] : '';
$passport_no_val = isset($params['passport_no']) ? $params['passport_no'] : '';
$name_val = isset($params['name']) ? $params['name'] : '';
$gender_val = isset($params['gender']) ? $params['gender'] : '';
$mobile_val = isset($params['mobile']) ? $params['mobile'] : '';
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here">
            </div>            
            <div class="col-auto">                
                <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="employeeBody('<?= $params['rows'] ?? '';?>','<?= $params['page_no'] ?? '';?>','<?= $params['sort_by'] ?? ''; ?>', '<?= $params['sort_order'] ?? ''; ?>')"><i class="bi bi-search"></i></button>
            </div>           
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning"  name="search" id="reset" onclick="resetEmployeeBody()"><i class=" bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                    <input type="hidden" name="tRecords" id="tRecords" value="<? print $total_records;?>">
                <strong>(Records: <?= $total_records; ?>)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <button  type="button" href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addEmployee()"><i class="bi bi-plus-square"></i>&nbsp;Add Employee</button>
                <button  type="button" href="javascript:void(0)" class="btn btn-info btn-sm" onclick="loadExportModal('<?= $rows; ?>','<?= $page_no; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-plus-square"></i>&nbsp;Exports</button>
                <button  type="button" href="javascript:void(0)" class="btn btn-success btn-sm" onclick="uploadEmployee()"><i class="bi bi-plus-square"></i>&nbsp;Upload</button>
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" name="rows" id="rows" onchange="employeeBody(this.value, '<?= $page_no;?>','<?= $sort_by;?>','<?= $sort_order;?>')">
                    <option value="10" <?= $rows == 10 ? 'selected="selected"' : ''; ?>>10 Records</option>
                    <option value="20" <?= $rows == 20 ? 'selected="selected"' : ''; ?>>20 Records</option>
                    <option value="50" <?= $rows == 50 ? 'selected="selected"' : ''; ?>>50 Records</option>
                    <option value="100" <?= $rows == 100 ? 'selected="selected"' : ''; ?>>100 Records</option>
                </select>
            </div>
            <div class="col-auto">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm mb-0">
                        <?php if ($page_no == 1) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="employeeBody('<?= $rows; ?>','1','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="employeeBody('<?= $rows; ?>','<?= $page_no - 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } ?>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link p-0 text-white inv-tracking-select">
                                    <select class="form-select form-select-sm" name="rows" onchange="employeeBody('<?= $rows; ?>', this.value, '<?= $sort_by; ?>', '<?= $sort_order; ?>', document.getElementById('edu_val').value)">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                            <option value="<?= $i; ?>" <?= $i == $page_no ? 'selected="selected"' : ''; ?>><?= $i . '/' . $total_pages; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                            </li>
                        <?php if ($page_no == $total_pages) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="employeeBody('<?= $rows; ?>','<?= $page_no + 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="employeeBody('<?= $rows; ?>','<?= $total_pages; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th><? if($sort_by == 'employees.code') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.code','<? echo $sort_order_alt; ?>')">Code</a></th>
                <th><? if($sort_by == 'employees.passport_no') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.passport_no','<? echo $sort_order_alt; ?>')">Passport Number</a></th>
                <th><? if($sort_by == 'employees.fname') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.fname','<? echo $sort_order_alt; ?>')">Name</a></th>
                <th><? if($sort_by == 'employees.gender') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.gender','<? echo $sort_order_alt; ?>')">Gender</a></th>
                <th><? if($sort_by == 'employees.mobile') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.mobile','<? echo $sort_order_alt; ?>')">Mobile</a></th>
                <th class="text-center"><? if($sort_by == 'employees.passport_expiry_date') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','employees.passport_expiry_date','<? echo $sort_order_alt; ?>')">Passport Expiry Date</a></th>
                <th class="text-center"><? if($sort_by == 'ev.end_date') print $arrow; ?><a href="javascript:void(0)" onclick="employeeBody('<? echo $rows; ?>','<? print $page_no; ?>','ev.end_date','<? echo $sort_order_alt; ?>')">Visa Expiry Date</a></th>
                <th class="text-center">Status</th>
                <th>Actions</th>
            </tr>            
        </thead>
        <? if(isset($employees) and !empty($employees)) { ?>
            <tbody>
                <tr>
                    <td>#</td>
                    <td><input class="form-control form-control-sm" type="text" name="code" id="code" value="<?= $code_val; ?>"/></td>
                    <td><input class="form-control form-control-sm" type="text" name="passport_no" id="passport_no" value="<?= $passport_no_val; ?>" /></td>
                    <td><input type="text" name="name" id="name" class="form-control form-control-sm" value="<?= $name_val; ?>" /></td>
                    <td>
                        <select class="form-select form-select-sm" name="gender" id="gender">
                            <option value="">All</option>
                            <option value="1"<? if($gender_val == "1"){ echo "selected"; }?>>Male</option>
                            <option value="2"<? if($gender_val == "2"){ echo "selected"; }?>>Female</option>
                            <option value="0"<? if($gender_val == "0"){ echo "selected"; }?>>Others</option>
                        </select>
                    </td>
                    <td><input type="text" name="mobile" id="mobile" class="form-control form-control-sm" value="<?= $mobile_val; ?>"/></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select class="form-select form-select-sm" name="emp_status" id="emp_status">
                            <option value="">All</option>
                            <option value="1"<? if($emp_status_val == "1"){ echo "selected"; }?>>Active</option>
                            <option value="0"<? if($emp_status_val == "0"){ echo "selected"; }?>>Inactive</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="employeeBody('<?= $params['rows'] ?? '';?>','<?= $params['page_no'] ?? '';?>','<?= $params['sort_by'] ?? ''; ?>', '<?= $params['sort_order'] ?? ''; ?>')"><i class="bi bi-search"></i></button>
                        <button type="button" class="btn btn-sm btn-warning"  name="search" id="reset" onclick="resetEmployeeBody()"><i class=" bi bi-arrow-clockwise"></i></button>
                    </td>
                </tr>
                <?php $i = ($page_no -1) * $rows+1;
               foreach ($employees as $employee){ ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><a href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>)"><?= $employee['code']; ?></a></td>
                        <td><?= $employee['passport_no']; ?></td>
                        <td><?= $employee['fname']." ".$employee['lname']; ?></td>
                        <td>
                            <? switch($employee['gender']){
                                case 1: echo "Male";break;
                                case 2: echo "Female";break;
                                default : echo "others";break;
                            }; ?>
                        </td>
                        <td><?= $employee['mobile']; ?></td>
                        <td><?= displayDate($employee['passport_expiry_date']); ?></td>
                        <td><?= isset($employee['end_date']) ? displayDate($employee['end_date']) : ''; ?></td>
                        <td class="text-center">
                            <? if($employee['employee_status'] == 1) { ?>
                                <span class="status status-success status-icon-check w-90">Active</span>
                            <? }else { ?>
                                <span class="status status-danger status-icon-close w-90">Inactive</span>
                            <? } ?>
                        </td>
                        <td nowrap class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionMenu" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenu">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>)"><i class="bi bi-eye"></i>&nbsp;View</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="editEmployee(<?= $employee['id']; ?>)"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteEmployee(<?= $employee['id']; ?>)"><i class="bi bi-x-square"></i>&nbsp;Delete</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>,2)"><i class="bi bi-file-plus"></i>&nbsp;Add Documents</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>,3)"><i class="bi bi-person-add"></i>&nbsp;Add Family Details</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>,4)"><i class="bi bi-journal-plus"></i>&nbsp;Add Education Details</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewEmployee(<?= $employee['id']; ?>,5)"><i class="bi bi-person-workspace"></i>&nbsp;Employee Experience Details</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
               <? }
            }
         else { ?>
                <tr >
                    <td colspan="10"><div class="alert alert-danger">No Records Found</div></td>
                </tr>
            <? }?>
        </tbody>
    </table>  
</div>
