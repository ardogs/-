<?php
class Contacto extends Controller
{

    public $Helper;
    public $FV;
    public $ContactoM;
    public function __construct()
    {
        $this->Helper = new Helpers();
        $this->FV = new FormValidator();
        $this->ContactoM =  $this->model('ContactoM');
    }

    public function index()
    {
        $data = [
            'titulo'    => 'Ayuntamiento | Coronango, Pue. Contacto',
            'extra_css' => '<link rel="stylesheet" href="' . base_url . 'public/css/contacto/contacto.css">',
            'extra_js'      =>  '<script src="' . base_url . 'public/js/constants/constants.js"></script>' .
                '<script src="' . base_url . 'public/js/system/contacto/contacto.js"></script>'
        ];

        $tags = ['Inicio', 'Contacto']; //etiquetas de los breadcrumb
        $links = ['Inicio', 'Contacto']; //se pone desde el nombre del controlador hasta el nombre de la función a la que se llame
        $data['breadcrumb_info'] = [
            'title' => 'Contacto',
            'breads_html' => $this->Helper->setBreadCrumbBody($tags, $links)
        ];

        $this->view('templates/header', $data);
        $this->view('contacto/contactoView', $data);
        $this->view('templates/footer', $data);
    }

    public function insertarComentario()
    {
        // if (!isset($_SESSION['userdata']) || ($_SESSION['userdata']->Modo_Admin != 1 && $_SESSION['userdata']->Juridico[3] != '1')) {
        //     $data_p['status'] = false;
        //     $data_p['error_message'] = 'Render Index';
        //     echo json_encode($data_p);
        // } else {
        if (isset($_POST['enviar'])) {

            $k = 0;

            $valid[$k++] = $data_p['Nombre_error']      = $this->FV->validate($_POST,  'Nombre',        'required | max_length[50]');
            $valid[$k++] = $data_p['ApPaterno_error']   = $this->FV->validate($_POST,  'ApPaterno',     'required | max_length[50]');
            $valid[$k++] = $data_p['ApMaterno_error']   = $this->FV->validate($_POST,  'ApMaterno',     'required | max_length[50]');
            // $valid[$k++] = $data_p['email_error']       = $this->FV->validate($_POST,  'email',         'required | mail | max_length[100]');
            $valid[$k++] = $data_p['telefono_error']    = $this->FV->validate($_POST,  'telefono',      'required | numeric |length[10]');
            $valid[$k++] = $data_p['comentario_error']  = $this->FV->validate($_POST,  'comentario',    'required | max_length[250]');

            $success = true;
            foreach ($valid as $val)
                $success &= ($val == '') ? true : false;

            if ($success) {
                $data_p['Server_Validation_Status'] =  'success';
                $success_2 = $this->ContactoM->insertarComentario($_POST);
                //$success_2['status'] =  true ;
                if ($success_2['status']) {
                    $data_p['Server_Status_Insertion'] = $success_2['status'];
                    // $this->Historial->insertHistorial(11,'Nuevo registro I.O.:'.$Id_Inteligencia);
                    $data_p['status'] =  true;
                } else {
                    $data_p['status'] =  false;
                    $data_p['error_message'] = $success_2['error_message'];
                }
            } else {
                $data_p['status'] = false;
                $data_p['error_message'] = 'Validación formulario';
            }

            echo json_encode($data_p);
        } else {
            $data_p['status'] = false;
            $data_p['error_message'] = 'Render Index';
            echo json_encode($data_p);
        }
        // }
    }
}
