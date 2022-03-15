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
            $sacarAudio="SELECT audio FROM niveles WHERE idNivel = ".$idNivel.";";
            $this->sql->consultar($sacarAudio);
              $fila=$this->sql->fila_assoc();
              echo $fila['audio'];
            if(unlink($fila['audio'] ) )
            {

              $borrarNivel="DELETE FROM niveles WHERE idNivel = ".$idNivel.";";
              $this->sql->consultar($borrarNivel);
              if( $this->sql->filasAfectadas()>0)
              {
                echo 'Nivel eliminado ';
              }
              else
              {
                $this->sql->error();
              }
           
            }
            else
            {
              echo 'no se ha podido borrar el archivo';
            }
            echo '<br><a href="listado.php">Volver</a>';
        }

        public function mostrarModificar($idNivel)
        {
          $sacarNivel="SELECT * FROM Niveles where idNivel=".$idNivel.";";
            $this->sql->consultar($sacarNivel);
              if($this->sql->filasObtenidas()>0)
              { 
                $fila=$this->sql->fila_assoc();
                $this->procesosVista->modificacion( $fila);
                  
              }
              else
              {
                echo 'Fallo al sacar los datos del nivel ';
              }
        }

        public function modificar($modificar)
        {
          $meternivel=
          "UPDATE Niveles 
          SET descripcion = '".$modificar['descripcion']."',
          vida = '".$modificar['vida']."',
          velocidad ='".$modificar['velocidad']."',
          bolas ='".$modificar['bolas']."'
          where idNivel=".$modificar['idNivel'].";";
          $this->sql->consultar($meternivel);
          if( $this->sql->getResultado())
          {
            echo 'Actualizacion realizada';
          }
          else
          {
            $this->sql->error();
          }
        }

        public function modificarArchivo($modificar,$fichero)
        {
          $nombre=$fichero['audioNuevo']['name'];
          $tmp_name =$fichero["audioNuevo"]["tmp_name"];
          $ruta="audios/".$nombre;
          if(move_uploaded_file($tmp_name, $ruta) && unlink($modificar['audioAntiguo']))
          {

            $actualizarNivel=
            "UPDATE Niveles 
            SET descripcion = '".$modificar['descripcion']."',
            vida = '".$modificar['vida']."',
            velocidad ='".$modificar['velocidad']."',
            bolas ='".$modificar['bolas']."',
            audio = '".$ruta."'
            where idNivel='".$modificar['idNivel']."';";
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
        }
    }
?>