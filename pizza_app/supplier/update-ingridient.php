<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Ingridient</h1>

        <br><br>

        <?php
            //1. Get the ID of Selected supplier
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_ingridients WHERE id='$id'";

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
                    $row = pg_fetch_assoc($res);

                    $name     = $row['name'];
                    $category = $row['category'];
                    $status   = $row['status'];
                }
                else
                {
                    //Redirect to Manage supplier PAge
                    header('location:'.SITEURL.'supplier/manage-ingridients.php');
                }
            }

        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Ingridient Name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>

                        <select name="category">
                            <option selected><?= $category ?></option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>Status: </td>
                    <td>

                        <select name="status">
                            <option <?php if($status=='Enable'){echo 'selected';} ?> >Enable</option>
                            <option <?php if($status=='Disable'){echo 'selected';} ?> >Disable</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Ingridient" class="btn-secondary">
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
      
        //Get all the values from form to update
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $status = $_POST['status'];

        //Create a SQL Query to Update
        $sql = "UPDATE tbl_ingridients SET name='$name', category='$category', status='$status' WHERE id='$id' ";

        //Execute the Query
        $res = pg_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Updated
            $_SESSION['update'] = "<div class='success'>Ingridient Updated Successfully.</div>";
            //Redirect to Manage supplier Page
            header('location:'.SITEURL.'supplier/manage-ingridients.php');
        }
        else
        {
            //Failed to Update supplier
            $_SESSION['update'] = "<div class='error'>Failed to Delete Ingridient.</div>";
            //Redirect to Manage supplier Page
            header('location:'.SITEURL.'supplier/manage-ingridients.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>
