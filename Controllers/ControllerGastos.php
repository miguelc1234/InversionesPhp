<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/Gastos.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllSpending':

				$gasto = new Gasto();
		        $gasto->get();

		        if(count($gasto->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($gasto->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Gastos') .'}';
		        }
			    
			break;

			case 'createSpending':
				
		        $user_data['valor'] = $_POST['valor'];
		        $user_data['fecha'] = $_POST['fecha'];
		        $user_data['descripcion'] = $_POST['descripcion'];
		        $user_data['idUsuario'] = $_POST['idUsuario'];
		        $user_data['idTipoGasto'] = $_POST['idTipoGasto'];

		        $gasto = new Gasto();
		        
		        if($gasto->set($user_data))
		        {
		        	echo '{"items":'. json_encode($gasto->mensaje) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode($gasto->mensaje) .'}';
		        }
			    
			break;

			case 'getAllDate':

				$user_data['fechaUno'] = $_POST['fechaUno'];
		        $user_data['fechaDos'] = $_POST['fechaDos'];

				$gasto = new Gasto();
		        $gasto->getDate($user_data);

		        if(count($gasto->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($gasto->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Gastos') .'}';
		        }
			    
			break;
		}
	}
}

else
{
	echo '{"items":'. json_encode('Tipo de Conexión Invalida') .'}';
}

?>