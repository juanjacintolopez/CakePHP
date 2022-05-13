<?php

$cakeDescription = 'eclass';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css('bootstrap.min.css') ?>
    <?php echo $this->Html->script('bootstrap.bundle.min.js') ?>

    <?php echo $this->Html->css('fontawesome.css') ?>
    <?php echo $this->Html->css('brands.css') ?>
    <?php echo $this->Html->css('solid.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <?php echo $this->Html->link('eclass',['controller' => 'principal', 'action' => 'index'],['class'=>'navbar-brand','escape'=>false]); ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Acciones Disponibles
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><?php echo $this->Html->link('<i class="fa fa-users"> </i> Usuarios',['controller' => 'Usuarios', 'action' => 'index'],['class'=>'dropdown-item','escape'=>false]); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-users"> </i> Usuarios Datatable',['controller' => 'Usuarios', 'action' => 'index_datatable'],['class'=>'dropdown-item','escape'=>false]); ?></li>
                <li><hr class="dropdown-divider"></li>
                <li><?php echo $this->Html->link('<i class="fa fa-unlock"> </i> Estatus',['controller' => 'UsuariosEstatus', 'action' => 'index'],['class'=>'dropdown-item','escape'=>false]); ?></li>
                <li><?php echo $this->Html->link('<i class="fa fa-unlock"> </i> Perfiles',['controller' => 'UsuariosPerfiles', 'action' => 'index'],['class'=>'dropdown-item','escape'=>false]); ?></li>
              </ul>
            </li>
          </ul>
          <div class="d-flex">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> Bienvenido <?php echo @$session['Usuario']['nombre'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><?php echo $this->Html->link('<i class="fa fa-users"></i> Perfil',['controller' => 'Usuarios', 'action' => 'detalle',@$session['Usuario']['id'] ],['class'=>'dropdown-item','escape'=>false]); ?></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> Cerrar Sesión',['controller' => 'Usuarios', 'action' => 'logout'],['class'=>'dropdown-item','escape'=>false]); ?></li>
                </ul>
              </li>
            </ul>
            
          </div>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
        <?= $this->Flash->render() ?>
        <br>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
