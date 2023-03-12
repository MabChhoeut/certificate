<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?>

<head>

    <title>BELTEI International School</title>

</head>

<body>
    <div class="container">
        <h1 class="heading text-center">
            <span style="color: #1596e0 ">BELTEI high school Diploma
        </h1>
        <table class="table table-responsive-md table-hover text-center">
            <thead style="background-color: #1596e0;color:whitesmoke;">
                <tr>
                    <th scope="col">Diploma-year</th>
                    <th scope="col"></th>
                    <th scope="col">Total-Stu</th>
                    <th scope="col"></th>
                    <th scope="col">Female</th>
                    <th scope="col"></th>
                    <th scope="col">No.certificate</th>
                    <th scope="col"></th>
                    <th scope="col">View Info</th>
                    <th scope="col">Document</th>
                </tr>
            </thead>
            <tbody>
                <!-- 2020-2021 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON 
                    tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='6'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    echo "<table class = ' table table-bordered w-100 p-3 '>";
                    echo '
                    <tr >
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2020to2021.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2020to2021.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>
                <!-- 2019-2020 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='5'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {


                    echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2019to2020.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2019to2020.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>
                <!-- 2018-2019 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='4'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2018to2019.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2018to2019.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>

                <!-- 2017-2018 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='3'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2017to2018.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2017to2018.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>
                <!-- 2016-2017 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='2'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2016to2017.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2016to2017.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>

                <!-- 2015-2016 -->
                <?php
                include_once 'db.php';
                $data;

                $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='1'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2015to2016.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2015to2016.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

                }
                ?>

            </tbody>
        </table>
    </div>
    </div>
    </section>

</body>

</html>