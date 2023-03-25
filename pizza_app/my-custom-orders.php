<?php include('partials-front/menu.php'); ?>
<link rel="stylesheet" href="admin/css/admin.css">

<?php
    if ( !isset($_SESSION['customer']) ) {
      echo '<script>window.location.href="'.SITEURL.'login.php"</script>';
    }

    // fetch user info
    $username = $_SESSION['customer'];

    $sql = "SELECT * FROM tbl_customer WHERE username = '$username' ";
    $res = pg_query($conn, $sql);
    $user_info = pg_fetch_assoc($res);

    $user_email = $user_info['email'];

?>

<div class="main-content" style="width: 95%; margin-left: 3%;">
    <div class="wrapper">
        <h1>My Custom Pizza Orders</h1>

        <a style="float: right;" href="my-orders.php">
              <button style="background-color: skyblue; padding: 10px; border: unset;" type="button"><b>My Regular Orders</b></button>
        </a>

                <br /><br /><br />

                <?php
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>


<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 5px solid #ccc;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
</style>



<table id="customers">
  <tr>
      <th>S.N.</th>
      <th >Price</th>
      <th >Ingridients</th>
      <th >Order Date</th>
      <th >Status</th>
      <th >Address</th>
      <!-- <th>Actions</th> -->
  </tr>

  <tbody>
    <?php
        //Get all the orders from database
        $sql = "SELECT * FROM tbl_myp_order WHERE customer_email='$user_email' ORDER BY id DESC"; // DIsplay the Latest Order at First
        //Execute Query
        $res = pg_query($conn, $sql);
        //Count the Rows
        $count = pg_num_rows($res);

        $sn = 1; //Create a Serial Number and set its initail value as 1

        if($count>0)
        {
            //Order Available
            while($row=pg_fetch_assoc($res))
            {
                //Get all the order details
                $id = $row['id'];
                $price = $row['price'];
                $ingridients = $row['ingridients'];
                $order_date = $row['order_date'];
                $status = $row['status'];

                $customer_address = $row['customer_address'];

            ?>

                    <tr class="break">
                        <td><?php echo $sn++; ?>. </td>
                        <td>$<?php echo $price; ?></td>
                        <td><?php echo $ingridients; ?></td>
                        <td><?php echo $order_date; ?></td>

                        <td>
                            <?php
                                // Ordered, On Delivery, Delivered, Cancelled

                                if($status=="Ordered")
                                {
                                    echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color: green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                            ?>
                        </td>


                        <td><?php echo $customer_address; ?></td>
                        <!-- <td style="width: 100px;">
                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" >
                                <button style="background: orange; padding: 10px; border: unset; " type="button">
                                    <b>Update</b>
                                </button>
                            </a>
                        </td> -->
                    </tr>



                <?php

            }
        }
        else
        {
            //Order not Available
            echo "<tr><td colspan='12' class='error'><h3>0 Orders</h3>  </td></tr>";
        }
    ?>

  </tbody>

</table>

    </div>

</div>

<br><br>
