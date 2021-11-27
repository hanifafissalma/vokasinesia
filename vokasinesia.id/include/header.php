<!doctype html>
<html lang="en">
	<head>  
        <base href="<?= BASE_HREF ?>">        
      	<meta name="description" content="<?= $pUmum['description'] ?>">
        <meta name="keywords" content="<?= $pUmum['keywords'] ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta property="og:title" content="<?= $title ?>" />
        <meta property="og:url" content="<?= currentUrl() ?>" />
        <meta property="og:image" content="<?= BASE_HREF ?>images/post/<?= $settings['sosmed_image'] ?>" />
        
        <!-- Favicon -->        
        <link rel="apple-touch-icon" sizes="180x180" href="images/post/<?= $pUmum['favicon'] ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="images/post/<?= $pUmum['favicon'] ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="images/post/<?= $pUmum['favicon'] ?>">
            
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
           
        <!-- Slick -->
        <link href="css/slick.css" rel="stylesheet">
        <link href="css/slick-theme.css" rel="stylesheet">  
        <link href="css/slick-lightbox.css" rel="stylesheet">  
        
        <!-- Style -->
        <link href="style.css?<?php echo(rand(1,9999999)); ?>" rel="stylesheet">
        <link href="css/special.css?<?php echo(rand(1,9999999)); ?>" rel="stylesheet">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5fd0bc581aaf5800135bdf7d&product=sop' async='async'></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title><?= $title ?></title>
	</head>
  <style>
    .box-title{
        height:80px; 
        background:#ED1C24; 
        color:white;
    }
    .head-title{
        font-size:30px;
        line-height:40px;
        font-weight: 900;
    }
    .post-photo{
      height:350px !important;
    }

    a{
      text-decoration:none !important;
    }
    @media(max-width:576px){
      .post-photo{
        width:100%;
        height:auto !important;
      }

    .col-sm-6{
      width:50%;
    }
    .col-sm-1{
      width:8.3%;
    }

    .col-sm-11{
      width:90%;
    }
    }
  </style>
	<body>    
    
    <div class="toggle-wrap"></div>
    <div class="toggle-text-dark"><i class="fa fas fa-circle"></i></div>
    <div class="toggle-text-normal"><i class="fa fas fa-circle"></i></div>
    <input class="toggle" type="checkbox" />
    
    <div class="bg"></div>
    
    <main> 

    <div class="navigation">
      <div class="nav-container">
        <div class="brand">
            <div class="toplogo"><a href="./"><img src="images/post/<?= $pUmum['logo_dark'] ?>" alt="Vokasinesia"></a></div>
            <div class="toplogo-wh"><a href="./"><img src="images/post/<?= $pUmum['logo_light'] ?>" alt="Vokasinesia"></a></div>
        </div>
        <nav>
          <div class="nav-mobile"><a id="nav-toggle"><span></span></a></div>
          <ul class="nav-list">
            <!-- <li>
              <a href="./">Beranda</a>
            </li> -->
            <li>
              <a>Publikasi</a>
              <ul class="nav-dropdown">
                <li>
                  <a href="arsip/vokasi">Vokasi</a>
                </li>
                <li>
                  <a href="arsip/industri">Industri</a>
                </li>
                <li>
                  <a href="arsip/vokapreneur">Vokapreneur</a>
                </li>
              </ul>
            </li>
            <li>
              <a>Info Vokasi</a>
              <ul class="nav-dropdown">
                <li>
                  <a href="arsip/program-studi">Program Studi</a>
                </li>
                <li>
                  <a href="arsip/info-magang">Info Magang</a>
                </li>
                <li>
                  <a href="arsip/beasiswa">Beasiswa</a>
                </li>
                <li>
                  <a href="arsip/cari-kampus">Cari Kampus</a>
                </li>
                <li>
                  <a href="arsip/kursus">Kursus</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="galeri">Galeri</a>
            </li>
            <li>
              <form action="pencarian" method="get" role="search" class="search">
                <input type="text" class="search-input" name="s" placeholder="Masukan kata kunci" aria-label="Cari">
                <button type="submit" class="search-button"><span>Cari</span></button>
              </form>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="topspace"></div> 