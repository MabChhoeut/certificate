<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BELTEI International School</title>
    <link rel='stylesheet' type='text/css' media='screen' href='Script/bootstrap.min.css'>
    <script src='Script/jquery-3.2.1.slim.min.js'></script>
    <script src='Script/popper.min.js'></script>
    <script src='Script//bootstrap.min.js'></script>
    <script src="Script/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="image/Logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">




</head>


<body>

    <!-- header -->

    <header>
        <!-- banner -->
        <nav class="navbar navbar-light" style="background-color: #1596e0; width:100%;">
            <a class="navbar-brand mx-auto" href="#">
                <img src="image/banner.png" alt="" class="w-100" height="55"></a>
    </header>
    <br>
    <br>
    <br>

    <!-- Search form -->

    <div class="container">
        <br>
        <form action="Search.php" method="post">
            <div class="row">
            <div class="col-lg-12 text-center">
                    <h1 class="heading" style="color:#1596e0 ;">BELTEI HIGH SCHOOL DIPLOMA<br>2015-2016</h1>
                </div>
            </div>
            
        </form>



        <!-- table show -->
        <section class="diploma_info" id="diploma_info">
            <div class="container">
                <div>
                    <table class="table table-responsive-md table-hover text-center">
                        <thead style="background-color: #1596e0;color:whitesmoke;">
                            <tr>
                                <th scope="col">Campus</th>
                                <th scope="col"></th>
                                <th scope="col">No.Certificate</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- campus1 -->
                            <tr>
                                <?php
                                include_once 'db.php';


                                $sql = "select tblcampus.CampusEN,tblcertificaterang.CertificateRangEN
                                FROM tblcampus
                                INNER JOIN tblcertificaterang ON tblcertificaterang.CertificateRangID where tblcampus.CampusID='1' and tblcertificaterang.CertificateRangID='26' ";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                 <tr>   
                                                                        
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" ><a href="2015to2016campus1.php">' . $row['CertificateRangEN'] . '</a><td/>
                                    
                               </tr>
                                 ';
                                }

                                ?>
                            <!-- campus2 -->
                                <?php
                                include_once 'db.php';


                                $sql = "select tblcampus.CampusEN,tblcertificaterang.CertificateRangEN
                                FROM tblcampus
                                INNER JOIN tblcertificaterang ON tblcertificaterang.CertificateRangID where tblcampus.CampusID='2' and tblcertificaterang.CertificateRangID='27' ";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                 <tr>   
                                                                        
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" ><a href="2015to2016campus2.php">' . $row['CertificateRangEN'] . '</a><td/>
                                    
                               </tr>
                                 ';
                                }

                                ?>
                                <!-- campus3 -->
                                <?php
                                include_once 'db.php';


                                $sql = "select tblcampus.CampusEN,tblcertificaterang.CertificateRangEN
                                FROM tblcampus
                                INNER JOIN tblcertificaterang ON tblcertificaterang.CertificateRangID where tblcampus.CampusID='3' and tblcertificaterang.CertificateRangID='28' ";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                 <tr>   
                                                                        
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" ><a href="2015to2016campus3.php">' . $row['CertificateRangEN'] . '</a><td/>
                                    
                               </tr>
                                 ';
                                }

                                ?>
                            <!-- campus4 -->

                                <?php
                                include_once 'db.php';


                                $sql = "select tblcampus.CampusEN,tblcertificaterang.CertificateRangEN
                                FROM tblcampus
                                INNER JOIN tblcertificaterang ON tblcertificaterang.CertificateRangID where tblcampus.CampusID='4' and tblcertificaterang.CertificateRangID='29' ";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                 <tr>   
                                                                        
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" ><a href="2015to2016campus4.php">' . $row['CertificateRangEN'] . '</a><td/>
                                    
                               </tr>
                                 ';
                                }

                                ?>
                                <!-- campus5 -->
                                <?php
                                include_once 'db.php';


                                $sql = "select tblcampus.CampusEN,tblcertificaterang.CertificateRangEN
                                FROM tblcampus
                                INNER JOIN tblcertificaterang ON tblcertificaterang.CertificateRangID where tblcampus.CampusID='5' and tblcertificaterang.CertificateRangID='30' ";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                 <tr>   
                                                                        
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" ><a href="2015to2016campus5.php">' . $row['CertificateRangEN'] . '</a><td/>
                                    
                               </tr>
                                 ';
                                }

                                ?>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <br><br><br>
    </div>
    <?php include_once('footer.php')?>

</body>

</html>