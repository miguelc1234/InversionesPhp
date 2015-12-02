<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Usuario extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idUsuario;
    private $cedula;
    private $nombre;
    private $telefono;
    private $correo;
    private $direccion;
    private $password;
    private $tipoUsuario;

    ################################# MÉTODOS ##################################
    # Traer datos de un usuario
    public function get($user_data=array()) 
    { 
        $this->query = "
                            SELECT idUsuario, cedula, nombre, telefono, correo, direccion, password, tipoUsuario
                            FROM Usuario
                            WHERE cedula = :cedula
                            AND password = :password
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':cedula', $user_data['cedula'], PDO::PARAM_STR);
            $result->bindParam(':password', $user_data['password'], PDO::PARAM_STR);
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
            foreach ($this->rows[0] as $propiedad=>$valor) 
            {
                $this->$propiedad = $valor;
            }

            $this->mensaje = 'Usuario encontrado';
        } 

        else 
        {
            $this->mensaje = 'Usuario no encontrado';
        }
    }

    public function getCedula($cedula) 
    { 
        $this->query = "
                            SELECT idUsuario, cedula, nombre, telefono, correo, direccion, password, tipoUsuario
                            FROM Usuario
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

    public function getAllSalesman()
    {
        $this->query = "
                            SELECT idUsuario, cedula, nombre, telefono, correo, direccion, password, tipoUsuario
                            FROM Usuario
                            WHERE tipoUsuario = 'VE'
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

    # Crear un nuevo usuario
    public function set($user_data=array()) 
    {
        if(!$this->getCedula($user_data['cedula']))
        {
            $this->validateUsser($user_data);

            $this->query = "
                                INSERT INTO Usuario
                                VALUES(DEFAULT, :cedula, :nombre, :telefono, :correo, :direccion, :password, 'VE')
                           ";
            try
            {
                $this->open_connection();
                $operation = $this->conn->prepare($this->query);
                $operation->bindParam(':cedula', $user_data['cedula'], PDO::PARAM_STR);
                $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
                $operation->bindParam(':telefono', $user_data['telefono'], PDO::PARAM_STR);
                $operation->bindParam(':correo', $user_data['correo'], PDO::PARAM_STR);
                $operation->bindParam(':direccion', $user_data['direccion'], PDO::PARAM_STR);
                $operation->bindParam(':password', $user_data['password'], PDO::PARAM_STR);
                
                $operation->execute();
                $this->close_connection();
                $this->mensaje = 'Vendedor agregado exitosamente';
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
            $this->mensaje = 'La cedula ya existe';
            return false;
        }
        
    }

    # Modificar un usuario
    public function edit($user_data=array()) 
    {
        foreach ($user_data as $campo=>$valor) 
        {
            $$campo = $valor;
        }

        $this->query = "
                            UPDATE Usuario
                            SET cedula = :cedula, nombre = :nombre, telefono = :telefono, correo = :correo, direccion = :direccion, password = :password, tipoUsuario = :tipoUsuario
                            WHERE idUsuario = :idUsuario
                       ";

        try
        {
            $this->open_connection();
            $operation = $this->conn->prepare($this->query);
            $operation->bindParam(':idUsuario', $user_data['idUsuario'], PDO::PARAM_INT);
            $operation->bindParam(':cedula', $user_data['cedula'], PDO::PARAM_STR);
            $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
            $operation->bindParam(':telefono', $user_data['telefono'], PDO::PARAM_STR);
            $operation->bindParam(':correo', $user_data['correo'], PDO::PARAM_STR);
            $operation->bindParam(':direccion', $user_data['direccion'], PDO::PARAM_STR);
            $operation->bindParam(':password', $user_data['password'], PDO::PARAM_STR);
            $operation->bindParam(':tipoUsuario', $user_data['tipoUsuario'], PDO::PARAM_STR);
            $operation->execute();
            $this->close_connection();
            $this->mensaje = 'Usuario modificado exitosamente';
            $this->get($user_data);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
        }
    }

    # Eliminar un usuario
    public function delete($idUsuario='') 
    {
        $this->query = "
                            DELETE FROM Usuario
                            WHERE idUsuario = :idUsuario
                       ";

        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $result->execute();
            $this->close_connection();
            $this->mensaje = 'El vendedor ha sido eliminado exitosamente';
            return true;
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
            return false;
        }
    }

    public function validateUsser($user_data=array()) 
    { 
        $this->query = "
                            SELECT idUsuario, cedula, nombre, telefono, correo, direccion, password, tipoUsuario
                            FROM Usuario
                            WHERE cedula = :cedula
                       ";
        try
        {
            $this->open_connection();
            $result = $this->conn->prepare($this->query);
            $result->bindParam(':cedula', $user_data['cedula'], PDO::PARAM_STR);
            $result->execute();
            while ($this->rows[] = $result->fetchAll(PDO::FETCH_ASSOC));
            $this->close_connection();
            array_pop($this->rows);
        }

        catch(PDOException $e) 
        {
            $this->mensaje = $e->getMessage(); 
        }  

        if(count($this->rows) == 1) 
        {
            foreach ($this->rows[0] as $propiedad=>$valor) 
            {
                $this->$propiedad = $valor;
            }

            $this->mensaje = 'Usuario encontrado';
        } 

        else 
        {
            $this->mensaje = 'Usuario no encontrado';
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
