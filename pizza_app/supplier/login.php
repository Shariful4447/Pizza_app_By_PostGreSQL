
<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Supplier Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>

      <a href="<?= SITEURL ?>admin">
        <button class="btn-success" style="top: 0; right: 30; position: absolute;">
            Login as Admin
        </button>
      </a>


        <div class="login">
            <h1 class="text-center">Supplier Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">

                <span>Username: </span><br>
                <input type="text" name="username" placeholder="Enter Username">

                <br><br>

                <span>Password:</span> <br>
                <input type="password" name="password" placeholder="Enter Password">

                <br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">

                <br><br>

            </form>
            <!-- Login Form Ends HEre -->

            <p class="text-center">Back to - <a href="<?= SITEURL ?>"> Website</a></p>
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
        $sql = "SELECT * FROM tbl_supplier WHERE username='$username' AND password='$password' ";

        //3. Execute the Query
        $res = pg_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = pg_num_rows($res);

        if($count>0)
        {

            $info = pg_fetch_assoc($res);
            $type = $info['category'];

            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'><b>Login Successful.</b></div>";
            $_SESSION['supplier'] = $username;
            $_SESSION['category'] = $type;
            //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'supplier/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'><b>Username or Password did not match.</b></div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'supplier/login.php');
        }


    }

?>
