<?php
if(!empty($_POST['password'])) { 
    if(md5('blah@#$'.sha1('3NhNj8&'.$_POST['password']) ) =='d5e6aa739490bf2205aa12e039887a84' ) {
    header("Location: http://studentweb.liberty.k12.mo.us/CarterPHP/php.html"); /* Redirect here if the password is correct */
    }
    else {
        header("Location: http://studentweb.liberty.k12.mo.us/CarterPHP/info.html"); /* Return here if the password ain't correct */
    }   
}
else {
    header("Location: http://studentweb.liberty.k12.mo.us/CarterPHP/info.html"); /* Return here if the field is empty */
}
?>