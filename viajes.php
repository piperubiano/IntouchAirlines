<?php
    session_start();
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "airlines";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $query = "SELECT * FROM registro WHERE email='$email'";
        $result = $conn->query($query);


        $conn->close();
    } else {
        echo "No se encontró el email en la sesión.";
        exit();
    }

        ?>

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
            background-color: #f0f8ff; /* Color de fondo (azul claro) */
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
            padding: 20px;
        }

        #menu a {
            text-decoration: none;
            color: #192519;
            margin: 0 20px;
        }
        #reservar-form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
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
            width: 100%;
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
        <h2>Datos del Usuario</h2>
        <table border="1">
            <tr>
                <th>Email</th>
                <th>Nombre</th>
                <th>Id</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Precio</th>
            </tr>
            <?php
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $origen = $row["origen"]; 
                    $destino = $row["destino"];
                    $precio = $row["precio"];

                        if($origen == 1)
                        $origen = "Bogota";
                        if($origen == 002)
                        $origen = "Medellin";
                        if($origen == 003)
                        $origen = "Cali";
                        if($origen == 004)
                        $origen = "Barranquilla";
                        if($origen == 005)
                        $origen = "Cartagena";
                    
                        if($destino == 001)
                        $destino = "Bogota";
                        if($destino == 002)
                        $destino = "Medellin";
                        if($destino == 003)
                        $destino = "Cali";
                        if($destino == 004)
                        $destino = "Barranquilla";
                        if($destino == 005)
                        $destino = "Cartagena";
                    

                echo "<tr>";
                echo "<td>" . $email . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $origen . "</td>";
                echo "<td>" . $destino . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . $row["hora"] . "</td>";
                echo "<td>" . number_format((float) str_replace(['$', '.', ','], '', $precio), 0, '.', '.') . " COP</td>";
                echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
                }
      
