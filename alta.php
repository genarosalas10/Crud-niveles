<?php
    
     require_once("procesos_vista.php");
     require_once("procesos.php");

     $procesosVista=new Procesos_vista();
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
            $procesosVista->alta();
          }
          else
          {
            $procesos->alta($_POST, $_FILES);
            
          }
        
        ?>
      </section>
    </main>
  </body>
</html>