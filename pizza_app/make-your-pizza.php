
<?php include('partials-front/menu.php'); ?>


<?php
    if ( !isset($_SESSION['customer']) ) {
      echo '<script>window.location.href="'.SITEURL.'login.php"</script>';
    }
?>


<!-- include cdns -->
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="multiselect_assets/src/example-styles.css">
<link rel="stylesheet" type="text/css" href="multiselect_assets/demo-styles.css">
<!-- include cdns -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="multiselect_assets/src/jquery.multi-select.js"></script>

<?php

    $spice_sql = "SELECT * FROM tbl_ingridients WHERE category='Spices' AND status='Enable' ";
    //fetch all spices from database
    $spices_res = pg_query($conn, $spice_sql);

    $stuffing_sql = "SELECT * FROM tbl_ingridients WHERE category='Stuffing' AND status='Enable' ";
    //fetch all Stuffing from database
    $stuffing_res = pg_query($conn, $stuffing_sql);

    $vegetables_sql = "SELECT * FROM tbl_ingridients WHERE category='Vegetables' AND status='Enable' ";
    //fetch all Vegetables from database
    $vegetables_res = pg_query($conn, $vegetables_sql);


    //  get customer info

    $username = $_SESSION['customer'];
    $sql = "SELECT * FROM tbl_customer WHERE username = '$username' ";
    $res = pg_query($conn, $sql);
    $user_info = pg_fetch_assoc($res);

?>

