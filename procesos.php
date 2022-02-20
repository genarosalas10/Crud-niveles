<?php
    class Procesos
    {
        public function alta()
        {
             echo '
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" /><br />
                        <label for="vida"> Nº vida</label>
                        <input type="text" name="vida" /><br />
                        <label for="velocidad"> Velocidad</label>
                        <input type="text" name="velocidad" /><br />
                        <label for="bolas"> Nº bolas</label>
                        <input type="text" name="bolas" /><br />
                        <input type="file" name="audio" /><br />
                        <input type="submit" name ="enviar" value="Enviar" />
                    </form>';
        }

        public function listado( $fila)
        {
            echo  "<div>
                        id: ".$fila['idNivel']
                        ." descripcion: ".$fila['descripcion']
                        ." fichero: ".$fila['audio']
                        ." <a href=borrar.php>borrar</a> 
                        <a href=modificar.php>modificar</a>                             
                    </div>";
        }
    }
?>