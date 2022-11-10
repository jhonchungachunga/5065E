<?php
class Conexion extends mysqli{
    public function __construct() {
        parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->connect_errno?die('Error en la conexion'):null;
        $this->set_charset("utf8");
    }
}