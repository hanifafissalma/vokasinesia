<!DOCTYPE html>
<html xml:lang="id" xmlns="http://www.w3.org/1999/xhtml" lang="id">
<head>
<title><?= $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="<?= $settings['keywords'] ?>" />
<base href="<?= BASE_HREF ?>">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="images/post/<?= $settings['favicon'] ?>">
<link rel="icon" type="image/png" sizes="32x32" href="images/post/<?= $settings['favicon'] ?>">
<link rel="icon" type="image/png" sizes="16x16" href="images/post/<?= $settings['favicon'] ?>">

<link rel="stylesheet" type="text/css" media="all" href="css/style.css?<?php echo(rand(1,1000000)); ?>" />

<link href="css/bootstrap.css?<?php echo(rand(1,1000000)); ?>" rel="stylesheet">
<link href="css/bootstrap-grid.css?<?php echo(rand(1,1000000)); ?>" rel="stylesheet">
<link href="css/bootstrap-reboot.css?<?php echo(rand(1,1000000)); ?>" rel="stylesheet">
<link href="css/slick.css?<?php echo(rand(1,1000000)); ?>" rel="stylesheet">
<link href="css/slick-theme.css?<?php echo(rand(1,1000000)); ?>" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d78763eab6f1000123c87a0&product=inline-share-buttons" async="async"></script>

<link rel="canonical" href="https://www.hipajak.id/" />

<meta name="description" content="<?= $description ?>" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?= $title ?>" />
<meta property="og:description" content="<?= $description ?>" />
<meta property="og:url" content="<?= currentUrl() ?>" />
<meta property="og:site_name" content="HiPajak" />
<meta property="og:image" content="<?= BASE_HREF ?>images/post/<?= $settings['sosmed_image'] ?>" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="400" />
<meta name="twitter:card" content="summary_large_image" />

</head>

<body>
	<div class="toparea">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 logo">
					<img src="images/post/<?= $settings['logo_utama'] ?>">              
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 topmenu">
					<a id="openPageslide" href="#pageslide" class="text-white"><i class="fa fa-bars fa-2x"></i></a>
					<div id="pageslide" class="navBox">
						<ul>
							<h4 class="topmenuheader">Menu</h4>
							<li><a href="./" class="scrollTo">Home</a></li>
							<?= liststatisheader() ?>
							<li><a href="artikel" class="scrollTo">Artikel</a></li>
							<li><a href="peraturan" class="scrollTo">Peraturan</a></li>
							<li><a href="contact-us" class="scrollTo">Hubungi Kami</a></li>
							<li class="tombollogin"><a href="https://app.hipajak.id/login"class="btn btn-success text-white" target="_blank">Login / Signup</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>