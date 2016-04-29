<?php 

		session_start();

		//Librerias 
		include_once('../Librerias/functions/functionsPHP.php');
		

	    $user = '';
	    $psw = '';


	    if (isset($_POST['user'])) {  $user = $_POST['user']; }
	    if (isset($_POST['psw'])) {  $psw = $_POST['psw']; }




	    $us = new Usuario;
	    $us= Loggin($user , $psw);

	    


	    if(!empty($us)){

	    $_SESSION['name'] = $us->susuarion();
	    $_SESSION['id'] = $us->sid();
	    $_SESSION['estado'] = $us->sestado();
	    $_SESSION['estatus'] = $us->sestatus();
	    $_SESSION['ACTIVE'] = 1;


	    header('location:../index.php');

                	}
        else
        {


        	 header('location: ../login.php?error=22');

        }


 ?>