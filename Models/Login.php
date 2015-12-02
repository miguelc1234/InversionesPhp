<?php
# Importar modelo de abstracción de base de datos
require_once('AbstractModel.php');

class Login extends DBAbstractModel 
{

    ############################### PROPIEDADES ################################
    public $usuario;
    private $clave;
    protected $idUsuario;
    public $tipo;


    ################################# MÉTODOS ##################################

    # Traer datos de un usuario

    public function get($usuario='', $clave='') 
    {
        if($usuario != '' && $clave != '') 
        {
            $this->query = "
                                                SELECT idUsuario, usuario, clave, tipo
                                                FROM usuarios
                                                WHERE usuario = '$usuario'
                                                AND clave = '$clave'
                                           ";

            $this->get_results_from_query();
        }

        if(count($this->rows) == 1) 
        {
            $this->mensaje = 'Usuario encontrado';
        }

        else 
        {
            $this->mensaje = 'Usuario no encontrado';
        }
        
    }
    

    # Crear un nuevo usuario
    public function set($user_data=array()) 
    {

        //$this->get($user_data['usuario'], $user_data['clave']);

                $this->query = "
                                INSERT INTO usuarios 
                                VALUES(DEFAULT, 
                                        ".$user_data['usuario'].", 
                                        ".$user_data['clave'].",
                                        '".$user_data['tipo']."')

                                ";

                $this->execute_single_query();

                $this->mensaje = 'Usuario agregado exitosamente';
    }

    # Modificar un usuario
    public function edit($user_data=array()) 
    {

        $this->query = "
                            UPDATE usuarios 
                            SET usuario = ".$user_data['usuario'].", 
                                clave = ".$user_data['clave']." 

                            WHERE idUsuario = ".$user_data['idUsuario']."

                       ";

        $this->execute_single_query();
        $this->mensaje = 'Usuario modificado';
    }

    public function editEgresado($user_data=array()) 
    {

        $this->query = "
                            UPDATE usuarios
                            SET clave=".$user_data['clave']."

                            WHERE usuario =".$user_data['usuario']."
                       ";

        $this->execute_single_query();
        
        $this->mensaje = 'Usuario modificado';
    }

    # Eliminar un usuario

    public function deleteEgresado($user_data) 
    {
                $this->query = "
                                    DELETE FROM usuarios
                                    WHERE idUsuario=".$user_data['idUsuario']."
                                ";
                

        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    public function delete($usuario='', $clave='') 
    {
        $this->query = "
                            DELETE FROM usuarios
                            WHERE usuario = '$usuario'
                            AND clave = '$clave'
        ";

        $this->execute_single_query();
        $this->mensaje = 'Usuario eliminado';
    }

    function getArray()
    {
        return $this->rows;
    }


    public function getMaxUser()
    {
        $this->query = "
                          SELECT MAX(idUsuario) AS 'idUsuario'
                          FROM usuarios
                        ";

        $this->get_results_from_query();

        return $this->rows[0]['idUsuario'];
    }
    
    public function getUsuario($user_data)
    {
        $this->query="
                        SELECT idUsuario
                        FROM egresado 
                        WHERE idEgresado=".$user_data['idEgresado']."
                    ";

        $this->get_results_from_query();
        return $this->rows[0]['idUsuario'];
    }


    # Método constructor
    function __construct() 
    {
        $this->db_name = 'egresados';
    }

    # Método destructor del objeto
    function __destruct() 
    {
        unset($this);
    }
}
?>
