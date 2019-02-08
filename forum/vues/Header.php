<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<title>PR3_TP2</title>
		<meta name="description" content="PR3_TP2">
		<meta name="entete" content="">

		<!-- Mobile viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon">

		<!-- CSS-->
		<!-- Polices Google -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style-base.css">

		<!-- fin CSS-->
		<script src="js/login.js"></script>
	</head>

	<body id="home">
		<!-- ENTETE -->
		<header class="conteneur clearfix">
		       
			<div id="banner">        
				<div id="logo"><a href="index.php"><img src="images/xingqiu.png" alt="logo"></a></div> 
			</div>
			<div><h1>Forum</h1></div>
			<!-- navigation -->
			<nav id="topnav" role="navigation">
				<div class="menu-toggle">Menu</div>  
					<ul class="srt-menu" id="menu-principale-navigation">
						<li ><a href="index.php?&">Accueil</a></li>
						<li id='blog'><a href="index.php?&action=FormSujet">Nouveau Sujet</a></li>
						<li id='register' ><a href="index.php?&action=FormRegister">Registre</a></li>
						<li id='login' class=""><a href="index.php?&action=FormLogin">Login</a> </li>
						<li id='logout'><a href="index.php?&action=Logout">Logout</a></li>
						<li id='bienvenu'>
<?php
	if(isset($_SESSION["UserID"]))
            {
                $UserID=$_SESSION["UserID"] ;
            }
            else
            {
                 $UserID="Bienvenu";
            }
			echo $UserID;

?>
						</li>
						<li><input type="hidden" name="UserID"  id="UserID" value="<?php echo ($UserID=="Bienvenue"? "Bienven": $UserID); ?>"></li>
					</ul>  

		  
			</nav><!-- fin  navigation -->
  
		</header><!-- fin entête -->
 
