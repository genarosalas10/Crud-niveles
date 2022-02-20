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

        public function listado( $resultado)
        {
            echo '<table>
                    <tr>
                        <th>id</th>
                        <th>Descripcion</th>
                        <th>audio</th>
                    </tr>'

                        while($fila = $resultadoM->fetch_assoc())
                        {
                                echo" <tr>
                                <label>".$fila['nombre']."</label><input type='checkbox' name=mj[] value=".$fila['idMinijuego']."> <br>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                </tr>";
                        {
                   
                echo '</table>';
        }
    }
?>