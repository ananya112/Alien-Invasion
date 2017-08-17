<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Hover Effect Ideas | Set 1</title>
		<meta name="description" content="Hover Effect Ideas: Inspiration for subtle hover effects" />
		<meta name="keywords" content="hover effect, inspiration, grid, thumbnail, transition, subtle, web design" />
		<meta name="author" content="Codrops" />
		
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/set1.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				
			
			</div>
			<header class="codrops-header">
				<h3>What you want to be !</h3>
				<nav class="codrops-demos">
				</nav>
			</header>
			<div class="content">
				<h2>Your Role !</h2>
				<div class="grid">
					<figure class="effect-lily">
						<img src="<?php echo base_url()?>images/hacker.jpg" alt="img12"/>
						<figcaption>
							<div>
								<h2>Hac <span>Ker</span></h2>
								<p><font color='black'>Destroy The System !</font></p>
							</div>
							<a href="<?php echo base_url().'main/hacker'?>">View more</a>
						</figcaption>			
					</figure>
					<figure class="effect-lily">
						<img src="<?php echo base_url()?>images/defender.jpg" alt="img1"/>
						<figcaption>
							<div>
								<h2>Defe<span>nder</span></h2>
								<p><font color='red'>Save As Much As You Can !</font></p>
							</div>
							<a href="<?php echo base_url().'main/defender'?>">View more</a>
						</figcaption>			
					</figure>
				
			</div>
			<nav class="codrops-demos">
			</nav>
			<!-- Related demos -->
			</div><!-- /container -->
		<script>
			// For Demo purposes only (show hover effect on mobile devices)
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>
	</body>
</html>