<?php session_start();
$usu=$_POST['user'];
$pass=$_POST['passwd'];
echo "$usu <br>";
echo "$pass <br>";
	$link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
	mysqli_select_db($link,"kpis");
	$result= mysqli_query($link, "select Password,cargo from usuario where Usuario='$usu'");	
    
    if($row=mysqli_fetch_array($result)){
        $cargo=$row['cargo'];
        echo "El cargo del usuario:$usu es $cargo";
        if($row['Password']==$pass){
            $_SESSION['k_user']=$usu;
			$_SESSION['cargo']=$row['cargo'];
            $car=			$_SESSION['cargo'];
            if($row['cargo']=="GG" || $row['cargo']=="Admin"){ 
				header("Location:../Views/InicioGG.php");
			}else if($row['cargo']=="GT") {
				header("Location:../Views/inicioGT.php");
			}else if($row['cargo']=="GC") {
                echo "EL cargo es $car";
                header("Location:../Views/inicioGC.php");
            }
		}else{
            echo "Contraseña incorrecta";
			header("Location:../../index.php");
		}
	}else{
		header("Location:index.php");  
	}
?>  