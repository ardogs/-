<?php
class Tramites
{
	
	public $db; //variable para instanciar el objeto PDO
    public function __construct(){
        $this->db = new Base(); //se instancia el objeto con los métodos de PDO
    }

    public function getAreasTS(){
        $sql = "SELECT * FROM catalogo_areas_ts ORDER BY Id_Area";
        $this->db->query($sql);
        $success = $this->db->registers();
        return ($success)?$success:[]; //retorna vacio si es que no hubo resultados en la base de datos
    }

    // Traer y agrupar todos los trámites y servicios de todas las áreas
    public function getAllTramitesServicios($areas){
        $response = [];

        foreach ($areas as $ind => $area) {
            $response[$ind] = [ 
                                'id_area' => $area->Id_Area, //id del area
                                'nombre_area' => $area->Area_TS, //nombre del área
                                'tramites' => [], //se declara vacio por defecto
                                'servicios' => [] //se declara vacio por defecto
                              ];
            //get Trámites
            $sql = "SELECT * 
                    FROM tramites_servicios 
                    WHERE Id_Area = ".$area->Id_Area." AND Tipo = b'0'";
            $this->db->query($sql);
            $success_1 = $this->db->registers();
            if($success_1){$response[$ind]['tramites'] = $success_1;}

            // get Servicios
            $sql = "SELECT * 
                    FROM tramites_servicios 
                    WHERE Id_Area = ".$area->Id_Area." AND Tipo = b'1'";
            $this->db->query($sql);
            $success_2 = $this->db->registers();
            if($success_2){$response[$ind]['servicios'] = $success_2;}
        }

        return $response;
    }

    // get Tramites y Servicios sobre un área específica
    public function getTramitesServiciosByIdArea($id_area){
        $response['tramites'] = $response['servicios'] = []; //se declaran vacios por defecto
        //get Trámites
        $sql = "SELECT * 
                FROM tramites_servicios 
                WHERE Id_Area = $id_area AND Tipo = b'0'";
        $this->db->query($sql);
        $success_1 = $this->db->registers();
        if($success_1){$response['tramites'] = $success_1;}

        // get Servicios
        $sql = "SELECT * 
                FROM tramites_servicios 
                WHERE Id_Area = $id_area AND Tipo = b'1'";
        $this->db->query($sql);
        $success_2 = $this->db->registers();
        if($success_2){$response['servicios'] = $success_2;}
        
        return $response;
    }
}


?>