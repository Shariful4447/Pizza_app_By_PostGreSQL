<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 style="color: #249bcc;">View Custom Order</h1>
        <br><br>


        <?php

            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_myp_order WHERE id=$id";
                //Execute Query
                $res = pg_query($conn, $sql);
                //Count Rows
                $count = pg_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=pg_fetch_assoc($res);

                    $price = $row['price'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                    $ingridients= $row['ingridients'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }

        ?>

        <p>
            <h3>Price: <span style="color: green;"> $<?= $price ?></span> </h3>
        </p>

        <br>

        <p>
            <b>Customer Name : </b> <?= $customer_name ?>
        </p>

        <br>

        <p>
            <b>Customer Mobile : </b> <?= $customer_contact ?>
        </p>

        <br>

        <p>
            <b>Customer Email : </b> <?= $customer_email ?>
        </p>

        <br>

        <p>
            <b>Customer Address : </b> <?= $customer_address ?>
        </p>

        <br><br><br>

          <h3 style="text-transform: uppercase;">Selected Ingridients :</h3>
          <br>

        <div class="box">
              <p><?= $ingridients ?></p>
        </div>

    </div>
</div>


<style media="screen">
  .box{

    width: auto;
    padding: 15px;

    border: 3px solid #ccc;
  }
</style>

<?php include('partials/footer.php'); ?>
