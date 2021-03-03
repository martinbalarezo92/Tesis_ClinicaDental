<?php 

class InicioC
{
	
	public function MostrarInicioC()

	{
		
		$tablaBD = "inicio";

		$id = "1";

		$resultado = InicioM::MostrarInicioM($tablaBD, $id);

		echo'

	     <div class="box-body">
          
          <div class="col-md-6 bg-primary" style="margin-top: 5%">
            
            <h1>Bienvenidos</h1>

            <h3>'.$resultado["intro"].'</h3>

            <hr>

            <h2>Horario: </h2>
            <h3>Desde '.$resultado["horaE"].'</h3>
            <h3>Hasta '.$resultado["horaS"].'</h3>

            <hr>

            <h2>Dirección: </h2>
            <h3>'.$resultado["direccion"].'</h3>

            <hr>

            <h2>Contactos</h2>
            <h3>Telefono: '.$resultado["telefono"].'
            <br>
            Correo: '.$resultado["correo"].'
            </h3>
          </div>

          <div class="col-md-6">
            
            <img src="'.$resultado["logo"].'" class="img-responsive">

          </div>

        </div>

		';

	}

    //editar Inicio

        public function EditarInicioC(){

        $tablaBD = "inicio";

        $id = "1";

        $resultado = InicioM::MostrarInicioM($tablaBD, $id);

        echo '

            <form method="post" enctype="multipart/form-data">

                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12">
                            
                            <h2>Introduccion: </h2>
                            <input type="text" class="input-lg" name="intro" value="'.$resultado["intro"].'">
                            <input type="hidden" class="input-lg" name="Iid" value="'.$resultado["id"].'">


                            <div class="form-group">

                                <h2>Horario:</h2>
                                <h3>Desde: </h3><input type="time" class="input-lg" name="horaE" value="'.$resultado["horaE"].'">
                                <br>
                                <h3> Desde: </h3> <input type="time" class="input-lg" name="horaS" value="'.$resultado["horaS"].'">

                            </div>

                            <h2>Dirección: </h2>
                            <input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

                            <h2>Telefono: </h2>
                            <input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

                            <h2>Correo: </h2>
                            <input type="text" class="input-lg" name="correo" value="'.$resultado["correo"].'">

                        </div>

                        <div class="col-md-6 col-xs-12">
                            
                            <br><br>

                            <h3>Logo: <h3/>
                            <input type="file" name="logo">
                            <br>

                            

                            <img src="http://localhost/clinica/'.$resultado["logo"].'" class="img-responsive" width="200px;">

                            
                            
                           <input type="hidden" name="logoActual" value="'.$resultado["logo"].'">

                        <br><br>


                        <h3>favicon: <h3/>
                            <input type="file" name="favicon">
                            <br>

                            

                            <img src="http://localhost/clinica/'.$resultado["favicon"].'" class="img-responsive" width="200px;">

                            
                            
                           <input type="hidden" name="faviconActual" value="'.$resultado["favicon"].'">

                        <br><br>


                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                        </div>

                    </div>
                    
                </form>

        ';

    }

