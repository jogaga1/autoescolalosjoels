<?php

include("conexion.php");

if (!isset($_GET['categoria'])) {
    die("Falta la categoría");
}

$categoria = trim($_GET['categoria']);

$sql = "SELECT * FROM preguntas 
WHERE categoria = '$categoria'
ORDER BY RAND()
LIMIT 10";

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

if ($resultado->num_rows == 0) {
    die("No hay preguntas en esta categoría");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Test</title>
<link rel="stylesheet" href="css/style_tests.css">
</head>
<body>

<form action="corregir.php" method="POST">

<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">

<?php
$numero = 1;

while ($fila = $resultado->fetch_assoc()) {
?>

<h3><?php echo $numero . ". " . $fila['pregunta']; ?></h3>

<input type="radio" name="pregunta_<?php echo $fila['id']; ?>" value="1" required>
<?php echo $fila['opcion1']; ?><br>

<input type="radio" name="pregunta_<?php echo $fila['id']; ?>" value="2">
<?php echo $fila['opcion2']; ?><br>

<input type="radio" name="pregunta_<?php echo $fila['id']; ?>" value="3">
<?php echo $fila['opcion3']; ?><br>

<input type="radio" name="pregunta_<?php echo $fila['id']; ?>" value="4">
<?php echo $fila['opcion4']; ?><br><br>

<?php
$numero++;
}
?>

<button type="submit">Corregir</button>

</form>

</body>
</html>