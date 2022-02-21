<?php
    require_once("procesos_bd.php");
    require_once("procesos.php");

    $sql=new Procesos_bd();
    $procesos=new Procesos();
         
?>
<!doctype html>
<html lang=es>
  <head>
    <meta charset=utf-8 />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <title>Alta</title>
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
      <h1>Alta </h1>
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

                $procesos->modificacion($sql->fila_assoc());
                  
              }
          }
          else
          {
            $nombre=$_FILES['audio']['name'];
            $ruta="audios/".$nombre;
            $tmp_name = $_FILES["audio"]["tmp_name"];

            if(move_uploaded_file($tmp_name, $ruta))
            {

              $meternivel=
              "INSERT INTO Niveles (descripcion,vida,velocidad,bolas,audio) 
              VALUES 
              ('".$_POST['descripcion']."','".$_POST['vida']."','".$_POST['velocidad']."','".$_POST['bolas']."','".$ruta."');";
              $sql->consultar($meternivel);
             
              if( $sql->filasAfectadas()>0)
              {
                echo 'Alta realizada';
              }
              else
              {
                $sql->error();
              }

              echo '<a href="alta.php">Volver</a>';
            }
            $sql->cerrar(); 
          }
          
        ?>
      </section>
    </main>
  </body>
</html>