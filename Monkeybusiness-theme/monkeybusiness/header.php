<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?></title>
        <meta charset="UTF-8">
		<meta name="description" content="Op deze website kun je info vinden over Monkey Business en producten..." />
		<meta name="keywords" content="IVS, Terneuzen, Scalda" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body class="mx-auto">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                 <nav class="navbar navbar-expand-sm">
				 	<a class="navbar-brand" href="index.php">
						<span id="monkey">MONKEY</span><span id="business">BUSINESS</span>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<img src="<?php echo get_bloginfo(template_url);?>../img/hamburger.png" alt="hamburger" class="hamburger">
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
					<?php wp_nav_menu('sort_column=menu_order'); ?>
                </nav> 
            </div>
		<div class="col"></div>
        </div>
        <div class="row">
            <div class="col"> </div>
            <div class="col-12"> <img src="<?php header_image(); ?>" alt="x" class="img-fluid aap"> </div>
            <div class="col"> </div>
        </div><br>