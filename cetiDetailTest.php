<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('header.php') ?>
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
                        <form action="certiDetail.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Certificate Rank Detail ID:</label>
                                    <input type="text" name="rankcertiID" value="<?php if(!empty($_GET)) echo $_GET['rankcertiID'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div> 
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Certificate Number:</label>
                                    <input type="text" name="certiNum" value="<?php if(!empty($_GET)) echo $_GET['certiNum'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>
                            <div class="row">
                                <div class ="col-lg-6">
                                    <label for="photo">Photo:</label>
                                    <input type="file" id="photo" name="photo"><br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class = "col-lg-6">
                                    <label for="BTurl">BELTEI Certificate URL:</label>
                                    <input type="file" id="BTurl" name="BTurl"><br>
                                </div>
                            </div>
                            <br>
                            <div class ="row"'>
                                <div class="col-lg-6">
                                    <label for="Miniurl">Ministry Certificate URL:</label>
                                    <input type="file" id="Miniurl" name="Miniurl"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 pb-4" style="text-align: right">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: right">
                                            <button type="submit" name="Insert" value="Insert"
                                                class="btn btn-primary">Insert</button>
                                         <!--   <button type="submit" name="Search" value="Search"
                                                class="btn btn-primary">Search</button> -->
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
    $rankcertiID = $_POST['rankcertiID'];
    $certiNum = $_POST['certiNum'];
    $photo = $_POST['photo'];
    $BTurl = $_POST['BTurl'];
    $Miniurl = $_POST['Miniurl'];
    $sql = "INSERT INTO tblcertificaterangdetail (CertificateRangDetailID,CertificateNumber,Photo,BTBacXIIURL,BacXIIURL)
     VALUES ('$rankcertiID','$certiNum','$photo','$BTurl','$Miniurl')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Insert Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
include_once 'db.php';
if (isset($_POST['Delete'])) {
    $certiNum = $_POST['certiNum'];
    $sql = "DELETE from tblcertificaterangdetail where CertificateNumber='$certiNum',CertificateRangDetailID='$rankcertiID'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Delete Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
$target_dir = "image/";
$target_file = $target_dir . uniqid() . '.' . pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a valid image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check === false) {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
if(!in_array($imageFileType, $allowed_types)) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars(basename($target_file)). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>