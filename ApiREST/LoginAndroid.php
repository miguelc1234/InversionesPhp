<?php

	header('Content-Type: aplication/json');
	require_once('../Models/users.php');

	function authUssers()
	{
		if (array_key_exists('signin_username', $_POST) && !empty($_POST['signin_username'])) 
	    { 
	        $user_data['username'] = $_POST['signin_username']; 

		    if(array_key_exists('signin_password', $_POST) && !empty($_POST['signin_password'])) 
		    { 
				$usuario = new Users();
		        $usuario->get($user_data);

		        if(count($usuario->rows) == 1)
		        {
		        	return '{"items":'. json_encode($usuario->rows[0]) .'}';
		        }

		        else
		        {
		        	return '{"items":'. json_encode('No Existe') .'}';
		        }
		    }
		    else
		    {
		    	return '{"items":'. json_encode('Faltan Datos') .'}';
		    }
		} 

		else
	    {
	    	return '{"items":'. json_encode('Faltan Datos') .'}';
	    } 
	}


	if ($GET['option'] == 'LoginUsser')
	{
		$result = authUssers();
	}

	echo $result;

?>