/**
 * Country List
 */

// To Add Country
function addCountry() {
    $.get(WEBROOT + "country/add", function (data) {
        loadModal(data);
    });
}
// To Insert Country
function insertCountry() {
    var params = $('#add_country').serializeArray();
    $.post(WEBROOT + "country/create", params, function (data){
        loadModal(data);
        countryBody(10, 1, 'name', 'asc');
    });
}
// To Edit Country
function editCountry(id) {
    $.get(WEBROOT + "country/edit",{'id' :id}, function(data){
        loadModal(data);
    });
}
// To Update Country
function updateCountry(){
    var params = $('#edit_country').serializeArray();
    $.post(WEBROOT + "country/update",params, function(data){
        loadModal(data);
        countryBody(10, 1, 'name', 'asc');
    });
}
// To Delete Country
function deleteCountry(id) {
    if (confirm("Are you sure ...?")) {
        $.post(WEBROOT + 'country/delete', {'id': id}, function (data) {
            loadModal(data);
           countryBody(10, 1, 'name', 'asc');
        });
    }
}
function countryBody(rows, pageno, sort_by, sort_order) {
    var params = {
         'rows': rows,
         'pageno': pageno,
         'sort_by': sort_by,
         'sort_order': sort_order,
        'keywords': $('#keywords').val()
    };
    $.post(WEBROOT + "country/indexBody", params, function (data) {
        $('#country_body').html(data);
    });
}

// To Reset CountryBody
function resetCountryBody() {
    $('#keywords').val('');
    countryBody(10, 1, 'name', 'asc');
}