$(function() {
    var currentUrl = $('#parent_url').val();
    $("#menu ul li a[href='" + currentUrl + "']").addClass('active');
    $('.alert .close').click(function(){
        $(this).parent('li').parent('ul').parent('.alert').fadeOut(350);
    });
});
