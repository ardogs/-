<?php
class ContactoM
{
    public $db;

    public function __construct(){
        $this->db = new Base();
    }

    public function insertarComentario($post){
        $response['status'] =  true;
        try {
            $this->db->beginTransaction();
            $status = 0 ;
                $sql = "INSERT 
                        INTO contacto(
                            Nombre,
                            Ap_Paterno,
                            Ap_Materno,
                            email,
                            Telefono,
                            Comentario,
                            Estatus
                        )
                        VALUES(
                            '" . $post['Nombre'] . "',
                            '" . $post['ApPaterno'] . "',
                            '" . $post['ApMaterno'] . "',
                            '" . $post['email'] . "',
                            '" . $post['telefono'] . "',
                            '" . $post['comentario'] . "',
                            b'" . $status . "'
                        )";

                $this->db->query($sql);
                $this->db->execute();
            $this->db->commit();
            $response['status'] = true;
        } catch (Exception $e) {
            $response['status'] = false;
            $response['error_message'] = $e;
            $this->db->rollBack(); //si algo falla realiza el rollBack por seguridad
        }

        return $response;
    }
    
    /*-------------------------FIN FUNCIONES ANEXO A------------------------------*/
}