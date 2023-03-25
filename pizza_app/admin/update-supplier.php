<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update supplier</h1>

        <br><br>

        <?php
            //1. Get the ID of Selected supplier
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_supplier WHERE id=$id";

            //Execute the Query
            $res=pg_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = pg_num_rows($res);
                //Check whether we have supplier data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "supplier Available";
                    $row=pg_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $category = $row['category'];
                }
                else
                {
                    //Redirect to Manage supplier PAge
                    header('location:'.SITEURL.'admin/manage-supplier.php');
                }
            }

        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Category : </td>
                    <td>
                        <select>
                          <option><?php echo $category; ?></option>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update supplier" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create a SQL Query to Update supplier
        $sql = "UPDATE tbl_supplier SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        //Execute the Query
        $res = pg_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and supplier Updated
            $_SESSION['update'] = "<div class='success'>supplier Updated Successfully.</div>";
            //Redirect to Manage supplier Page
            header('location:'.SITEURL.'admin/manage-supplier.php');
        }
        else
        {
            //Failed to Update supplier
            $_SESSION['update'] = "<div class='error'>Failed to Delete supplier.</div>";
            //Redirect to Manage supplier Page
            header('location:'.SITEURL.'admin/manage-supplier.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>
