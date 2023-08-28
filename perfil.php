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

        $query = "SELECT * FROM usuarios WHERE email='$email'";
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
        <a href="perfil.php">Mi Perfil</a>
        <a href="firstpage.php">Reservar</a>
        <a href="viajes.php">Tus Viajes</a>
        <a href="ayuda.php">Centro de Ayuda</a>
        
    </div>
    <center>
        <h2>Datos del Usuario</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Numero de contacto</th>
                <th>Edad</th>
                <th>Email</th>
                <!-- Agrega más columnas según los campos que tengas en tu tabla -->
            </tr>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["numero"] . "</td>";
                        echo "<td>" . $row["edad"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
                }
            ?>
        </table>
        <br>
        <a href="logout.php">Cerrar sesión</a>
    </center>
</body>
</html>