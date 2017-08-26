$(function() {
    


});


function isValidRegister() {

    var isValid = true;
    var $name = $("#name"),
        $email = $("#email"),
        $pw = $("#pw"),
        $pw2 = $("#pw2");

    if( !$name.val()  || $name.val().length < 3) {
        $name.addClass("warning");
        isValid = false;
    }
    if( !$email.val() ) {
        $email.addClass("warning");
        isValid = false;
    }
    if( !$pw.val() || $pw.val().length < 6) {
        $pw.addClass("warning");
        isValid = false;
    }
    if( !$pw2.val() || ($pw2.val() !== $pw.val())) {
        $pw2.addClass("warning");
        isValid = false;
    }

    return isValid;
}