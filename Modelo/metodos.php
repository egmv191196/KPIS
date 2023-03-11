<?php
    require 'Conexion.php';
    class Cliente{

        public function consultarALL(){
            $conexion = new  Conexion();
            $stmt = $conexion->prepare("SELECT * FROM 'cliente'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }        
        
        public function consultarID($id_Cliente){
            $conexion = new  Conexion();
            $stmt = $conexion->prepare("SELECT * FROM 'cliente' WHERE id_Cliente=:id_Cliente");
            $stmt->bindValue(":id_Cliente",$id_Cliente,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Insertar($Nombre,$RFC,$Correo,$Telefono){
            $conexion = new  Conexion();
            $stmt = $conexion->prepare("INSERT  INTO cliente('Nombre','RFC','Correo','Telefono') VALUES (:Nombre,:RFC,:Correo,:Telefono)");
            $stmt->bindValue(":Nombre",$Nombre,PDO::PARAM_STR);
            $stmt->bindValue(":RFC",$RFC,PDO::PARAM_STR);
            $stmt->bindValue(":Correo",$Correo,PDO::PARAM_STR);
            $stmt->bindValue(":Telefono",$Telefono,PDO::PARAM_INT);
            if($stmt->execute()){
                return "OK";
            }else{
                return "Error al guardar cliente";
            }
        }

        public function Modificar($id_Cliente,$Nombre,$RFC,$Correo,$Telefono){
            $conexion = new  Conexion();
            $stmt = $conexion->prepare("UPDATE 'cliente' SET 'Nombre'=:Nombre,`RFC`=:RFC,`Correo`=:Correo,`Telefono`=:Telefono WHERE 'id_Cliente'=:id_Cliente");
            $stmt->bindValue(":Nombre",$Nombre,PDO::PARAM_STR);
            $stmt->bindValue(":RFC",$RFC,PDO::PARAM_STR);
            $stmt->bindValue(":Correo",$Correo,PDO::PARAM_STR);
            $stmt->bindValue(":Telefono",$Telefono,PDO::PARAM_INT);
            $stmt->bindValue(":id_Cliente",$id_Cliente,PDO::PARAM_INT);
            if($stmt->execute()){
                return "OK";
            }else{
                return "Error al modificar cliente";
            }
        }

        public function Eliminar($id_Cliente){
            $conexion = new  Conexion();
            $stmt = $conexion->prepare("UPDATE FROM 'cliente' WHERE 'id_Cliente'=:id_Cliente");
            $stmt->bindValue(":id_Cliente",$id_Cliente,PDO::PARAM_INT);
            if($stmt->execute()){
                return "OK";
            }else{
                return "Error al eliminar cliente";
            }
        }
    }
?>