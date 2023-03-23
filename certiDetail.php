
<?php
include_once 'db.php';
if (isset($_POST['Search'])) {
    $CertificateRangDetailID = mysqli_real_escape_string($conn, $_POST['CertificateRangDetailID']);
    $sql = "SELECT d.CertificateRangDetailID, d.CertificateNumber, d.FullNameKH, d.FullNameEN, s.SexEN, d.DOB, c.CampusEN, d.Photo, d.BTBacXIIURL, d.BacXIIURL, cr.CertificateRangEN,
             d.BTBacXIIID
            FROM tblcertificaterangdetail AS d
            LEFT JOIN tblsex AS s ON s.SexID = d.SexID
            LEFT JOIN tblcampus AS c ON c.CampusID = d.CampusID
            LEFT JOIN tblcertificaterang AS cr ON cr.CertificateRangID = d.CertificateRangID
            LEFT JOIN tblbtbachxii AS b ON d.BTBacXIIID = b.BTBacXIIID
            WHERE d.CertificateRangDetailID = '$CertificateRangDetailID'";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }
    if ($data = mysqli_fetch_array($query)) {
        header("Location: certiDetail.php?CertificateRangDetailID=".$data['CertificateRangDetailID']."&CertificateNumber=".$data['CertificateNumber']."&CertificateRangID=".$data['CertificateRangEN']."&BTBacXIIID=".$data['BTBacXIIID']."&FullNameKH=".$data['FullNameKH']."&FullNameEN=".$data['FullNameEN']."&DOB=".$data['DOB']."&SexID=".$data['SexEN']."&CampusID=".$data['CampusEN']);
        exit;
    } else {
        echo "No result found.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('header.php') ?>
  <?php include_once('menu.php') ?>
  <?php include("headmain.php")?>
  <?php include("script.php")?>
   
</head>
<body>

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="container">
                    <h1 class="text-center">Certificate Detail Form</h1>
                    <p class="text-center">Please input your data here and click insert to store data.</p>
                        <form action="certiDetail.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Certificate Rank Detail ID:</label>
                                    <input type="text" name="CertificateRangDetailID" value="<?php if(!empty($_GET)) echo $_GET['CertificateRangDetailID'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div> 
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Certificate Number:</label>
                                    <input type="text" name="CertificateNumber" value="<?php if(!empty($_GET)) echo $_GET['CertificateNumber'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>
                            <br>
                            <div class = "row">
                                <div class ="col-lg-6">
                                    <label for="formGroupExampleInput">Certificate Range:</label>
                                    <select name="CertificateRangID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['CertificateRangID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'CertificateRangeConnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['CertificateRangID']; ?>">
                                        <?php echo $option['CertificateRangEN']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>
                                <div class='col-lg-6'>
                                    <label for="formGroupExampleInput">BacXII ID:</label>
                                    <select name="BTBacXIIID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['BTBacXIIID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'bacXIIconnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['BTBacXIIID']; ?>">
                                        <?php echo $option['BTBacXIIID']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Full Name KH:</label>
                                    <input type="text" name="FullNameKH" value="<?php if(!empty($_GET)) echo $_GET['FullNameKH'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Full Name EN:</label>
                                    <input type="text" name="FullNameEN" value="<?php if(!empty($_GET)) echo $_GET['FullNameEN'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            <br>
                            <div class = "row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Date of birth:</label>
                                  <!--  <input type="date" class="form-control" name="DOB" id="DOB"><br>    -->

                                    
                                    <input type="date" name="DOB" value="<?php if(!empty($_GET)) echo $_GET['DOB'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                                <div class ="col-lg-6">
                                    <label for="formGroupExampleInput">Sex:</label>
                                    <select name="SexID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['SexID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'sexConnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['SexID']; ?>">
                                        <?php echo $option['SexEN']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class ="col-lg-6">
                                    <label for="formGroupExampleInput">Campus:</label>
                                    <select name="CampusID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['CampusID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'campusConnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['CampusID']; ?>">
                                        <?php echo $option['CampusEN']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>

                            </div>
                           <br>
                            <label for="photo">Choose a student photo:</label>
                            <input type="file" name="photo" id="photo"><br>
                            <label for="BTurl">Choose a Beltei Certificate URL:</label>
                            <input type="file" name="BTurl" id="BTurl"><br>
                            <label for="Miniurl">Choose a Ministry Certificate URL:</label>
                            <input type="file" name="Miniurl" id="Miniurl"><br>
                          <!--  <input class="btn btn-primary" type="submit" name="Insert" value="Insert">-->
                            <!--<div class="row">
                                <div class ="col-lg-6">
                                    <label for="photo">Choose a photo:</label>
                                    <input type="file" name="photo" id="photo"><br>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class = "col-lg-6">
                                    <label for="BTurl">Choose a BT url:</label>
                                    <input type="file" name="BTurl" id="BTurl"><br>
                                 </div>
                            </div>
                            <br>
                            <div class ="row">
                                <div class="col-lg-6">
                                    <label for="Miniurl">Choose a Mini url:</label>
                                    <input type="file" name="Miniurl" id="Miniurl"><br>
                                    <input type="submit" name="Insert" value="Insert">     
                                </div>
                            </div>
                                            -->
                            <br>
                            <div class="row">
                                <div class="col-lg-12 pb-4" style="text-align: right">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: right">
                                            <button type="submit" name="Insert" value="Insert"
                                                class="btn btn-primary">Insert</button>
                                            <button type="submit" name="Search" value="Search"
                                                class="btn btn-primary">Search</button>
                                            <button type="submit" name="Update" value="Update"
                                                class="btn btn-primary">Update</button>
                                            <button type="submit" name="Delete" value="Delete"
                                                class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <br>
                        <!-- Search -->
                        <?php include_once('AllData.php') ?>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
<!-- insert -->
<?php
include_once 'db.php';
if (isset($_POST['Insert'])) {
    $CertificateRangDetailID = $_POST['CertificateRangDetailID'];
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $CertificateRangID = $_POST['CertificateRangID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];

    // Check if photo is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        // Generate unique name for photo
        $photo_unique = uniqid() . '_' . $photo;
        move_uploaded_file($photo_temp, "image/" . $photo_unique);
    } else {
        $photo_unique = null;
    }

    // Check if BTurl is uploaded
    if (!empty($_FILES['BTurl']['name'])) {
        $BTurl = $_FILES['BTurl']['name'];
        $BTurl_temp = $_FILES['BTurl']['tmp_name'];
        // Generate unique name for BTurl
        $BTurl_unique = uniqid() . '_' . $BTurl;
        move_uploaded_file($BTurl_temp, "beleiimage/" . $BTurl_unique);
    } else {
        $BTurl_unique = null;
    }

    // Check if Miniurl is uploaded
    if (!empty($_FILES['Miniurl']['name'])) {
        $Miniurl = $_FILES['Miniurl']['name'];
        $Miniurl_temp = $_FILES['Miniurl']['tmp_name'];
        // Generate unique name for Miniurl
        $Miniurl_unique = uniqid() . '_' . $Miniurl;
        move_uploaded_file($Miniurl_temp, "minimage/" . $Miniurl_unique);
    } else {
        $Miniurl_unique = null;
    }

    $sql = "INSERT INTO tblcertificaterangdetail (CertificateRangDetailID,BTBacXIIID,CertificateRangID,CertificateNumber,FullNameKH,FullNameEN,SexID,DOB,CampusID,Photo,BTBacXIIURL,BacXIIURL)
     VALUES ('$CertificateRangDetailID','$BTBacXIIID','$CertificateRangID','$CertificateNumber','$FullNameKH','$FullNameEN','$SexID','$DOB','$CampusID','$photo_unique','$BTurl_unique','$Miniurl_unique')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Insert Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
<!-- update -->
<?php
include_once 'db.php';
if (isset($_POST['Update'])) {
    $CertificateRangDetailID = $_POST['CertificateRangDetailID'];
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $CertificateRangID = $_POST['CertificateRangID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];
   
    // Check if photo is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        // Generate unique name for photo
        $photo_unique = uniqid() . '_' . $photo;
        move_uploaded_file($photo_temp, "image/" . $photo_unique);
    } else {
        $photo_unique = null;
    }

    // Check if BTurl is uploaded
    if (!empty($_FILES['BTurl']['name'])) {
        $BTurl = $_FILES['BTurl']['name'];
        $BTurl_temp = $_FILES['BTurl']['tmp_name'];
        // Generate unique name for BTurl
        $BTurl_unique = uniqid() . '_' . $BTurl;
        move_uploaded_file($BTurl_temp, "beleiimage/" . $BTurl_unique);
    } else {
        $BTurl_unique = null;
    }

    // Check if Miniurl is uploaded
    if (!empty($_FILES['Miniurl']['name'])) {
        $Miniurl = $_FILES['Miniurl']['name'];
        $Miniurl_temp = $_FILES['Miniurl']['tmp_name'];
        // Generate unique name for Miniurl
        $Miniurl_unique = uniqid() . '_' . $Miniurl;
        move_uploaded_file($Miniurl_temp, "minimage/" . $Miniurl_unique);
    } else {
        $Miniurl_unique = null;
    }
    
    $sql = "UPDATE tblcertificaterangdetail set 
    CertificateRangDetailID='$CertificateRangDetailID',
    BTBacXIIID='$BTBacXIIID',
    CertificateRangID='$CertificateRangID',
    CertificateNumber='$CertificateNumber',
    FullNameKH='$FullNameKH',
    FullNameEN='$FullNameEN',
    SexID='$SexID',
    DOB='$DOB',
    CampusID='$CampusID',
    Photo='$photo_unique',
    BTBacXIIURL='$BTurl_unique',
    BacXIIURL='$Miniurl_unique' 
    where CertificateRangDetailID=$CertificateRangDetailID";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Update Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!-- Delete -->
<?php
include_once 'db.php';
if (isset($_POST['Delete'])) {
    $CertificateRangDetailID = $_POST['CertificateRangDetailID'];
    $sql = "DELETE from tblcertificaterangdetail where CertificateRangDetailID='$CertificateRangDetailID'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Delete Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>


