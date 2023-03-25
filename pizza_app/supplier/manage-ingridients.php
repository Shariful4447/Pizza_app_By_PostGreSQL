<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>My Ingridients</h1>

                <br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    $category = $_SESSION['category'];
                ?>
                <br><br><br>

                <!-- Button to Add  -->
                <a href="add-ingridient.php" class="btn-primary">Add Ingridient</a>

                <br /><br /><br />

                <div class="box">
                  <h2 class="title"><?= $category ?></h2>

                  <table class="tbl-full">
                      <tr>
                          <th>S.N.</th>
                          <th>Ingridient Name</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>


                      <?php
                          //Query to Get all Admin
                          $sql = "SELECT * FROM tbl_ingridients WHERE category='$category' ";
                          //Execute the Query
                          $res = pg_query($conn, $sql);

                          //CHeck whether the Query is Executed of Not
                          if($res==TRUE)
                          {
                              // Count Rows to CHeck whether we have data in database or not
                              $count = pg_num_rows($res); // Function to get all the rows in database

                              $sn=1; //Create a Variable and Assign the value

                              //CHeck the num of rows
                              if($count>0)
                              {
                                  //WE HAve data in database
                                  while($rows=pg_fetch_assoc($res))
                                  {
                                      //Using While loop to get all the data from database.
                                      //And while loop will run as long as we have data in database

                                      //Get individual DAta
                                      $id=$rows['id'];
                                      $name=$rows['name'];
                                      $category=$rows['category'];
                                      $status=$rows['status'];

                                      //Display the Values in our Table
                                ?>

                                      <tr>
                                          <td><?php echo $sn++; ?>. </td>
                                          <td><?php echo $name; ?></td>
                                          <td><?php echo $category; ?></td>
                                          <td><?php echo $status; ?></td>
                                          <td>

                              <a href="<?php echo SITEURL; ?>supplier/update-ingridient.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>

                              <a href="<?php echo SITEURL; ?>supplier/delete-ingridient.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>

                                          </td>
                                      </tr>

                                      <?php

                                  }
                              }
                              else
                              {
                                  echo '<h3 style="color:red;">0 Records</h3><br>';
                              }
                          }

                      ?>

                  </table>
                </div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>


<style media="screen">
  .box{
      box-shadow: 3px 3px 3px 3px #ccc;
      padding : 10px;
      margin-top: 30px;
  }

  .title{
      color: orange;
      text-transform: uppercase;
  }

</style>
