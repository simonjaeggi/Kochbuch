$(function() {
    $('.delete').on('click', function(){
        $(this).parent().remove();
    });
    $('#buttonRegister').on('click', function(){
        window.location = 'register.php';
    });
});
//test 
