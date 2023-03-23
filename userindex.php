<!DOCTYPE html>

<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BELTEI International School</title>
<link rel='stylesheet' type='text/css' media='screen' href='Script/bootstrap.min.css'>
<script src='Script/jquery-3.2.1.slim.min.js'></script>
<script src='Script/popper.min.js'></script>
<script src='Script//bootstrap.min.js'></script>
<link rel="stylesheet" href="Styel.css">
<script src="Script/script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="col-lg-3">
          <a class="navbar-brand mx-auto">
            <img src="image/banner.png" alt="" class="w-100" height="55" ></a>
        </div>
        <div class="col-lg-6" >
          <ul class="menu">
            <li><a href="" style="text-decoration:none;">Home</a></li>
            <li class="dropdown">
              <a href="aboutus.php"style="text-decoration:none;">About US</a>
            </li>
            <li><a href="contactus.php"style="text-decoration:none;">Contact</a></li>
            <li><a href="login.php"style="text-decoration:none;">Login</a></li>
            <li><a href="setup.php"style="text-decoration:none;">Setup</a></li>
            <br>
          </ul>
        </div>
        <div class="col-lg-3 mt-3 mb-3 ">
          <form action="Select.php" method="GET" style="margin-right:30px;">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." name="search">
              <pre></pre>
              <select name="column" class="form-control">
                <option>Choose</option>
                <option value="FullNameKH">Khmer FullName</option>
                <option value="FullNameEN">Latin FullName</option>
                <option value="CertificateNumber">Certificate Number</option>
                <option value="CampusEN">Campus</option>
              </select>
              <pre></pre>
              <button class="btn btn-outline-primary  " name="Search" type="submit">Search</button>
            </div>
          </form>
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

      #for_in {}
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
  <br><br>
  <br><br>
  <div class="row  tap-corner" style="margin-top:5px ;">
    <div class="col-lg-12 ">
      <div class="container">
        <div class="category">
          <div class="tap" style="font-family: Khmer OS Battambang;">
            <a href="">ការអប់រំនិងផ្ដល់បទពិសោធន៍</a>
          </div>
          <div class="tap-corner">

          </div>
        </div>
        <div class="box-underline">

        </div>

      </div>

    </div>
  </div>
  <div class="album py-5 bg-light">
    <div class="container" style="margin-top:0px ;">

      <div class="row bg-image ">
        <div class="col-md-4 ">
          <div class="card mb-4 box-shadow bg-image">
            <img src="imag/012.jpg" alt="" class="Zoom">
            <div class="card-body text-white text-secondary" style="font-family:Khmer OS Battambang ;">
              <p class="card-text">ឯឧត្តមបណ្ឌិត លីឆេង
                បានមកធ្វើបទបង្ហាយចែករំលែកនូវចំណេះដឺងនិងបទពីសោធន៍ដែលលោកធ្លាប់បានឆ្លងកាត់កន្លងមកទៅកាន់​
                និស្សិតនៃសកលវិទ្យាល័យទាំងអស់​​​ ។</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary bg-dark">
                    <a href="data.php">ស្វែងយល់បន្ថែម</a>
                  </button>
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow ">
            <img src="imag/013.jpg" alt="" class="Zoom">
            <div class="card-body" style="font-family: Khmer OS Battambang;">
              <p class="card-text">
                កម្មវិធីក្នុងការចែកនូវសញ្ញាប័ត្រមធ្យមសិក្សាទុតិយភូមិទៅកាន់សិស្សក្សានុសិស្សនៃសកលវិទ្យាល័យប៊ែលធី
                អន្តរ ជាតិ ដែលបានប្រឡងជាប់​។</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button " class="btn btn-sm btn-outline-secondary bg-dark">
                    <a href="data1.php ">ស្វែងយល់បន្ថែម</a>
                  </button>
                </div>
                <small class="text-muted text-info">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img src="imag/2.jpg" alt="" class="Zoom">
            <!-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap"> -->
            <div class="card-body">
              <p class="card-text" style="font-family:Khmer OS Battambang;">ឆមាសទី២ ថ្នាក់ចំណេះទូទៅ (ថ្នាក់ត្រៀម
                ថ្នាក់ទី១ ដល់ទី១២) ទទួលចុះឈ្មោះជារៀងរាល់ថ្ងៃ នៅគ្រប់ទីតាំងនៃសាលា ប៊ែលធី អន្តរជាតិទាំង ២៤សាខា!!!
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button " class="btn btn-sm btn-outline-secondary bg-dark"
                    style="font-family:Khmer OS Battambang ;">
                    <a href="data2.php">ស្វែងយល់បន្ថែម</a>
                  </button>
                </div>
                <small class="text-muted text-info">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container" style="margin-top:0px ;">
        <div class="row">
          <div class="col-lg-12 ">
            <div class="container2">
              <div class="category">
                <div class="tap" styel="font-family: Khmer OS Battambang;">
                  <a href="">ដំណើរកំសាន្តនិងទស្សនៈកិច្ច</a>
                </div>
                <div class="tap-corner">

                </div>
              </div>
              <div class="box-underline">

              </div>

            </div>
          </div>
        </div>
        <div class="album py-5 bg-light">
          <div class="container" style="margin-top:0px ;">

            <div class="row bg-image ">
              <div class="col-md-4 ">
                <div class="card mb-4 box-shadow bg-image">
                  <img src="imag/3.jpg" alt="" class="Zoom">
                  <div class="card-body text-white text-secondary" style="font-family:Khmer OS Battambang ;">
                    <p class="card-text">“សុខភាពបុគ្គលិកគឺ ជាទ្រព្យសម្បត្តិរបស់ក្រុមហ៊ុន”
                      អបអរសាទរដំណើរកម្សាន្តប្រចាំឆ្នាំរបស់ ថ្នាក់ដឹកនាំ បុគ្គលិក សាស្ត្រាចារ្យ និងលោកគ្រូ-អ្នកគ្រូ
                      គ្រប់ផ្នែកទាំងអស់នៅតាមបណ្តាសាខា នៃប៊ែលធី គ្រុប សរុបប្រមាណ ៣,០០០នាក់ ទៅកាន់ខេត្តព្រះសីហនុ
                      (វិលល្ងាច) ដោយធ្វើដំណើរតាមផ្លូវល្បឿនលឿនភ្នំពេញ-ព្រះសីហនុ!</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary bg-dark">
                          <a href="index1.html">ស្វែងយល់បន្ថែម</a>
                        </button>
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                      </div>
                      <small class="text-muted">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow ">
                  <img src="imag/4.jpg" alt="" class="Zoom">
                  <div class="card-body" style="font-family: Khmer OS Battambang;">
                    <p class="card-text">
                      “សុខភាពបុគ្គលិកគឺ ជាទ្រព្យសម្បត្តិរបស់ក្រុមហ៊ុន”
                      អបអរសាទរដំណើរកម្សាន្តចុងសប្តាហ៍របស់ថ្នាក់ដឹកនាំប៊ែលធី គ្រុប ទៅកាន់ខេត្តព្រះសីហនុ (វិលល្ងាច)
                      ដោយធ្វើដំណើរតាមផ្លូវល្បឿនលឿនភ្នំពេញ-ព្រះសីហនុ ដែលមានប្រវែងសរុប ១៨៧.០៥គីឡូម៉ែត្រ
                      ក្នុងឱកាសនៃការបើកឱ្យដំណើរការសាកល្បងដោយឥតគិតថ្លៃ ចាប់ពីថ្ងៃទី០១ </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button " class="btn btn-sm btn-outline-secondary bg-dark">
                          <a href="index2.html ">ស្វែងយល់បន្ថែម</a>
                        </button>
                      </div>
                      <small class="text-muted text-info">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img src="imag/7.jpg" alt="" class="Zoom">
                  <!-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap"> -->
                  <div class="card-body">
                    <p class="card-text" style="font-family:Khmer OS Battambang;">សាកលវិទ្យាល័យ ប៊ែលធី អន្តរជាតិ
                      ទីតាំងទី១ (ទួលស្លែង) បានដឹកនាំ សមណនិស្សិត និងនិស្សិត ថ្នាក់បំប៉នភាសាអង់គ្លេស និងកុំព្យូទ័រ ចំនួន៦៧
                      អង្គ/នាក់ បន្ទាប់ពីបានប្រឡងបញ្ចប់វគ្គ ទៅកម្សាន្តនៅខេត្តព្រះសីហនុ តាមផ្លូវល្បឿនលឿន។
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button " class="btn btn-sm btn-outline-secondary bg-dark"
                          style="font-family:Khmer OS Battambang ;">
                          <a href="index3.html">ស្វែងយល់បន្ថែម</a>
                        </button>
                      </div>
                      <small class="text-muted text-info">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <!--Teamowrk--->
    <section class="teamwork" id="teamwork">

      <h2 class="heading text-center">
        <span style=" color: #1596e0;">
        OUR TAEMWORK
      </h2>
      <br><br>
      <?php include_once('teamwork.php') ?>
    </section>
    <!-- logo slide -->
    <h1 class="heading text-center">
      <span style=" color: #1596e0;">Our</span> Partner
    </h1>
  </div>
  <?php include("footer.php"); ?>
</body>

</html>