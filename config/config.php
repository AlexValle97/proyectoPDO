<?php 
	session_start();
 	spl_autoload_register(function($clase){
 		require_once 'clases/'.$clase.'.php';
 	});