<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Gasto extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idGasto;
    private $valor;
    private $fecha;
    private $descripcion;
    private $idUsuario;
    private $idTipoGasto;

    ################################# MÉTODOS ##################################
    # Traer datos de los productos
    public function get() 
    { 
        $this->query = "
                            SELECT idGasto, valor, fecha, descripcion, idUsuario, idTipoGasto
                            FROM Gasto
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
                            INSERT INTO Gasto
                            VALUES(DEFAULT, :valor, :fecha, :descripcion, :idUsuario, :idTipoGasto)
                       ";
        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':valor', $user_data['valor'], PDO::PARAM_STR);
            $operation->bindParam(':fecha', $user_data['fecha'], PDO::PARAM_STR);
            $operation->bindParam(':descripcion', $user_data['descripcion'], PDO::PARAM_STR);
            $operation->bindParam(':idUsuario', $user_data['idUsuario'], PDO::PARAM_INT);
            $operation->bindParam(':idTipoGasto', $user_data['idTipoGasto'], PDO::PARAM_INT);
            
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Gasto agregado exitosamente';
            return true;
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
            return false;
        }
        
    }

    public function getDate($user_data=array()) 
    { 
        $this->query = "
                            SELECT idGasto, valor, fecha, descripcion, idUsuario, idTipoGasto
                            FROM Gasto
                            WHERE fecha
                            BETWEEN :fechaUno
                            AND (:fechaDos +1)
                            ORDER BY fecha
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':fechaUno', $user_data['fechaUno'], PDO::PARAM_STR);
            $result->bindParam(':fechaDos', $user_data['fechaDos'], PDO::PARAM_STR);
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

    # Modificar un producto
    public function edit($user_data=array()) 
    {
        
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
