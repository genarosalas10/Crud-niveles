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
    <title>Listado</title>
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
      <h1>Listado</h1>
    </header>
    <main>
      <section>
        <?php
            $sacarListado="SELECT * FROM Niveles;";
            $sql->consultar($meternivel);
            if($sql->filasObtenidas>0)
            {

                $procesos->listado($sql->$resultado);
            }
            
          
        ?>
      </section>
    </main>
  </body>
</html>