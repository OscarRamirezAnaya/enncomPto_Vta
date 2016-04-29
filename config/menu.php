<?php 
  
  $m = 'Inicio de Sesion';

 if(isset($_GET['m'])){ $m = $_GET['m'];}


 ?>
<script type="text/javascript" src="Librerias/functions/functionMenuJS.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><strong>Punto de Venta | Enncom  <small><?php echo $m; ?></small></strong></a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class=""><a href="?m=Home">Home | <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
      <li><a href="?m=Clientes">Clientes | <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
      <li><a href="?m=Productos">Productos | <span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></li>
      <li><a href="?m=Ventas">Ventas | <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
      <li><a href="?m=Calendario">Seguridad | <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><strong> Usuario: <?php echo $_SESSION['name']; ?></strong></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Opciones <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li class="divider"></li>
          <li><a href="javascript: confirmarSalir();">Cerrar Sesi&oacute;n</a></li>
          <li class="divider"></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

