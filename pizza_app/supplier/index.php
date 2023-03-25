
<?php include('partials/menu.php'); ?>

<?php

    $username = $_SESSION['supplier'];
    $supplier_type = $_SESSION['category'];

    // get supplier details
    $sql = "SELECT * FROM tbl_supplier WHERE username='$username' ";
    $res = pg_query($conn, $sql);
    $info = pg_fetch_assoc($res);

?>

      <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h2>Welcome ,
                    <span style="color: #08b52b;"><?= $info['full_name'] ?></span>
                </h2>

                <br><br>

                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                ?>

                <br><br>
                <br><br>

                <h3> Category : <span style="color: #555;"><?= $info['category'] ?></span> </h3>

                <br><br>

                <center>
                    <div class="col-4 text-center info-card">

                        <?php
                            //Sql Query
                            $sql = "SELECT * FROM tbl_ingridients WHERE category='$supplier_type' ";
                            //Execute Query
                            $res = pg_query($conn, $sql);
                            //Count Rows
                            $count = pg_num_rows($res);
                        ?>

                        <h1><?php echo $count; ?></h1>
                        <br/>

                        Categories <?= $_SESSION['category'] ?>
                    </div>
                </center>

                <div class="clearfix"></div>

            </div>
        </div>
      <!-- Main Content Setion Ends -->


<style>
    .info-card{
        box-shadow: 3px 3px 3px 3px #ccc;
    }

</style>
