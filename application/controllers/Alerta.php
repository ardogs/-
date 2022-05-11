<?php
class Alerta extends Controller
{


    public function __construct(){
        
    }

    public function index(){
        $data = [
            'titulo'    => 'Ayuntamiento | Coronango, Pue. Alerta',
            'extra_css' => '<link rel="stylesheet" href="'. base_url .'public/css/alerta/alerta.css">',
        ];

        $this->view('templates/header', $data);
        $this->view('alerta/alertaView', $data);
        $this->view('templates/footer', $data);
    }
}