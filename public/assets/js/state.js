/**
 * state js
 */
function saveState() {
	var params = $('#addStateForm').serialize();
	$.post(WEBROOT + 'state/create', params, function (data) {
		loadModal(data);
		stateBody(10,1,'name','asc');

	});
}

function addState() {
	$.get(WEBROOT + 'state/add', function (data) {
		loadModal(data);
		stateBody(10,1,'name','asc');
	});
}

function editState(id) {

	$.get(WEBROOT + 'state/edit' ,{'id' : id}, function (data) {
		loadModal(data);
	});

}

function updateState() {
	var params = $('#editStateForm').serialize();
	$.post(WEBROOT + 'state/update', params, function(data) {
		loadModal(data);
		stateBody(10,1,'name','asc');
	});
}

function deleteState(id) {
	if(confirm("Are you sure you want delete this state record?")) {
		$.post(WEBROOT + 'state/delete',{'id' : id}, function (data) {
			loadModal(data);
			stateBody(10,1,'name','asc');
		});
	}
}

function stateBody(rows,page_no,sort_by,sort_order) {
	
	
	var params = {
		'rows': rows,
		'page_no': page_no,
     	'sort_by': sort_by,
		'sort_order': sort_order,

		'keywords': $('#keywords').val(),
		'country_id': $('#country_filter').val(),
		'name': $('#name').val(),
	};
	$.post(WEBROOT + 'state/indexBody', params,function (data) {
     $('#states_body').html(data);
	});
	
}

function resetstateBody() {
	$('#keywords').val('');
	$('#country_filter').val('');
	stateBody(10,1,'name','asc');
}