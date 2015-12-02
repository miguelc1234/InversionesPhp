<?php
	require_once('../Models/Login.php');
	
	session_save_path('/home/users/web/b1509/ipg.aprendicesrisaraldac/egresados/cgi-bin/tmp');
	session_start();

	$user_data = array();

	if ($_POST) 
	{
	    if (array_key_exists('operacion', $_POST)) 
	    { 
	       $op = $_POST['operacion'];

	       switch ($op)
	       {
	       	    case 'autenticar':
		       		$login = new Login();
		       		$login->get($_POST['usuario'], $_POST['clave']);

		       		if ($login->mensaje == 'Usuario encontrado')
		       		{
		       			
		       			$_SESSION['usuarioLog']=$_POST['usuario'];
		       			$_SESSION['login']="true";

		       			echo '{"items":'. json_encode($login->getArray()) .'}';
		       		}

		       		else
		       		{
		       			echo '{"items":""}';
		       		}

		       		break;

		       	default:
            			echo '{"items":""}';
     	      }
	    }
	    
	}

?>