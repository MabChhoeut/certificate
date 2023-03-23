
<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<head>
  <?php include_once('header.php') ?>
  <?php include_once('menu.php') ?>
  <?php include("headmain.php")?>
  <?php include("script.php")?>
  <title>BELTEI International School</title>
  
</head>

<body >
<main id="main" class="main">
  <br><br>

  <section class="diploma_info" id="diploma_info">
    <div class="container">
      <h1 class="heading text-center">
        <span style="color: #1596e0 ">BELTEI High School Diploma
      </h1>
      </form><br>
      <div>
      <?php
include_once 'db.php';
$sql = "SELECT y.AcademicYearEN, 
b.StudentTotal, 
b.StudentTotalFemale, 
r.CertificateRangEN, 
st.ListStudentURL,
r.CertificateRangID
FROM tblbtbachxii as b 
inner JOIN tblacademicyear as y
ON y.AcademicYearID =b.AcademicYearID 
inner join tblcertificaterang as r
on b.CertificateRang = r.CertificateRangID
left JOIN tblbtliststudent as st
ON b.BTBacXIIID=st.BTBacXIIID";

$query = mysqli_query($conn, $sql);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="table-responsive-md">
        <table class="table text-center table-hover">
          <thead style="background-color: #1596e0;color:whitesmoke;">
            <tr>
              <th>AcademicYear ID</th>
              <th></th>
              <th>Student Total</th>
              <th></th>
              <th>Total Female</th>
              <th>Certificate Range</th>
              <th>View Info</th>
              <th>Document</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
          if ($query->num_rows > 0) {
              while ($row = mysqli_fetch_array($query)) {
                  echo '
                      <tr>
                          <td style="vertical-align:middle;">' . $row['AcademicYearEN'] . '</td>                         
                          <td style="vertical-align:middle;">&nbsp;</td>
                          <td style="vertical-align:middle;">' . $row['StudentTotal'] . '</td>
                          <td style="vertical-align:middle;">&nbsp;</td>
                          <td style="vertical-align:middle;">' . $row['StudentTotalFemale'] . '</td>
                          <td style="vertical-align:middle;">
                              <a href="datalinkrang.php?CertificateRangID=' . $row['CertificateRangID'] . '">' . $row['CertificateRangEN'] . '</a>
                          </td>
                          <td style="vertical-align:middle;">
                              <a href="datalinkrang.php?CertificateRangID=' . $row['CertificateRangID'] . '">Open</a>
                          </td>
                          <td>
                              <a href="studentlisturl/' . $row['ListStudentURL'] . '" target="_blank">Open</a>
                          </td>
                          <td style="vertical-align:middle;">&nbsp;</td>
                      </tr>
                  ';
              }
          } else {
              echo '<tr><td colspan="9" style="text-align: center;">Data not found !!</td></tr>';
          }
          ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


      </div>
    </div>
  </section>
</body>
</html>