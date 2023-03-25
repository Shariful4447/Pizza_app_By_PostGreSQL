<?php

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete
    $sql = "DELETE FROM tbl_ingridients WHERE id='$id' ";

    //Execute the Query
    $res = pg_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Deleted
        //echo "ingridient Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'> Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-ingridients.php');
    }
    else
    {
        //Failed to Delete
        //echo "Failed to Delete";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete . Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-ingridients.php');
    }

    //3. Redirect to Manage page with message (success/error)

?>
