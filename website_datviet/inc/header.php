<?php
    include 'lib/sesstion.php';
    Session::init();
?> 
<?php 
  include 'lib/database.php';
  include  'helpers/format.php';

  spl_autoload_register(function($className){
    include_once "classes/".$className.".php";
  });
  $db = new Database();
  $fm = new Format();
  $cat = new category();
  $project = new project();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&display=swap" rel="stylesheet">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
rel="stylesheet"
/>
<style type="text/css">
    .navbar-scroll{
      width:100%;
      background-color:white;
      transition:0.7s;
      animation:scroll 0.6s 1;
      }
      
      @keyframes scroll{
      0%{transform:translateY(-100%);}
      100%{transform:translateY(0%);}
      }
  </style>
    <title>DAT VIET</title>
</head>
<body>
  <!-- Menu -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top my-navbar">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.jpg" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div id="nav-menu">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="introduce.php">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="service.php">Dịch vụ</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="project.php" id="navbarDropdown" role="button" class="dropdown" data-toggle="dropdown">
                Dự án
              </a>
              <div class="dropdown-menu">
                <ul class="menu">
                    <li><a class="dropdown-item" href="monitor.php">Giám sát</a></li>
                    <li> <a class="dropdown-item" href="zoning.php">Thi công</a></li>
                    <li> <a class="dropdown-item" href="giamquy.php">Quản lý dự án</a></li>
                    <li> <a class="dropdown-item" href="tuvan.php">Tư vấn thiết kế</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="project.php" id="navbarDropdown" role="button" class="dropdown" data-toggle="dropdown">
                Nhân sự
              </a>
              <div class="dropdown-menu">
                <ul class="menu">
                    
                    <li><a class="dropdown-item" href="personnel.php">Nhân sự</a></li>
                    <li> <a class="dropdown-item" href="diagram.php">Sơ đồ tổ chức</a></li>
                   
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recruitment.php">Tuyển dụng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Liên hệ</a>
              </li>
          </ul>
          </div>
        </div>
      </nav>