/**
 * Document js
 */
function saveDocument() {
	var params = $('#addDocumentForm').serialize();
	$.post(WEBROOT + 'documenttypes/create', params,function (data) {
		loadModal(data);
		documentBody(10,1,'name','asc');

	});
}
function addDocument() {
	$.get(WEBROOT + 'documenttypes/add', function (data) {
		loadModal(data);
		documentBody(10,1,'name','asc');
	});
}
function editDocument(id) {
	$.get(WEBROOT + 'documenttypes/edit',{'id' : id}, function (data) {
		loadModal(data);
	});
}
function updateDocument() {
	var params = $('#editDocumentForm').serialize();
	$.post(WEBROOT + 'documenttypes/update',params, function (data) {
		loadModal(data);
		documentBody(10,1,'name','asc');
	});
}
function deleteDocument(id) {
	if(confirm("Are you sure you want to delete this document record?")) {
		$.post(WEBROOT + 'documenttypes/delete',{'id' :id}, function (data) {
			loadModal(data);
			documentBody(10,1,'name','asc');
		});
	}
}

function documentBody() {

	var params = {
		'keywords':$('#keywords').val()

	};
	$.post(WEBROOT + 'documenttypes/indexBody', params,function (data) {
		$('#document_body').html(data);
	});

}
function resetdocumentBody() {
	$('#keywords').val('');
	documentBody(10,1,'name','asc');
}