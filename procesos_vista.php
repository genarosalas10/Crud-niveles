<?php
    
    class Procesos_vista
    {
        public function alta()
        {
             echo '
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" required/><br />
                        <label for="vida"> Nº vida</label>
                        <input type="text" name="vida" required /><br />
                        <label for="velocidad"> Velocidad</label>
                        <input type="text" name="velocidad" required/><br />
                        <label for="bolas"> Nº bolas</label>
                        <input type="text" name="bolas" required/><br />
                        <input type="file" name="audio" required/><br />
                        <input type="submit" name ="enviar" value="Enviar" />
                    </form>';
        }

        public function listado( $fila)
        {
            echo  "<div>
                        id: ".$fila['idNivel']
                        ." descripcion: ".$fila['descripcion']
                        ." fichero: ". $fila['audio']
                        ." <a href=borrar.php?id=".$fila['idNivel'].">borrar</a> 
                        <a href=modificar.php?id=".$fila['idNivel'].">modificar</a>                             
                    </div>";
        }

        public function modificacion($nivel)
        {   
             echo '
                    <form action="modificar.php" method="POST" enctype="multipart/form-data">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" value="'.$nivel['descripcion'].'" /><br />
                        <label for="vida"> Nº vida</label>
                        <input type="text" name="vida" value="'.$nivel['vida'].'"/><br />
                        <label for="velocidad"> Velocidad</label>
                        <input type="text" name="velocidad" value="'.$nivel['velocidad'].'"/><br />
                        <label for="bolas"> Nº bolas</label>
                        <input type="text" name="bolas" value="'.$nivel['bolas'].'"/><br />
                        <label >archivo </label>
                        <input type="text" name="audioAntiguo" value="'.$nivel['audio'].'" /><br />
                        <input type="file" name="audioNuevo" value="" /><br />
                        <input id="prodId" name="idNivel" type="hidden" value="'.$nivel['idNivel'].'">
                        <input type="submit" name ="enviar" value="Enviar" />
                    </form>';
        }
    }
?>