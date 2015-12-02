<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model_MySQL.php');


class TipoGasto extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    
    private $idTipoGasto;
    private $nombre;
    private $descripcion;

    ################################# MÉTODOS ##################################
    # Traer datos de una Categoria

    public function get() 
    { 
        $this->query = "
                            SELECT idTipoGasto, nombre, descripcion
                            FROM TipoGasto
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

    # Crear un nuevo categoria
    public function set($user_data=array()) 
    {
        
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
