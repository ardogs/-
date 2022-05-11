<?php
class Noticia{
	
	public $db; //variable para instanciar el objeto PDO
    public function __construct(){
        $this->db = new Base(); //se instancia el objeto con los métodos de PDO
    }

    public function getNoticias($limit = null){
        $extra_sql =  ( $limit != null) ? "LIMIT $limit" : "";
        $sql = "SELECT * FROM prensa ORDER BY Fecha_Hora_Registro DESC " . $extra_sql ; 
        $this->db->query($sql);
        return $this->db->registers();
    }
}

?>