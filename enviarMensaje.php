<?php
$to = "info@zaidinvergeles.local";
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$subject = "Pregunta de $nombre, correo: $correo";
$message = $_POST['mensaje'];

mail($to,$subject,$message);

header('Location: ./contacta.html');
