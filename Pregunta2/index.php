<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/estilos.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>PROCESO DE INSCRIPCION DEL CENTRO DE ESTUDIANTES DE INFORMATICA </h1>
    </header>

    <div class="formulario">
        <div style="color:white;">
            <h3>Realizado por:</h3><br>
            <h4>Abraham Joel Huanca Aruquipa</h4><br>
            <h4>Yessid Gaston Miranda Villca</h4><br>
        </div>
        <div class="image">
            <img src="./img/escudo.png" alt="fcpn" height="200">
        </div>
        <h2 style="color:aliceblue;">INGRESAR</h2>
        <form action="controlindex.php" method="GET">
            <div style="width:80%; margin: 20px auto">
                <div class="borde">
                    <div class="alineacion">
                        <div class="img">
                            <img style="width:50px;" src="./img/usuario.png" />
                        </div>
                        <input type="text" name="usuario" value="" placeholder="Usuario CI" required>
                    </div>
                </div>

                <div class="borde">
                    <div class="alineacion">
                        <div class="img">
                            <img style="width:50px;" src="./img/passwd.png" />
                        </div>
                        <input type="password" name="contrasenia" value="" placeholder="Password" required>
                    </div>
                </div>
                <br>
                <button type="submit" class="boton1">
                    VALIDAR
                </button>
            </div>
        </form>
    </div>
</body>

</html>