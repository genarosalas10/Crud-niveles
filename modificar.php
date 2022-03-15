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
            $procesos->mostrarModificar($_GET['id']);
          }
          else
          {
           
            if(empty($_FILES["audioNuevo"]))
            {
              $procesos->modificar($_POST);
              echo 'viejo archivo';
              

            } 
            else
            {
              $procesos->modificar($_POST, $_FILES);
              
           
            
 
            }
            echo '<a href="Listado.php">Listado</a>';
          }
        $sql->cerrar();
        ?>
      </section>
    </main>
  </body>
</html>