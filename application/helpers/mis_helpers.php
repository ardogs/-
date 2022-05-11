<?php
    class Helpers {

        // example: $tags = ['gobierno','presidente']
        // example: $links = ['Gobierno#','Gobierno/presidente#']
        public function setBreadCrumbBody($tags = null , $links = null){
            //si no cumple con las condiciones entonces retorna una cadena vacía para los breadcrumbs
            if($tags == null || $links == null || count($tags) < 1 || count($tags) != count($links)){
                return '';
            }

            $breadCrumbs = '';
            // se procesan los links y las etiquetas para mostrar la sección en la página
            foreach ($tags as $ind => $tag) {
                $linkAux = base_url.$links[$ind];
                $breadCrumbs.= '<li class="breadcrumb-item"><a href="'.$linkAux.'">'.$tag.'</a></li>';
            }
            return $breadCrumbs;
        }

        //función para generar de forma automática todos los apartados de trámites y servicios
        public function generateTramitesSections( $tramites_servicios = null ){
            //si no cumple con las condiciones entonces retorna una cadena vacía para los trámites y servicios
            if( $tramites_servicios == null || $tramites_servicios == [] ){
                return '';
            }
            //si todo va bien entonces procedemos a la generación del html
            $response = '';
            foreach ($tramites_servicios as $ts) { //recorremos todas los trámites y servicios

                // Se adjuntan primero todos los TRÁMITES
                $response.='<div class="tab-pane fade" id="list-'.$ts['id_area'].'" role="tabpanel" >'.
                                '<h3>'.$ts['nombre_area'].'</h3>'.
                                '<div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tramites-'.$ts['id_area'].'" aria-expanded="true">
                                                <i class="bi bi-plus-square me-3"></i> 
                                                <span >Trámites</span>
                                            </button>
                                        </h2>
                                        <div id="tramites-'.$ts['id_area'].'" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">';
                foreach ($ts['tramites'] as $tramite) {
                    $response.= '<li>
                                    <a href="#" class="btn btn-pdf">'.mb_strtoupper($tramite->Nombre_TS).'</a>   
                                 </li>';
                }

                $response.= '           </div>
                                    </div>
                                </div>';
                // Se adjuntan ahora todos los SERVICIOS
                $response.='
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#servicios-'.$ts['id_area'].'" aria-expanded="true">
                                                <i class="bi bi-plus-square me-3"></i> 
                                                <span >Servicios</span>
                                            </button>
                                        </h2>
                                        <div id="servicios-'.$ts['id_area'].'" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">';
                foreach ($ts['servicios'] as $servicio) {
                    $response.= '<li>
                                    <a href="#" class="btn btn-pdf">'.mb_strtoupper($servicio->Nombre_TS).'</a>   
                                 </li>';
                }

                $response.= '           </div>
                                    </div>
                                </div>
                            </div></div>';
            }
            return $response;
        }

    }

?>