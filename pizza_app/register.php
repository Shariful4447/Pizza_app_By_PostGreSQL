
<?php include('partials-front/menu.php'); ?>

<html>
    <head>
        <title>Customer Registration</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>

    <body>

        <div class="login" style="margin-top: 50px;">
            <h1 class="text-center">Customer Register</h1>
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


            <form action="" method="POST" class="text-center">

                <input required class="cust_ip" type="text" name="full_name" placeholder="Enter Fullname"><br><br>

                <input required class="cust_ip" type="text" name="username" placeholder="Enter Username"><br><br>

                <input required class="cust_ip" type="password" name="password" placeholder="Enter Password"><br><br>

                <input required class="cust_ip" type="email" name="email" placeholder="Enter Email"><br><br>

                <input required class="cust_ip" type="number" name="mobile" placeholder="Mobile Number"><br><br>

                <textarea required class="cust_ip" name="address" placeholder="Address"></textarea><br><br>

                <input type="submit" name="submit" value="SignUp" class="btn btn-primary"><br><br>

            </form>


            <br>

            <p class="text-center">
              <a href="<?= SITEURL ?>login.php"> <b>Login</b>  </a>
            </p>

        </div>

        <br><br><br>

    </body>
</html>

<?php



    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {

        //1. Get the form Data
        $full_name  = $_POST['full_name'];
        $username   = $_POST['username'];
        $password   = md5($_POST['password']);
        $email      = $_POST['email'];
        $mobile     = $_POST['mobile'];
        $address    = $_POST['address'];


        //2. save values in customer database
        $sql = "INSERT INTO tbl_customer(full_name,username,password,email,mobile,address) VALUES('$full_name','$username','$password','$email','$mobile','$address') ";

        //3. Execute the Query
        $res = pg_query($conn, $sql);

        if($res == true)
        {
            //if  Success
            echo "<script>alert('Congrats! Registration Successful.')</script>";

            // set session
            $_SESSION['customer'] = $username;

            //REdirect to HOme Page/Dashboard
            echo '<script>window.location.href="'.SITEURL.'"</script>';
        }
        else
        {
            //if error
            echo "<script>alert('Sorry! Registration Failed , Try again')</script>";

            session_destroy(); //destroy session if already set

        }


    }

?>

<style media="screen">
    .cust_ip{
      padding: 15px;
      width: 350px;
    }
</style>
