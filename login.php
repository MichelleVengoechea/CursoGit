<?php
session_start();
require_once '../Class/ClassUsuario.php';
// Creamos una nueva instancia
$Usuario = new Usuario();

if ($_POST["user"] != "" && $_POST["pass"] !== "") {
    $Usuario->ValidarUsuario($_POST["user"], $_POST["pass"]);
}
