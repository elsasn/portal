<?php
include 'header.php';
include 'koneksi.php';
$query = mysqli_query($mysqli, "SELECT * FROM motto WHERE STATUS='Aktif' ORDER BY id_motto DESC")
or die('Ada kesalahan pada query tampil Data motto: '.mysqli_error($mysqli));
//$data = mysqli_fetch_assoc($query);
//print_r($data);die();
?>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html"><span>YACI.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#" class="nav-link" data-nav-section="home"><span>Home</span></a></li>
					<li class="nav-item"><a href="stories.html" class="nav-link" data-nav-section="about"><span>About</span></a></li>
					<li class="nav-item"><a href="gallery.html" class="nav-link" data-nav-section="projects"><span>Gallery</span></a></li>
					<li class="nav-item"><a href="team.html" class="nav-link" data-nav-section="team"><span>Team</span></a></li>
					<li class="nav-item"><a href="stories.html" class="nav-link" data-nav-section="blog"><span>Blog</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section class="hero-wrap js-fullheight" style="background-image: url('images/hero2.jpg');" data-section="home">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
				<div class="col-md-8 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
					<p class="d-flex align-items-center" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
						<a href="www.youtube.com" class="icon-video popup-vimeo d-flex justify-content-center align-items-center mr-3">
							<span class="ion-ios-play play mr-2"></span>
							<span class="watch">Watch Video</span>
						</a>
					</p>
					<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have a passion in creating new and unique spaces</h1>
					<p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of the world, without going around in circles</p>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section ftco-services ftco-no-pt">
		<div class="container">
			
			<div class="row services-section">
				<?php
				//print_r($data);die();
				while ($data = mysqli_fetch_assoc($query)) {
				?>
				<div class="col-md-4 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services text-center d-block">
						<div class="icon"><span class="flaticon-layers"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3"><?php echo $data['motto']; ?></h3>
							<p><?php echo $data['keterangan']; ?></p>
						</div>
					</div>
				</div>
				<?php }  ?>
			</div>
			
		</div>
	</section>
	<?php
	include 'form.php'; ?>
</div>
</section>
<section class="ftco-section ftco-project bg-light" data-section="projects">
<div class="container-fluid px-md-5">
	<div class="row justify-content-center pb-5">
		<div class="col-md-12 heading-section text-center ftco-animate">
			<span class="subheading">Gallery</span>
			<h2 class="mb-4">Our Journey</h2>
			<p>Galeri perjalanan kami | <a href="gallery.html">View All</a></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 testimonial">
			<div class="carousel-project owl-carousel">
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-1.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-2.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-3.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-4.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-5.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="project">
						<div class="img">
							<img src="images/project-6.jpg" class="img-fluid" alt="Colorlib Template">
							<a href="images/project-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
						<div class="text px-4">
							<h3><a href="#">Office Interior Design</a></h3>
							<span>Interior Design</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<section class="ftco-section" data-section="team">
<div class="container-fluid p-0">
	<div class="row no-gutters justify-content-center pb-5">
		<div class="col-md-12 heading-section text-center ftco-animate">
			<span class="subheading">OUR TEAM</span>
			<h2 class="mb-4">Behind those Beautiful Community</h2>
			<p>Pengurus harian team kami | <a href="team.html">View All</a> </p>
		</div>
	</div>
	<div class="row no-gutters">
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/team-1.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Lloyd Wilson</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/team-2.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Rachel Parker</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/team-3.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Ian Smith</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/team-4.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Alicia Henderson</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Lloyd Wilson</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Rachel Parker</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/staff-3.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Ian Smith</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 ftco-animate">
			<div class="staff">
				<div class="img-wrap d-flex align-items-stretch">
					<div class="img align-self-stretch" style="background-image: url(images/staff-4.jpg);"></div>
				</div>
				<div class="text d-flex align-items-center pt-3 text-center">
					<div>
						<span class="position mb-2">Architect</span>
						<h3 class="mb-4">Alicia Henderson</h3>
						<div class="faded">
							<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><img src="images/img_1.jpg" style="width: 100px; height: auto;"></li>
								<li class="ftco-animate"><img src="images/img_5.jpg" style="width: 100px; height: auto;"></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<section class="testimony-section" data-section="testimony">
<div class="container">
	<div class="row ftco-animate justify-content-center">
		<div class="col-md-12 d-flex align-items-center">
			<div class="carousel-testimony owl-carousel">
				<div class="item">
					<div class="testimony-wrap d-flex align-items-stretch">
						<div class="user-img d-flex align-self-stretch" style="background-image: url(images/testimony-1.jpg)">
						</div>
						<div class="text d-flex align-items-center">
							<div>
								<div class="icon-quote">
									<span class="icon-quote-left"></span>
								</div>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
								<p class="name">Jacob Bolton</p>
								<span class="position">CEO, Founder</span>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testimony-wrap d-flex align-items-stretch">
						<div class="user-img d-flex align-self-stretch" style="background-image: url(images/testimony-2.jpg)">
						</div>
						<div class="text d-flex align-items-center">
							<div>
								<div class="icon-quote">
									<span class="icon-quote-left"></span>
								</div>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
								<p class="name">Jacob Bolton</p>
								<span class="position">CEO, Founder</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<section class="ftco-section bg-light" data-section="blog">
