$(function() {
    var currentUrl = $('#current_url').val();
    $("#menu ul li a[href='" + currentUrl + "']").addClass('active');

});
