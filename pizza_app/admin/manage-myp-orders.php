<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Custom Pizza Orders</h1>

        <a style="float: right;" href="manage-order.php">
              <button style="background-color: lightgreen; padding: 10px; border: unset;" type="button"><b>Regular Orders</b></button>
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

                <table class="table">
                    <tr>
                        <th>S.N.</th>
                        <th style="width: 70px;">Price</th>
                        <th style="width: 200px;">Order Date</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 100px;"> Name</th>
                        <th style="width: 100px;">Contact</th>
                        <th style="width: 190px;">Email</th>
                        <th style="width: 100px;">Address</th>
                        <th>View</th>
                        <th>Update</th>
                    </tr>

                    <?php
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_myp_order ORDER BY id DESC"; // DIsplay the Latest Order at First
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
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                            ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td>$<?php echo $price; ?></td>
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

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/view-myp-order.php?id=<?php echo $id; ?>" >
                                                <button style="background: skyblue; padding: 10px; border: unset; " type="button">
                                                    <b>View</b>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-myp-order.php?id=<?php echo $id; ?>" >
                                                <button style="background: orange; padding: 10px; border: unset; " type="button">
                                                    <b>Update</b>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>


                </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>



<style media="screen">

  table, tr{
    border: 1px solid;
    padding: 25px;
  }

</style>
