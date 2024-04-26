/**
 * employee documents
 */

//add DocumentEmployee
function addEmployeeDocument(id) {
	$.post(WEBROOT + "employeDocuments/add", {'id' : id},function (data) {
	$('#documents_form').html(data);	
	});
}
//insert DocumentEmployee
function insertEmployeeDocument(emp_id) {
	$.ajax({
		url: WEBROOT + "employeDocuments/create",
		type: 'POST',
		data: new FormData(document.forms['add_employee_documents']),
		contentType: false,
		cache: false,
		processData: false,
		success: function (data){
			$('#documents_form').html(data);
			viewDocuments(emp_id);
		},
	});
}
// view DocumentEmployee
function viewDocuments(id)
{
	$.get(WEBROOT + "employeDocuments/viewDocuments", {'id' : id}, function(data) {
		$('#employee-document').html(data);
	});
}

// Delete Document
function deleteDocument(emp_id, id)
{
	if(confirm("Are you sure you want to delete the file!")) {
		$.post(WEBROOT + "employeDocuments/deleteDocument", {'id' : id}, function(data) {
			$('#documents_form').html(data);
			viewDocuments(emp_id);
		});
	}
}

