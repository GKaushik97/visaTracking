// Employees Functions JS
function employeeBody(rows, page_no, sort_by, sort_order) {
	var params = {
		'rows': rows,
		'page_no': page_no,
     	'sort_by': sort_by,
		'sort_order': sort_order,
		'keywords': $('#keywords').val(),
		'emp_status' : $('#emp_status').val(),
		'name' : $('#name').val(),
		'code' : $('#code').val(),
		'passport_no' : $('#passport_no').val(),
		'gender' : $('#gender').val(),
		'mobile' : $('#mobile').val(),
	};
	preLoader();
	$.post(WEBROOT + 'employee/indexBody', params, function(data) {
        $('#employee_body').html(data);
        closePreLoader();
	});
}
// Reset Function
function resetEmployeeBody() {
	$('#keywords').val('');
	$('#emp_status').val("");
	$('#code').val("");
	$('#name').val("");
	$('#passport_no').val("");
	$('#gender').val("");
	$('#mobile').val("");
	employeeBody(10, 1, "employees.created_at", "desc");
}

// Add Employee
function addEmployee() {
	preLoader();
	$.post(WEBROOT + "employee/addEmployee", function (data) {
    loadModal(data);
    closePreLoader();
  });
}

// Insert Employee
function insertEmployee()
{
	$.ajax({
		'url' : WEBROOT + "employee/insertEmployee",
		'type' : 'POST',
		'data' : new FormData(document.forms["add_employee"]),
		'contentType' : false,
		'processData' : false,
		'cache' : false,
		success : function(data) {
			loadModal(data);
			resetEmployeeBody();
		}
	});
}

// Add States
function getStates(id)
{
	$.get(WEBROOT + "employee/getStatesByCountry", {'country' : id}, function(data) {
		$('#states_body').html(data);
	})
}
function getDistricts(state)
{
	$.get(WEBROOT + "employee/getDistrictsByState", {'state' : state}, function(data) {
		$('#districts_body').html(data);
	})
}

// Edit Employee
function editEmployee(id)
{
	preLoader();
	$.get(WEBROOT + "employee/editEmployee", { 'id': id }, function (data) {
		loadModal(data);
		closePreLoader();
	});
}
// Add States
function editStates(id)
{
	$.get(WEBROOT + "employee/editStatesByCountry", {'country' : id}, function(data) {
		$('#edit_states_body').html(data);
	})
}
function editDistricts(state)
{
	$.get(WEBROOT + "employee/editDistrictsByState", {'state' : state}, function(data) {
		$('#edit_districts_body').html(data);
	})
}

// update Employee
function updateEmployee()
{
	$.ajax({
		'url' : WEBROOT+"employee/updateEmployee",
		'type' : 'post',
		'data' : new FormData(document.forms['edit_employee']),
		'cache' : false,
		'contentType' : false,
		'processData' : false,
		success : function(data) {
			loadModal(data);
			resetEmployeeBody();
		}
	});
}

// view Employee
function viewEmployee(id, tab=1)
{
	preLoader();
	$.get(WEBROOT + "employee/viewEmployee", {'id' : id, 'tab' : tab}, function(data) {
		loadModal(data);
		closePreLoader();
	});
}

// Delete Employee
function deleteEmployee(id)
{
	if(confirm("Are you sure you want to delete this employee")) {
		$.post(WEBROOT + "employee/deleteEmployee", {'id' : id}, function(data) {
			loadModal(data);
			resetEmployeeBody();
		});
	}
}

// Get States By Country ID

// Emoployee Load Export
function loadExportModal(rows, page_no, sort_by, sort_order)
{
	var params = {
		'rows': rows,
		'page_no': page_no,
     	'sort_by': sort_by,
		'sort_order': sort_order,
		'tRecords': $('#tRecords').val(),
		'keywords': $('#keywords').val(),
		'emp_status' : $('#emp_status').val(),
	};
	preLoader();
	$.get(WEBROOT + "employee/getEmployeeCols",params, function(data){
		loadModal(data);
		closePreLoader();
	});
}
/*function employeeExport() {
	var params = $('#export_employee').serializeArray();
	$.post(WEBROOT + "employee/getEmployeeExport", params, function(data) {
		unLoadModal();
	});
}*/
function employeeExport() {
	var params = $('#export_employee').serializeArray();
	$.post(WEBROOT + "employee/getExportCsv", params, function(data) {
		unLoadModal();
	});
}
// Employee Exports
/*function employeeExport(sort_by, sort_order) {
	window.location = WEBROOT + "employee/getEmployeeExport?sort_by="+sort_by+"&sort_order="+sort_order+"";
}*/

/* Family Details Section Start ...*/

// To Add Employee Family Details
function addFamilyDetails(id)
{
	preLoader();
	$.get(WEBROOT + "familyDetails/addEmployeeFamily", {'id' : id}, function(data) {
		$('#family_details_form').html(data);
		closePreLoader();
	});
}

// To Cancel Family Details
function cancelFamilyDetailsForm()
{
	$('#family_details_form').html('');
}

// To view Family Details
function viewFamilyDetailsByID(id)
{
	preLoader();
	$.get(WEBROOT + "familyDetails/viewEmployeeFamilyById", {'id' : id}, function(data) {
		$('#employee_details').html(data);
		closePreLoader();
	});
}

// To Insert Family Details
function insertFamilyDetails(id)
{
	var params = $('#add_employee_family').serializeArray();
	$.post(WEBROOT + "familyDetails/insertEmployeeFamily", params, function(data){
		$('#family_details_form').html(data);
		viewFamilyDetailsByID(id);
	});
}

// To Edit the Family details
function editFamilyDetails(id)
{
	preLoader();
	$.get(WEBROOT + "familyDetails/editEmployeeFamily", {'id' : id}, function(data) {
		$('#family_details_form').html(data);
		closePreLoader();
	})
}

// To Update Family Details
function updateFamilyDetails(id)
{
	var params = $('#edit_employee_family').serializeArray();
	$.post(WEBROOT + "familyDetails/updateEmployeeFamily", params, function(data){
		$('#family_details_form').html(data);
		viewFamilyDetailsByID(id);
	});
}

// Delete Employee Family
function deleteFamilyDetails(emp_id , id) 
{
	if(confirm("Are you sure you want to delete the family Member")) {
		$.post(WEBROOT + "familyDetails/deleteEmployeeFamily", {'id' : id}, function(data){
			$('#family_details_form').html(data);
			viewFamilyDetailsByID(emp_id);
		});
	}
}
/*  Family Details Section End ....*/

