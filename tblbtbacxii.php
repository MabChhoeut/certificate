<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRang = $_POST['CertificateRang'];
   
    $sql = "INSERT INTO tblbtbacxii(BTBacXIIID, AcademicYearID , StudentTotal,StudentTotalFemale,CertificateRang) 
    VALUES ('$BTBacXIIID', '$AcademicYearID' , '$StudentTotal','$StudentTotalFemale', '$CertificateRang')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    
    $sql = "SELECT 
    b.BTBacXIIID,
    y.AcademicYearEN,
    b.StudentTotal,
    b.StudentTotalFemale,
    r.CertificateRangEN 
    from tblbtbachxii as b
    left JOIN tblacademicyear as y
    ON b.AcademicYearID=y.AcademicYearID
    left join tblcertificaterang as r
    on r.CertificateRangID = b.CertificateRang
    where b.BTBacXIIID = $BTBacXIIID";
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblbtbacxii.php?BTBacXIIID=".$data['BTBacXIIID']."&AcademicYearID=".$data['y.AcademicYearID'].
         "&StudentTotal=".$data['StudentTotal']."&StudentTotalFemale=".$data['StudentTotalFemale']."&CertificateRang=".
        $data['r.CertificateRangEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRang = $_POST['CertificateRang'];

    $sql = "Update tblbtbachxii set AcademicYearID = '$AcademicYearID'
     , StudentTotal='$StudentTotal' ,StudentTotalFemale='$StudentTotalFemale',CertificateRang = '$CertificateRang' 
    Where BTBacXIIID = '$BTBacXIIID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
   
    $sql = "delete from tblbtbachxii Where BTbacXIIID = '$BTbacXIIID'";

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
                        <input type="text" name="BTBacXIIID" value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIID'] ?>"
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
                        <input type="text" name="CertificateRang" value="<?php if(!empty($_GET)) echo $_GET['CertificateRang'] ?>"
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
 
 $sql = "SELECT *
 from tblbtbachxii";

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
            echo "<td>".$data['BTBacXIIID']."</td>";
            echo "<td>".$data['AcademicYearID']."</td>";
            echo "<td>".$data['StudentTotal']."</td>";
            echo "<td>".$data['StudentTotalFemale']."</td>";
            echo "<td>".$data['CertificateRang']."</td>";
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