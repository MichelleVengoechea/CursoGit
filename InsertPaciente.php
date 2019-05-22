<?php
session_start();
require_once '../Class/ClassPaciente.php';

// Creamos una nueva instancia
$miPaciente = new Paciente();

$tipoN     = 'Nuip';
$newDateNa = date("Y-m-d", strtotime($_POST["FechaNac"]));
$NoDoctor  = $_SESSION["sesion_id"];

$validar = $miPaciente->ValidarHistoria($_POST["Documento"]);
if ($validar == 0) {
    $miPaciente->CrearHistoria($_POST["Documento"], $tipoN, $_POST["Nombre1"], $_POST["Nombre2"], $_POST["Apellido1"], $_POST["Apellido2"], $newDateNa, $_POST["Genero"], $_POST["MacHolter"], $_POST["DocumentoRes"], $NoDoctor, $_POST["Tipo"], $_POST["NombreResp"], $_POST["ApellidosResp"], $_POST["Parentesco"], $_POST["NoContacto"], $_POST["Correo"]);
}
