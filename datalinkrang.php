
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
            <a class="navbar-brand mx-auto">
                <img src="image/banner.png" alt="" class="w-100" height="55"></a>
    </header>
    <br>
    <br>
    <br>

    <!-- Search form -->

    <div class="container">
        <br>
        <form action="Search.php" method="post">
            <div>
                <p>BELTEI HIGH SCHOOL DIPLOMA</p>
            </div>

            <head>
                <style>
                    body {
                        text-align: center;
                        background: #f0f0f5;
                    }


                    p {
                        font-family: Oswald;
                        font-size: 50px;
                        animation: Color 4s linear infinite;
                        -webkit-animation: Color 1.5s ease-in-out infinite;
                        text-shadow: 10px 10px #F0F0F0;
                    }

                    @keyframes Color {
                        0% {
                            color: #A0D468;
                        }

                        20% {
                            color: #4FC1E9;
                        }

                        40% {
                            color: #FFCE54;
                        }

                        60% {
                            color: #FC6E51;
                        }

                        80% {
                            color: #ED5565;
                        }

                        100% {
                            color: #AC92EC;
                        }
                    }

                    @-moz-keyframes Color {
                        0% {
                            color: #A0D468;
                        }

                        20% {
                            color: #4FC1E9;
                        }

                        40% {
                            color: #FFCE54;
                        }

                        60% {
                            color: #FC6E51;
                        }

                        80% {
                            color: #ED5565;
                        }

                        100% {
                            color: #AC92EC;
                        }
                    }

                    @-webkit-keyframes Color {
                        0% {
                            color: #A0D468;
                        }

                        20% {
                            color: #4FC1E9;
                        }

                        40% {
                            color: #FFCE54;
                        }

                        60% {
                            color: #FC6E51;
                        }

                        80% {
                            color: #ED5565;
                        }

                        100% {
                            color: #AC92EC;
                        }
                    }
                </style>
            </head>

        </form>




        <!-- table show -->
        <br><br>
        <section class="diploma_info" id="diploma_info">
            <div class="container">
                <div>
                    <table class="table table-bordered table-responsive-md table-hover text-center">
                       <!-- <thead style="background-color: #1596e0;color:whitesmoke;">
                            <tr>
                                <th scope="col">Campus</th>
                                <th scope="col"></th>
                                <th scope="col">No.Certificate</th>
                                <th scope="col"></th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <!-- campus1 -->
                            <tr>
                            <?php
                            include_once 'db.php';
                           /* echo "Current URL: " . $_SERVER['REQUEST_URI'] . "<br>";
                            echo "CertificateRangID parameter: " . $_GET['CertificateRangID'] . "<br>";*/

                            if(!isset($_GET['CertificateRangID'])) {
                                echo "<p style='text-align:center;'>CertificateRangID parameter is missing!</p>";
                                exit();
                            } else {
                                $CertificateRangID = $_GET['CertificateRangID'];
                               /* echo "CertificateRangID value is: " . $CertificateRangID;*/
                                $sql = "SELECT distinct(c.CampusEN),d.CampusID,d.CertificateRangID, r.CertificateRangEN
                                        FROM tblcertificaterangdetail AS d
                                        inner JOIN tblcampus AS c ON c.CampusID = d.CampusID
                                        inner JOIN tblcertificaterang AS r ON r.CertificateRangID = d.CertificateRangID
                                        WHERE d.CertificateRangID = $CertificateRangID";
                                $query = mysqli_query($conn, $sql);

                                if (!$query) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                }

                                echo '<table class="table text-center table-responsive-md table-hover ">
                                        <thead style="background-color: #1596e0;color:whitesmoke;">
                                            <tr>
                                                <th>Campus</th>
                                                <th>Certificate Range</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                while ($row = mysqli_fetch_array($query)) {
                                   /*(old one) echo '<tr>   
                                            <td style="vertical-align:middle;">' . $row['CampusEN'] . '</td> */
                                    /*old one: echo '<tr>
                                            <td style="vertical-align:middle;">
                                                <a href="datalinkdetail.php?CampusID=' . $row['CampusID'] . '">' . $row['CampusEN'] . '</a>
                                            </td>
                                                        
                                            <td style="vertical-align:middle;">' . $row['CertificateRangEN'] . '</td>
                                        </tr>';*/
                                    echo '<tr>
                                            <td style="vertical-align:middle;">
                                                <a href="datalinkdetail.php?CampusID=' . $row['CampusID'] . '&CertificateRangID=' . $row['CertificateRangID'] . '">' . $row['CampusEN'] . '</a>
                                            </td>
                                            <td style="vertical-align:middle;">
                                                <a href="datalinkdetailrang.php?CertificateRangID=' . $row['CertificateRangID'] . '">' . $row['CertificateRangEN'] . '</a>
                                            </td>
                                        </tr>';
                                }

                                echo '</tbody></table>';
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
   
</body>

</html>