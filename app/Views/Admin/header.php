<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dash</title>
	 <link rel="stylesheet" href="<?= base_url('css/body_home_sm.css');?>">
       
	<style> 
	


	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/admin.css');?>">
</head>
<body>
	<div class="empity"></div>
	<div class="champ-logo">
		<img src="<?=base_url('image/fs.jpg');?>" alt="logo" class="logo-fs">
		<p class="name-fs">Faculté des sciences</p>
	</div>
	<div class="search1">
		<form method="get">
			<input type="search" name="" placeholder="Rechercher" id="sb" style="color:darkgrey;">
			 <button type="submit" style="background-color: transparent; border: none; width: 30px; height: 30px;">
			 	<span style=" color: #1E90FF; width: 29px; height:  29px; font-size: 21px;"><i class="fa-solid fa-magnifying-glass"></i></span>
			 </button>
		</form>
	</div>

		
	<header class="hd">
		
		<div class="champ-slogan"><h3 class="slogan-fs" style="">Connaissance - excellence - rigueure	 </h3></div>
		<div class="flex1">
			<div class="champ-admin"><img src="<?=base_url('image/amin.png');?>" alt="Admin" class="img-admin"></div>
			<div class="champ-welc"><p class="name-admin"><span style="color:fuchsia;">Welcome!!!</span><br> <b ><?php echo $user;?>	</b></p></div>
		</div>
	</header>	
	<div class="empity2"></div>
