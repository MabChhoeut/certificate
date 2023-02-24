<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $sexid = $_POST['SexID'];
    $SexKH = $_POST['SexKH'];
    $SexEN = $_POST['SexEN'];
   
    $sql = "INSERT INTO tblsex(SexID, SexKH, SexEN) VALUES ('$sexid','$SexKH', '$SexEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $SexID = $_POST['SexID'];
    
    $sql = "select SexID,SexKH,SexEN from tblsex Where SexID=$SexID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:FormSex.php?SexID=".$data['SexID']."&SexKH=".$data['SexKH']."&SexEN=".$data['SexEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $SexID = $_POST['SexID'];
    $SexKH = $_POST['SexKH'];
    $SexEN = $_POST['SexEN'];
   
    $sql = "Update tblsex set sexKH='$SexKH', SexEN = '$SexEN' Where SexID='$SexID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $SexID = $_POST['SexID'];
   
    $sql = "delete from tblsex Where SexID='$SexID'";

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
        <h1 class="text-center">Sex Form</h1>
        <form action="FormSex.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Sex ID</label>
                        <input type="text" name="SexID" value="<?php if(!empty($_GET)) echo $_GET['SexID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Sex Khmer</label>
                        <input type="text" name="SexKH" value="<?php if(!empty($_GET)) echo $_GET['SexKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Sex English</label>
                        <input type="text" name="SexEN" value="<?php if(!empty($_GET)) echo $_GET['SexEN'] ?>"
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
        <br>
        <?php
            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>Sex ID</th>";
            echo "<th>Sex Khmer</th>";
            echo "<th>Sex English</th>";
            echo "</tr>";
          $sql = "select SexID,SexKH, SexEN from tblsex";

          $query = mysqli_query($conn,$sql);

          while($data = mysqli_fetch_array($query))
            { 
              echo "<tr>";
              echo "<td>".$data['SexID']."</td>";     
              echo "<td>".$data['SexKH']."</td>";
              echo "<td>".$data['SexEN']."</td>"; 
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