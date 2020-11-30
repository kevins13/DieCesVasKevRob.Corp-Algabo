<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}

require "vendor/autoload.php";

$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
$text = $qrcode->text();
$ejemplo = explode(",",$text);
$i = 0;

$conexion=mysqli_connect("localhost","root","","trabajoFinal");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabajoFinal";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO lectura (empleado,fecha,hora,id_producto,fabricante,producto,lote,vto)
VALUES ('$ejemplo[0]','$ejemplo[1]','$ejemplo[2]','$ejemplo[3]','$ejemplo[4]','$ejemplo[5]','$ejemplo[6]','$ejemplo[7]')";
if ($conn->query($sql) === TRUE) {
echo "datos insertados en la base de datos correctamente";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Decoding QR codes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        .bg {
            background-image: url("images/bg.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg">
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                <div class="panel-heading">
                    <h1>Decode QR codes</h1>
                </div>
                <hr>
                <p><strong>Data in QR-code:</strong></p>
                <p><?php echo $ejemplo[0] ?></p>
                <hr>
                <a href="indexx.php">Decode Another</a>
            </div>
        </div>
    </div>
    
</body>
</html>