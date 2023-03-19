<?php
include_once 'db.php';
if(isset($_POST['Insert']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRangID = $_POST['CertificateRangID'];
   
    $sql = "INSERT INTO tblbtbachxii(BTBacXIIID, AcademicYearID , StudentTotal,StudentTotalFemale,CertificateRang) 
    VALUES ('$BTBacXIIID', '$AcademicYearID' , '$StudentTotal','$StudentTotalFemale', '$CertificateRangID')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}
if (isset($_POST['Search'])) 
{
    $BTBacXIIID = mysqli_real_escape_string($conn, $_POST['BTBacXIIID']);
    $sql = "SELECT 
    b.BTBacXIIID,
    y.AcademicYearEN,
    b.StudentTotal,
    b.StudentTotalFemale,
    r.CertificateRangEN 
    FROM tblbtbachxii b
    left JOIN tblacademicyear y ON b.AcademicYearID = y.AcademicYearID
    left JOIN tblcertificaterang r ON r.CertificateRangID = b.CertificateRang
    WHERE b.BTBacXIIID = '$BTBacXIIID'";                
    $query = mysqli_query($conn, $sql);

    while($data = mysqli_fetch_array($query))
    {
        header("location:firstform.php?BTBacXIIID=".$data['BTBacXIIID']."&AcademicYearID=".$data['AcademicYearEN'].
        "&StudentTotal=".$data['StudentTotal']."&StudentTotalFemale=".$data['StudentTotalFemale']."&CertificateRangID=".
        $data['CertificateRangEN']);
    } 
}

if(isset($_POST['Update'])) {    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $AcademicYearID = $_POST['AcademicYearID'];
    $StudentTotal = $_POST['StudentTotal'];
    $StudentTotalFemale = $_POST['StudentTotalFemale'];
    $CertificateRangID = $_POST['CertificateRangID'];

    $sql = "UPDATE tblbtbachxii SET 
                AcademicYearID ='$AcademicYearID', 
                StudentTotal = '$StudentTotal',
                StudentTotalFemale = '$StudentTotalFemale',
                CertificateRang = '$CertificateRangID' 
            WHERE BTBacXIIID = '$BTBacXIIID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successfully!")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
/*
if (isset($_POST['Search1'])) {
    $BTBacXIIID = $_POST['BTBacXIIID'];
    $sql = "SELECT 
    b.BTBacXIIID,
    y.AcademicYearEN,
    b.StudentTotal,
    b.StudentTotalFemale,
    r.CertificateRangEN 
FROM tblbtbachxii b
left JOIN tblacademicyear y ON b.AcademicYearID = y.AcademicYearID
left JOIN tblcertificaterang r ON r.CertificateRangID = b.CertificateRang
WHERE b.BTBacXIIID = '$BTBacXIIID' LIMIT 1";
    $query = mysqli_query($conn, $sql);
   
    echo '
        <table class=" table table text-center table-responsive-md table-hover ">
        <thead style="background-color: #1596e0;color:whitesmoke;">
        <tr>
        <th>BacXII ID</th>
        <th></th>
        <th>AcademicYear ID</th>
        <th></th>
        <th>Student Total</th>
        <th></th>
        <th>Total Female</th>
        <th></th>
        <th>Certificate Rang</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
    ';
    if ($query->num_rows > 0) {
        while ($row = mysqli_fetch_array($query)) {
         
            echo '
            
<tr>

<td style="vertical-align:middle;" >' . $row['BTBacXIIID'] . '<td/>                        
<td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                         
<td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>
<td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
<td style="vertical-align:middle;" >' . $row['CertificateRangEN'] . '<td/>
</tr>
';

        }
    } else {
        echo '<p style="text-align: center;">Data not found !!</p>';
    }
}
*/
if(isset($_POST['Delete']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
   
    $sql = "delete from tblbtbachxii Where BTBacXIIID = '$BTBacXIIID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been deleted successully!")</script>';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
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
                    <h1 class="text-center">High School Batch</h1>
                    <p class="text-center">Please input your data here and click insert to store data.</p>
                        <form action="firstform.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">BacXII ID:</label>
                                    <input type="text" name="BTBacXIIID" value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIID'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div> 
                                <div class='col-lg-6'>
                                    <label for="formGroupExampleInput">Academic year:</label>
                                    <select name="AcademicYearID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['AcademicYearID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'academicYearConnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['AcademicYearID']; ?>">
                                        <?php echo $option['AcademicYearEN']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Total Student:</label>
                                    <input type="text" name="StudentTotal" value="<?php if(!empty($_GET)) echo $_GET['StudentTotal'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div>
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">Total Female Student:</label>
                                    <input type="text" name="StudentTotalFemale" value="<?php if(!empty($_GET)) echo $_GET['StudentTotalFemale'] ?>"
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
                            </div>
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
                        <?php
                        include_once 'db.php';
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
                        on r.CertificateRangID = b.CertificateRang";
                        $query = mysqli_query($conn, $sql);
                        echo '
                            <table class="table text-center table-responsive-md table-hover ">
                            <thead style="background-color: #1596e0;color:whitesmoke;">
                                <tr>
                                <th>BacXII ID</th>
                                <th></th>
                                <th>AcademicYear ID</th>
                                <th></th>
                                <th>Student Total</th>
                                <th></th>
                                <th>Total Female</th>
                                <th></th>
                                <th>Certificate Range</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        ';
                        if ($query->num_rows > 0) {
                            while ($row = mysqli_fetch_array($query)) {

                                echo '
                        <tr>
                            
                        <td style="vertical-align:middle;" >' . $row['BTBacXIIID'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['CertificateRangEN'] . '<td/>
                        </tr>
                        ';

                            }
                        } else {
                            echo '<p style="text-align: center;">Data not found !!</p>';
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>