<?php 
	echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script> ";
	//include("../Views/modal.php");
	session_start();
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
				echo "Contraseña incorrecta1";
				echo "$('#example2').on('shown.bs.modal', function () {
					$('#myInput').trigger('focus')
				  })";
				//header("Location:../../index.php");

			}
		}else{
			echo "Contraseña incorrecta2";
			echo "<script type='text/javascript'>
				$('#example1').modal('show')
			</script>";
			//header("Location:../../index.php");  
		}
?>  