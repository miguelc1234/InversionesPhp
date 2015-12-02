<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/Categoria.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllCategory':

				$categoria = new Categoria();
		        $categoria->get();

		        if(count($categoria->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($categoria->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Categorias') .'}';
		        }
			    
			break;

			case 'createCategory':
								        
			        $user_data['nombre'] = $_POST['nombre'];
			        $user_data['descripcion'] = $_POST['descripcion'];

			        $categoria = new Categoria();
			        
			        if($categoria->set($user_data))
			        {
			        	echo '{"items":'. json_encode($categoria->mensaje) .'}';
			        }

			        else
			        {
			        	echo '{"items":'. json_encode($categoria->mensaje) .'}';
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