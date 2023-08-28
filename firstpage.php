<?php
session_start(); 
if (isset($_SESSION["email"])) 
    $email = $_SESSION["email"];

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
    

    <div id="reservar-form">
        <h2>Reservar un Vuelo</h2>
        <form action="procesar_reserva.php" method="POST">
            <label for="punto-inicio">Punto de Inicio:</label>
            <select id="inicio" name="inicio" required>
                <option value="none">Seleccione una opcion...</option>
                <option value="001">Bogotá</option>
                <option value="002">Medellín</option>
                <option value="003">Cali</option>
                <option value="004">Barranquilla</option>
                <option value="005">Cartagena</option>
                
            </select>

            <label for="destino">Destino:</label>
            <select id="destino" name="destino" required>
                <option value="none">Seleccione una opcion...</option>
                <option value="001">Bogotá</option>
                <option value="002">Medellín</option>
                <option value="003">Cali</option>
                <option value="004">Barranquilla</option>
                <option value="005">Cartagena</option>

                
            </select>

            <label for="fecha">Fecha de Viaje:</label>
            <input type="date" id="fecha" name="fecha" required>
            <br><br>

            <label for="precio">escoge el precio maximo: </label>
<input
  type="range"
  name="precio"
  id="precio"
  min="10000"
  max="2000000"
  step="100"
  value="2000000" />
<output class="price-output" for="price"></output>

<script>
   
    const rangeInput = document.getElementById("precio");
    const priceOutput = document.querySelector(".price-output");
  
    rangeInput.addEventListener("input", function () {
      priceOutput.textContent = rangeInput.value;
    });
  </script>

            <button type="submit">consultar</button>
        </form>
    </div>
</body>
</html>