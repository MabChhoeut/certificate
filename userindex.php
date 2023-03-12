<!DOCTYPE html>

<html lang="en">
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

<body>

  <header>
    <!-- banner -->
    <nav style="background-color: #1596e0; width:100%;">
      <div class="row">
        <div class="col-lg-4">
          <a class="navbar-brand mx-auto">
            <img src="image/banner.png" alt="" class="w-100" height="55"></a>
        </div>
        <div class="col-lg-8">
          <ul class="menu">
            <li><a href="#">Home</a></li>
            <li class="dropdown">
              <a href="#">About US</a>
            </li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="setup.php">Setup</a></li>
          </ul>
        </div>
      </div>
    </nav>
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
        padding: 20px 30px;
        color: bisque;
        font-size: 20px;
        
      }
      @media (max-width: 768px) {
        .menu li {
          display: block;
        }

        .dropdown-menu {
          position: static;
        }

        .dropdown:hover .dropdown-menu {
          display: block;
        }
      }
    </style>
  </header>
  <br>
  <div class="contianer">
    <td colspan="2">
      <marquee behavior="scroll" scrollamount="7.5"><span
          style="color: green; font-size: 20px;font-family: Khmer OS Battambang;"><strong>សាលា ប៊ែលធី
            អន្តរជាតិ</strong></span> <span
          style="color: green; font-size: 20px;font-family: Khmer OS Battambang;">មានបង្រៀន <span
            style="color: green; font-size: 20px;">៥</span>កម្មវិធីធំៗគឺ</span> <span
          style="color: green; font-size: 20px;font-family: Khmer OS Battambang;">១- ចំណេះទូទៅ | ២- ភាសាអង់គ្លេសទូទៅ |
          ៣-
          កម្មវិធីអផិវឌ្ឍបញ្ញា IMA | ៤- វគ្គបណ្តុះបណ្តាលកុំព្យូទ័រ | ៥- ថ្នាក់ត្រៀមប្រឡងតេស្តអន្តរជាតិ</span></marquee>
    </td>
  </div>

  <?php include('userslied.php') ?>
  <?php include('useradmin.php') ?>

</body>

</html>