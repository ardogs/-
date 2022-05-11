<?php
class Inicio extends Controller
{


    public function __construct(){
        
    }

    public function index(){
        $data = [
            'titulo'    => 'PanaCIM | PanaReport',
            'extra_css' => '<link rel="stylesheet" href="'. base_url .'public/css/inicio/inicio.css">',
        ];

        $this->view('templates/header', $data);
        $this->view('inicio/inicioView', $data);
        $this->view('templates/footer', $data);
    }
}