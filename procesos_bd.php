<?php
    require_once('conf_bd.php');
    class Procesos_bd 
    {
        private $conectar;
        public $resultado;

        function __construct()
        {
            $this->conectar=new mysqli(HOSTNAME,USERNAME,CONTRASENA,NOMBREBD);
        }

        public function cerrar()
        {
            return $this->conectar->close();
        }

        public function consultar($consulta)
        {
            return $this->resultado=$this->conectar->query($consulta);
        }

        public function fila_assoc()
        {
            return $this->resultado->fetch_assoc();
        }

        public function error()
        {
            //return $this->conectar->errno;
            //return $this->conectar->error;
            if($this->conexion->errno=='1406')
                return 'Superados el maximo de caracteres permitidos';

            return $this->conexion->errno.' y '.$this->conectar->error;
        }

        public function contarFilas($resultado)
        {
            return $resultado->num_rows;
        }

        public function id_ultima()
        {
            return $this->conectar->insert_id;
        }
        public function filasAfectadas()
        {
            return $this->conectar->affected_rows;
        }

        public function filasObtenidas()
        {
            return $this->resultado->num_rows;
        }
    }
    
?>