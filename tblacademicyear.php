<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $AcademicYearID = $_POST['AcademicYearID'];
    $AcademicYearKH = $_POST['AcademicYearKH'];
    $AcademicYearEN = $_POST['AcademicYearEN'];
   
    $sql = "INSERT INTO tblacademicyear(AcademicYearID, AcademicYearKH, AcademicYearEN) VALUES ('$AcademicYearID','$AcademicYearKH', '$AcademicYearEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $AcademicYearID = $_POST['AcademicYearID'];
    
    $sql = "select AcademicYearID,AcademicYearKH,AcademicYearEN from tblacademicyear Where AcademicYearID=$AcademicYearID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblacademicyear.php?AcademicYearID=".$data['AcademicYearID']."&AcademicYearKH=".$data['AcademicYearKH']."&AcademicYearEN=".$data['AcademicYearEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $AcademicYearID = $_POST['AcademicYearID'];
    $AcademicYearKH = $_POST['AcademicYearKH'];
    $AcademicYearEN = $_POST['AcademicYearEN'];
   
    $sql = "Update tblacademicyear set AcademicYearKH='$AcademicYearKH', AcademicYearEN = '$AcademicYearEN' Where AcademicYearID='$AcademicYearID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $AcademicYearID = $_POST['AcademicYearID'];
   
    $sql = "delete from tblacademicyear Where AcademicYearID='$AcademicYearID'";

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
        <h1 class="text-center">AcademicYear Form</h1>
        <form action="tblacademicyear.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">AcademicYearID</label>
                        <input type="text" name="AcademicYearID" value="<?php if(!empty($_GET)) echo $_GET['AcademicYearID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">AcademicYear Khmer</label>
                        <input type="text" name="AcademicYearKH" value="<?php if(!empty($_GET)) echo $_GET['AcademicYearKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">AcademicYear English</label>
                        <input type="text" name="AcademicYearEN" value="<?php if(!empty($_GET)) echo $_GET['AcademicYearEN'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
            
                <div class = "col-lg-6">
                    <input type="submit" class="btn btn-primary" name="insert1" value="Insert">
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
                </div>
            </div>
        </form>

        <?php
            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>AcademicYearID</th>";
            echo "<th>AcademicYear Khmer</th>";
            echo "<th>AcademicYear English</th>";
            echo "</tr>";
 
          $sql = "select AcademicYearID,AcademicYearKH, AcademicYearEN from tblacademicyear";

          $query = mysqli_query($conn,$sql);

          while($data = mysqli_fetch_array($query))
            { 
              echo "<tr>";
              echo "<td>".$data['AcademicYearID']."</td>";     
              echo "<td>".$data['AcademicYearKH']."</td>";
              echo "<td>".$data['AcademicYearEN']."</td>"; 
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