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
            
          if(!isset($_POST['si']))
          {
            echo '<form action="#" method="POST">
                Quieres eliminar el nivel con id '.$_GET['id'].'?
                <input type="submit" name ="si" value="Si" />
                <input  name="id" type="hidden" value="'.$_GET['id'].'">
                <a href="listado.php">Volver</a>
                </form>';     
          }
          else
          {
            $borrarNivel="DELETE FROM niveles WHERE idNivel = ".$_POST['id'].";";
            $sql->consultar($borrarNivel);
            /* unlink(string $ruta ); */
            if( $sql->filasAfectadas()>0)
              {
                echo 'Nivel eliminado ';
              }
              else
              {
                $sql->error();
              }
            
              echo '<br><a href="listado.php">Volver</a>';

              $sql->cerrar(); 
          }
            
         
        ?>
      </section>
    </main>
  </body>
</html>