<?php 
	session_start();
	$usu=$_POST['user'];
	$pass=$_POST['passwd'];
		$link=mysqli_connect("localhost","root",""); //hace la conexion con la base de datos
		mysqli_select_db($link,"kpis");
		$result= mysqli_query($link, "select Password,cargo from usuario where Usuario='$usu'");
		if($row=mysqli_fetch_array($result)){
			$cargo=$row['cargo'];
			if($row['Password']==$pass){
				$_SESSION['k_user']=$usu;
				$_SESSION['cargo']=$row['cargo'];
				$car=$_SESSION['cargo'];
				if($row['cargo']=="GG" || $row['cargo']=="Admin"){ 
					echo 1;
				}else if($row['cargo']=="GT") {
					echo 2;
				}else if($row['cargo']=="GC") {
					echo 3;
				}
			}else{
				echo 0;
			}
		}else{
			echo 4;
		}
?>  