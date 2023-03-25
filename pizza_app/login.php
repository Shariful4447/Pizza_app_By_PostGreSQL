
<?php include('partials-front/menu.php'); ?>

<html>
    <head>
        <title>Customer Login </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

        <div class="login" style="margin-top: 50px;">
            <h1 class="text-center">Customer Login</h1>
            <br><br>

            <?php
                if( isset($_SESSION['login']) )
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if( isset($_SESSION['no-login-message']) )
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br>
            <br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">

                <input required class="cust_ip" type="text" name="username" placeholder="Enter Username"><br><br>

                <input required class="cust_ip" type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="SignUp" class="btn btn-primary">
                <br><br>
            </form>
            <!-- Login Form Ends HEre -->

            <br>

            <p class="text-center">
              <a href="<?= SITEURL ?>register.php"> <b>Create New Account</b>  </a>
            </p>
        </div>

    </body>
</html>

<?php



    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = pg_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = pg_num_rows($res);

        if($count>0)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'><b>Login Successful.</b></div>";
            $_SESSION['customer'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            echo '<script>window.location.href="'.SITEURL.'"</script>';
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'><b>Username or Password did not match.</b></div>";
            //REdirect to HOme Page/Dashboard

            echo '<script>window.location.href="'.SITEURL.'login.php"</script>';

        }
    }

?>

<style media="screen">
    .cust_ip{
      padding: 15px;
      width: 350px;
    }
</style>
