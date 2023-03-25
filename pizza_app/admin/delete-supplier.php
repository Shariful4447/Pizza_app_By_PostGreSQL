<?php

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of supplier to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete supplier
    $sql = "DELETE FROM tbl_supplier WHERE id=$id";

    //Execute the Query
    $res = pg_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and supplier Deleted
        //echo "supplier Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Supplier Deleted Successfully.</div>";
        //Redirect to Manage supplier Page
        header('location:'.SITEURL.'admin/manage-supplier.php');
    }
    else
    {
        //Failed to Delete supplier
        //echo "Failed to Delete supplier";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete supplier. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-supplier.php');
    }

    //3. Redirect to Manage supplier page with message (success/error)

?>
