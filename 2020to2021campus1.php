<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BELTEI International School</title>
    <link rel='stylesheet' type='text/css' media='screen' href='Script/bootstrap.min.css'>
    <script src='Script/jquery-3.2.1.slim.min.js'></script>
    <script src='Script/popper.min.js'></script>
    <script src='Script//bootstrap.min.js'></script>
    <script src="Script/script.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="image/Logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <!-- <h1>CHECK YOUR DIPLOMA INFORMATION </h1>  -->
        <!-- table show -->
        <!-- <h2>CHECK YOUR DIPLOMA INFORMATION</h2> -->

        <div>
            <p>CHECK YOUR DIPLOMA INFORMATION</p>
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

        <br><br>
        <table class="table-bordered w-100 h-100 text-center  table-hover ">
            <thead style="background-color: #1596e0;color:whitesmoke; height:90px;">
                <tr>
                    <th>No.Certi</th>
                    <th></th>
                    <th>Khmer Name</th>
                    <th></th>
                    <th>Latin Name</th>
                    <th></th>
                    <th>Sex</th>
                    <th></th>
                    <th>Date of Birth</th>
                    <th></th>
                    <th>Campus</th>
                    <th></th>
                    <th>Photo</th>
                    <th>BELTEI Certi</th>
                    <th>Ministry Certi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include_once 'db.php';
                $data;
                $sql = "SELECT CertificateNumber,FullNameKH,FullNameEN,SexEN,DOB,CampusEN,Photo,BTBacXIIURL,BacXIIURL
                FROM tblcertificaterangdetail 
                INNER JOIN tblsex ON tblcertificaterangdetail.SexID=tblsex.SexID
                INNER JOIN tblcampus ON tblcertificaterangdetail.CampusID=tblcampus.CampusID='1' where BTBacXIIID='6' and CampusEN='B1 Kirirom' ";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {

                    echo '
                    <tr class="  table-bordered">
                        
                        <td style="vertical-align:middle;" >' . $row['CertificateNumber'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['FullNameKH'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['FullNameEN'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['SexEN'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['DOB'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['Photo'] . '"<?php echo' . $row['Photo'] . ';?><img width="80px" height="100px"  src="image/' . $row['Photo'] . '"</a></td>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['BTBacXIIURL'] . '"<?php echo' . $row['BTBacXIIURL'] . ';"><img width="80px" height="100px"  src="image/' . $row['BTBacXIIURL'] . '"</a></td>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['BacXIIURL'] . '"<?php echo' . $row['BacXIIURL'] . ';?><img width="80px" height="100px"  src="image/' . $row['BacXIIURL'] . '"</a></td>
                    </tr>
                    ';

                }

                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>