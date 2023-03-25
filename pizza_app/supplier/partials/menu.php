<?php

    include('../config/constants.php');
    include('login-check.php');

?>


<html>
    <head>
        <title>Supplier Dashboard</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="background: #333;">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-ingridients.php">My Ingridients</a></li>
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
