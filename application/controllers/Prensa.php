<?php
class Prensa extends Controller
{
    public $Helper;
    public $Noticia;

    public function __construct()
    {
        $this->Helper = new Helpers();
        $this->Noticia = $this->model("Noticia");
    }

    public function index()
    {
        $data = [
            'titulo'        =>  'Ayuntamiento | Coronango, Pue. Prensa',
            'extra_css'     =>  '<link rel="stylesheet" href="' . base_url . 'public/css/inicio/inicio.css">'.
                                '<link rel="stylesheet" href="' . base_url . 'public/css/prensa/prensa.css">',
            'extra_js'      =>  '<script src="'.base_url.'public/js/constants/constants.js"></script>'.
                                '<script src="'.base_url.'public/js/system/prensa/prensa.js"></script>'                   
        ];

        $tags = ['Inicio','Prensa']; //etiquetas de los breadcrumb
        $links = ['Inicio', 'Prensa']; //se pone desde el nombre del controlador hasta el nombre de la función a la que se llame
        $data['breadcrumb_info'] = [
            'title' => 'Prensa',
            'breads_html' => $this->Helper->setBreadCrumbBody($tags, $links)
        ];

        //$success = $this->Noticia->getNoticias();
        //$data['noticias'] = ($success)?$success:[];

        $this->view('templates/header', $data);
        $this->view('prensa/prensaView', $data);
        $this->view('templates/footer', $data);
        
    }

    public function getNoticiasFetch(){
        $limit = ($_POST['limit_value'] != '') ? (int)($_POST['limit_value']) : null ;
        echo json_encode($this->Noticia->getNoticias($limit));
    }
}
