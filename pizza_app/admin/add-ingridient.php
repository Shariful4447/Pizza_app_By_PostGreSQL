<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Ingridient</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-70">
                <tr>
                    <td>Ingridient Name : </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name">
                    </td>
                </tr>

                <tr>
                    <td>Category : </td>
                    <td>
                        <select name="category">
                            <option>Spices</option>
                            <option>Stuffing</option>
                            <option>Vegetables</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Status: </td>
                    <td>
                        <select name="status">
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input style="margin-top: 20px;" type="submit" name="submit" value="Add Ingridient" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked

        //1. Get the Data from form
        $name     = $_POST['name'];
        $category = $_POST['category'];
        $status   = $_POST['status'];
        $id       = uniqid('ingridient_');

        //2. SQL Query to Save the data into database
        echo $sql = "INSERT INTO tbl_ingridients(id,name,category,status) VALUES('$id','$name','$category','$status')";

        //3. Executing Query and Saving Data into Datbase
        $res = pg_query($conn, $sql);

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Ingridient Added Successfully.</div>";
            //Redirect Page to Manage Ingridient
            header("location:".SITEURL.'admin/manage-ingridients.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Ingridient.</div>";
            //Redirect Page to Add Ingridient
            header("location:".SITEURL.'admin/add-ingridient.php');
        }

    }

?>
