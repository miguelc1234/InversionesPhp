<?php
abstract class DBAbstractModel
{

    private $db_host = 'aprendicesrisaraldac.ipagemysql.com';
    private $db_user = 'inversiones';
    private $db_port = '3306';
    private $db_pass = 'Fullmetal0@';
    protected $db_name = 'bdinversiones';
    protected $query;
    public $rows = array();
    protected $conn;
    public $mensaje = 'Hecho';

    # métodos abstractos para ABM de clases que hereden    
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();
    
    # los siguientes métodos pueden definirse con exactitud y no son abstractos
	# Conectar a la base de datos
	public function open_connection() 
	{
	    try 
	    {
	        $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
	    } 

	    catch(PDOException $e) 
	    {
	        $this->mensaje = $e->getMessage(); 
	    }
	}

	# Desconectar la base de datos
	public function close_connection() 
	{
		$this->conn = null;
	}
}
?>





