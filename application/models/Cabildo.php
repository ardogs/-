<?php
class Cabildo
{
	
	public $db; //variable para instanciar el objeto PDO
    public function __construct(){
        $this->db = new Base(); //se instancia el objeto con los métodos de PDO
    }

    public function getIntegrantes(){
        $sql = "SELECT * FROM cabildo";
        $this->db->query($sql);
        return $this->db->registers();
    }
}


?>