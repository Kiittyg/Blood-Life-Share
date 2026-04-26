

<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Page principale')</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>


<body>
<div id="notifications">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Contenu spécifique à chaque vue -->
    @yield('content')

    <!-- Scripts spécifiques à chaque vue -->
    @yield('scripts')

  <div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->
    

<!--header top-->
<div class="header-top">
      <div class="container clearfix">
            <div class="top-left">
                  <h6></h6>
            </div>


            <div class="top-right">
                  <ul class="social-links">

                        <!--li>
                              <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                              </a>
                        </li>
                        
                        <li>
                              <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                        </li>
                  </ul>
                  <li>
                              <a href="#">
                              <i class="fa fa-phone" aria-hidden="true"></i>

                              </a>
                        </li>
                  <li>
                              <a href="#">
                              <i class="fa fa-envelope-o" aria-hidden="true"></i>
                              </a>
                        </li-->
                  <li>
                              <a href="{{ route('register') }}">
                              <i class="fa fa-lock" aria-hidden="true"></i>
                              </a>

                        </li>
                        <li>
                        <a href="{{ route('notifications.index') }}" class="notification-link">
    <i class="fa fa-bell" aria-hidden="true"></i>
    @if(isset($notifications) && $notifications->count() > 0)
        <span class="badge">{{ $notifications->count() }}</span>
    @endif
</a>
                        <li>
    <a href="{{ session('newly_registered') ? route('user.show', ['id' => session('user')->id]) : route('current.show') }}">
    <i class="fa fa-user" aria-hidden="true"></i>
    </a>
</li>

       
                        
            </div>
      </div>
</di--->
<!--header top-->

<!--Header Upper-->
<section class="header-uper">

      <div class="container clearfix">
            <div class="logo">
                  <figure>
                        <a href="">
                              <img src="images/sang.avif" alt="" width='105px'>
                        </a> 
                  </figure>
                  <figure>
    <a href="">
        <img src="images/Capture.png" alt="" width="200px">
    </a>
</figure>
            </div>
            
            <div class="right-side">
                  <ul class="contact-info">
                  
                        <li class="item">
                              <div class="">
                                    <i class=""></i>
                              </div>
                              <strong></strong>
                              <br>
                              <a href="#">
                                    <span></span>
                              </a>
                        </li>
                        <li class="item">
                              <div class="">
                                    <i class=""></i>
                              </div>
                              <strong></strong>
                              <br>
                              <span></span>
                        </li>
                  </ul>
                  
                  <!--div class="link-btn">
                        <a href="#" class="btn-style-one">Appoinment</a-->
                  </div>
            </div>
      </div>
</section>
<!--Header Upper-->



