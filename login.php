<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlines";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["contrasena"];

  
    $query = "SELECT * FROM usuarios WHERE email='$email' AND contrasena='$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        session_start();  
        $_SESSION["email"] = $email;  
        header("Location: firstpage.php");
        exit();
    }

    if ($result->num_rows === 1) {

        echo "Inicio de sesión exitoso.";
        header("Location: firstpage.php");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="stilos.css">
    
</head>

<body background="img/registro.png"> 
    <center>
        <br><br><br><br><br><br><br><br>
        <FONT FACE="Times New Roman" SIZE=8 COLOR="black">Inicio de Sesión</FONT>
        <?php if (!empty($mensaje_error)) { ?>
            <p><?php echo $mensaje_error; ?></p>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <td align="right">
                    <ul style="list-style: none;">
                        <br><br><br><br><br><br><br>
                        <li><label for="email">Email:</label>
                            <input type="email" id="email" size="25" name="email" required title="Campo para escribir el Email" placeholder="digite su Email..."><br>
                        </li>
                        <br><br>
                        <li><label for="contrasena">Contraseña:</label>
                            <input type="password" id="contrasena" size="25" name="contrasena" required title="Campo para escribir la contrasena" placeholder="digite la contrasena..."><br>
                        </li>
                    </ul>
                </td>
            </table>
            <br><br><br><br><br><br><br>
            <input class="btn" type="submit" value="Iniciar Sesión">
        </form>
        <br>
        <FONT FACE="Times New Roman" SIZE=3 COLOR="black">Si no tiene cuenta </FONT><a href="conexion.php">registrese aqui!!</a>
    </center>
</body>
</html>
