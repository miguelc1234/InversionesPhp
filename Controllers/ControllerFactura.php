<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/Factura.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllBill':

				$factura = new Factura();
		        $factura->get();

		        if(count($factura->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($factura->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Facturas') .'}';
		        }
			    
			break;

			case 'createBill':
				
		        $user_data['fecha'] = $_POST['fecha'];
		        $user_data['total'] = $_POST['total'];
		        $user_data['fechaCobro'] = $_POST['fechaCobro'];
		        $user_data['diaCobro'] = $_POST['diaCobro'];
		        $user_data['horaCobro'] = $_POST['horaCobro'];
		        $user_data['idVendedor'] = $_POST['idVendedor'];
		        $user_data['idCliente'] = $_POST['idCliente'];

		        $factura = new Factura();
		        
		        if($factura->set($user_data))
		        {
		        	echo '{"items":'. json_encode($factura->mensaje) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode($factura->mensaje) .'}';
		        }
			    
			break;

			case 'updateBill':
					
			        $user_data['idFactura'] = $_POST['idFactura'];
			        $user_data['fecha'] = $_POST['fecha'];
			        $user_data['total'] = $_POST['total'];
			        $user_data['fechaCobro'] = $_POST['fechaCobro'];
			        $user_data['diaCobro'] = $_POST['diaCobro'];
			        $user_data['horaCobro'] = $_POST['horaCobro'];
			        $user_data['idVendedor'] = $_POST['idVendedor'];
			        $user_data['idCliente'] = $_POST['idCliente'];

			        $factura = new Factura();
			        $factura->edit($user_data);

			        if(count($factura->rows) == 1)
			        {
			        	echo '{"items":'. json_encode($factura->rows[0]) .'}';
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