$(document).ready(function() {
    
    var get_msg = getCookie("msg");
    
    if( get_msg != "" ) {
        $(".message").val(get_msg);
        $(".message").focus();
    }
    
    $('.message').bind('input', function() {
        var message = $(this).val(); // get the current value of the input field.
        setCookie("msg", message, 1);
        //alert( getCookie("msg") );
    });
    
});

function reload() {
    
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}