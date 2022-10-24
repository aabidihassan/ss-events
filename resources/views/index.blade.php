<!DOCTYPE html>
<html lang="en">
<head>
<title>SERV_fêtes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">
<link rel="icon" href="{{ url('images/favicon.ico')}}" type="image/x-icon">
<link rel="shortcut icon" href="{{ url('images/favicon.ico')}}" type="image/x-icon" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="{{ url('css/bootstrap.css')}}" type="text/css" media="screen">
<link rel="stylesheet" href="{{ url('css/bootstrap-responsive.css')}}" type="text/css" media="screen">
<link rel="stylesheet" href="{{ url('css/camera.css')}}" type="text/css" media="screen">
<link rel="stylesheet" href="{{ url('css/style.css')}}" type="text/css" media="screen">

<script type="text/javascript" src="{{ url('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{ url('js/superfish.js')}}"></script>

<script type="text/javascript" src="{{ url('js/jquery.ui.totop.js')}}"></script>

<script type="text/javascript" src="{{ url('js/camera.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jquery.mobile.customized.min.js')}}"></script>

<script type="text/javascript" src="{{ url('js/jquery.caroufredsel.js')}}"></script>
<script type="text/javascript" src="{{ url('js/jquery.touchSwipe.min.js')}}"></script>

<script type="text/javascript" src="{{ url('js/script.js')}}"></script>
<script>
$(document).ready(function() {
	// camera
	$('#camera_wrap').camera({
		//thumbnails: true
		autoAdvance			: true,
		mobileAutoAdvance	: true,
		height: '52%',
		hover: false,
		loader: 'none',
		navigation: false,
		navigationHover: false,
		mobileNavHover: false,
		playPause: false,
		pauseOnClick: false,
		pagination			: true,
		time: 7000,
		transPeriod: 1000,
		minHeight: '250px'
	});

	//	carouFredSel
	$('#slider3 .carousel.main ul').carouFredSel({
		auto: {
			timeoutDuration: 4000
		},
		responsive: true,
		prev: '.prev',
		next: '.next',
		width: '100%',
		scroll: {
			items: 1,
			duration: 1000,
			easing: "easeOutExpo"
		},
		items: {
        	width: '320',
			height: 'variable',	//	optionally resize item-height
			visible: {
				min: 1,
				max: 4
			}
		},
		mousewheel: false,
		swipe: {
			onMouse: true,
			onTouch: true
			}
	});
	$(window).bind("resize",updateSizes_vat).bind("load",updateSizes_vat);
	function updateSizes_vat(){
		$('#slider3 .carousel.main ul').trigger("updateSizes");
	}
	updateSizes_vat();



}); //
$(window).load(function() {
	//

}); //
</script>
<!--[if lt IE 8]>
		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg"border="0"alt=""/></a></div>
	<![endif]-->

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>

<body class="main">
<div id="main">
<div class="menu_bg_wrapper">
<div class="container">
<div class="row">
<div class="span12">
<div class="menu_bg_inner"><div class="menu_bg"></div></div>
</div>
</div>
</div>
</div>
<header>
<div class="container">
<div class="row">
<div class="span12">
<div class="header_inner clearfix">
	<div  class="title"   ><a href="index.html" class="title">SERV-fêtes</a></div>
	<div class="menu_wrapper">
		<div class="navbar navbar_">
			<div class="navbar-inner navbar-inner_">
				<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">main menu</a>
				<div class="nav-collapse nav-collapse_ collapse">
					<ul class="nav sf-menu clearfix">
						<li class="active"><a href="index.html">home</a></li>
						<li><a href="index-2.html">Prestaire</a></li>
						<li><a href="index-1.html">news</a></li>
						<li><a href="index-5.html"> <i class="bi bi-box-arrow-in-right"></i>  Se Connecter</a></li>
						<li><a href="index-6.html">Inscription</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</header>

