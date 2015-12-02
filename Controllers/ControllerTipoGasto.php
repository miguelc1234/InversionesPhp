<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/TipoGasto.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllType':

				$tipo = new TipoGasto();
		        $tipo->get();

		        if(count($tipo->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($tipo->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Tipo Gasto') .'}';
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