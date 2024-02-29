<?php require_once 'db_con.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="images.jpeg" type="image/x-icon">

    <title>KIANDA VIRTUAL SCHOOL</title>
  </head>
  <body>
  <nav>
    <img src="images.jpeg" alt="">
   </nav>
            <h1 class="text-center">Welcome to KIANDA SCHOOL</h1><br>
            <p class="text-center">IN OPERE ET VERITATE</p>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable">
              <tr>
                <th colspan="2">
                  <p class="text-center">Student Information</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Class</p>
                </td>
                <td>
                   <select class="form-control" name="choose">
                     <option value="">
                       Select
                     </option>
                     <option value="1st">
                       Grade 1
                     </option>
                     <option value="2nd">
                       Grade 2
                     </option>
                     <option value="3rd">
                       Grade 3
                     </option>
                     <option value="4th">
                       Grade 4
                     </option>
                     <option value="5th">
                       Grade 5
                     </option>
                   </select>
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="roll">Student ID</label></p>
                </td>
                <td>
                  <input class="form-control" type="text" pattern="[0-9]{6}" id="roll" placeholder="Roll Num.." name="roll">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
            <a class="btn btn-primary" href="login.php"> Teacher Login</a>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['roll'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll']==$roll && $choose==$row['class']) {
                $stroll= $row['roll'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $city= $row['city'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
                <td>Name</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Roll</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td>Class</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Submit Date</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="admin/index.php?page=ass">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Post assignment</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Please Input Valid Roll & Email</p>';
              }
            }else{
              echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>
   <footer>
    <div class="contain">
    <p>&copy; 2024 KIANDA SCHOOL. All rights reserved.</p>
    </div>
  </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>