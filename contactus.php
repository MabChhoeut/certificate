<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>BELTIE INTERNASONL UNINVSITHY</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Css/bootstrap.min.css'>
    <script src='Boostrip/jquery-3.2.1.slim.min.js'></script>
    <script src='Boostrip/bootstrap.min.js'></script>
    <script src='Boostrip/popper.min.js'></script>
    <link rel="stylesheet" href="Css/Styel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .menu {
            list-style: none;
            margin: 0;
            padding: 0;

        }

        .menu li {
            display: inline-block;
            position: relative;
        }

        .menu a {
            display: block;
            text-decoration: none;
            padding: 20px;
            color: white;
            font-size: 20px;

        }

        @media (max-width: 768px) {
            .menu li {
                display: block;
            }

        }

        form {
            float: right
        }

        form input {
            width: 250px;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 4px 0 0 4px;
            border: 1px solid #ccc;
            width: 60%;
            border-radius: 10px;
        }

        button[type="submit"] {
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border-radius: 0 4px 4px 0;
            border: none;
            cursor: pointer;
            width: 30%;
            border-radius: 10px;
        }

        button[type="submit"]:hover,
        button[type="submit"]:focus {
            background-color: #3e8e41;
        }
        #row {
        /* min-height: 100vh; */
        text-align: center;
        display: fixed;
        /* background: url(//maps.gstatic.com/mapsactivities/icons/zoom-sprite-2x.png) no-repeat; */
        background-size: cover;
        background-position: center;
        filter: blur(0px);
        background-image: linear-gradient(to right, #1caafc, #43baff, #bee9ff);


    }

    #row1 {
        background-image: linear-gradient(to right, #bee9ff, #e8f7ff, #ffffff);
    }

    #p {
        font-family: 'Montserrat';
        font-size: 17px;
        font-weight: 800;
        color: aliceblue;

    }
    </style>
</head>

<body>
    <div class="continer1  ">
        <div class="row ">
            <nav style="background-color: #1596e0; width:100%;">
                <div class="row">
                    <div class="col-lg-4">
                        <a class="navbar-brand mx-auto">
                            <img src="image/banner.png" alt="" class="w-100" height="55"></a>
                    </div>
                    <div class="col-lg-8">
                        <ul class="menu">
                            <li><a href="userindex.php">Home</a></li>
                            <li class="dropdown">
                                <a href="aboutus.php">About US</a>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="setup.php">Setup</a></li>

                            <form style="float:right" class="mt-3 mb-2">
                                <input type="text" placeholder="Search...">
                                <button type="submit">Search</button>
                            </form>
                          

            </nav>

        </div>

    </div>
    <div class="container">
        <div class="row " style="box-shadow:0px 5px 30px -4px">
            <div class="col-lg-4 p-5 " id="row">

                <h1 class="pb-5 pt-2" style="color:whitesmoke;">CONTACT US</h1>
                <!--  -->
                <div class="card-text d-flex pt-4" style="text-align:left;padding-left:60px">
                    <i class="bi bi-geo-alt-fill"></i>
                    <svg xmlns="" width="18" height="18" fill="currentColor"
                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                    </svg>
                    <p class="pl-3 pb-3" id="p"><b>Address</b> : <a
                            href="https://www.google.com/maps/place/BELTEI+International+School+(Campus+10,+Angteuk+Olympic)/@11.5565778,104.9052637,17z/data=!3m1!4b1!4m6!3m5!1s0x310951f0c7c14233:0xb5c626a3d0626006!8m2!3d11.5565726!4d104.9074524!16s%2Fg%2F11fkp02dzb">
                            Get location</a>
                    </p><br>
                </div>
                <!--  -->
                <div class=" card-text d-flex" style="text-align:left;padding-left:60px">

                    <i class="bi bi-telephone-fill"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    <p class="pl-3 pb-3" id="p"><b>Phone</b> : +855 23 999 958
                    </p>
                </div>
                <!--  -->
                <div class=" card-text d-flex" style="text-align:left;padding-left:60px">

                    <i class="bi bi-globe-americas"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-globe-americas" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                    </svg>
                    <p class="pl-3 pb-3" id="p"><b>Website</b> : beltei.edu.kh
                    </p>
                </div>
                <!--  -->
                <div class=" card-text d-flex" style="text-align:left;padding-left:60px">

                    <i class="bi bi-envelope"></i>
                    <svg xmlns="" width="18" height="18" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                    <p class="pl-3 pb-3" id="p"><b>Email</b> : info@beltei.edu.kh.
                    </p>
                </div>

            </div>
            <div class="col-lg-4 p-5" id="row1">
                <h4 class="text-center pb-4" style="font-size:Arail;color:rgb(29, 29, 29);">
                    Send a message
                </h4>
                <form action="https://formsubmit.co/hengs453022@gmail.com" method="POST">
                    <div class="form-group">
                        <input type="text" name="Name" class="form-control" id="name" placeholder="Your name" style="border-radius w-100">

                    </div>
                    <div class="form-group">
                        <input type="text" name="Email" class="form-control" id="Email" placeholder="Email">

                    </div>
                    <div class="form-group">
                        <input type="text" name="numberphone" class="form-control" id="numberphone"
                            placeholder="Phone number">
                    </div>

                    <div>
                        <select name="choice" id="choice" class="form-control">
                            <option value="Cambodia">Cambodia</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Veitnam">USA</option>
                            <option value="Indonesia">India</option>
                            <option value="China">China</option>
                            <option value="Japan">Japan</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <textarea type="text" class="form-control" id="Subject" name="subject"
                            placeholder="Write message..." style="height: 120px;"></textarea>
                    </div>

                    <div class="text-right p-2">
                        <button type="submit" id="send" name="send" class="btn btn-primary "
                            style="padding-left: 50px; padding-right: 100px;">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>

    
</body>

</html>