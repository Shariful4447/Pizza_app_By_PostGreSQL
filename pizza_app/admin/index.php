
<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center info-card">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = pg_query($conn, $sql);
                        //Count Rows
                        $count = pg_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center info-card">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = pg_query($conn, $sql2);
                        //Count Rows
                        $count2 = pg_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center info-card">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $res3 = pg_query($conn, $sql3);
                        //Count Rows
                        $count3 = pg_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center info-card">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS total FROM tbl_order WHERE status='Delivered'";

                        //Execute the Query
                        $res4 = pg_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = pg_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['total'];

                    ?>

                    <h1> <span style="color:green;">$ <?php echo $total_revenue; ?></span> </h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->


<style>
    .info-card{
        box-shadow: 3px 3px 3px 3px #eee;
    }
</style>