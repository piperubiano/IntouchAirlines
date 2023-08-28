<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airlines";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST ["id"];
    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $confirmar_contrasena = $_POST["confirmar_contrasena"];

    if ($contrasena === $confirmar_contrasena) {
        $sql = "INSERT INTO usuarios (id, nombre, numero, edad, email, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss",$id, $nombre, $numero, $edad, $email, $contrasena);
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Las contraseñas no coinciden";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="stilos.css">
</head>
<body background="img/reg.png">
    <center>
        <br><br><br><br><br><br><br><br>
        <FONT FACE="Times New Roman" SIZE=8 COLOR="black">Registro de Usuarios</FONT>
        <?php if (isset($mensaje)) { ?>
            <p><?php echo $mensaje; ?></p>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <td align="right">
                    <ul style="list-style: none;">
                        <br>
                        <li><label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" size="25" name="nombre" required title="Campo para escribir el nombre" placeholder="digite el nombre...">
                        </li>
                        <br><br>
                        <li><label for="id">Identificacion:</label>
                            <input type="text" id="id" size="25" name="id" required title="Campo para escribir su identificacion" placeholder="digite el numero de identificacion...">
                        </li>
                        <br><br>
                        <li><label for="numero">Numero de contacto:</label>
                            <input type="text" id="numero" size="25" name="numero" required title="Campo para escribir el nummero" placeholder="digite el numero...">
                        </li>
                        <br><br>
                        <li><label for="edad">Su edad:</label>
                            <input type="text" id="edad" size="25" name="edad" required title="Campo para escribir su edad" placeholder="digite su edad..." maxlength="2">
                        </li>
                        <br><br>
                        <li><label for="email">Email:</label>
                            <input type="email" id="email" size="25" name="email" required title="Campo para escribir el Email" placeholder="digite su Email..."><br>
                        </li>
                        <br><br>
                        <li><label for="contrasena">Contraseña:</label>
                            <input type="password" id="contrasena" size="25" name="contrasena" required title="Campo para escribir la contrasena" placeholder="digite la contrasena..."><br>
                        </li>
                        <br><br>
                        <li><label for="confirmar_contrasena">Confirmar Contraseña:</label>
                            <input type="password" id="confirmar_contrasena" size="25" name="confirmar_contrasena" required title="Campo para confirmar contrasena" placeholder="digite la contraseña..."><br>
                        </li>
                    </ul>
                </td>
            </table>
            <br><br>
            &nbsp &nbsp<input class="btn" type="submit" value="Registrar">

        </form>
        <br>
    <FONT FACE="Times New Roman" SIZE=3 COLOR="black">Si ya esta registrado </FONT><a href="login.php">Haga click aqui!!</a>
    </center>
</body>
</html>
