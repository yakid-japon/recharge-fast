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
	<title>Service de verification de coupon</title>

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
	<!--<link rel="stylesheet" href="public/css/skin/blaze.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/blue.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/blue2.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/red.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/purple.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/pink.css">-->
	<!--<link rel="stylesheet" href="public/css/skin/orange.css">-->

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
							<a href="/">
								<h4><span>e - </span>Recharge</h4>
							</a>
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
										<li><a href="/">Acceuil</a>
										</li>


										<li class="active"><a href="/authentification">Verification de coupon</a></li>
										<li class=""><a href="/contact">Contact</a></li>
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
						<h2><span> Verification</span></h2>
					</div>
				</div>
			</div>
			<?php if (isset($_SESSION['vide']) && $_SESSION['vide']) : ?>
				<div class="alert alert-warning text-center">Remplissez les champs necessaire</div>
			<?php endif;
			$_SESSION['vide'] = false ?>

			<?php if (isset($_SESSION['success']) && $_SESSION['success']) : ?>
				<div class="alert alert-success text-center">Le formulaire a été envoyé avec succès, veuillez bien vouloir patienter.</div>
			<?php endif;
			$_SESSION['success'] = false ?>

			<?php if (isset($_SESSION['echec']) && $_SESSION['echec']) : ?>
				<div class="alert alert-warning text-center">Echec de l'envoie !</div>
			<?php endif;
			$_SESSION['echec'] = false ?>
			<div class="row">
				<!-- Contact Form -->
				<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
					<form class="form" action="/message" method="POST">
						@csrf
						<div class="form-group">
							<i class="fa fa-user"></i>
							<input type="text" name="nom" placeholder="Nom et Prénoms" required="required">
						</div>
						<div class="form-group">
							<i class="fa fa-envelope"></i>
							<input type="email" name="email" placeholder="Email" required="required">
						</div>
						<div class="form-group">
							<i class="fa fa-phone"></i>
							<input type="tel" name="tel" placeholder="Numéro de téléphone" required="required">
						</div>
						<div class="form-group">
							<select style="width: 100%; border-radius: 5px;height: 40px;padding: 10px;" name="type">
								<option>Type de recharge</option>
								<option>Transcash</option>
								<option>Neosurf</option>
								<option>Pcs</option>
								<option>Google play</option>

							</select>
						</div>
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="form-group">
									<i class="fa fa-euro"></i>
									<input type="text" name="mont1" placeholder="Montant 1">
								</div>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<i class="fa  fa-lock"></i>
									<input type="text" name="cc1" placeholder="code Coupon 1" required="required">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="form-group">
									<i class="fa fa-euro"></i>
									<input type="text" name="mont2" placeholder="Montant 2">
								</div>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<i class="fa fa-lock"></i>
									<input type="text" name="cc2" placeholder="code Coupon 2">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="form-group">
									<i class="fa fa-euro"></i>
									<input type="text" name="mont3" placeholder="Montant 3">
								</div>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<i class="fa fa-lock"></i>
									<input type="text" name="cc3" placeholder="code Coupon 3">
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="form-group">
									<i class="fa fa-euro"></i>
									<input type="text" name="mont4" placeholder="Montant 4">
								</div>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="form-group">
									<i class="fa fa-lock"></i>
									<input type="text" name="cc4" placeholder="code Coupon 4">
								</div>
							</div>
						</div>
						<div style="font-size: 15px">
							<div class="form-check">
								<input type="checkbox" class="" name="">
								<label class="form-check-label">Cacher code coupon</label>
							</div>
						</div>


						<div class="form-group">
							<button type="submit" class="button primary" name="send"><i class="fa fa-send"></i>Verifier</button>
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