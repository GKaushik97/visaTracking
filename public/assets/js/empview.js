/**
 * Employee Education Details
 */

// To Add Experience
function addExperienceDetails(id) {
    $.get(WEBROOT + 'employeeExperience/add', {'id' : id}, function(data) {
        $("#emp_experience_form").html(data);

    });
}

// To insert Experience
function insertExperience(id) {
    var params = $('#add_experience').serializeArray();
    $.post(WEBROOT + "employeeExperience/create", params, function(data) {
        $('#emp_experience_form').html(data);
        viewEmployeeExperienceById(id);
    });
}

// To View Experience
function viewEmployeeExperienceById(id) {

    $.get(WEBROOT + "employeeExperience/viewEmployeeExperienceById", {'id' : id}, function(data) {
        $('#emp_exp_details').html(data);
    });
}

// To Edit Experience
function editEmployeeExperience(id) {
    $.get(WEBROOT + 'employeeExperience/edit',{'id':id}, function(data) {
        $("#emp_experience_form").html(data);
    });
}

// To Update Experience
function updateExperience(id) {
    var params = $('#edit_experience').serializeArray();
    $.post(WEBROOT + "employeeExperience/update" , params, function(data) {
        $('#emp_experience_form').html(data);
        viewEmployeeExperienceById(id);        
    });
}

// To Delete Experience
function deleteEmployeeExperience(employee_id,id) {
    if(confirm("Are you sure you want to delete the employee Experience ?")) {
        $.post(WEBROOT + "employeeExperience/deleteEmployeeExperience", {'id' : id}, function(data){
            $('#emp_experience_form').html(data);
            viewEmployeeExperienceById(employee_id);

        });
    }
}

function cancelEmployeeExperience(){

    $('#emp_experience_form').html('');
}

/**
 * Employee Education Details
 */
// To Add Education Details
function addEducationDetails(id) {
    $.get(WEBROOT + 'employeeEducation/add', {'id' : id},function(data) {
        $("#emp_education_form").html(data);
    });
}
// To Inser Education Details
function insertEducationDetails(id) {
    var params = $('#add_education').serializeArray();
    $.post(WEBROOT + "employeeEducation/create", params, function (data) {
       $("#emp_education_form").html(data);
       viewEmployeeEducationByID(id);    
    });
}
// To Edit Education Details
function editEmployeeEducation(id) {
    $.get(WEBROOT + 'employeeEducation/edit',{'id':id}, function(data) {
        $("#emp_education_form").html(data);
    });
}
// To Update Educatio Details
function updateEmployeeEducation(id) {
    var params = $('#edit_education').serializeArray();
    $.post(WEBROOT + 'employeeEducation/update', params, function (data) {
        $("#emp_education_form").html(data);
        viewEmployeeEducationByID(id);    
    });
}
// To View Employee Education By ID
function viewEmployeeEducationByID(id) {
    $.get(WEBROOT + "employeeEducation/viewEmployeeEducationById", {'id' : id}, function(data) {
        $('#education_details').html(data);
    });
}
// To Cancel Employee Details Form
function cancelEmployeeDetailsForm() {
    $('#emp_education_form').html('');
}
// To Delete Employee Education
function deleteEmployeeEducation(emp_id,id) {
    if(confirm("Are you sure you want to delete the employee education")) {
        $.post(WEBROOT + "employeeEducation/deleteEmployeeEducation", {'id' : id}, function(data){
            $('#emp_education_form').html(data);
            viewEmployeeEducationByID(emp_id);
        });
    }
}




