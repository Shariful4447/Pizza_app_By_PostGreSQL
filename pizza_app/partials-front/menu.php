
<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza App</title>

    <!-- Link CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar " style="background-color: #eee;">
        <div class="container">

            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo.png" alt="Home" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">
                          <button class="top-nav-buttons" type="button">
                              Home
                          </button>
                        </a>
                    </li>


                    <?php

                        if ( isset($_SESSION['customer']) ) {

                          ?>

                              <li>
                                  <a href="<?php echo SITEURL; ?>categories.php">
                                    <button class="top-nav-buttons" type="button">
                                        Categories
                                    </button>
                                  </a>
                              </li>

                              <li>
                                  <a href="<?php echo SITEURL; ?>foods.php">
                                      <button class="top-nav-buttons" type="button">
                                          Products
                                      </button>
                                  </a>
                              </li>

                              <li>
                                  <a href="<?php echo SITEURL; ?>make-your-pizza.php">
                                      <button class="top-nav-buttons" type="button">
                                          Make Your Pizza
                                      </button>
                                  </a>
                              </li>

                              <li>
                                  <a href="<?php echo SITEURL; ?>my-orders.php">
                                      <button class="top-nav-buttons" type="button">
                                          My Orders
                                      </button>
                                  </a>
                              </li>

                              <li>
                                  <a  href="<?php echo SITEURL; ?>logout.php">
                                      <button style="color: red !important; " class="top-nav-buttons" type="button">
                                          <b>Logout</b>
                                      </button>
                                  </a>
                              </li>

                          <?php

                        } else {

                          ?>

                              <li>
                                  <a href="<?php echo SITEURL; ?>login.php">
                                      <button class="top-nav-buttons" type="button" style="">
                                          Customer
                                      </button>
                                  </a>
                              </li>

                                                                                       

                              <li>
                                  <a href="<?php echo SITEURL; ?>admin">
                                      <button class="top-nav-buttons" type="button">
                                          Admin
                                      </button>
                                  </a>
                              </li>

                          <?php


                        }


                    ?>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>


<style media="screen">

    .top-nav-buttons{
        cursor: pointer;
        border: 1px solid;
        padding: 5px;
        border-left: unset;
        border-right: unset;
    }

    .top-nav-buttons:hover{
        cursor: pointer;
        border-left: unset;
        border-right: unset;
        border-top: 3px solid;
        border-bottom: 3px solid;
        background-color: #eee;
        font-size: 15px;
        color: #111;
    }

</style>
