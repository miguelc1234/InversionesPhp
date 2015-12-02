<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Producto extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $idCategoria;

    ################################# MÉTODOS ##################################
    # Traer datos de los productos
    public function get() 
    { 
        $this->query = "
                            SELECT idProducto, nombre, descripcion, cantidad, precioCompra, precioVenta, idCategoria
                            FROM Producto
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->execute();
            while ($this->rows[] = $result->fetchAll(PDO::FETCH_ASSOC));
            $this->close_connection();
            array_pop($this->rows);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
            echo $this->mensaje;
        }
    }

    public function getProducto($nombre) 
    { 
        $this->query = "
                            SELECT idProducto, nombre, descripcion, cantidad, precioCompra, precioVenta, idCategoria
                            FROM Producto
                            WHERE nombre = :nombre
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $result->execute();
            while ($this->rows[] = $result->fetchAll(PDO::FETCH_ASSOC));
            $this->close_connection();
            array_pop($this->rows);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
            echo $this->mensaje;
        }  

        if(count($this->rows) == 1) 
        {
            return true;
        }

        return false;
    }

    # Crear un nuevo producto
    public function set($user_data=array()) 
    {
        if(!$this->getProducto($user_data['nombre']))
        {
            $this->query = "
                                INSERT INTO Producto
                                VALUES(DEFAULT, :nombre, :descripcion, :cantidad, :precioCompra, :precioVenta, :idCategoria)
                           ";
            try
            {
                $this->open_connection();
                $operation = $this->conn->prepare($this->query);
                $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
                $operation->bindParam(':descripcion', $user_data['descripcion'], PDO::PARAM_STR);
                $operation->bindParam(':cantidad', $user_data['cantidad'], PDO::PARAM_STR);
                $operation->bindParam(':precioCompra', $user_data['precioCompra'], PDO::PARAM_STR);
                $operation->bindParam(':precioVenta', $user_data['precioVenta'], PDO::PARAM_STR);
                $operation->bindParam(':idCategoria', $user_data['idCategoria'], PDO::PARAM_INT);
                
                $operation->execute();
                $this->close_connection();
                $this->mensaje = 'Producto agregado exitosamente';
                return true;
            }

            catch(PDOException $e) 
            {
                $this->mensaje = $e->getMessage(); 
                return false;
            }
        }
        else
        {
            $this->mensaje = 'El Producto ya existe';
            return false;
        }
        
    }

    # Modificar un producto
    public function edit($user_data=array()) 
    {
        foreach ($user_data as $campo=>$valor) 
        {
            $$campo = $valor;
        }

        $this->query = "
                            UPDATE Producto
                            SET nombre = :nombre, descripcion = :descripcion, cantidad = :cantidad, precioCompra = :precioCompra, precioVenta = :precioVenta, idCategoria = :idCategoria
                            WHERE idProducto = :idProducto
                       ";

        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':idProducto', $user_data['idProducto'], PDO::PARAM_INT);
            $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
            $operation->bindParam(':descripcion', $user_data['descripcion'], PDO::PARAM_STR);
            $operation->bindParam(':cantidad', $user_data['cantidad'], PDO::PARAM_STR);
            $operation->bindParam(':precioCompra', $user_data['precioCompra'], PDO::PARAM_STR);
            $operation->bindParam(':precioVenta', $user_data['precioVenta'], PDO::PARAM_STR);
            $operation->bindParam(':idCategoria', $user_data['idCategoria'], PDO::PARAM_INT);
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Producto modificado exitosamente';
            $this->get($user_data);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
        }
    }

    # Eliminar un usuario
    public function delete($idProducto='') 
    {
        $this->query = "
                            DELETE FROM Producto
                            WHERE idProducto = :idProducto
                       ";

        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            $result->execute();
            $this->close_connection();
            $this->mensaje = 'El producto ha sido eliminado exitosamente';
            return true;
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
            return false;
        }
    }

    # Método constructor
    function __construct() 
    {
        $this->db_name = 'bdinversiones';
    }

    # Método destructor del objeto
    function __destruct() 
    {
        unset($this);
    }
}
?>
