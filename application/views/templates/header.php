<!-- HEADER -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="author" content="x">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $data['titulo'] ?></title>

  <!-- Animated.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url ?>public/css/bootstrap/bootstrap.css"> <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="<?php echo base_url ?>public/css/general/root.css"> <!-- ----- ----- ----- Root CSS ----- ----- ----- -->
  <link rel="stylesheet" href="<?php echo base_url ?>public/css/template/header/header.css"> <!-- ----- ----- ----- Header CSS ----- ----- ----- -->
  <link rel="stylesheet" href="<?php echo base_url ?>public/css/template/footer/footer.css"> <!-- ----- ----- ----- Footer CSS ----- ----- ----- -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> <!-- ----- ----- ----- Icons ----- ----- ----- -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel='shortcut icon' type='image/ico' href='<?php echo base_url ?>public/media/icons/favicon.png' />

  <meta name="theme-color" content="#600B10" />
  <?php if (isset($data['extra_css']))  echo $data['extra_css'] ?>
  <?php if (isset($data['extra'])) echo $data['extra'] ?>
</head>

<body>
  

  <nav class="navbar navbar-expand-lg nav-primary shadow-sm sticky-top">
    <section class="container">
      <a class="navbar-brand" href="#">
        <img src="https://www.panasonic.com/content/dam/Panasonic/Global/Home-Page/Home-Banner/logo-panasonic.svg" >
      </a>
    </section>

    <section class="container-fluid container">
      <a class="navbar-brand" href="#"><img src="<?=base_url?>public/media/icons/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <section class="hamburger" id="hamburger-11">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </section>
      </button>
      <section class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link active nav-primary-color-text" aria-current="page" href="<?=base_url?>Inicio">INICIO</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link  nav-primary-color-text"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              GOBIERNO
            </a> -->
            <!-- <ul class="dropdown-menu animate__animated animate__fadeInUp animate__faster" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item nav-primary-color-text" href="<?= base_url?>Gobierno/presidente">Presidente</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Gobierno/cabildo">Cabildo</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Alerta">Directorio</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Gobierno/organigrama">Organigrama</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Alerta">DIF Municipal</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Alerta">Eventos</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Alerta">Boletín de Prensa</a></li>
              <li><a class="dropdown-item nav-primary-color-text" href="<?=base_url?>Alerta">Desarrollo Económico</a></li>
            </ul> -->
          <!-- </li> -->

          <li class="nav-item">
            <a class="nav-link nav-primary-color-text" href="<?= base_url?>TramitesServicios">CATÁLOGOS</a>
          </li>
        </ul>
      </section>
    </section>
  </nav>

<!-- BREADCRUMB header -->
<section class="row <?= (isset($data['breadcrumb_info']))?'':'mi_hide';?>">
  <section class="col-12 img_breadcrumb">
      <section class="container id_container_1" >
          <section class="row">
              <section class="col-12">
                  <h1 class="title-section"><?= (isset($data['breadcrumb_info']['title']))?$data['breadcrumb_info']['title']:'';?></h1>
              </section>
              <section class="col-12">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <a href="<?= base_url?>Inicio" class="me-2" >
                          <i class="bi bi-house-fill"></i>
                        </a>
                        <?= (isset($data['breadcrumb_info']['breads_html']))?$data['breadcrumb_info']['breads_html']:'';?>
                      </ol>
                  </nav>
              </section>
          </section>
      </section>
  </section>
</section>