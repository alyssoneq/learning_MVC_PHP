<!DOCTYPE html>
<html lang = 'en'>
<head>
	<meta charset = 'UTF-8'>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'>
	<meta http-equiv='X-UA-Compatible' content='ie=edge'>
	
	<!-- adding the bootstrap to the core -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- adding the bootstrap of fontawesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<!-- For the public folder use the URLROOT constant -->
	<link  rel='stylesheet' href='<?php echo URLROOT; ?>/css/style.css'>
	<title> <?php  echo SITENAME;?>	</title>
</head>
<body>
	<!-- including the navbar -->
	<?php require APPROOT . '/views/inc/navbar.php';?>
	
	<div class='container'>