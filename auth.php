<?php
if(!empty($_POST['password'])) { 
    if(md5('blah@#$'.sha1('3NhNj8&'.$_POST['password']) ) =='d5e6aa739490bf2205aa12e039887a84' ) {
    header("Location: iframe.html"); /* Redirect here if the password is correct */
    }
    else {
        header("Location: members.html"); /* Return here */
    }   
}
else {
    header("Location: members.html"); /* no input */
}
?>