<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Factura extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idFactura;
    private $fecha;
    private $total;
    private $fechaCobro;
    private $diaCobro;
    private $horaCobro;
    private $idVendedor;
    private $idCliente;

    ################################# MÉTODOS ##################################
    # Traer datos de los productos
    public function get() 
    { 
        $this->query = "
                            SELECT idFactura, fecha, total, fechaCobro, diaCobro, horaCobro, idVendedor, idCliente
                            FROM Factura
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
                            INSERT INTO Factura
                            VALUES(DEFAULT, :fecha, :total, :fechaCobro, :diaCobro, :horaCobro, :idVendedor, :idCliente)
                       ";
        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':fecha', $user_data['fecha'], PDO::PARAM_STR);
            $operation->bindParam(':total', $user_data['total'], PDO::PARAM_STR);
            $operation->bindParam(':fechaCobro', $user_data['fechaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':diaCobro', $user_data['diaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':horaCobro', $user_data['horaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':idVendedor', $user_data['idVendedor'], PDO::PARAM_INT);
            $operation->bindParam(':idCliente', $user_data['idCliente'], PDO::PARAM_INT);
            
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Factura agregada exitosamente';
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
                            UPDATE Factura
                            SET fecha = :fecha, total = :total, fechaCobro = :fechaCobro, diaCobro = :diaCobro, horaCobro = :horaCobro, idVendedor = :idVendedor, idCliente = :idCliente
                            WHERE idFactura = :idFactura
                       ";

        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':idFactura', $user_data['idFactura'], PDO::PARAM_INT);
            $operation->bindParam(':fecha', $user_data['fecha'], PDO::PARAM_STR);
            $operation->bindParam(':total', $user_data['total'], PDO::PARAM_STR);
            $operation->bindParam(':fechaCobro', $user_data['fechaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':diaCobro', $user_data['diaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':horaCobro', $user_data['horaCobro'], PDO::PARAM_STR);
            $operation->bindParam(':idVendedor', $user_data['idVendedor'], PDO::PARAM_INT);
            $operation->bindParam(':idCliente', $user_data['idCliente'], PDO::PARAM_INT);
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Factura modificada exitosamente';
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
