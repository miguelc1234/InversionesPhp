<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/Venta.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllSale':

				$venta = new Venta();
		        $venta->get();

		        if(count($venta->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($venta->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Ventas') .'}';
		        }
			    
			break;

			case 'createSale':
				
		        $user_data['total'] = $_POST['total'];
		        $user_data['cantidad'] = $_POST['cantidad'];
		        $user_data['estado'] = $_POST['estado'];
		        $user_data['idFactura'] = $_POST['idFactura'];
		        $user_data['idProducto'] = $_POST['idProducto'];

		        $venta = new Venta();
		        
		        if($venta->set($user_data))
		        {
		        	echo '{"items":'. json_encode($venta->mensaje) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode($venta->mensaje) .'}';
		        }
			    
			break;

			case 'updateSale':
					
			        $user_data['idVenta'] = $_POST['idVenta'];
			        $user_data['total'] = $_POST['total'];
			        $user_data['cantidad'] = $_POST['cantidad'];
			        $user_data['estado'] = $_POST['estado'];
			        $user_data['idFactura'] = $_POST['idFactura'];
			        $user_data['idProducto'] = $_POST['idProducto'];

			        $venta = new Venta();
			        $venta->edit($user_data);

			        if(count($venta->rows) == 1)
			        {
			        	echo '{"items":'. json_encode($venta->rows[0]) .'}';
			        }

			        else
			        {
			        	echo '{"items":'. json_encode('No Existe') .'}';
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