<div class="container">
	<div class="row justify-content-center mb-5 pb-5">
		<div class="col-md-7 heading-section text-center ftco-animate">
			<span class="subheading">Blog</span>
			<h2 class="mb-4">Read Our Stories</h2>
			<p>Cerita Perjalanan Kami | <a href="stories.html">View All</a> </p>
		</div>
	</div>
	<div class="row d-flex">
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry justify-content-end">
				<a href="single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">12</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry justify-content-end">
				<a href="single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">10</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry">
				<a href="single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">05</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry justify-content-end">
				<a href="single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">12</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry justify-content-end">
				<a href="single.html" class="block-20" style="background-image: url('images/image_5.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">10</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 d-flex ftco-animate">
			<div class="blog-entry">
				<a href="single.html" class="block-20" style="background-image: url('images/image_6.jpg');">
				</a>
				<div class="text mt-3 float-right d-block">
					<div class="d-flex align-items-center pt-2 mb-4 topp">
						<div class="one mr-3">
							<span class="day">05</span>
						</div>
						<div class="two">
							<span class="yr">2019</span>
							<span class="mos">March</span>
						</div>
					</div>
					<h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a></h3>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<div class="d-flex align-items-center mt-4 meta">
						<p class="mb-0"><a href="#" class="btn btn-secondary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
						<p class="ml-auto mb-0">
							<a href="#" class="mr-2">Admin</a>
							<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb">
<div class="container"><br>
	<div class="row justify-content-center mb-5 pb-5 py-5">
		<div class="col-md-12 heading-section text-center ftco-animate">
			<span class="subheading">Event</span>
			<h2 class="mb-4">See Our Events</h2>
			<p>Event terdekat kami | <a href="event.html">View All</a> </p>
		</div>
	</div>
	<div class="row d-flex">
		<div class="card-group" style="margin-top: -10px;">
			<div class="card">
				<img class="card-img-top" src="images/image_5.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Last updated 3 mins ago</small>
				</div>
			</div>
			<div class="card">
				<img class="card-img-top" src="images/image_5.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Last updated 3 mins ago</small>
				</div>
			</div>
			<div class="card">
				<img class="card-img-top" src="images/image_5.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				</div>
				<div class="card-footer">
					<small class="text-muted">Last updated 3 mins ago</small>
				</div>
			</div>
		</div><br><br>
		
	</div>
</div>
</section>
<section class="ftco-section contact-section bg-light">
<div class="container">
	<center>
	<span class="subheading">Contact</span>
	<h2 class="mb-4">Contact Us </h2>
	<p>Alamat Basecamp kami | <a href="contact.html">View Location</a> </p>
	</center><br>
	<div class="row d-flex contact-info">
		<div class="col-md-6 col-lg-3 d-flex">
			<div class="align-self-stretch box p-4 text-center">
				<div class="icon d-flex align-items-center justify-content-center">
					<span class="icon-map-signs"></span>
				</div>
				<h3 class="mb-4">Address</h3>
				<p>198 West 21th Street, Suite 721 New York NY 10016</p>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex">
			<div class="align-self-stretch box p-4 text-center">
				<div class="icon d-flex align-items-center justify-content-center">
					<span class="icon-phone2"></span>
				</div>
				<h3 class="mb-4">Contact Number</h3>
				<p><a href="tel://1234567920">+ 1235 2355 98</a></p>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex">
			<div class="align-self-stretch box p-4 text-center">
				<div class="icon d-flex align-items-center justify-content-center">
					<span class="icon-paper-plane"></span>
				</div>
				<h3 class="mb-4">Email Address</h3>
				<p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex">
			<div class="align-self-stretch box p-4 text-center">
				<div class="icon d-flex align-items-center justify-content-center">
					<span class="icon-globe"></span>
				</div>
				<h3 class="mb-4">Website</h3>
				<p><a href="#">yoursite.com</a></p>
			</div>
		</div>
	</div>
</div>
</section>
<footer class="ftco-footer ftco-section">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="ftco-footer-widget">
				<h2 class="ftco-heading-2">YACI</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
					<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="ftco-footer-widget">
				<h2 class="ftco-heading-2">Have a Questions?</h2>
				<div class="block-23 mb-3">
					<ul>
						<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
						<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
						<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
		</div>
	</div>
</div>
</footer>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
</body>
</html>