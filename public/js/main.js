$(function() {
    var currentUrl = $('#current_url').val();
    $("#menu ul li a[href='" + currentUrl + "']").addClass('active');
    $('.alert .close').click(function(){
        console.log('a');
        $(this).parent('li').parent('ul').parent('.alert').fadeOut(350);
    });
});
