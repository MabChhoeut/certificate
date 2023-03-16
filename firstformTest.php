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
                                    <h3>Diploma Form</h3>
                                    <p class="pb-3">Please input your data here and click insert to insert data.</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3"></div>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="diplomaID"
                                            placeholder="Diploma ID"><br>
                                        <select class="form-control" id="yearexam" name="academicyearid"
                                            placeholder="Academic year">
                                            <option>AcademicYear ID</option>
                                            <option value="1">2015-2016</option>
                                            <option value="2">2016-2017</option>
                                            <option value="3">2017-2018</option>
                                            <option value="4">2018-2019</option>
                                            <option value="5">2019-2020</option>
                                            <option value="6">2020-2021</option>
                                        </select><br>
                                        <input type="text" class="form-control" name="stuTotal"
                                            placeholder="Student Total"><br>
                                        <input type="text" class="form-control" name="stuFemale"
                                            placeholder="Student Total Female">
                                        <br>
                                        <input type="text" class="form-control" name="certiRang"
                                            placeholder="Certificate Rang"><br>

                                        <div class="row">
                                            <div class="col-lg-12 pb-4" style="text-align: right">
                                                <div class="row">
                                                    <div class="col-lg-12" style="text-align: right">
                                                        <button type="submit" name="Insert" value="Insert"
                                                            class="btn btn-outline-info">Insert</button>
                                                        <button type="submit" name="Update" value="Update"
                                                            class="btn btn-outline-success">Update</button>
                                                        <button type="submit" name="Delete" value="Delete"
                                                            class="btn btn-outline-danger">Delete</button>
                                                        <button type="submit" name="Search" value="Delete"
                                                            class="btn btn-outline-primary">Search</button>
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
                            $diplomaID = $_POST['diplomaID'];
                            $sql = "SELECT BTBacXIIID,AcademicYearEN,StudentTotal,StudentTotalFemale,CertificateRang from tblbtbachxii
                            INNER JOIN tblacademicyear ON tblbtbachxii.AcademicYearID=tblacademicyear.AcademicYearID='1'
                            where  BTBacXIIID=$diplomaID";
                            $query = mysqli_query($conn, $sql);
                           
                            echo '
                                <table class=" table table text-center table-responsive-md table-hover ">
                                <thead style="background-color: #1596e0;color:whitesmoke;">
                                <tr>
                                <th>Diploma ID</th>
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
                        <td style="vertical-align:middle;" >' . $row['CertificateRang'] . '<td/>
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
                        $sql = "SELECT BTBacXIIID,AcademicYearEN,StudentTotal,StudentTotalFemale,CertificateRang from tblbtbachxii
                        INNER JOIN tblacademicyear ON tblbtbachxii.AcademicYearID=tblacademicyear.AcademicYearID='1'";
                        $query = mysqli_query($conn, $sql);
                        echo '
                            <table class="table text-center table-responsive-md table-hover ">
                            <thead style="background-color: #1596e0;color:whitesmoke;">
                                <tr>
                                <th>Diploma ID</th>
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
                        <td style="vertical-align:middle;" >' . $row['CertificateRang'] . '<td/>
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

<?php
include_once 'db.php';
if (isset($_POST['Insert'])) {
    $diplomaID = $_POST['diplomaID'];
    $academicyearid = $_POST['academicyearid'];
    $stuTotal = $_POST['stuTotal'];
    $stuFemale = $_POST['stuFemale'];
    $certiRang = $_POST['certiRang'];
    $sql = "INSERT INTO tblbtbachxii (BTBacXIIID,AcademicYearID,StudentTotal,StudentTotalFemale,CertificateRang) VALUES ('$diplomaID','$academicyearid','$stuTotal','$stuFemale','$certiRang')";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!-- Update -->
<?php
include_once 'db.php';
if (isset($_POST['Update'])) {
    $diplomaID = $_POST['diplomaID'];
    $academicyearid = $_POST['academicyearid'];
    $stuTotal = $_POST['stuTotal'];
    $stuFemale = $_POST['stuFemale'];
    $certiRang = $_POST['certiRang'];
    $sql = "UPDATE tblbtbachxii set 
    BTBacXIIID='$diplomaID',
    AcademicYearID=' $academicyearid',
    StudentTotal='$stuTotal',
    StudentTotalFemale='$stuFemale',
    CertificateRang='$certiRang' 
    where BTBacXIIID=$diplomaID";
    if (mysqli_query($conn, $sql)) {

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
    $diplomaID = $_POST['diplomaID'];
    $sql = "DELETE from tblbtbachxii where BTBacXIIID=$diplomaID ";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Delete Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>