<!--Main Header-->
<nav class="navbar navbar-default">
      <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                        <li class="active">
                              <a href="{{ route('ajout.demandedon') }}">Faire une demande de don</a>
                        </li>
                        <li class="active">
                              <a href="{{ route('demandedon.index') }}">Les demandes</a>
                        </li>
                        <li class="active">
    @php
        $user = session('user');
        $user_type = session('user_type');
    @endphp
    
    @if ($user_type == 'donneur')
        <a href="{{ route('lignedemande.index') }}">Mes demandes</a>
    @elseif ($user_type == 'responsable')
        <a href="{{ route('lignedemandedon.index') }}">Mes demandes</a>
    @else
        <a href="#">Mes demandes</a> {{-- Vous pouvez ajuster cela pour les autres types d'utilisateurs ou les visiteurs --}}
    @endif
</li>

                        <li class="active">
                              <a href="{{ route('lignerv.index') }}">Mes Rendez-Vous</a>
                        </li>
                        <li class="active">
                              <a href="{{ route('stock.index') }}">Stock de Sang</a>
                        </li>
                        <li class="active">
                              <a href="{{ route('actualites') }}">Histoire de don</a>
                        </li>
                        <li class="active">
                              <a href="{{ route('enregistrer.don') }}">Dons</a>
                        </li>
                        <!--li>
                              <a href="team.html">Notifications</a>
                        </li-->
                        
                        
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                                    <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">
                                    <li>
                                          <a href="#">Action</a>
                                    </li>
                                    <li>
                                          <a href="#">Another action</a>
                                    </li>
                                    <li>
                                          <a href="#">Something else here</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                          <a href="#">Separated link</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                          <a href="#">One more separated link</a>
                                    </li>
                              </ul>
                        </li> -->
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
<!--End Main Header -->

<!--=================================
=            Page Slider            =
==================================-->
<div class="hero-slider">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url(images/about/ucad.jpeg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-center">
                        <h2 class="text-white text-bold mb-2">Le don de sang est un cadeau que chacun peut donner pour sauver des vies.</h2>
                        <p class="tag-text mb-5"></p>
                        <!--a href="#" class="btn btn-main btn-white">explore</a-->
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Item -->
    <div class="slider-item" style="background-image:url(images/about/poche.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start-->
                    <div class="content style text-right">
                        <h2 class="text-white"> <br>Donner du sang, c'est donner de l'espoir</h2>
                        <p class="tag-text"></p>
                        <!--a href="#" class="btn btn-main btn-white">about us</a-->
                    </div>
                    <!-- Slide Content End-->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Item -->
    <div class="slider-item" style="background-image:url(images/about/tube.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content text-center style">
                        <h2 class="text-white text-bold mb-2">Le don de sang est un geste de vie, un geste d'amour </h2>
                        <p class="tag-text mb-5">
                            <br></p>
                        <!--a href="shop.html" class="btn btn-main btn-white">shop now</a-->
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--====  End of Page Slider  ====-->

<!--section class="cta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-block">
                    <div class="emmergency item">
                        <i class="fa fa-phone"></i>
                        <h2>Emegency Cases</h2>
                        <a href="#">1-800-700-6200</a>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="top-doctor item">
                        <i class="fa fa-stethoscope"></i>
                        <h2>24 Hour Service</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore dignissimos officia dicta suscipit vel eum</p>
                        <a href="#" class="btn btn-main">Read more</a>
                    </div>
                    <div class="working-time item">
                        <i class="fa fa-hourglass-o"></i>
                        <h2>Working Hours</h2>
                        <ul class="w-hours">
                            <li>Mon - Fri  - <span>8:00 - 17:00</span></li>
                            <li>Mon - Fri  - <span>8:00 - 17:00</span></li>
                            <li>Mon - Fri  - <span>8:00 - 17:00</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-->

<!--about section-->
<section class="feature-section section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="image-content">
					<div class="section-title text-center">
						<h3>Fonctionnalités
							<span></span>
						</h3>
						<p></p>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="item">
								<div class="icon-box">
									<figure>
										<a href="#">
											<img src="images/resource/don.avif" alt="" width="90px">
										</a>
									</figure>
								</div>
								<h6>Demande de Don</h6>
								<p>Les demandes de don à travers notre application se déroulent de manière simple et efficace. Les utilisateurs peuvent créer une demande en précisant leurs besoins spécifiques, 
                                    tels que le nombre de donneurs  et le lieu. Une fois la demande publiée, 
                                    les utilisateurs peuvent recevoir des propositions de donateurs potentiels intéressés à offrir leur aide. </p>
							</div>
</div>
                     
					


						<div class="col-sm-6">
							<div class="item">
								<div class="icon-box">
									<figure>
										<a href="#">
											<img src="images/resource/2.jpg" alt="" width="80px">
										</a>
									</figure>
								</div>
								<h6>Rendez-Vous</h6>
								<p>Notre application simplifie la planification des rendez-vous pour les dons. Après avoir créé une demande en précisant leurs besoins comme le nombre de donneurs et le lieu, les utilisateurs peuvent prendre directement rendez-vous avec les donateurs intéressés. 
                                    Cela permet une distribution rapide des dons en répondant efficacement aux besoins de la communauté.</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="item">
								<div class="icon-box">
									<figure>
										<a href="#">
											<img src="images/resource/i.jpg" alt="" width="80px">
										</a>
									</figure>
								</div>
								<h6>Stock de Sang</h6>
								<p>Notre application offre une gestion efficace du suivi de stock pour les dons. Les utilisateurs peuvent surveiller en temps réel les niveaux de stock disponibles et les besoins actuels. Cela permet de garantir une disponibilité constante des ressources nécessaires et de répondre rapidement aux demandes de la communauté, assurant ainsi une gestion optimale des dons et une satisfaction continue des bénéficiaires..</p>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="item">
								<div class="icon-box">
									<figure>
										<a href="#">
											<img src="images/resource/a.png" alt="" width="80px">
										</a>
									</figure>
								</div>
								<h6>Notifications et Alertes</h6>
								<p>Notre application utilise un système de notifications et d'alertes pour tenir les utilisateurs informés en temps réel.
                                     Vous recevrez des notifications pour les nouvelles demandes de don, vous permettant de répondre rapidement aux besoins urgents de la communauté. De plus, vous serez notifié dès qu'un rendez-vous est confirmé, assurant une coordination efficace entre les donneurs et les bénéficiaires.</p> 
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End about section-->

<!--Start about us area-->
<section class="service-tab-section section">
    <div class="outer-box clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <div class="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#dormitory"  data-toggle="tab">A+</a>
                            </li>
                            <li role="presentation">
                                <a href="#orthopedic" data-toggle="tab">A-</a>
                            </li>
                            <li role="presentation">
                                <a href="#sonogram" data-toggle="tab">B+</a>
                            </li>
                            <li role="presentation">
                                <a href="#x-ray" data-toggle="tab">B-</a>
                            </li>
                            <li role="presentation">
                                <a href="#diagnostic" data-toggle="tab">AB+</a>
                            </li>
                            <li role="presentation">
                                <a href="#abmoins" data-toggle="tab">AB-</a>
                            </li>
                            <li role="presentation">
                                <a href="#o" data-toggle="tab">O+</a>
                            </li>
                            <li role="presentation">
                                <a href="#o-" data-toggle="tab">O-</a>
                            </li>
                        </ul>
                    </div>
                    <!--Start single tab content-->
                    
                    <div class="tab-content">
                        <div class="service-box tab-pane fade in active row" id="dormitory">
                        
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/g.avif" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>A+</h3>
                                    </div>
                                    <div class="text">
                                     <p>   -Antigène sur les globules rouges : Antigène A
                                        <br>
                                        -Rhésus : Positif (+)
                                        <br>
                                        -Donneur universel pour les groupes : A+, AB+
                                        <br>
                                        -Receveur des groupes : A+, A-, O+, O-
                                        </p>
                                       
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <!--End single tab content-->
                        <!--Start single tab content-->
                        <div class="service-box tab-pane fade in" id="orthopedic">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/anegatif.avif" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>A-</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Antigène A
                                            <br>
 -Rhésus : Négatif (-)
 <br>
-Donneur universel pour les groupes : A-, O-
<br>
-Receveur des groupes : A-, O-</p>
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <!--End single tab content-->
                        <!--Start single tab content-->
                        <div class="service-box tab-pane fade in" id="sonogram">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/bplus.jpg" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>B+</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Antigène B
                                            <br>
-Rhésus : Positif (+)
<br>
-Donneur universel pour les groupes : B+, AB+
<br>
-Receveur des groupes : B+, B-, O+, O-</p>
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <!--End single tab content-->
                        <!--Start single tab content-->
                        <div class="service-box tab-pane fade in" id="x-ray">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/bnegatif.avif" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>B-</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Antigène B
                                            <br>
-Rhésus : Négatif (-)
<br>
-Donneur universel pour les groupes : B-, O-
<br>
-Receveur des groupes : B-, O-</p>
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <!--End single tab content-->
                        <!--Start single tab content-->
                        <div class="service-box tab-pane fade in" id="diagnostic">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/ab.jpg" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>AB+</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Antigènes A et B
                                            <br>
                                  -Rhésus : Positif (+)
                                       <br>
                        -Donneur universel pour les groupes : AB+
                                           <br>
                         -Receveur des groupes : A+, A-, B+, B-, AB+, AB-, O+, O-</p>
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <!--End single tab content-->
                        <!--Start single tab content-->
                        <div class="service-box tab-pane fade in" id="abmoins">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/abplus.jpg" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>AB-</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Antigènes A et B
                                            <br>
-Rhésus : Négatif (-)
<br>
-Donneur universel pour les groupes : AB-, O-
<br>
Receveur des groupes : A-, B-, AB-, O-</p>
                                    </div>
                                    <!--ul class="content-list">
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Whitening is among the most popular dental</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                        <li>
                                            <i class="fa fa-dot-circle-o"></i>Teeth cleaning is part of oral hygiene and involves</li>
                                    </ul>
                                    <a href="#" class="btn btn-style-one">Read more</a-->
                                </div>
                            </div>
                        </div>
                        <div class="service-box tab-pane fade in" id="o">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/oplus.avif" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>O+</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Aucun antigène (O)
                                            <br>
-Rhésus : Positif (+)
<br>
-Donneur universel pour les groupes : O+, A+, B+, AB+
<br>
-Receveur des groupes : O+, O</p>
                                    </div>
                        <!--End single tab content-->
                    </div>
                </div>
            </div>
            <div class="service-box tab-pane fade in" id="o-">
                            <div class="col-md-6">
                                <img class="img-responsive" src="images/services/omoins.jpg" alt="service-image">
                            </div>
                            <div class="col-md-6">
                                <div class="contents">
                                    <div class="section-title">
                                        <h3>O-</h3>
                                    </div>
                                    <div class="text">
                                        <p>-Antigène sur les globules rouges : Aucun antigène (O)

                                                <br>                                        
                                          -Rhésus : Négatif (-)
                                            <br>
                           -Donneur universel pour les groupes : O-
                                   <br>
                    -Receveur des groupes : O-</p>
                                    </div>
        </div>
    </div>
</section>
<!--End about us area-->

<!--Service Section-->
<!--section class="service-section bg-gray section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Provided
                <span>Services</span>
            </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. qui suscipit atque <br>
                fugiat officia corporis rerum eaque neque totam animi, sapiente culpa. Architecto!</p>
        </div>
        <div class="row items-container clearfix">
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/1.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Dormitory</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/2.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Germs Protection</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/3.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Psycology</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/1.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Dormitory</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/2.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Germs Protection</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a href="service.html">
                            <img src="images/gallery/3.jpg" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <span>Better Service At Low Cost</span>
                        <a href="service.html">
                            <h6>Psycology</h6>
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vero.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-->
<!--End Service Section-->

<!--team section-->
<section class="team-section section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Dons
                <span></span>
            </h3>
            <p></p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/t.jpg" alt="doctor" class="img-responsive" width="100px">
                    <div class="contents text-center">
                        <h4>Plasma</h4>
                        <p></p>
                        <!--a href="#" class="btn btn-main">read more</a-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/d.jpg" alt="doctor" class="img-responsive">
                    <div class="contents text-center">
                        <h4>Sang</h4>
                        <p></p>
                        <!--a href="#" class="btn btn-main">read more</a-->
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-member">
                    <img src="images/team/p.jpg" alt="doctor" class="img-responsive">
                    <div class="contents text-center">
                        <h4>Plaquettes</h4>
                        <p></p>
                        <!--a href="#" class="btn btn-main">read more</a-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End team section-->

<!--testimonial-section-->
<!--section class="testimonial-section" style="background: url(images/testimonials/1.jpg);">
    <div class="container">
        <div class="section-title text-center">
            <h3>What Our
                <span>Patients Says</span>
            </h3>
        </div>
        <div class="testimonial-carousel">
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/1.png" alt="">
                        </figure>
                    </div>
                    <h6>Adam Rose</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/2.png" alt="">
                        </figure>
                    </div>
                    <h6>David Warner</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/3.png" alt="">
                        </figure>
                    </div>
                    <h6>Amy Adams</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/1.png" alt="">
                        </figure>
                    </div>
                    <h6>Adam Rose</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/2.png" alt="">
                        </figure>
                    </div>
                    <h6>David Warner</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/3.png" alt="">
                        </figure>
                    </div>
                    <h6>Amy Adams</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/1.png" alt="">
                        </figure>
                    </div>
                    <h6>Adam Rose</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/2.png" alt="">
                        </figure>
                    </div>
                    <h6>David Warner</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
            <Slide Item>
            <div class="slide-item">
                <div class="inner-box text-center">
                    <div class="image-box">
                        <figure>
                            <img src="images/testimonials/3.png" alt="">
                        </figure>
                    </div>
                    <h6>Amy Adams</h6>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia consectetur, dolor sit amet, consectetur, numquam Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, at?</p>
                </div>
            </div>
        </div>
    </div>
</section-->
<!--End testimonial-section-->

<!-- Contact Section -->
<section class="appoinment-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="accordion-section">
    <div class="section-title">
        <h3>FAQ</h3>
    </div>
    <div class="accordion-holder">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Quels sont les critères pour devenir donneur de sang ?
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                    Pour devenir donneur de sang, les critères d'éligibilité généraux incluent :

<strong>Âge</strong> : Habituellement, les donneurs doivent être âgés d'au moins 18 ans. Certains pays peuvent permettre aux personnes de 16 ou 17 ans de donner leur sang avec le consentement des parents ou tuteurs légaux.
<br>
<strong>Poids</strong> : Le poids minimum exigé peut varier, souvent autour de 50 kg, pour assurer que le donneur peut donner en toute sécurité une quantité appropriée de sang.
<br>
<strong>Santé Génerale</strong> : Les donneurs doivent être en bonne santé au moment du don. Cela signifie qu'ils ne doivent pas avoir de symptômes de maladies infectieuses ou de maladies graves.
<br>
<strong>Conditions Médicales</strong> : Certaines conditions médicales, telles que les maladies cardiaques, le diabète non contrôlé, les infections actives, ou les antécédents de certains cancers, peuvent disqualifier un individu du don de sang.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Quels sont les types de don de sang acceptés ?
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                    Il existe plusieurs types de dons de sang qui sont généralement acceptés pour répondre aux besoins variés des patients :
<br>
<strong>Don de Sang Total</strong> : C'est le type de don le plus courant, où une unité de sang entier est prélevée. Ce sang est ensuite séparé en composants comme les globules rouges, le plasma et les plaquettes, qui peuvent être utilisés individuellement pour différents traitements médicaux.
<br>
<strong>Don de Plasma</strong> : Le plasma est la partie liquide du sang qui contient des protéines, des anticorps et d'autres substances importantes. Les dons de plasma sont souvent utilisés pour traiter les brûlures, les troubles de la coagulation et d'autres conditions médicales spécifiques.
<br>
<strong>Don de Plaquettes</strong> : Les plaquettes sont des cellules sanguines essentielles à la coagulation. Les dons de plaquettes sont fréquemment utilisés pour les patients atteints de cancers, de troubles de la coagulation ou de greffes d'organes.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            Comment puis-je faire un don de sang via l'application ?
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                    Pour faire un don de sang via notre application, voici comment cela fonctionne :
<br>
<strong>Postuler pour une Demande</strong> : Explorez les demandes de don de sang disponibles sur l'application et postulez pour celles qui correspondent à vos disponibilités et à vos capacités de don.
<br>
<strong>Sélectionner un Rendez-vous</strong> : Après avoir postulé pour une demande, sélectionnez un créneau horaire disponible qui vous convient pour faire votre don de sang. Vous pouvez le faire directement à travers l'application.
<br>
<strong>Rappels de Rendez-vous</strong> : Vous recevrez des notifications de rappel pour votre rendez-vous de don de sang. Ces notifications vous aideront à vous rappeler de l'heure et du lieu de votre rendez-vous afin que vous puissiez vous y rendre à temps.
<br>
<strong>Don de Sang</strong> : Rendez-vous au centre de don à l'heure convenue. Présentez-vous avec une pièce d'identité valide et suivez les instructions du personnel pour effectuer votre don de sang en toute sécurité.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-area">
    <div class="section-title">
        <h3>Nous 
            <span>Contactez</span>
        </h3>
    </div>
    <form name="contact_form" class="default-form contact-form" action="sendmail.php" method="post">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="text" name="Name" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="Email" placeholder="Email" required="">
                </div>
                <!--div class="form-group">
                    <select name="subject">
                        <option>Departments</option>
                        <option>Diagnostic</option>
                        <option>Psychological</option>
                    </select>
                </div-->
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="text" name="Phone" placeholder="Phone" required="">
                </div>
                <!--div class="form-group">
                    <input type="text" name="Date" placeholder="Date" required="" id="datepicker">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div-->
                <!--div class="form-group">
                    <select name="subject">
                        <option>Doctor</option>
                        <option>Diagnostic</option>
                        <option>Psychological</option>
                    </select>
                </div-->
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <textarea name="form_message" placeholder="Your Message" required=""></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn-style-one">Envoyer</button>
                </div>
            </div>
        </div>
    </form>
</div>                        
            </div>
        </div>                    
    </div>
</section>
<!-- End Contact Section -->

<!--footer-main-->
<footer class="footer-main">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="about-widget">
            <div class="footer-logo">
              <figure>
                <a href="index.html">
                  <img src="images/Capture.png" alt="" width="150px">
                </a>
              </figure>
            </div>
            <p>Donner du sang = Sauver des vies</p>
            <ul class="location-link">
              <li class="item">
                <i class="fa fa-map-marker"></i>
                <p>Dakar,Parcelles Assainies</p>
              </li>
              <li class="item">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <a href="#">
                  <p>Bloodlifeshare@gmail.com</p>
                </a>
              </li>
              <li class="item">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p>338352909</p>
              </li>
            </ul>
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h6>Services</h6>
          <ul class="menu-link">
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Demande Don</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Rendez-Vous</a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-angle-right" aria-hidden="true"></i>Stock</a>
            </li>
          
        </div>
        
        <!--div class="col-md-4 col-sm-6 col-xs-12">
          <div class="social-links">
            <h6>Recent Posts</h6>
            <ul>
              <li class="item">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="images/blog/post-thumb-small.jpg" alt="post-thumb">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#">Post Title</a></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem.</p>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="images/blog/post-thumb-small.jpg" alt="post-thumb">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">
                      <a href="#">Post Title</a>
                    </h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, dolorem.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div-->
  <!--div class="footer-bottom">
    <div class="container clearfix">
      <div class="copyright-text">
        <p>&copy; Copyright 2018. All Rights Reserved by
          <a href="index.html">Medic</a>
        </p>
      </div>
      <ul class="footer-bottom-link">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="about.html">About</a>
        </li>
        <li>
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</footer-->
<!--End footer-main-->

</div>
<!--End pagewrapper-->

<div class="copyright-text">
        <p>&copy; Copyright 2024. All Rights Reserved by
          <a href="index.html">BloodLife Share</a>
        </p>
      </div>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>

<script src="plugins/jquery.js"></script>
<script src="plugins/bootstrap.min.js"></script>
<script src="plugins/bootstrap-select.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- FancyBox -->
<script src="plugins/fancybox/jquery.fancybox.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>

<script src="plugins/validate.js"></script>
<script src="plugins/wow.js"></script>
<script src="plugins/jquery-ui.js"></script>
<script src="plugins/timePicker.js"></script>
<script src="js/script.js"></script>
<!--script>
    // Vérifie si l'utilisateur est connecté après le chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifie si la div contenant les détails de l'utilisateur est présente
        var userDetails = document.getElementById('user-details');
        if (userDetails) {
            // Faire une requête AJAX pour récupérer les détails de l'utilisateur actuel
            fetch('/user-details') // Remplacez par l'URL appropriée pour récupérer les détails de l'utilisateur
                .then(response => response.json())
                .then(data => {
                    // Mettre à jour les détails de l'utilisateur dans la div
                    userDetails.innerHTML = `
                        Utilisateur connecté : ${data.nom}
                        <br>
                        Email : ${data.email}
                    `;
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des détails de l\'utilisateur :', error);
                });
        }
    });
</script-->
</body>

</html>

