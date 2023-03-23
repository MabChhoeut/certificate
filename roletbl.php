
<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $RoleID = $_POST['RoleID'];
    $Role = $_POST['Role'];
   
    $sql = "INSERT INTO usersrole VALUES ('$RoleID','$Role')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}


if(isset($_POST['search1']))
{    
    $RoleID = $_POST['RoleID'];
    
    $sql = "select * from usersrole Where RoleID=$RoleID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:roletbl.php?RoleID=".$data['RoleID']."&Role=".$data['Role']);      
      }
}

if(isset($_POST['update1']))
{    
    $RoleID = $_POST['RoleID'];
    $Role = $_POST['Role'];
   
    $sql = "Update usersrole set Role='$Role' Where RoleID='$RoleID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $RoleID = $_POST['RoleID'];
   
    $sql = "delete from usersrole Where RoleID='$RoleID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been deleted successully!")</script>';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">
<?php include("head.php")?>
<body>
  <?php include("headmain.php")?>
  <?php include("menu.php")?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
            <div class="container">
        <h1 class="text-center">Form Role</h1>
        <form action="roletbl.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">RoleID</label>
                        <input type="text" name="RoleID" value="<?php if(!empty($_GET)) echo $_GET['RoleID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Role</label>
                        <input type="text" name="Role" value="<?php if(!empty($_GET)) echo $_GET['Role'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            
            <center>
                    <input type="submit" class="btn btn-primary" name="insert1" value="Insert">
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
            </center>
        </form>
        <br>
        <?php
            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>RoleID</th>";
            echo "<th>Role</th>";
            echo "</tr>";
          $sql = "select * from usersrole";

          $query = mysqli_query($conn,$sql);

          while($data = mysqli_fetch_array($query))
            { 
              echo "<tr>";
              echo "<td>".$data['RoleID']."</td>";     
              echo "<td>".$data['Role']."</td>";
              echo "</tr>";
            }
            mysqli_close($conn);
        ?>
    </div>
            </div>
        </div>
    </section>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include("script.php")?>
</body>

</html>