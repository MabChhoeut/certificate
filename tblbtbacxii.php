<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $BTbacXIIid = $_POST['BTbacXIIid'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRange = $_POST['CertificateRange'];
   
    $sql = "INSERT INTO tblbtbacxii(BTbacXIIid, AcademicYearID , StudentTotal,StudentTotalFemale,CertificateRange) 
    VALUES ('$BTbacXIIid', '$AcademicYearID' , '$StudentTotal','$StudentTotalFemale', '$CertificateRange')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $BTbacXIIid = $_POST['BTbacXIIid'];
    
    $sql = "select BTbacXIIid, AcademicYearID , StudentTotal,StudentTotalFemale,CertificateRange
     from tblbtbacxii Where BTbacXIIid=$BTbacXIIid";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblbtbacxii.php?BTbacXIIid=".$data['BTbacXIIid']."&AcademicYearID=".$data['AcademicYearID'].
         "&StudentTotal=".$data['StudentTotal']."&StudentTotalFemale=".$data['StudentTotalFemale']."&CertificateRange=".
        $data['CertificateRange']);      
      }
}

if(isset($_POST['update1']))
{    
    $BTbacXIIid = $_POST['BTbacXIIid'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRange = $_POST['CertificateRange'];

    $sql = "Update tblbtbacxii set AcademicYearID = '$AcademicYearID'
     , StudentTotal='$StudentTotal' ,StudentTotalFemale='$StudentTotalFemale',CertificateRange = '$CertificateRange' 
    Where BTbacXIIid = '$BTbacXIIid'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $BTbacXIIid = $_POST['BTbacXIIid'];
   
    $sql = "delete from tblbtbacxii Where BTbacXIIid = '$BTbacXIIid'";

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
        <h1 class="text-center">General Certificates Form</h1>
        <form action="tblbtbacxii.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Beltei BacXII ID</label>
                        <input type="text" name="BTbacXIIid" value="<?php if(!empty($_GET)) echo $_GET['BTbacXIIid'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">AcademicYear ID</label>
                        <input type="text" name="AcademicYearID" value="<?php if(!empty($_GET)) echo $_GET['AcademicYearID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Student Total</label>
                        <input type="text" name="StudentTotal" value="<?php if(!empty($_GET)) echo $_GET['StudentTotal'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">StudentFemale Total</label>
                        <input type="text" name="StudentTotalFemale" value="<?php if(!empty($_GET)) echo $_GET['StudentTotalFemale'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Certificate Range</label>
                        <input type="text" name="CertificateRange" value="<?php if(!empty($_GET)) echo $_GET['CertificateRange'] ?>"
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
 
            $sql = "select BTbacXIIid,AcademicYearID,StudentTotal, StudentTotalFemale,CertificateRange  from tblbtbacxii";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>Beltei BacXII ID</th>";
            echo "<th>AcademicYear ID</th>";
            echo "<th>StudentTotal</th>";
            echo "<th>StudentFemale Total</th>";
            echo "<th>Certificate Range</th>";
            echo "</tr>";
            
            while($data = mysqli_fetch_array($query))
            { 
            echo "<tr>";
            echo "<td>".$data['BTbacXIIid']."</td>";
            echo "<td>".$data['AcademicYearID']."</td>";
            echo "<td>".$data['StudentTotal']."</td>";
            echo "<td>".$data['StudentTotalFemale']."</td>";
            echo "<td>".$data['CertificateRange']."</td>";
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