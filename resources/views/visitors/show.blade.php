<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Portfolio </title>
		<meta name="description" content="Blueprint: On Scroll Effect Layout" />
		<meta name="keywords" content="on scroll, effect, slide in, layout, template, transition, javascript" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">


		<link rel="stylesheet" href="../css/devices.min.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="../css/main.css" />
		<link rel="stylesheet" href="../css/font.css">

		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="../css/visitor/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/visitor/component.css" />

		<script src="../js/modernizr.custom.js"></script>
		<script src="../bootstrap/js/jquery.min.js"></script>
	</head>
	<body>


		<!-- =========  MODAL ============ -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		      	<img src="../img/superlogical-logo-alt.png" style=" height:20px; ">

		      </div>
		      <div class="modal-body" style="overflow: hidden">
		        <p style="float: right; width: 67%; margin-left: 3%">
		        	If you'd like to know the cost of an app like this, please provide your email address &amp; we'll send you a full breakdown and an overview
		        of how the delivery model works: from strategy through deployment.

		        	<br>
		        	<input id="txtEmail" type="text" autofocus placeholder="Please enter your email address here..."  style="margin-top: 10px; " class="form-control">


		        </p>
		        <img src="../img/piechart.png" style="float: right; width: 30%" >
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-sm btn-primary"> Send me the report </button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- ========= /MODAL ============ -->


		<div class="header-container">
            <header class="wrapper clearfix">

            	<a href="../" class="logo">SuperLogical</a>

        		<!-- START MENU  -->
        		<ul class="menu" id="headnav">
        			<li class="feat"><a href="../#">What we do</a></li>
        			<li><a href="../portfolio.html" class="active"> Our Work </a></li>
        			<li class="last"><a href="mailto:hello@superlogical.org">Contact Us</a></li>
        		</ul>


            </header>
		</div><!--/.header-container-->




		<!-- ======== 3D MOBILE ============ -->
		<link rel="stylesheet" type="text/css" href="../mobile/css/component.css" />
		<script src="../mobile/js/modernizr.custom.js"></script>
		<div class="ms-wrapper ms-effect-3">

			<script>
				setTimeout( function(){
					//alert("here");
					$( "#btnApp" ).trigger("click");

				}, 1500);
			</script>
			<button class="btn btn-default" id="btnApp"> {{$product->name}}  </button>

			<div class="ms-perspective">
				<div class="ms-device" >
					<div class="ms-object">

						<div class="ms-back"></div>
						<div class="ms-left ms-side"></div>
						<div class="ms-right ms-side"></div>
						<div class="ms-top ms-side"></div>
						<div class="ms-bottom ms-side"></div>
						<div class="ms-front" ></div>

					</div><!-- /ms-object -->
					<div class="ms-screens" >
            @if (count($product->features) > 0)
							@for ($i = 0; $i < $product->features->count(); $i++)
								<a href="#{{$product->features[$i]->name}}" style='background: url({{$product->features[$i]->image}}) no-repeat center center; transform: translateZ({{265-$i*50}}px);'>
								<div class="ms-label">{{$product->features[$i]->name}}</div></a>
							@endfor
            @endif
					</div>
				</div><!-- /ms-device -->
			</div><!-- /ms-perspective -->
		</div><!-- /ms-wrapper -->
		<script src="../mobile/js/classie.js"></script>
		<script src="../mobile/js/phoneSlideshow.js"></script>
		<!-- ======== /3D MOBILE ============ -->



		<div class="container">

      @if (count($product->features) > 0)
        <div id="cbp-so-scroller" class="cbp-so-scroller">
        @foreach ($product->features as $feature)
          @if ($feature->id%2 == 0)
    				<section id="{{$feature->name}}" class="cbp-so-section">
    					<figure class="cbp-so-side cbp-so-side-left">
								 @include('visitors.device')
    					</figure>
    					<article class="cbp-so-side cbp-so-side-right">
    						@include('visitors.article')
    						<p>
    							<button class="btn btn-default" data-toggle="modal" data-target="#myModal" >
    								Want to know the cost of an App like this
    							</button>
    						</p>
    					</article>
    				</section>
          @else
    				<section id="{{$feature->name}}" class="cbp-so-section">
    					<article class="cbp-so-side cbp-so-side-left">
    						@include('visitors.article')
    					</article>

    					<figure class="cbp-so-side cbp-so-side-right">
    						<!-- <img src={{$feature->image}} alt="img01"> -->
								@include('visitors.device')

    					</figure>

    				</section>
          @endif
        @endforeach
        </div>
      @endif
		</div>


		<style>
			@media only screen and (min-width: 320px){
				#footer{
					display: none;
				}
			}

			@media only screen and (min-width: 1400px) {
				#footer{
					display: block;
					/*display: none;*/
					width: 100%;
					height: 1100px;
					position: relative;
					background-size: cover;
					background-image: url(images/bg/desktop_footer.png);
					background-position: left bottom;
				}
				#footer iframe#frmDemo{
					width: 89%;
					margin-top: 5%;
					margin-left: 5%;
					height: 780px;
					overflow: hidden;
				}
			}
			.footer-container{
				padding-bottom: 0px;
			}


		</style>

		<div id="call-to-action">

		</div>



		<!-- START FOOTER  -->
        <div class="footer-container">
            <footer class="wrapper clearfix">

                <!-- LOGO Replace // Replace Text with your App name for SEO, text is replaced with logo.png file  -->
                <h1><a href="../" class="logofoot">Superlogical</a></h1>

                <!-- INSERT Footer Links // Insert Desired menu items  -->
                <ul>
                	<li><a href="http://twitter.com/superlogical">Twitter</a></li>
                	<li><a href="http://facebook.com">Facebook</a></li>
                	<li><a href="about.html">About</a></li>
                </ul>

            <!-- END FOOTER -->
            </footer>
        </div>


		<script src="../js/classie.js"></script>
		<script src="../js/cbpScroller.js"></script>
		<script>
			new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );


		</script>

		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script>
			$('#myModal').on('shown.bs.modal', function (e) {
				 $("#txtEmail").focus();
  			});
		</script>

		<!-- ====== Page Scroller ======== -->
		<!-- <script src="../js/jquery.pagescroller.lite.js"></script> -->
		<script>
			$(function() {
			  $('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
			  });



			});
		</script>
	</body>
</html>
