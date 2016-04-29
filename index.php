<?php 
		

		session_start();
		//Render 

		 if($_SESSION['ACTIVE'] == '')
		 {
		 	header("location: login.php");
		 }
			
		$m = 'home';
		$s = 'index';
		$a = '';


		if(isset($_GET['m'])){ $m = $_GET['m'];}
		if(isset($_GET['s'])){ $s = $_GET['s'];}
		if(isset($_GET['a'])){ $a = $_GET['a'];}

		if($a != '')
		{
			$contenido= $m . '/' .$s.'_'.$a.'.php';

		}else
		{
			$contenido= $m . '/' .$s.'.php';
		}
		
		$sidebar = $m.'/sidebar.php';


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include_once('config/librerias.php'); ?>
</head>
<body onload="nobackbutton();">
	<?php //include_once('config/header.php'); ?>
	<div class="col-md-12">
	<?php include_once('config/menu.php'); ?>
	</div>
	<!-- 	<span><?php echo $contenido; ?></span> -->
	<div class="col-md-12" style="padding-top: 100px;">
		<div class="col-md-2 "><?php include_once($sidebar); ?></div>
		<div class="col-md-10"><?php include_once($contenido); ?></div>
	</div>

	
</body>
</html>