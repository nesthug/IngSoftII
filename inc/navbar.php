<?php 
    session_start(); 
    error_reporting(E_PARSE);
?>
<nav id="navbar-auto-hidden">
        <div class="row hidden-xs">
            <div class="col-xs-4">
           <h1><span class="tittles-pages-logo">NesthuG Bikes</span></h1>
                   </div>
            <div class="col-xs-8">
              <div class="contenedor-tabla pull-right">
                <div class="contenedor-tr">
                  <a href="index.php" class="table-cell-td"><font size=5>Inicio</font>
                  <a href="product.php" class="table-cell-td"><font size=5>Productos</font>
                  <?php
                      $suma = 0;
                      if(!empty($_SESSION['carro'])){
                         $suma = 0;
                         foreach($_SESSION['carro'] as $codeProd){
                             $suma = $suma + 1;
                         }
                      }
                      if(!$_SESSION['nombreAdmin']==""){
                          echo ' 
                              <a href="carrito.php" class="table-cell-td"><font size=5>Carrito</font>
                              <i class="fa fa-shopping-cart fa-3x"></i>&nbsp;&nbsp;&nbsp;<font size=5>('.$suma.')</font>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                              <a href="configAdmin.php" class="table-cell-td"><font size=5>Administración</font>
                              <a href="#!" class="table-cell-td exit-system">
                                   <i class="fa fa-user fa-3x"></i><font size=5>'.$_SESSION['nombreAdmin'].'</font>
                              </a>
                              
                           ';
                      }else if(!$_SESSION['nombreUser']==""){
                          echo ' 

                              <a href="pedido.php" class="table-cell-td"><font size=5>Pedido</font>
                              <a href="carrito.php" class="table-cell-td" ><font size=5>Carrito</font>
                              <i class="fa fa-shopping-cart fa-3x"></i>&nbsp;&nbsp;&nbsp;<font size=5>('.$suma.')</font>&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                              <a href="#!" class="table-cell-td exit-system">
                              <i class="fa fa-user fa-3x"></i><font size=5>'.$_SESSION['nombreUser'].'</font>
                                                          </a>
                           ';
                      }else{
                          echo ' 

                          <a href="registration.php" class="table-cell-td"><font size=5>Registro</font>
                              <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-login">
                                   <i class="fa fa-user fa-3x"></i><font size=5>Login</font>
                              </a>
                           ';
                      }
                  ?>
                </div>
              </div>
            </div>
        </div>

        <div class="row visible-xs"><!-- Mobile menu navbar -->
            <div class="col-xs-12">
                <button class="btn btn-default pull-left button-mobile-menu" id="btn-mobile-menu">
                    <i class="fa fa-th-list"></i>&nbsp;&nbsp;Menú
                </button>
               
                <?php
                if(!$_SESSION['nombreAdmin']==""){echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs exit-system">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreAdmin'].' 
                    </a>';
                }else if(!$_SESSION['nombreUser']==""){
                    echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs exit-system">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreUser'].' 
                    </a>';
                }else{
                    echo '
                       <a href="#" data-toggle="modal" data-target=".modal-login" id="button-login-xs" class="elements-nav-xs">
                        <i class="fa fa-user"></i>&nbsp; Iniciar Sesión
                        </a> 
                   ';
                }
                ?>
            </div>
        </div>
    </nav>
   
    <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content" id="modal-form-login" style="padding: 15px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <p class="text-center text-primary">
                <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
              </p>
              <h4 class="modal-title text-center text-primary" id="myModalLabel">Iniciar sesión</h4>
            </div>
            <form action="process/login.php" method="post" role="form" class="FormCatElec" data-form="login">
                <div class="form-group label-floating">
                    <label class="control-label"><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre</label>
                    <input type="text" class="form-control" name="nombre-login" required="">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label"><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                    <input type="password" class="form-control" name="clave-login" required="">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-raised btn-sm">Iniciar sesión</button>
                  <button type="button" class="btn btn-danger btn-raised btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
                <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
            </form>
          </div>
      </div>
    </div>
    <!-- Fin Modal login -->
    
    <div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg">
        <br>
        <h3 class="text-center tittles-pages-logo">NesthuG Bikes</h3>
        <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
        <i class="fa fa-times"></i>
        </button>
        <br><br>
        <ul class="list-unstyled text-center">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="product.php">Productos</a></li>
            <li><a href="carrito.php" >Carrito</a></li>
            <?php 
                if(!$_SESSION['nombreAdmin']==""){
                    echo '<li><a href="configAdmin.php">Administración</a></li>';
                }elseif(!$_SESSION['nombreUser']==""){
                    echo '<li><a href="pedido.php">Pedido</a></li>';
                }else{
                    echo '<li><a href="registration.php">Registro</a></li>';
                }
            ?>
			
        </ul>
    </div>