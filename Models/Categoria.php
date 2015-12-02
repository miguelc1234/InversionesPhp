<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class Categoria extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idCategoria;
    private $nombre;
    private $descripcion;

    ################################# MÉTODOS ##################################
    # Traer datos de una Categoria

    public function get() 
    { 
        $this->query = "
                            SELECT idCategoria, nombre, descripcion
                            FROM Categoria
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

    public function getCategoria($nombre) 
    { 
        $this->query = "
                            SELECT idCategoria, nombre, descripcion
                            FROM Categoria
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

    # Crear un nuevo categoria
    public function set($user_data=array()) 
    {
        if(!$this->getCategoria($user_data['nombre']))
        {
            $this->query = "
                                INSERT INTO Categoria
                                VALUES(DEFAULT, :nombre, :descripcion)
                           ";
            try
            {
                $this->open_connection();
                $operation = $this->conn->prepare($this->query);
                $operation->bindParam(':nombre', $user_data['nombre'], PDO::PARAM_STR);
                $operation->bindParam(':descripcion', $user_data['descripcion'], PDO::PARAM_STR);
                
                $operation->execute();
                $this->close_connection();
                $this->mensaje = 'Categoria agregada exitosamente';
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
            $this->mensaje = 'La Categoria ya existe';
            return false;
        }
        
    }

    # Modificar un usuario
    public function edit($user_data=array()) 
    {
        
    }

    # Eliminar un usuario
    public function delete($idUsuario='') 
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
