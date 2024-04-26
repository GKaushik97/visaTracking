/**
 * Qualification
 */

// To Add Qualification
function addQualification()
{
    $.post(WEBROOT + "educationalQualification/add",function(data){
        loadModal(data);
    });
}

// To Insert Qualification
function insertQualification()
{
    var params = $('#add_qualification').serializeArray();
    $.post(WEBROOT + 'educationalQualification/create',params,function(data){
        loadModal(data);
        educationalQualificationBody(10, 1, 'name', 'asc');
    });
}

// To Edit Qualification
function editQualification(id)
{
    $.get(WEBROOT + 'educationalQualification/edit',{'id':id},function(data){
        loadModal(data);
    });
}

// To Update Qualification
function updateQualification()
{
    var params = $('#edit_qualification').serializeArray();
    $.post(WEBROOT + 'educationalQualification/update',params,function(data){
        loadModal(data);
        educationalQualificationBody(10, 1, 'name', 'asc');
    });
}
// To Delete Qualification
function deleteQualification(id)
{
    if(confirm("Are you sure you want to delete the this Qualification!")) {
        $.post(WEBROOT + 'educationalQualification/delete',{'id' : id}, function(data){
            loadModal(data);
            educationalQualificationBody(10, 1, 'name', 'asc');
        });
    }
}

// To Search Educational Qualifications
function educationalQualificationBody(rows, pageno, sort_by, sort_order) {
    var keywords = $('#keywords').val();
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': keywords
    };
    $.post(WEBROOT + 'educationalQualification/indexBody', params, function(data) {
        $('#educationalQualification_body').html(data);
    });
}

// To Reset Educational Qualification Body
function resetEducationalQualificationBody() {
    $('#keywords').val('');
    educationalQualificationBody(10, 1, 'name', 'asc');
}