<div id="slider">
<div class="slider_bot">
	<div class="slider_bot1">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="slider_bot1_inner">
						<div class="search-form-wrapper clearfix">
							<form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form" >
							<div class="row">
  								<div class="span3">
									<select class="form-select" aria-label="Default select example">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>	
								<div class="span3">
									<a href="#" onClick="document.getElementById('search-form').submit()">Recharcher</a>
								</div>
							</div>		
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<div id="camera_wrap">
	<div data-src="images/slide01.jpg">
		<div class="camera_caption fadeIn">
			<div class="txt1">Mariage</div>
			<div class="clearfix"></div>
			<a href="/mariage" class="button0">go!</a>
		</div>
	</div>
	<div data-src="images/slide02.jpg">
		<div class="camera_caption fadeIn">
			<div class="txt1">Seminaire</div>
		
			<div class="clearfix"></div>
			<a href="/seminaire" class="button0">go!</a>
		</div>
	</div>
	<div data-src="images/slide03.jpg">
		<div class="camera_caption fadeIn">
			<div class="txt1">Anniversaire</div>
			
			<div class="clearfix"></div>
			<a href="/anniversaire" class="button0">go!</a>
		</div>
	</div>
    <div data-src="images/slide04.jpg">
		<div class="camera_caption fadeIn">
			<div class="txt1">Soirée</div>
			<div class="clearfix"></div>
			
			<a href="/soiree" class="button0">go!</a>
		</div>
	</div>

</div>
</div>

<div class="container">
<div class="row">
<div class="span12">
<div class="banners2">
<div class="row">
	<div class="span4 banner banner1">
		<div class="banner_inner">
			<img src="images/banner1.png" alt="" class="ic">
			<div class="txt1">Tickets Online</div>
			<div class="txt2">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>
			<a href="#" class="button1">more</a>
		</div>
	</div>
	<div class="span4 banner banner2">
		<div class="banner_inner">
			<img src="images/banner2.png" alt="" class="ic">
			<div class="txt1">Plan Your Trip</div>
			<div class="txt2">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>
			<a href="#" class="button1">more</a>
		</div>
	</div>
	<div class="span4 banner banner3">
		<div class="banner_inner">
			<img src="images/banner3.png" alt="" class="ic">
			<div class="txt1">Search Tour</div>
			<div class="txt2">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>
			<a href="#" class="button1">more</a>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="span12">
<div class="hl1"></div>
</div>
</div>
</div>

<div id="slider3_wrapper">
<div class="container">
<div class="row">
<div class="span12">
<div id="slider3">
<div class="slider3-title">New</div>
<a class="prev" href="#"></a>
<a class="next" href="#"></a>
<div class="carousel-box row">
	<div class="inner span12">
		<div class="carousel main">
			<ul>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel01.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEUR 1</div>
									<div class="txt2">AGADIR</div>
									<img src="images/stars5.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARIAGE<br>SOIREE<br>7 ANNEVIRSAIRE
										</div>
										<div class="txt3_2"><span>$</span>2230</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel02.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEUR 2</div>
									<div class="txt2">MARAKKECH</div>
									<img src="images/stars3.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											SOIREE
										</div>
										<div class="txt3_2"><span>$</span>1290</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel03.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEURE 4 </div>
									<div class="txt2">Turkey</div>
									<img src="images/stars4.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARAIGE<br>ANNEVERSAIRE<br>SOIREE
										</div>
										<div class="txt3_2"><span>$</span>2120</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel04.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEURE 3 </div>
									<div class="txt2">Turkey</div>
									<img src="images/stars4.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARAIGE<br>ANNEVERSAIRE<br>SOIREE
										</div>
										<div class="txt3_2"><span>$</span>2120</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel01.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEURE 2 </div>
									<div class="txt2">Turkey</div>
									<img src="images/stars4.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARAIGE<br>ANNEVERSAIRE<br>SOIREE
										</div>
										<div class="txt3_2"><span>$</span>2120</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel02.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEURE 6 </div>
									<div class="txt2">Turkey</div>
									<img src="images/stars4.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARAIGE<br>ANNEVERSAIRE<br>SOIREE
										</div>
										<div class="txt3_2"><span>$</span>2120</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel03.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">TRAITEURE 11 </div>
									<div class="txt2">Turkey</div>
									<img src="images/stars4.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											MARAIGE<br>ANNEVERSAIRE<br>SOIREE
										</div>
										<div class="txt3_2"><span>$</span>2120</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb-carousel">
						<div class="thumbnail clearfix">
							<a href="index-2.html">
								<figure>
									<img src="images/carousel04.jpg" alt="" class="img">
								</figure>
								<div class="caption">
									<div class="txt1">ADAARAN SELECT MEE...</div>
									<div class="txt2">Maldives</div>
									<img src="images/stars5.png" alt="" class="stars">
									<div class="carousel_line"></div>
									<div class="txt3 clearfix">
										<div class="txt3_1">
											DBL, Standard,<br>2AD, All Inclusive<br>7 night
										</div>
										<div class="txt3_2"><span>$</span>3300</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="span12">
