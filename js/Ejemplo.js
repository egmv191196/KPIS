<script type="Text/Javascript">
    $(document).ready(function(){
        $('#signIn').click(function(){
            var datos=$('#formLogin').serialize();
            $.ajax({
                type: "POST",
                url: "./src/Script/login.php",
                data: datos,
            }).done(function(response){      
                if(response == 1){
                    location.href ="./src/Views/InicioGG.php";
                }else if(response == 2){
                    location.href ="./src/Views/InicioGT.php";
                }else if(response == 3){
                    location.href ="./src/Views/InicioGC.php";
                }else if(response == 0){
                    alert("Contraseña erronea");
                }else if(response == 4){
                    alert("No existe el usuario");
                }
            }).fail(function(response){
                alert("Hubo un error en el server, reintentelo de nuevo");
            });
        })
    })
</script>