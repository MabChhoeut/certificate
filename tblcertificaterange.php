<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CertificateRangID = $_POST['CertificateRangID'];
    $CertificateRangKH = $_POST['CertificateRangKH'];
    $CertificateRangEN = $_POST['CertificateRangEN'];
   
    $sql = "INSERT INTO tblcertificaterang
    VALUES ('$CertificateRangID',
             '$CertificateRangKH',
             '$CertificateRangEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $CertificateRangID = $_POST['CertificateRangID'];
    
    $sql = "select * from tblcertificaterang
     Where CertificateRangID=$CertificateRangID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcertificaterange.php?CertificateRangID=".$data['CertificateRangID'].
         "&CertificateRangKH=".$data['CertificateRangKH'].
         "&CertificateRangEN=".$data['CertificateRangEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $CertificateRangID = $_POST['CertificateRangID'];
    $CertificateRangKH = $_POST['CertificateRangKH'];
    $CertificateRangEN = $_POST['CertificateRangEN'];

    $sql = "Update tblcertificaterang set 
    CertificateRangKH = '$CertificateRangKH'
     ,CertificateRangEN='$CertificateRangEN' 
     Where CertificateRangID = '$CertificateRangID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CertificateRangID = $_POST['CertificateRangID'];
   
    $sql = "delete from tblcertificaterang
    Where CertificateRangID = '$CertificateRangID'";

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
                        <input type="text" name="CertificateRangID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange Khmer</label>
                        <input type="text" name="CertificateRangKH" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange English</label>
                        <input type="text" name="CertificateRangEN" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangEN'] ?>"
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
 
            $sql = "select * from tblcertificaterang";

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
            echo "<td>".$data['CertificateRangID']."</td>";
            echo "<td>".$data['CertificateRangKH']."</td>";
            echo "<td>".$data['CertificateRangEN']."</td>";
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