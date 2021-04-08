<?php
    require '../Modelo/metodos.php';
    if($_POST){
        $Cliente=new Cliente();
        switch($_POST["accion"]){
            case "Consultar": 
                echo json_encode($Cliente->consultarALL());
            break;
            case "Consultar_ID": 
                echo json_encode($Cliente->consultarID($_POST["id_Cliente"]));
            break;
            case "Insertar": 
                $Nombre =$_POST["Nombre"];
                $RFC =$_POST["RFC"];
                $Correo =$_POST["Correo"];
                $Telefono =$_POST["Telefono"];
                $Respuesta=$Cliente->Insertar($Nombre,$RFC,$Correo,$Telefono);
                echo json_encode($Respuesta);
            break;
            case "Modificar": 
                $Nombre =$_POST["Nombre"];
                $RFC =$_POST["RFC"];
                $Correo =$_POST["Correo"];
                $Telefono =$_POST["Telefono"];
                $id_Cliente=$_POST["id_Cliente"];
                $Respuesta=$Cliente->Modificar($id_Cliente,$Nombre,$RFC,$Correo,$Telefono);
                echo json_encode($Respuesta);
            break;
            case "Eliminar": 
                $id_Cliente=$_POST["id_Cliente"];
                $Respuesta=$Cliente->Eliminar($id_Cliente);
                echo json_encode($Respuesta);
            break;
        }
    }
?>