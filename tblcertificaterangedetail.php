<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];
    $Photo = $_POST['Photo'];
    $BTBacXIIURL = $_POST['BTBacXIIURL'];
    $BacXIIURL = $_POST['BacXIIURL'];
   
    $sql = "INSERT INTO tblcertificaterangedetail
    VALUES ('$CertificateRangeDetailID', '$BTBacXIIid','$CertificateRangeID', '$CertificateNumber',
            '$FullNameKH','$FullNameEN','$SexID','$DOB','$CampusID','$Photo',
            '$BTBacXIIURL','$BacXIIURL')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    
    $sql = "select * from tblcertificaterangedetail Where CertificateRangeDetailID=$CertificateRangeDetailID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcertificaterangedetail.php?CertificateRangeDetailID=".$data['CertificateRangeDetailID'].
         "&BTBacXIIid=".$data['BTBacXIIid'].
         "&CertificateRangeID=".$data['CertificateRangeID'].
         "&CertificateNumber=".$data['CertificateNumber'].
         "&FullNameKH=".$data['FullNameKH'].
         "&FullNameEN=".$data['FullNameEN'].
         "&SexID=".$data['SexID'].  
         "&DOB=".$data['DOB'].  
         "&CampusID=".$data['CampusID'].  
         "&Photo=".$data['Photo'].  
         "&BTBacXIIURL=".$data['BTBacXIIURL'].  
         "&BacXIIURL=".$data['BacXIIURL']);  
      }
}

if(isset($_POST['update1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];
    $Photo = $_POST['Photo'];
    $BTBacXIIURL = $_POST['BTBacXIIURL'];
    $BacXIIURL = $_POST['BacXIIURL'];

    $sql = "Update tblcertificaterangedetail set 
        BTBacXIIid = '$BTBacXIIid',
        CertificateRangeID = '$CertificateRangeID',
        CertificateNumber = '$CertificateNumber',
        FullNameKH = '$FullNameKH',
        FullNameEN = '$FullNameEN',
        SexID = '$SexID',
        DOB = '$DOB',
        CampusID = '$CampusID',
        Photo = '$Photo',
        BTBacXIIURL = '$BTBacXIIURL',
        BacXIIURL = '$BacXIIURL'
     Where CertificateRangeDetailID = '$CertificateRangeDetailID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
   
    $sql = "delete from tblcertificaterangedetail 
            Where CertificateRangeDetailID = '$CertificateRangeDetailID'";

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
        <h1 class="text-center"> Certificate Range Detail Form</h1>
        <form action="tblcertificaterangedetail.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Certificate_RangeDetail_ID</label>
                        <input type="text" name="CertificateRangeDetailID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeDetailID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">BacXII_ID</label>
                        <input type="text" name="BTBacXIIid" 
                            value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIid'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange_ID</label>
                        <input type="text" name="CertificateRangeID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Certificate_Number</label>
                        <input type="text" name="CertificateNumber" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateNumber'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Full Name Khmer</label>
                        <input type="text" name="FullNameKH" 
                            value="<?php if(!empty($_GET)) echo $_GET['FullNameKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Full Name English</label>
                        <input type="text" name="FullNameEN" 
                            value="<?php if(!empty($_GET)) echo $_GET['FullNameEN'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Sex_ID</label>
                        <input type="text" name="SexID" 
                            value="<?php if(!empty($_GET)) echo $_GET['SexID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Date of Birth</label>
                        <input type="text" name="DOB" 
                            value="<?php if(!empty($_GET)) echo $_GET['DOB'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus_ID</label>
                        <input type="text" name="CampusID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CampusID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Photo</label>
                        <input type="text" name="Photo" 
                            value="<?php if(!empty($_GET)) echo $_GET['Photo'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Beltei BacXII_URL</label>
                        <input type="text" name="BTBacXIIURL" 
                            value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIURL'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">BacXII_URL</label>
                        <input type="text" name="BacXIIURL" 
                            value="<?php if(!empty($_GET)) echo $_GET['BacXIIURL'] ?>"
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
 
            $sql = "select * from tblcertificaterangedetail";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
                echo "<tr>";
                echo "<th>Certificate_RangeDetail_ID</th>";
                echo "<th>BacXII_ID</th>";
                echo "<th>CertificateRange_ID</th>";
                echo "<th>Certificate_Number</th>";
                echo "<th>Full Name Khmer</th>";
                echo "<th>Full Name English</th>";
                echo "<th>Sex_ID</th>";
                echo "<th>Date of Birth</th>";
                echo "<th>Campus_ID</th>";
                echo "<th>Photo</th>";
                echo "<th>CBeltei BacXII_URL</th>";
                echo "<th>BacXII_URL</th>";
                echo "</tr>";
                
                while($data = mysqli_fetch_array($query))
                    { 
                    echo "<tr>";
                    echo "<td>".$data['CertificateRangeDetailID']."</td>";
                    echo "<td>".$data['BTBacXIIid']."</td>";
                    echo "<td>".$data['CertificateRangeID']."</td>";
                    echo "<td>".$data['CertificateNumber']."</td>";
                    echo "<td>".$data['FullNameKH']."</td>";
                    echo "<td>".$data['FullNameEN']."</td>";
                    echo "<td>".$data['SexID']."</td>"; 
                    echo "<td>".$data['DOB']."</td>"; 
                    echo "<td>".$data['CampusID']."</td>";  
                    echo "<td>".$data['Photo']."</td>";  
                    echo "<td>".$data['BTBacXIIURL']."</td>";  
                    echo "<td>".$data['BacXIIURL']."</td>";
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