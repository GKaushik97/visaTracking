/**
 * Realtions
 */
// To Add Relation
function addRelation()
{
    $.post(WEBROOT + "familyRelation/add",function(data){
        loadModal(data);
    });
}
// To Insert Relation
function insertRelation()
{
    var params = $('#add_relation').serializeArray();
    $.post(WEBROOT + 'familyRelation/create',params,function(data){
        loadModal(data);
        familyRelationBody(10, 1, 'name', 'asc');
    });
}
// To Edit Relation
function editRelation(id)
{
    $.get(WEBROOT + 'familyRelation/edit',{'id':id},function(data){
        loadModal(data);
    });
}
// To Update Relation
function updateRelation()
{
    var params = $('#edit_relation').serializeArray();
    $.post(WEBROOT + 'familyRelation/update',params,function(data){
        loadModal(data);
        familyRelationBody(10, 1, 'name', 'asc');
    });
}
// To Delete Relation
function deleteRelation(id)
{
    if(confirm("Are you sure you want to delete the Relation!")) {
        $.post(WEBROOT + 'familyRelation/delete',{'id' : id}, function(data){
            loadModal(data);
            familyRelationBody(10, 1, 'name', 'asc');
        });
    }
}
function familyRelationBody(rows, pageno, sort_by, sort_order) {
    var params = {
        // 'rows': rows,
        // 'pageno': pageno,
        // 'sort_by': sort_by,
        // 'sort_order': sort_order,
        'keywords': $('#keywords').val()
    };
    $.post(WEBROOT + 'familyRelation/indexBody',params,function(data){
        $('#familyRelation_body').html(data);
    });
}

// To Reset DepartmentBody
function resetFamilyRelationBody() {
    $('#keywords').val('');
    familyRelationBody(10, 1, 'name', 'asc');
}
