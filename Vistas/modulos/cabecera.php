  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>#</b>#</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>[Nombre </b>Clínica]</span>
    </a>

    

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar">aaa</span>
        <span class="icon-bar">aaa</span>
        <span class="icon-bar">aaa</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li  class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <?php

              if ($_SESSION["foto"] == "" ) {
 
                echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" style="width: 30px" class "user-image" alt="user image">' ;
                # code...
              }else {

                echo '
               
                <img src="http://localhost/clinica/'.$_SESSION["foto"].'" class="user-image" alt="User Image">'; 

               // <img src="http://localhost/Vistas/img/Secretarias/'.($_SESSION["foto"]).'" class "user-image" alt="user image"'; 

              }

              ?>


              <span class="hidden-xs"><?php echo $_SESSION["nombre"];echo " ";echo $_SESSION["apellido"]; echo " "  ?></span>

            </a>
            <ul class="dropdown-menu" >
              
              <li class="user-footer" style="border: solid #3c8dbc 2px">
                <div class="pull-left">

                  <?php

                  echo '<a href="http://localhost/clinica/perfil-'.$_SESSION["rol"].'" class="btn btn-primary btn-flat">Perfil</a>';

                  ?>
                  

                </div>

                <div class="pull-right">

                  <a href="http://localhost/clinica/salir" class="btn btn-danger btn-flat">Salir</a>
                  
                </div>

              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>

  </header>