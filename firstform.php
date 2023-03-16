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
/*
if(isset($_POST['Search']))
{    
    $BTBacXIIID = $_POST['BTBacXIIID'];
    
    $sql = "SELECT 
        b.BTBacXIIID,
        y.AcademicYearEN,
        b.StudentTotal,
        b.StudentTotalFemale,
        r.CertificateRangEN 
    FROM tblbtbachxii b
    LEFT JOIN tblacademicyear y ON b.AcademicYearID = y.AcademicYearID
    LEFT JOIN tblcertificaterang r ON r.CertificateRangID = b.CertificateRang
    WHERE b.BTBacXIIID = '$BTBacXIIID' LIMIT 1";
    $query = mysqli_query($conn, $sql);

    $data = mysqli_fetch_array($query);
    if ($data) {
        header("location:firstform.php?BTBacXIIID=".$data['BTBacXIIID']."&AcademicYearID=".$data['AcademicYearID'].
        "&StudentTotal=".$data['StudentTotal']."&StudentTotalFemale=".$data['StudentTotalFemale']."&CertificateRangID=".
        $data['CertificateRang']);
    } else {
        // Redirect to an error page or display an error message
    }
}
*/
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
    <div class="row flexbox">
        
        <div class="col-lg-10 right-panel">
           
            <div class="row pt-5 ">
                <div class="col-lg-12">
                    <div class="container">
                        <form action="firstform.php" method="post">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h3>High School Batch</h3>
                                    <p class="pb-3">Please input your data here and click insert to store data.</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3"></div>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="BTBacXIIID"
                                            placeholder="BacXII ID"><br>
                                        <select class="form-control" id="yearexam" name="AcademicYearID"
                                            placeholder="Academic year">
                                            <option>AcademicYear ID</option>         
                                            <option>
                                                <?php 
                                                include_once 'academicYearConnector.php';
                                                foreach ($options as $option) {
                                                ?>
                                                <option value="<?php echo $option['AcademicYearID']; ?>">
                                                <?php echo $option['AcademicYearEN']; ?></option>
                                                <?php 
                                                        }
                                                ?>
                                            </option> 
                                        </select><br>
                                        <input type="text" class="form-control" name="StudentTotal"
                                            placeholder="Total Student"><br>
                                        <input type="text" class="form-control" name="StudentTotalFemale"
                                            placeholder="Total Female Student">
                                        <br>
                                        <select class="form-control" name="CertificateRangID"
                                            placeholder="Certificate Range">
                                            <option>Certificate Range</option>         
                                            <option>
                                                <?php 
                                                include_once 'CertificateRangeConnector.php';
                                                foreach ($options as $option) {
                                                ?>
                                                <option value="<?php echo $option['CertificateRangID']; ?>">
                                                <?php echo $option['CertificateRangEN']; ?></option>
                                                <?php 
                                                        }
                                                ?>
                                            </option> 
                                        </select><br>
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
                                    </div>

                                    <div class="col-lg-3"></div>

                                </div>
                            </div>
                            </from>
                    </div><br>
                    <div>
                        <!-- Search -->
                        <?php
                        include_once 'db.php';
                        if (isset($_POST['Search'])) {
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
                        ?>
                        </tbody>
                        </table>
                    </div>
                    <div>
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
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>