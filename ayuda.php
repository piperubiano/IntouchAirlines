<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intouch Airlines</title>
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
            width: 60%;
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
        #reservar-form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        #reservar-form h2 {
            color: #32cd32;
            margin-bottom: 20px;
        }

        #reservar-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        #reservar-form select,
        #reservar-form input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #reservar-form button {
            background-color: #32cd32;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
        
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
        <div id="reservar-form">
    <h1>Centro de Ayuda</h1>
    <form action="#" method="POST" id="myForm">

        <label for="email">Correo:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="asunto">Asunto:</label>
        <input type="text" id="asunto" name="asunto" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="9" cols="80" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
    <p id ="mensaje" style="display: none;">¡Mensajee enviado con éxito!</p>
    </center>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asunto = $_POST["asunto"];
    $descripcion = $_POST["descripcion"];

    echo "Su solicitud ha sido enviada con éxito. Nos pondremos en contacto pronto.";
}
?>
    