/**
 * District js
 */

// To add Districts
function addDistrict() {
    $.post(WEBROOT + "district/add", function (data) {
        loadModal(data);
    });
}

// To Insert District
function insertDistrict() {
    var params = $('#add_district').serializeArray();
    $.post(WEBROOT + "district/create", params, function (data) {
        loadModal(data);
        districtBody(10, 1, 'name', 'asc');
    });
}

// To Edit District
function editDistrict(id) {
    $.get(WEBROOT + 'district/edit', {'id': id}, function (data) {
        loadModal(data);
    });
}

// To Update District
function updateDistrict() {
    var params = $('#edit_district').serializeArray();
    $.post(WEBROOT + 'district/update', params, function (data) {
        loadModal(data);
        districtBody(10, 1, 'name', 'asc');
        
    });
}
// To Delete District
function deleteDistrict(id) {
    if (confirm("Are you sure you want to delete this District record?")) {
        $.post(WEBROOT + 'district/delete', {'id': id}, function (data) {
            loadModal(data);
            districtBody(10, 1, 'name', 'asc');
            
        });
    }
}

// To District Body page 
function districtBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        'state_id': $('#state_filter').val(),
        'name' : $('#name').val(),
    };
    $.post(WEBROOT + "district/indexBody", params, function (data) {
        $('#district_body').html(data);
    });
}


// To Reset District Body
function resetDistrictBody() {
    $('#keywords').val('');
    $('#state_filter').val('');
    districtBody(10, 1, 'name', 'asc');
}
