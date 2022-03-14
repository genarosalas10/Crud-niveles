<?php
    require_once("procesos_bd.php");
    require_once("procesos_vista.php");
    require_once("procesos.php");

    $sql=new Procesos_bd();
    $procesosVista=new Procesos_vista();
    $procesos=new Procesos();
         
?>
<!doctype html>
<html lang=es>
  <head>
    <meta charset=utf-8 />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <title>Modificar</title>
    <link rel=stylesheet href=estilo.css />
  </head>
  <body>
    <nav>
    <ul>
			<li><a href="alta.php">Alta</a></li>
			<li><a href="listado.php">listado</a></li>
		</ul>
    </nav>
    <header>
      <h1>Modificar </h1>
    </header>
    <main>
      <section>
        <?php
          
          if(!isset($_POST['enviar']))
          {
              $sacarNivel="SELECT * FROM Niveles where idNivel=".$_GET['id'].";";
              $sql->consultar($sacarNivel);
              if($sql->filasObtenidas()>0)
              { 
                $fila=$sql->fila_assoc();
                $procesosVista->modificacion( $fila);
                  
              }
              else
              {
                echo 'Fallo al sacar los datos del nivel ';
              }
          }
          else
          {
           
            if(empty($_FILES["audioNuevo"]))
            {
              echo 'viejo archivo';
              $meternivel=
              "UPDATE Niveles 
              SET descripcion = '".$_POST['descripcion']."',
              vida = '".$_POST['vida']."',
              velocidad ='".$_POST['velocidad']."',
              bolas ='".$_POST['bolas']."'
              where idNivel=".$_POST['idNivel'].";";
              $sql->consultar($meternivel);
              if( $sql->getResultado())
              {
                echo 'Actualizacion realizada';
              }
              else
              {
                $sql->error();
              }

            } 
            else
            {
            $nombre=$_FILES['audioNuevo']['name'];
            $tmp_name = $_FILES["audioNuevo"]["tmp_name"];
            $ruta="audios/".$nombre;
            if(move_uploaded_file($tmp_name, $ruta) && unlink($_POST['audioAntiguo']))
            {

              $actualizarNivel=
              "UPDATE Niveles 
              SET descripcion = '".$_POST['descripcion']."',
              vida = '".$_POST['vida']."',
              velocidad ='".$_POST['velocidad']."',
              bolas ='".$_POST['bolas']."',
              audio = '".$ruta."'
              where idNivel='".$_POST['idNivel']."';";
              echo $actualizarNivel;
              $sql->consultar($actualizarNivel);
             
              
              if( $sql->getResultado())
              {
                echo 'Modificacion realizada';
              }
              else
              {
                $sql->error();
              }
              
            }
            else
            {
              echo 'no se ha podido actualizar el archivo';
            }
            echo '<a href="Listado.php">Listado</a>';
 
          }
        }
        $sql->cerrar();
        ?>
      </section>
    </main>
  </body>
</html>