<form class="form" action="place-myp-order.php" method="POST">

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h1 style="margin-top: -70px;" class="myp-title text-center text-white">Make Your Pizza</h1>

            <ul class="text-white" style="margin-top: 30px; position: relative;">

                <li class="form-item">
                    <div class="card select-forms text-white">
                        <h3>Select Spices</h3>

                            <div class="form-group">
                                <select class="multiselect" id="multiselect-spices" name="selected-spices[]" multiple  style="width:100%; margin-top: 15px;">

                                      <?php

                                        $spices_count = pg_num_rows($spices_res);

                                        if($spices_count > 0)
                                        {
                                            //WE HAve data in database
                                            while($rows=pg_fetch_assoc($spices_res))
                                            {

                                                $name = $rows['name'];

                                                //Display the Values in our Table
                                                ?>
                                                    <option><?= $name ?></option>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            echo '<option disabled>0 Records</option>';
                                        }
                                      ?>

                                </select>
                            </div>
                    </div>
                </li>

                <li class="form-item">
                    <div class="card select-forms text-white">
                        <h3>Select Stuffing</h3>

                            <div class="form-group">
                                <select class="multiselect"  id="multiselect-stuffing" name="selected-stuffing[]" multiple  style="width:100%; margin-top: 15px;">

                                      <?php

                                        $stuffing_count = pg_num_rows($stuffing_res);

                                        if($stuffing_count > 0)
                                        {
                                            //WE HAve data in database
                                            while($rows=pg_fetch_assoc($stuffing_res))
                                            {

                                                $name = $rows['name'];

                                                //Display the Values in our Table
                                                ?>
                                                    <option><?= $name ?></option>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            echo '<option disabled>0 Records</option>';
                                        }
                                      ?>

                                </select>
                            </div>
                    </div>
                </li>

                <li class="form-item">
                    <div class="card select-forms text-white">
                        <h3>Select Vegetables</h3>

                            <div class="form-group">
                                <select class="multiselect"  id="multiselect-vegetables" name="selected-vegetables[]" multiple  style="width:100%; margin-top: 15px;">

                                      <?php

                                        $vegetables_count = pg_num_rows($vegetables_res);

                                        if($vegetables_count > 0)
                                        {
                                            //WE HAve data in database
                                            while($rows=pg_fetch_assoc($vegetables_res))
                                            {

                                                $name = $rows['name'];

                                                //Display the Values in our Table
                                                ?>
                                                    <option><?= $name ?></option>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            echo '<option disabled>0 Records</option>';
                                        }
                                      ?>

                                </select>
                            </div>

                    </div>
                </li>

            </ul>

        </div>
    </section>

    <center>

        <div class="selection-information">

            <h3 class="uppercase">Selected Ingridient's</h3>

            <br>

            <div class="info-box">
                <span class="info-title">SPICES : </span>
                <span id="spices_list"></span>
            </div>

            <br>
            <br>

            <div class="info-box">
                <span class="info-title">STUFFING : </span>
                <span id="stuffing_list"></span>
            </div>

            <br>
            <br>

            <div class="info-box">
                <span class="info-title">VEGETABLES : </span>
                <span id="vegetables_list"></span>
            </div>

            <br>

        </div>



        <h3 style="margin-top: 30px;">Price : <span style="color: #4CAF50;">$100</span> </h3>


        <!-- hidden -->

        <input hidden  type="text" name="price" required value="100">

        <input hidden  type="text" name="full-name" placeholder="E.g.  John Doe"  required value="<?= $user_info['full_name'] ?>">

        <input hidden  type="tel" name="contact" placeholder="E.g. 9843xxxxxx"  value="<?= $user_info['mobile'] ?>" required >

        <input hidden  type="email" name="email" placeholder="someone@gmail.com" value="<?= $user_info['email'] ?>" required >

        <textarea  hidden name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required><?= $user_info['address'] ?></textarea>

        <!-- hidden -->

        <button class="submit-btn" onclick="return confirm('Confirm Place Order ?')" type="submit" name="button">Place Order</button>

    </center>

</form>


<script type="text/javascript">

    $(function(){
        $('#multiselect-vegetables').multiSelect();
    });

    $(function(){
        $('#multiselect-stuffing').multiSelect();
    });

    $(function(){
        $('#multiselect-spices').multiSelect();
    });

</script>



<script>

    $( ".selection-information" ).hide();
    $( ".submit-btn" ).hide();

    $( "#multiselect-spices" ).change(function() {
          var spices_val = $( "#multiselect-spices" ).val();
          $("#spices_list").text(spices_val);

          show_hide();
    });

    $( "#multiselect-vegetables" ).change(function() {
          var vegetables_val = $( "#multiselect-vegetables" ).val();
          $("#vegetables_list").text(vegetables_val);

          show_hide();
    });

    $( "#multiselect-stuffing" ).change(function() {
          var stuffing_val = $( "#multiselect-stuffing" ).val();
          $("#stuffing_list").text(stuffing_val);

          show_hide();
    });

    function show_hide(){

        var spices_val = $( "#multiselect-spices" ).val();
        var vegetables_val = $( "#multiselect-vegetables" ).val();
        var stuffing_val = $( "#multiselect-stuffing" ).val();

        if (spices_val || vegetables_val || stuffing_val) {

           $( ".selection-information" ).show();
           $( ".submit-btn" ).show();
        }else if(!spices_val && !vegetables_val && !stuffing_val){

           $( ".selection-information" ).hide();
           $( ".submit-btn" ).hide();
        }
    }

</script>

<?php include('partials-front/footer.php'); ?>




<style type="text/css">

    .uppercase{
        text-transform: uppercase;
    }

    .info-title{
        color: #444;
        font-size: 18px;
        font-weight: 600;
    }

    .info-box{
        float: left;
    }

    h3{
        color: #333;
    }

    .selection-information{
        margin-top: 30px;
        border: 3px solid #ccc;
        padding: 15px;
        width: 65%;
    }

    .submit-btn{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 50px;
    }

    .form-item{
        display: inline-block;
        width: 33%;
    }

    .myp-title {
        font-size: 80px;
        color: #fff;
        -webkit-text-stroke: 3px red;
        text-shadow: 5px 5px #333;
    }

    .food-search {
        background-image: url(images/make-your-pizza.jpg) !important;
    }

    .select-forms{
        background-color: #fff;
        padding: 10px;
        color: #333;
    }

</style>
