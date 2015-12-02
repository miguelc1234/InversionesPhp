<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Venta extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idVenta;
    private $total;
    private $cantidad;
    private $estado;
    private $idFactura;
    private $idProducto;

    ################################# MÉTODOS ##################################
    # Traer datos de los productos
    public function get() 
    { 
        $this->query = "
                            SELECT idVenta, total, cantidad, estado, idFactura, idProducto
                            FROM Venta
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

    # Crear un nuevo producto
    public function set($user_data=array()) 
    {     
        $this->query = "
                            INSERT INTO Venta
                            VALUES(DEFAULT, :total, :cantidad, :estado, :idFactura, :idProducto)
                       ";
        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':total', $user_data['total'], PDO::PARAM_STR);
            $operation->bindParam(':cantidad', $user_data['cantidad'], PDO::PARAM_STR);
            $operation->bindParam(':estado', $user_data['estado'], PDO::PARAM_STR);
            $operation->bindParam(':idFactura', $user_data['idFactura'], PDO::PARAM_INT);
            $operation->bindParam(':idProducto', $user_data['idProducto'], PDO::PARAM_INT);
            
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Venta agregada exitosamente';
            return true;
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
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
                            UPDATE Venta
                            SET total = :total, cantidad = :cantidad, estado = :estado, idFactura = :idFactura, idProducto = :idProducto
                            WHERE idVenta = :idVenta
                       ";

        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':idVenta', $user_data['idVenta'], PDO::PARAM_INT);
            $operation->bindParam(':total', $user_data['total'], PDO::PARAM_STR);
            $operation->bindParam(':cantidad', $user_data['cantidad'], PDO::PARAM_STR);
            $operation->bindParam(':estado', $user_data['estado'], PDO::PARAM_STR);
            $operation->bindParam(':idFactura', $user_data['idFactura'], PDO::PARAM_INT);
            $operation->bindParam(':idProducto', $user_data['idProducto'], PDO::PARAM_INT);
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Venta modificada exitosamente';
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
