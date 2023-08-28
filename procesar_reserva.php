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
    <title>Resultados de la Consulta</title>
<center>
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


    <table id="flightTable" >
        <thead>
            <tr>
                
                <th>Punto de Inicio</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>check</th>
            </tr>
        </thead>
        <tbody>
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
                $inicio = $_POST["inicio"];
                $destino = $_POST["destino"];
                $fecha = $_POST["fecha"];
                $precio = $_POST["precio"];
                $precio_minimo = 10000;
                $precio_maximo = 2000000;
                $fecha_objeto = new DateTime($fecha);
                $fecha_fin = $fecha_objeto->format('Y-m-d');

                $stmt = $conn->prepare("SELECT id_ciudad_in, id_ciudad_des, fecha, hora, precio FROM vuelos WHERE id_ciudad_in = ? AND id_ciudad_des = ? AND fecha = ? AND precio <= ?");
                $stmt->bind_param("ssss", $inicio, $destino, $fecha_fin, $precio);
                $stmt->execute();
                $stmt->bind_result($idVueloin, $idVuelode, $fecha, $hora, $precio);

                while ($stmt->fetch()) {
                    if($idVueloin === 001)
                    $idVueloin = "Bogota";
                    if($idVueloin === 002)
                    $idVueloin = "Medellin";
                    if($idVueloin === 003)
                    $idVueloin = "Cali";
                    if($idVueloin === 004)
                    $idVueloin = "Barranquilla";
                    if($idVueloin === 005)
                    $idVueloin = "Cartagena";
            
                    if($idVuelode === 001)
                    $idVuelode = "Bogota";
                    if($idVuelode === 002)
                    $idVuelode = "Medellin";
                    if($idVuelode === 003)
                    $idVuelode = "Cali";
                    if($idVuelode === 004)
                    $idVuelode = "Barranquilla";
                    if($idVuelode === 005)
                    $idVuelode = "Cartagena";

                    echo "<tr>";
                    echo "<td>$idVueloin</td>";
                    echo "<td>$idVuelode</td>";
                    echo "<td>$fecha</td>";
                    echo "<td>$hora</td>";
                    echo "<td>$" . number_format($precio, 0, '.', '.') . " Cop</td>";
                    echo "</tr>";
                }

                $stmt->close();
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    </center>
    <button class = "btn" id="submitBtn" disabled>Seleccionar Vuelo</button>

    <script>
        const rows = document.querySelectorAll("#flightTable tbody tr");
        const submitBtn = document.getElementById("submitBtn");
        let selectedRow = null;

        rows.forEach(row => {
            const checkboxCell = document.createElement("td");
            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkboxCell.appendChild(checkbox);
            row.appendChild(checkboxCell);

            row.addEventListener("click", () => {
                if (selectedRow) {
                    selectedRow.classList.remove("selected");
                    selectedRow.querySelector("input[type='checkbox']").checked = false;
                }

                row.classList.add("selected");
                checkbox.checked = true;
                selectedRow = row;
                submitBtn.disabled = false;
            });
        });

        submitBtn.addEventListener("click", () => {
    if (selectedRow) {
        const dataCells = selectedRow.querySelectorAll("td:not(:last-child)");
        const formData = [...dataCells].map(cell => cell.textContent.trim());
        const selectedFlightURL = `pago.php?${encodeURIComponent("idVueloin")}=${encodeURIComponent(formData[0])}&${encodeURIComponent("idVuelode")}=${encodeURIComponent(formData[1])}&${encodeURIComponent("fecha")}=${encodeURIComponent(formData[2])}&${encodeURIComponent("hora")}=${encodeURIComponent(formData[3])}&${encodeURIComponent("precio")}=${encodeURIComponent(formData[4])}`;  
        window.location.href = selectedFlightURL;
    }
});
    </script>
    </script>
    
    
</body>
</html>
