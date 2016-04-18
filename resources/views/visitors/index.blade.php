<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SuperLogical | Portfolio </title>
        <meta name="description" content="">

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta content="black" name="apple-mobile-web-app-status-bar-style">

        <link rel="stylesheet" href="css/normalize.min.css">
         <link rel="stylesheet" href="css/font.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/flexslider.css">

        <!-- ========== CODROPS DIRECTIONAL AWARE GALLERY =========== -->
        <link rel="stylesheet" href="css/gallery.css">
        <noscript><link rel="stylesheet" type="text/css" href="css/gallery_noJS.css"/></noscript>
        <script src="js/gallery/modernizr.custom.97074.js"></script>

        <!-- ===== BOOTSTRAP ===== -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">


        <link rel="stylesheet" type="text/css" media="screen" href="css/sequence_slide.css" />
        <!--[if lt IE 8]><link rel="stylesheet" type="text/css" media="screen" href="css/styles-ie.css" /><![endif]-->
        <!--[if lt IE 9]><link rel="stylesheet" type="text/css" media="screen" href="css/sequence_slide.ie.css" /><![endif]-->

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
    <div id="wrap">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->




		<!-- START HEADER  -->
        <div class="header-container">
            <header class="wrapper clearfix">


                <!-- START SLIDER -->

                	<div id="header" class="internal">

                		 <!-- LOGO Replace // Replace Text with your App name for SEO, text is replaced with logo.png file  -->
                		<a href="index.html" class="logo">SuperLogical</a>

                		<!-- START MENU  -->
                		<ul class="menu" id="headnav">
                			<li class="feat"><a href="index.html">What we do</a></li>
                			<li><a class="active" href="#" > Our Work </a></li>
                			<li><a href="team.html" > Our Team </a></li>
                			<li class="last"><a href="mailto:nick@superlogic.al">Contact Us</a></li>
                		</ul>

                	</div>
                	</header>
                </div>

                <!-- END SLIDER -->









		<!-- START FEATURES  -->
        <div class="main-container internal">
            <div class="main wrapper clearfix section">
				<article>

                     <h2 id="gallery-title"> Our Work </h2>






                </article>

                <article>

					<div class="controls">

						<div class="btn-group">
							<button class="filter btn btn-default active" data-filter="all">All</button>
							<button class="filter btn btn-default" data-filter=".web"  >  	Web 	</button>
							<button class="filter btn btn-default" data-filter=".mobile"  >  	iPhone/iPad 	</button>
							<button class="filter btn btn-default" data-filter=".games" >  	Games 	</button>
							<button class="filter btn btn-default" data-filter=".strategy"  >  	Strategy 	</button>
						</div>

					</div><!--/.controls-->


                </article>

                <article>

                    <ul id="da-thumbs" class="da-thumbs">

                    	<!-- <li class="mix web mobile" data-myorder="1">
							<a href="http://swipedon.com" target="_blank">
								<img src="gallery/thumbnails/swipedon.png"  />
								<div>
									<span>
										<h2 > SwipedOn  </h2>
										#1 app on NZ App Store since Aug 2015
									</span>
								</div>
							</a>
						</li> -->
            @if (count($products) > 0)
              @foreach ($products as $product)
    						<li class="mix {{$product->category}}" data-myorder="1" data-myorder="1">
    							<a href="visitor/{{$product->id}}" target="_self">
    								<img src={{$product->image}} />
    								<div><span> <h2 > {{$product->name}} </h2> </span></div>
    							</a>
    						</li>
						  @endforeach
            @endif
					</ul>

                </article>




				<!-- END MAIN -->
            </div>

        </div>




		<!-- START FOOTER  -->
        <div class="footer-container">
            <footer class="wrapper clearfix">

                <!-- LOGO Replace // Replace Text with your App name for SEO, text is replaced with logo.png file  -->
                <h1><a href="index.html" class="logofoot">SuperLogical</a></h1>

                <!-- INSERT Footer Links // Insert Desired menu items  -->
                <ul>
                	<li><a href="http://twitter.com/superlogical">Twitter</a></li>
                	<li><a href="http://facebook.com">Facebook</a></li>
                	<li><a href="about.html">About</a></li>
                </ul>

            <!-- END FOOTER -->
            </footer>
        </div>
        </div>




		<!-- LOAD SCRIPTS -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="js/jquery.pagescroller.lite.js"></script>
        <script defer src="js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="js/sequence.jquery-min.js"></script>
		<!--	<script src="js/main.js"></script>		-->





		<!-- ========== CODROPS DIRECTIONAL AWARE GALLERY =========== -->
		<script type="text/javascript" src="js/gallery/jquery.hoverdir.js"></script>
		<script type="text/javascript">
			$(function() {

				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>




		<!-- ========== MIXITUP GALLERY FILTER MENU  =========== -->
		<script type="text/javascript" src="js/gallery/jquery.mixitup.min.js"></script>
		<script>
			$(function(){
			  $('#da-thumbs').mixItUp();
			});
		</script>




		<!-- INSERT GOOGLE ANALYTICS SNIPPET -->
        <!--
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        -->
    </body>
</html>
