<?php

    //AUthorization - Access COntrol
    //CHeck whether the supplier is logged in or not

    if(!isset($_SESSION['supplier'])) //IF supplier session is not set
    {
        //supplier is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access supplier Panel.</div>";
        //REdirect to Login Page
        header('location:'.SITEURL.'supplier/login.php');
    }

?>
