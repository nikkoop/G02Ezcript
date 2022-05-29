<?php

    class BD {

        private static $url = "mysql:host=mysql.face.ubiobio.cl;dbname=G2proyecto_bd";
        private static $nombreUsuario = "G2proyecto";
        private static $contraseña = "G2proyecto1063";

        private static function conectar(){
            $conexión = new PDO(BD::$url, BD::$nombreUsuario, BD::$contraseña);
            $conexión->query("set names utf8;");
            $conexión->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $conexión->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexión->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $conexión;
        }
        
        private static function desconectar($conexión){
            if (is_null($conexión)){
                $conexión = null;
            }
        }

        public static function ejecutarSQL($sql){
            $conexión = self::conectar();
            $sql = $conexión->prepare($sql);
            $consulta = $sql->execute();
            self::desconectar($conexión);
            return $consulta;
        }

        public static function obtenerArraySQL($sql){
            $conexión = self::conectar();
            $sql = $conexión->prepare($sql);
            $sql->execute();
            $array = $sql->fetchAll(PDO::FETCH_OBJ);
            self::desconectar($conexión);
            return $array;
        }

    }

?>