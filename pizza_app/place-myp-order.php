<?php

    include('config/constants.php');

    error_reporting(0);

    // fetch values from previous form
    $multiselect_spices       = $_POST['selected-spices'];
    $multiselect_stuffing     = $_POST['selected-stuffing'];
    $multiselect_vegetables   = $_POST['selected-vegetables'];


    if ($multiselect_spices) {
        foreach ($multiselect_spices as $spice) {
            $selected_spices .= $spice.',';
        }
    }else{
      $selected_spices ='';
    }

    if ($multiselect_stuffing) {
        foreach ($multiselect_stuffing as $stuffing) {
            $selected_stuffing .= $stuffing.',';
        }
    }else{
      $selected_stuffing ='';
    }

    if ($multiselect_vegetables) {
        foreach ($multiselect_vegetables as $vegetable) {
            $selected_vegetables .= $vegetable.',';
        }
    }else{
      $selected_vegetables ='';
    }


  $ingridients = '';

  if ($selected_spices) {
      $ingridients .= 'SPICES - [ '.$selected_spices.' ]<br><br>';
  }

  if ($selected_stuffing) {
      $ingridients .= 'STUFFING - [ '.$selected_stuffing.' ]<br><br>' ;
  }

  if ($selected_vegetables ) {
      $ingridients .= 'VEGETABLES - [ '.$selected_vegetables.' ]<br><br>' ;
  }


  // Get all the details from the form

  $price  = $_POST['price'];

  $order_date = date("Y-m-d h:i:sa"); //Order DAte

  $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

  $customer_name      = $_POST['full-name'];
  $customer_contact   = $_POST['contact'];
  $customer_email     = $_POST['email'];
  $customer_address   = $_POST['address'];


  //Save the Order in Databaase
  //Create SQL to save the data

   $sql2 = "INSERT INTO tbl_myp_order(price,order_date,status,customer_name,customer_contact,customer_email,customer_address,ingridients) VALUES($price,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address', '$ingridients') ";


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
