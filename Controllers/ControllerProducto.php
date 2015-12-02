<?php
# Importar modelo de abstracción de base de datos
header('Content-Type: aplication/json');
require_once('../Models/Producto.php');

$user_data = array();

if($_POST) 
{
//echo json_encode("cedula: ". $_POST["cedula"]. ", password: ". $_POST["password"]);

	if (array_key_exists('option', $_POST))
	{
		switch ($_POST['option']) 
		{
			case 'getAllProduct':

				$producto = new Producto();
		        $producto->get();

		        if(count($producto->rows) >= 1)
		        {
		        	echo '{"items":'. json_encode($producto->rows) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode('No Existen Categorias') .'}';
		        }
			    
			break;

			case 'createProducto':
				
		        $user_data['nombre'] = $_POST['nombre'];
		        $user_data['descripcion'] = $_POST['descripcion'];
		        $user_data['cantidad'] = $_POST['cantidad'];
		        $user_data['precioCompra'] = $_POST['precioCompra'];
		        $user_data['precioVenta'] = $_POST['precioVenta'];
		        $user_data['idCategoria'] = $_POST['idCategoria'];

		        $producto = new Producto();
		        
		        if($producto->set($user_data))
		        {
		        	echo '{"items":'. json_encode($producto->mensaje) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode($producto->mensaje) .'}';
		        }
			    
			break;

			case 'deleteProduct':
					
		        $producto_id = $_POST['idProducto'];
		        $producto = new Producto();
		        
		        if($producto->delete($producto_id))
		        {
		        	echo '{"items":'. json_encode($producto->mensaje) .'}';
		        }

		        else
		        {
		        	echo '{"items":'. json_encode($producto->mensaje) .'}';
		        }
				    
			break;

			case 'updateProduct':
					
			        $user_data['idProducto'] = $_POST['idProducto'];
			        $user_data['nombre'] = $_POST['nombre'];
			        $user_data['descripcion'] = $_POST['descripcion'];
			        $user_data['cantidad'] = $_POST['cantidad'];
			        $user_data['precioCompra'] = $_POST['precioCompra'];
			        $user_data['precioVenta'] = $_POST['precioVenta'];
			        $user_data['idCategoria'] = $_POST['idCategoria'];


			        $producto = new Producto();
			        $producto->edit($user_data);

			        if(count($producto->rows) == 1)
			        {
			        	echo '{"items":'. json_encode($producto->rows[0]) .'}';
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