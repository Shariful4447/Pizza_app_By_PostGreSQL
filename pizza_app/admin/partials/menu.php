<?php

    include('../config/constants.php');
    include('login-check.php');

?>


<html>
    <head>
        <title>Pizza Order - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="background: #333;">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-supplier.php">Suppliers</a></li>
                    <li><a href="manage-category.php">Product Category</a></li>
                    <li><a href="manage-food.php">Products</a></li>
                    <li><a href="manage-ingridients.php">Ingridients</a></li>
                    <li><a href="manage-order.php">Orders</a></li>
                    <li><a style="color: red; float: right;" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->


        <style type="text/css">

            .wrapper ul li a{
                color: orange;
            }

        </style>
