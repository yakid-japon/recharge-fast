<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
	<!-- Meta tag -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name='copyright' content='codeglim'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Tag -->
	<title>Service</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="../../../www.codeglim.com/templates/bizman/images/favicon.html">

	<!-- Google Font & Google Map -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700" rel="stylesheet">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM" type="text/javascript"></script>

	<!-- Hover CSS -->
	<link rel="stylesheet" href="/css/hover.css">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Slick Nav CSS -->
	<link rel="stylesheet" href="/css/slicknav.min.css">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="/css/owl.theme.default.css">
	<link rel="stylesheet" href="/css/owl.carousel.min.css">

	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="/css/magnific-popup.css">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="/css/animate.min.css">

	<!-- Bootstrap Css -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- bizman Style CSS -->
	<link rel="stylesheet" href="/style.css">
	<link rel="stylesheet" href="/css/default.css">
	<link rel="stylesheet" href="/css/responsive.css">

	<!-- bizman Colors -->
	<!-- Use another color Just remove bottom of the comment tag -->
	<link rel="stylesheet" href="/css/skin/green.css">
	<!--<link rel="stylesheet" href="/css/skin/blaze.css">-->
	<!--<link rel="stylesheet" href="/css/skin/blue.css">-->
	<!--<link rel="stylesheet" href="/css/skin/blue2.css">-->
	<!--<link rel="stylesheet" href="/css/skin/red.css">-->
	<!--<link rel="stylesheet" href="/css/skin/purple.css">-->
	<!--<link rel="stylesheet" href="/css/skin/pink.css">-->
	<!--<link rel="stylesheet" href="/css/skin/orange.css">-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Preloader -->
	<div class="loader">
		<div class="loader-inner">
			<div class="k-line k-line11-1"></div>
			<div class="k-line k-line11-2"></div>
			<div class="k-line k-line11-3"></div>
			<div class="k-line k-line11-4"></div>
			<div class="k-line k-line11-5"></div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Start Header -->
	<header id="header">
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.php?pag=index"><span>S-</span>Rech</a>
						</div>
						<!--/ End Logo -->
					</div>
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="nav-area">
							<!-- Main Menu -->
							<nav class="mainmenu">
								<div class="mobile-nav"></div>
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav">
										<li class="active"><a href="index.php?page=index">Acceuil</a>
										</li>
										<li><a href="#service">Avantage</a></li>
										<li><a href="#team">Acheter une recharge</a></li>
										<li><a href="#footer-top">Contact</a></li>
										<li><a href="index.php?page=authentification">Authentification</a></li>
									</ul>
								</div>
							</nav>
							<!--/ End Main Menu -->
							<!-- Search Form -->
							<ul class="search">
								<li><a href="#header"><i class="fa fa-search"></i></a></li>
							</ul>
							<div class="search-form">
								<form class="form" action="#">
									<i class="fa fa-remove"></i>
									<input type="search" placeholder="search here" />
									<button type="submit" value="send"><i class="fa fa-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->


	<!-- Contact Us -->
	<section id="contact" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 wow fadeInUp">
					<div class="section-title">
						<h2><span> P a y i n v o i c e</span></h2>
					</div>
				</div>
			</div>
			<?php if (isset($_SESSION['vide']) && $_SESSION['vide']) : ?>
				<div class="alert alert-warning text-center">Remplissez les champs necessaire</div>
			<?php endif;
			$_SESSION['vide'] = false ?>

			<?php if (isset($_SESSION['success']) && $_SESSION['success']) : ?>
				<div class="alert alert-success text-center">Veuillez patienter ..................</div>
			<?php endif;
			$_SESSION['success'] = false ?>

			<?php if (isset($_SESSION['echec']) && $_SESSION['echec']) : ?>
				<div class="alert alert-warning text-center">Echec de l'envoie !</div>
			<?php endif;
			$_SESSION['echec'] = false ?>
			<div class="row">
				<!-- Contact Form -->
				<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
					<form class="form" method="post" action="index.php?page=achat">
						<div class="form-group">
							<i class="fa fa-user"></i>
							<input type="text" placeholder="Montant" value="<?= $value ?> €" disabled="">
						</div>
						<div class="form-group">
							<i class="fa fa-envelope"></i>
							<input type="text" name="nom" placeholder="Nom sur la carte" required="required">
						</div>
						<div class="form-group">
							<i class="fa fa-phone"></i>
							<input type="text" name="num" placeholder="Numéro de carte" required="required">
						</div>
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<label>Date d'expiration</label>
								<div class="form-group">
									<i class="fa fa-phone"></i>
									<input type="date" name="date_exp" required>
								</div>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<label>Code</label>
								<div class="form-group">
									<i class="fa fa-edit"></i>
									<input type="password" name="code" placeholder="Code sécurite" required="required">
								</div>
							</div>
						</div>
						<div class="form-group">
							<i class="fa fa-phone"></i>
							<input type="text" name="zip" placeholder="Zip / Postale code" required="required">
						</div>
						<div class="form-group">
							<button type="submit" class="button primary" name="validerpaie"><i class="fa fa-send"></i>Payer <?= $value ?> €</button>
						</div>
					</form>
				</div>
				<!--/ Contact Form -->
			</div>
		</div>
	</section>
	<!--/ End Clients Us -->

	<!-- Start Clients -->
	<div id="clients">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="clients-main wow fadeInUp">
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client1.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client2.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client3.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client4.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client5.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
						<!-- Single Clients -->
						<div class="single-client">
							<img src="/images/client6.png" alt="" class="img-responsive">
						</div>
						<!--/ Single Clients -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Clients -->

	<!-- Jquery JS -->
	<script src="/js/jquery.min.js"></script>

	<!-- Modernizr JS -->
	<script src="/js/modernizr.min.js"></script>

	<!-- Scroll Up JS -->
	<script src="/js/jquery.scrollUp.min.js"></script>

	<!-- Wow JS -->
	<script src="/js/wow.min.js"></script>

	<!-- Slick Nav JS -->
	<script src="/js/jquery.slicknav.min.js"></script>

	<!-- Onepage Nav JS -->
	<script src="/js/jquery.nav.js"></script>

	<!-- Typed JS -->
	<script src="/js/typed.min.js"></script>

	<!-- Popup JS -->
	<script src="/js/jquery.magnific-popup.min.js"></script>

	<!-- Steller JS -->
	<script src="/js/jquery.stellar.js"></script>

	<!-- Particles JS -->
	<script src="/js/particles.min.js"></script>
	<script src="/js/particle-code.js"></script>

	<!-- Counterup JS -->
	<script src="/js/waypoints.min.js"></script>
	<script src="/js/jquery.counterup.min.js"></script>

	<!-- Owl Carousel JS -->
	<script src="/js/owl.carousel.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="/js/bootstrap.min.js"></script>

	<!-- Google Map JS -->
	<script src="/js/gmap.js"></script>

	<!-- Main JS -->
	<script src="/js/main.js"></script>

</body>

</html>