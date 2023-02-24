<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateRangeKH = $_POST['CertificateRangeKH'];
    $CertificateRangeEN = $_POST['CertificateRangeEN'];
   
    $sql = "INSERT INTO tblcertificaterange 
    VALUES ('$CertificateRangeID',
             '$CertificateRangeKH',
             '$CertificateRangeEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $CertificateRangeID = $_POST['CertificateRangeID'];
    
    $sql = "select * from tblcertificaterange
     Where CertificateRangeID=$CertificateRangeID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcertificaterange.php?CertificateRangeID=".$data['CertificateRangeID'].
         "&CertificateRangeKH=".$data['CertificateRangeKH'].
         "&CertificateRangeEN=".$data['CertificateRangeEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateRangeKH = $_POST['CertificateRangeKH'];
    $CertificateRangeEN = $_POST['CertificateRangeEN'];

    $sql = "Update tblcertificaterange set 
    CertificateRangeKH = '$CertificateRangeKH'
     ,CertificateRangeEN='$CertificateRangeEN' 
     Where CertificateRangeID = '$CertificateRangeID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CertificateRangeID = $_POST['CertificateRangeID'];
   
    $sql = "delete from tblcertificaterange 
    Where CertificateRangeID = '$CertificateRangeID'";

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
        <h1 class="text-center">Certificate Range List Form</h1>
        <form action="tblcertificaterange.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange_ID</label>
                        <input type="text" name="CertificateRangeID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange Khmer</label>
                        <input type="text" name="CertificateRangeKH" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange English</label>
                        <input type="text" name="CertificateRangeEN" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeEN'] ?>"
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
 
            $sql = "select * from tblcertificaterange";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>CertificateRange_ID</th>";
            echo "<th>CertificateRange Khmer</th>";
            echo "<th>CertificateRange English</th>";
            echo "</tr>";
            
            while($data = mysqli_fetch_array($query))
            { 
            echo "<tr>";
            echo "<td>".$data['CertificateRangeID']."</td>";
            echo "<td>".$data['CertificateRangeKH']."</td>";
            echo "<td>".$data['CertificateRangeEN']."</td>";
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