<div class="hl1"></div>
</div>
</div>
</div>

<div id="content">
<div class="container">
<div class="row">
	<div class="span9">

		<h1 class="home">Welcome to traveler</h1>

		<h4>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</h4>

		<div class="thumb1">
			<div class="thumbnail clearfix">
				<div class="figure_wrapper"><figure class="img-polaroid"><img src="images/home01.jpg" alt=""></figure></div>
				<div class="caption">
					<p>
						Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna. Ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetuer adipiscing elit. Nunc suscipit.
					</p>
					<a href="#" class="button2">read more</a>
				</div>

			</div>
		</div>








	</div>
	<div class="span3">


		<h2>Services we offer</h2>

		<ul class="ul1">
	      <li><a href="#">Tour reservation</a></li>
	      <li><a href="#">Insurance</a></li>
	      <li><a href="#">Tickets online</a></li>
	      <li><a href="#">Hotel booking</a></li>
	      <li><a href="#">Consultation</a></li>
	      <li><a href="#">Transfer</a></li>
	    </ul>






	</div>
</div>
</div>
</div>

<footer>
<div class="container">
<div class="row">
<div class="span12">
	<div class="bot1 clearfix">
		<img src="images/plane1.png" alt="" class="plane1">
		<img src="images/boat1.png" alt="" class="boat1">
		<div class="social_txt1">Follow us</div>
		<div class="social_wrapper">
			<ul class="social clearfix">
			    <li><a href="#"><img src="images/social_ic1.png"></a></li>
			    <li><a href="#"><img src="images/social_ic2.png"></a></li>
			    <li><a href="#"><img src="images/social_ic3.png"></a></li>
			    <li><a href="#"><img src="images/social_ic4.png"></a></li>
			    <li><a href="#"><img src="images/social_ic5.png"></a></li>
			    <li><a href="#"><img src="images/social_ic6.png"></a></li>

			</ul>
		</div>
	</div>
	<div class="bot2 clearfix">
		<div class="menu_bot">
	        <ul id="menu_bot" class="clearfix">
	          <li><a href="index.html">home</a></li>
	          <li><a href="index-1.html">news</a></li>
	          <li><a href="index-2.html">hot tours</a></li>
	          <li><a href="index-3.html">destinations</a></li>
	          <li><a href="index-4.html">services</a></li>
	          <li><a href="index-5.html">gallery</a></li>
	          <li><a href="index-6.html">contacts</a></li>
	        </ul>
		</div>
		<div class="copyright">Copyright © 2019. All rights reserved. &nbsp; <a href="https://gridgum.com/themes/category/free/">Free Website Templates</a></div>
	</div>
</div>
</div>
</div>
</footer>









</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
