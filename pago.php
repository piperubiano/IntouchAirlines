<?php
    session_start();
    if (isset($_SESSION["email"])) 
        $email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
        }

        #header {
            background-color:rgba(135, 154, 208);
            color: white;
            text-align: left;
            padding: 10px;
        }

        #logo {
            position: absolute; 
            top: 0px; 
            right: 20px;
        }

        #menu {
            background-color: rgba(190,195,252,255);
            text-align: right;
            padding: 20px;
        }

        #menu a {
            text-decoration: none;
            color: #192519;
            margin: 0 20px;
        }

        table {
            width:40%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        tr {
            cursor: pointer;
        }
       
        th, td {
        border: 2px solid #000000;
        background-color: #ffffff;
        text-align: left;
        padding: 8px;
}

        th {
            cursor: pointer;
        }
        #submitBtn {
            margin-top: 10px;
            margin-right: 70px; 
            margin-bottom: 20px; 
            float: right; 
            font-size: 16px; 
            padding: 5px 10px;
            

        }
        #submitBtn:hover {
            background-color:rgba(135, 154, 208);
        }

    </style>
    <link rel="stylesheet" href="stilos.css">
</head>
<body style="background-color:rgb(212, 216, 234)">
 
    <div id="header">
        <FONT FACE="Times New Roman" SIZE=8 COLOR="white"> Intouch Airlines</FONT>
        <img id="logo" src="img/logo.png" width="200" height="105" alt="Logo">
    </div>
    <div id="menu">
    <a href="perfil.php" style="text-align: left;">Mi Perfil</a>
        <a href="firstpage.php">Reservar</a>
        <a href="viajes.php">Tus Viajes</a>
        <a href="ayuda.php">Centro de Ayuda</a>
    </div>
    
    <center>
        <h1>Formulario de Pago</h1>
        <?php
        if (isset($_GET["idVueloin"]) && isset($_GET["idVuelode"]) && isset($_GET["fecha"]) && isset($_GET["hora"]) && isset($_GET["precio"])) {
            $idVueloin = $_GET["idVueloin"];
            $idVuelode = $_GET["idVuelode"];
            $fecha = $_GET["fecha"];
            $hora = $_GET["hora"];
            $precio = $_GET["precio"];
            
            

            echo "<p>Información del Vuelo:</p>";
            echo "<p>Origen: $idVueloin</p>";
            echo "<p>Destino: $idVuelode</p>";
            echo "<p>Fecha: $fecha</p>";
            echo "<p>Hora: $hora</p>";
            echo "<p>Precio: $" . number_format((float) str_replace(['$', '.', ','], '', $precio), 0, '.', '.') . " COP</p>";
            ?>
        
        <form action="subirregis.php" method="POST">
            <table>
                <td align="right">
                    <ul style="list-style: none;"> 
                         <li><label for="nombre_pasajero">Nombre del pasajero:</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label for="id_pasajero">Identificacion del pasajero:</label> 
                         <br><br>
                         <input type="text" id="nombre_pasajero" name="nombre_pasajero" required placeholder="Digite el nombre...">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="text" id="id_pasajero" name="id_pasajero" required placeholder="digite la identificacion..." oninput="validateCVV(this)"></li>

                        <br><br> 
                        <li><label for="tarjeta">Número de Tarjeta:</label>
                            <input type="text" id="tarjeta" name="tarjeta" required placeholder="Digite el numero de tarjeta..." oninput="validateCVV(this)"></li>
                        <br><br>
                        <li><label for="nombre">Nombre en la Tarjeta:</label>
                            <input type="text" id="nombre" name="nombre" required placeholder="digite el nombre en la tarjeta..."></li>
                        <br><br>
                        <li><label for="fecha">Fecha de Vencimiento:</label>
                         <input type="text" id="fecha" name="fecha" placeholder="MM/AA" maxlength="4" required placeholder="Digite la fecha de vencimiento..." oninput="formatDate(this)"></li>
                        <input type="hidden" id="fechaFormatted" name="fechaFormatted" value=""></li>
                        <br><br>
                        <li><label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" required placeholder="Digite el cvv..." maxlength="3" oninput="validateCVV(this)"></li>
                        <br><br>
                        <input type="hidden" name="idVueloin" value="<?php echo $idVueloin; ?>">
                        <input type="hidden" name="idVuelode" value="<?php echo $idVuelode; ?>">
                        <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                        <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                        <input type="hidden" name="precio" value="<?php echo $precio; ?>">
                        <input type="submit" value="Realizar Pago">
                    </ul>
                </td>
            </table>
        </form>
        <?php
        } else {
            echo "No se han proporcionado los datos del vuelo.";
        }
        ?>
    </center>
    <script>
      function formatCVV(input) {
            const cvv = input.value.replace(/\D/g, '');
            let formattedCVV = cvv;

            if (cvv.length > 2) {
                formattedCVV = cvv.substr(0, 2) + '/' + cvv.substr(2, 2);
            }

            document.getElementById('cvvFormatted').value = formattedCVV;
            input.value = formattedCVV;
        }

    document.getElementById('fechaFormatted').value = value;
    input.value = value;
    
    function validateCVV(input) {
        input.value = input.value.replace(/\D/g, ''); 
    }
</script>
</body>
</html>