    /*public function ActualizarInicioC(){

        if(isset($_POST["Iid"])){

            $rutaLogo = $_POST["logoActual"];

            if(isset($_FILES["logo"]["tmp_name"]) && !empty($_FILES["logo"]["tmp_name"])){

                if(!empty($_POST["logoActual"])){

                    unlink($_POST["logoActual"]);

                }

                if($_FILES["logo"]["type"] == "image/png"){

                    $nombre = mt_rand(100,999);

                    $rutaLogo = "Vistas/img/logo.png";

                    $foto = imagecreatefrompng($_FILES["logo"]["tmp_name"]);

                    imagepng($foto, $rutaLogo);

                }

                if($_FILES["logo"]["type"] == "image/jpeg"){

                    $nombre = mt_rand(100,999);

                    $rutaLogo = "Vistas/img/logo.jpg";

                    $foto = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);

                    imagejpeg($foto, $rutaLogo);

                }



                //ruta Favicon

                $rutaFavicon = $_POST["faviconActual"];

                if(isset($_FILES["favicon"]["tmp_name"]) && !empty($_FILES["favicon"]["tmp_name"])){

                    if(!empty($_POST["faviconActual"])){

                        unlink($_POST["faviconActual"]);

                    }

                    if($_FILES["favicon"]["type"] == "image/png"){

                        $nombre = mt_rand(100,999);

                        $rutaFavicon = "Vistas/img/favicon.png";

                        $foto = imagecreatefrompng($_FILES["favicon"]["tmp_name"]);

                        imagepng($foto, $rutaFavicon);

                    }

                    if($_FILES["favicon"]["type"] == "image/jpeg"){

                        $nombre = mt_rand(100,999);

                        $rutaFavicon = "Vistas/img/favicon.jpg";

                        $foto = imagecreatefromjpeg($_FILES["favicon"]["tmp_name"]);

                        imagejpeg($foto, $rutaFavicon);

                }

            

            $tablaBD = "inicio";

            $datosC = array("id"=>$_POST["Iid"], "intro" => $_POST["intro"], "horaE" => $_POST["horaE"], "HoraS" => $_POST["HoraS"], "telefono" => $_POST["telefono"], "correo" => $_POST["correo"], "direccion" => $_POST["direccion"], "logo" => $rutaLogo, "favicon" => $rutaFavicon);

            $resultado = InicioM::ActualizarInicioM($tablaBD, $datosC);

            if ($resultado == true) {
                
                echo'<script>
                    window.location = "inicio-editar"
                </script>';

            }

        }
    }*/

    public function ActualizarInicioC(){

        if(isset($_POST["Iid"])){

            $rutaLogo = $_POST["logoActual"];

            if(isset($_FILES["logo"]["tmp_name"]) && !empty($_FILES["logo"]["tmp_name"])){

                if(!empty($_POST["logoActual"])){

                    unlink($_POST["logoActual"]);

                }

                if($_FILES["logo"]["type"] == "image/jpeg"){

                    $rutaLogo = "Vistas/img/logo.jpeg";

                    $logo = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);
                    
                    imagejpeg($logo, $rutaLogo);

                }

                if($_FILES["logo"]["type"] == "image/png"){

                    $rutaLogo = "Vistas/img/logo.png";

                    $logo = imagecreatefrompng($_FILES["logo"]["tmp_name"]);
                    
                    imagepng($logo, $rutaLogo);

                }

            }



            $rutaFavicon = $_POST["faviconActual"];

            if(isset($_FILES["favicon"]["tmp_name"]) && !empty($_FILES["favicon"]["tmp_name"])){

                if(!empty($_POST["faviconActual"])){

                    unlink($_POST["faviconActual"]);

                }

                if($_FILES["favicon"]["type"] == "image/jpeg"){

                    $rutaFavicon = "Vistas/img/favicon.jpeg";

                    $favicon = imagecreatefromjpeg($_FILES["favicon"]["tmp_name"]);
                    
                    imagejpeg($favicon, $rutaFavicon);

                }

                if($_FILES["favicon"]["type"] == "image/png"){

                    $rutaFavicon = "Vistas/img/favicon.png";

                    $favicon = imagecreatefrompng($_FILES["favicon"]["tmp_name"]);
                    
                    imagepng($favicon, $rutaFavicon);

                }

            }


            $tablaBD = "inicio";

            $datosC = array("id"=>$_POST["Iid"], "intro"=>$_POST["intro"], "horaE"=>$_POST["horaE"], "horaS"=>$_POST["horaS"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "direccion"=>$_POST["direccion"], "logo"=>$rutaLogo, "favicon"=>$rutaFavicon);

            $resultado = InicioM::ActualizarInicioM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

                window.location = "inicio-editar";
                </script>';

            }


        }

    }

    public function MostrarFavicon(){

        $tablaBD = "inicio";

        $id = "1";

        $resultado = InicioM::MostrarInicioM($tablaBD, $id);

        echo'  <link rel="icon" type="" href="'.$resultado["favicon"].'"> ';
    }
}
