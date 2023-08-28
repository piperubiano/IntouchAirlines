<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
    <style>
        /* Estilos CSS */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
        }

        #header {
            background-color:rgba(135, 154, 208); /* Color de fondo (verde limón) */
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
            padding: 10px;
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
        background-color: #ffffff; /* Agrego el color de fondo blanco */
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
        .message {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        font-weight: bold;
    }

    .success {
        color: green;
    }

    .error {
        color: red;
    }
</style>

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
    
<?php

session_start();
if (isset($_SESSION["email"])) 
    $email = $_SESSION["email"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlines";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre_pasajero = $_POST["nombre_pasajero"];
    $id_pasajero = $_POST["id_pasajero"];


    if (isset($_POST["idVueloin"]) && isset($_POST["idVuelode"]) && isset($_POST["fecha"]) && isset($_POST["hora"]) && isset($_POST["precio"])) {
        $idVueloin = $_POST["idVueloin"]; 
        $idVuelode = $_POST["idVuelode"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $precio = $_POST["precio"];

        $precio_limpio = str_replace(["$", " cop"], "", $precio);
        $precio_formateado = (float) str_replace(".", "", $precio_limpio);


                    if($idVueloin === "Bogota")
                    $idVueloin = 001;
                    if($idVueloin === "Medellin" )
                    $idVueloin = 002;
                    if($idVueloin === "Cali")
                    $idVueloin = 003 ;
                    if($idVueloin === "Barranquilla")
                    $idVueloin = 004;
                    if($idVueloin === "Cartagena")
                    $idVueloin = 005;
            
                    if($idVuelode === "Bogota")
                    $idVuelode = 001;
                    if($idVuelode === "Medellin" )
                    $idVuelode = 002;
                    if($idVuelode === "Cali")
                    $idVuelode = 003 ;
                    if($idVuelode === "Barranquilla")
                    $idVuelode = 004;
                    if($idVuelode === "Cartagena")
                    $idVuelode = 005;
    
              
                    
                    $pago_exitoso = true;

                    if ($pago_exitoso) {
                        $sql = "INSERT INTO registro (email, nombre, id, origen, destino, fecha, hora, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssssss",$email, $nombre_pasajero, $id_pasajero, $idVueloin, $idVuelode, $fecha, $hora, $precio_formateado);
                
                        if ($stmt->execute()) {
                            echo '<div class="message success">Pago realizado exitosamente. ¡Gracias por tu compra!</div>';
                        } else {
                            echo '<div class="message error">Error en el registro. Por favor, intenta nuevamente.</div>';
                        }
                
                        $stmt->close();
                    } else {
                        echo '<div class="message error">Error en el pago. Por favor, intenta nuevamente.</div>';
                    }
                }
            }
                
                $conn->close();
                ?>

