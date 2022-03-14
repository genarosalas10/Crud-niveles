<?php
   require_once("procesos_bd.php");
   require_once("procesos_vista.php");
    class Procesos
    {
        
        function __construct()
        {
            
            $this->sql=new Procesos_bd();
            $this->procesosVista=new Procesos_vista();
        }

        public function alta($alta,$fichero)
        {
        
            $nombre=$fichero['audio']['name'];
            $ruta="audios/".$nombre;
            $tmp_name = $fichero["audio"]["tmp_name"];

            if(move_uploaded_file($tmp_name, $ruta))
            {

              $meternivel=
              "INSERT INTO Niveles (descripcion,vida,velocidad,bolas,audio) 
              VALUES 
              ('".$alta['descripcion']."','".$alta['vida']."','".$alta['velocidad']."','".$alta['bolas']."','".$ruta."');";
              $this->sql->consultar($meternivel);
              echo $meternivel;
             
              
              if( $this->sql->getResultado())
              {
                echo 'Alta realizada';
              }
              else
              {
                $this->sql->error();
              }
            }
            $this->sql->cerrar(); 
        }

        public function listado()
        {
            $sacarListado="SELECT * FROM Niveles;";
            $this->sql->consultar($sacarListado);
            if($this->sql->filasObtenidas()>0)
            {
                while($fila=$this->sql->fila_assoc())
                {

                    $this->procesosVista->listado($fila);
                }
            }
            else
            {
                echo 'no hay niveles';
            }
        }
        public function borrado($idNivel)
        {
            $sacarAudio="SELECT audio FROM niveles WHERE idNivel = ".$_POST['id'].";";
              $sql->consultar($sacarAudio);
              $fila=$sql->fila_assoc();
              echo $fila['audio'];
            if(unlink($fila['audio'] ) )
            {

              $borrarNivel="DELETE FROM niveles WHERE idNivel = ".$_POST['id'].";";
              $sql->consultar($borrarNivel);
              if( $sql->filasAfectadas()>0)
              {
                echo 'Nivel eliminado ';
              }
              else
              {
                $sql->error();
              }
           
            }
            else
            {
              echo 'no se ha podido borrar el archivo';
            }
            echo '<br><a href="listado.php">Volver</a>';
        }
    }
?>