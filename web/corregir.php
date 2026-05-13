<?php

include("conexion.php");

$nota = 0;

$sql = "SELECT * FROM preguntas";
$resultado = $conn->query($sql);

while($fila = $resultado->fetch_assoc()) {

    $id = $fila['id'];

    if(isset($_POST["pregunta_$id"])) {

        $respuesta = $_POST["pregunta_$id"];

        if($respuesta == $fila['correcta']) {
            $nota++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/style_corregir.css">
</head>

<body>

    <div class="resultado">
        <h1>Resultado: <?php echo $nota; ?></h1>

        <a href="tests.html" class="boton">
            Volver
        </a>
    </div>

</body>
</html>