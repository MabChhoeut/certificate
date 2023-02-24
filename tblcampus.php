<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CampusID = $_POST['CampusID'];
    $CampusKH = $_POST['CampusKH'];
    $CampusEN = $_POST['CampusEN'];
   
    $sql = "INSERT INTO tblcampus (CampusID, CampusKH , CampusEN) 
    VALUES ('$CampusID', '$CampusKH','$CampusEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $CampusID = $_POST['CampusID'];
    
    $sql = "select CampusID, CampusKH , CampusEN from tblcampus Where CampusID=$CampusID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcampus.php?CampusID=".$data['CampusID']."&CampusKH=".$data['CampusKH'].
         "&CampusEN=".$data['CampusEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $CampusID = $_POST['CampusID'];
    $CampusKH = $_POST['CampusKH'];
    $CampusEN = $_POST['CampusEN'];

    $sql = "Update tblcampus set CampusEN = '$CampusEN'
     ,CampusKH='$CampusKH' Where CampusID = '$CampusID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CampusID = $_POST['CampusID'];
   
    $sql = "delete from tblcampus Where CampusID = '$CampusID'";

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
        <h1 class="text-center">Campus List Form</h1>
        <form action="tblcampus.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus ID</label>
                        <input type="text" name="CampusID" value="<?php if(!empty($_GET)) echo $_GET['CampusID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus Khmer</label>
                        <input type="text" name="CampusKH" value="<?php if(!empty($_GET)) echo $_GET['CampusKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus English</label>
                        <input type="text" name="CampusEN" value="<?php if(!empty($_GET)) echo $_GET['CampusEN'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
                <br>
                <div class = "col-lg-6">
                    <input type="submit" class="btn btn-primary" name="insert1" value="Insert">
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
                </div>
            </div>
        </form>
        <br>
        <?php
 
            $sql = "select CampusID, CampusKH,CampusEN from tblcampus";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>Campus ID</th>";
            echo "<th>Campus Khmer</th>";
            echo "<th>Campus English</th>";
            echo "</tr>";
            
            while($data = mysqli_fetch_array($query))
            { 
            echo "<tr>";
            echo "<td>".$data['CampusID']."</td>";
            echo "<td>".$data['CampusKH']."</td>";
            echo "<td>".$data['CampusEN']."</td>";
            echo "</tr>";
            }
            
            echo "</table>";
            
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