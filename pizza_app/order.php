
<?php include('partials-front/menu.php'); ?>


<?php
    if ( !isset($_SESSION['customer']) ) {
      echo '<script>window.location.href="'.SITEURL.'login.php"</script>';
    }
?>

    <?php
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

            //Execute the Query
            $res = pg_query($conn, $sql);

            //Count the rows
            $count = pg_num_rows($res);

            //CHeck whether the data is available or not
            if($count > 0)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = pg_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }


        //  get customer info

        $username = $_SESSION['customer'];

        $sql = "SELECT * FROM tbl_customer WHERE username = '$username' ";
        $res = pg_query($conn, $sql);

        $user_info = pg_fetch_assoc($res);

    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Pizza</legend>

                    <div class="food-menu-img">
                        <?php

                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                            }

                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>

                    <input type="text" name="full-name" placeholder="E.g.  John Doe" class="input-responsive" required value="<?= $user_info['full_name'] ?>" >

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" value="<?= $user_info['mobile'] ?>" required >

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="someone@gmail.com" class="input-responsive" value="<?= $user_info['email'] ?>" required >

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required><?= $user_info['address'] ?></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food   = $_POST['food'];
                    $price  = $_POST['price'];
                    $qty    = $_POST['qty'];

                    $total  = $price * $qty; // total = price x qty

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name      = $_POST['full-name'];
                    $customer_contact   = $_POST['contact'];
                    $customer_email     = $_POST['email'];
                    $customer_address   = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data

                     $sql2 = "INSERT INTO tbl_order(food,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address) VALUES('$food',$price,$qty,$total,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address') ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = pg_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2 == true)
                    {
                        $_SESSION['order'] = "<div style='color: green;' class='success text-center lead'> <h3>Order Placed Successfully.</h3></div>";

                        ?>
                            <script>
                                window.location.href="<?=SITEURL?>";
                            </script>
                        <?php

                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center lead'> <h2>Failed to Order.</h2> </div> ";

                        ?>
                            <script>
                                window.location.href="<?=SITEURL?>";
                            </script>
                        <?php

                    }

                }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
