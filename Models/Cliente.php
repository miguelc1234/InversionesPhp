<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Cliente extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idCliente;
    private $cedula;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    private $nombreEmpresa;
    private $direccionEmpresa;
    private $estado;
    private $calificacion;

    ################################# MÉTODOS ##################################
    # Traer datos de los clientes
    public function get() 
    { 
        $this->query = "
                            SELECT idCliente, cedula, nombre, direccion, telefono, correo, nombreEmpresa, direccionEmpresa, estado, calificacion
                            FROM Cliente
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

    public function getCliente($cedula) 
    { 
        $this->query = "
                            SELECT idCliente, cedula, nombre, direccion, telefono, correo, nombreEmpresa, direccionEmpresa, estado, calificacion
                            FROM Cliente
                            WHERE cedula = :cedula
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':cedula', $cedula, PDO::PARAM_STR);
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
        if(!$this->getCliente($user_data['cedula']))
        {
            $this->query = "
                                INSERT INTO Cliente
                                VALUES(DEFAULT, :cedula, :nombre, :direccion, :telefono, :correo, :nombreEmpresa, :direccionEmpresa, :estado, :calificacion)
                           ";
            try
            {
                $this->open_connection();
                $operation = $this->conn->prepare($this->query);
                $operation->bindParam(':cedula', $user_data['cedula'], PDO::PARAM_STR);
                $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
                $operation->bindParam(':direccion', $user_data['direccion'], PDO::PARAM_STR);
                $operation->bindParam(':telefono', $user_data['telefono'], PDO::PARAM_STR);
                $operation->bindParam(':correo', $user_data['correo'], PDO::PARAM_STR);
                $operation->bindParam(':nombreEmpresa', $user_data['nombreEmpresa'], PDO::PARAM_STR);
                $operation->bindParam(':direccionEmpresa', $user_data['direccionEmpresa'], PDO::PARAM_STR);
                $operation->bindParam(':estado', $user_data['estado'], PDO::PARAM_STR);
                $operation->bindParam(':calificacion', $user_data['calificacion'], PDO::PARAM_STR);
                
                $operation->execute();
                $this->close_connection();
                $this->mensaje = 'Cliente agregado exitosamente';
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
            $this->mensaje = 'El Cliente ya existe';
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
                            UPDATE Cliente
                            SET nombre = :nombre, direccion = :direccion, telefono = :telefono, correo = :correo, nombreEmpresa = :nombreEmpresa, direccionEmpresa = :direccionEmpresa, estado = :estado, calificacion = :calificacion
                            WHERE idCliente = :idCliente
                       ";

        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':idCliente', $user_data['idCliente'], PDO::PARAM_INT);
            $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
            $operation->bindParam(':direccion', $user_data['direccion'], PDO::PARAM_STR);
            $operation->bindParam(':telefono', $user_data['telefono'], PDO::PARAM_STR);
            $operation->bindParam(':correo', $user_data['correo'], PDO::PARAM_STR);
            $operation->bindParam(':nombreEmpresa', $user_data['nombreEmpresa'], PDO::PARAM_STR);
            $operation->bindParam(':direccionEmpresa', $user_data['direccionEmpresa'], PDO::PARAM_STR);
            $operation->bindParam(':estado', $user_data['estado'], PDO::PARAM_STR);
            $operation->bindParam(':calificacion', $user_data['calificacion'], PDO::PARAM_STR);
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Cliente modificado exitosamente';
            $this->get($user_data);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
        }
    }

    # Eliminar un usuario
    public function delete($idCliente='') 
    {
        $this->query = "
                            DELETE FROM Cliente
                            WHERE idCliente = :idCliente
                       ";

        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':idCliente', $idCliente, PDO::PARAM_INT);
            $result->execute();
            $this->close_connection();
            $this->mensaje = 'El cliente ha sido eliminado exitosamente';
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
