<?php
session_start();
require_once '../Class/ClassPaciente.php';
$Paciente = new Paciente();
if (isset($_POST["Buscar"])) {$Paciente->BuscarHistoria($_POST["Buscar"]);}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                WWW.SmartHolter-MenuDoc.com
            </title>
        </meta>
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport"/>
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" rel="stylesheet"/>
        <link href="../css/font.css" rel="stylesheet"/>
        <link href="../css/fontnew.css" rel="stylesheet"/>
        <link href="../css/main.css" rel="stylesheet"/>
        <link href="../css/sweetalert.css" rel="stylesheet"/>
    </head>
    <body>
      <nav class="navbar sticky-top navbar-expand-lg navbar-light">
            <button aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarTogglerDemo01" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <a class="navbar-brand text-white ">
                    <img class="d-inline-block align-top rounded" height="50" src="../img/icoDoctor.jpg" width="50"/>
                    <?php echo "No :" . $_SESSION["sesion_id"] . "<br>
                    " . $_SESSION['sesion_usuario']; ?>
                </a>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                         <a aria-controls="home" aria-selected="true" class="nav-link icon-home active" data-toggle="tab" href="#home" id="home-tab" role="tab">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a aria-controls="" aria-selected="false" class="nav-link" data-toggle="tab" href="" id="" role="tab">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a aria-controls="ECG-Offline" aria-selected="false" class="nav-link " data-toggle="tab" href="#ECG-Offline" id="profile-tab" role="tab">
                            ECG-Offline
                        </a>
                    </li>
                    <li class="nav-item">
                        <a aria-controls="Atenciones" aria-selected="false" class="nav-link icon-clipboard" data-toggle="tab" href="#Atenciones" id="profile-tab" role="tab">
                            Atenciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a aria-controls="profile" aria-selected="false" class="nav-link icon-loop" data-toggle="tab" href="#ActuliazarDatos" id="profile-tab" role="tab">
                            Actuliazar Datos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a aria-controls="Crearhistoria" aria-selected="false" class="nav-link icon-user-plus" data-toggle="tab" href="#Crearhistoria" id="profile-tab" role="tab">
                            Crear historia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-home2" href="..\index.html">
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
      </nav>
      <div class="tab-content" id="myTabContent">
         <div aria-labelledby="home-tab" class="tab-pane fade show active" id="home" role="tabpanel">
                <div class="container-fluid mt-3">
                    <div class="card text-center border-secondary">
                        <div class="card-header bg-info">
                            <div id="custom-search-input">
                                <form action="" autocomplete="off" class="was-validated" method="post" name="serch">
                                    <div class="input-group col-md-12">
                                        <input type="tel" class="search-query form-control" maxlength="12" minlength="10" name="Buscar" placeholder="Buscar Paciente" required="" >
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="submit">
                                                <span class="icon-search">
                                                </span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Electrocardiograma
                                            </h5>
                                            <div id="container">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Identificacion del paciente
                                            </h5>
                                            <div class="form-row">
                                                <div class="col-md-7 m-1">
                                                    <label for="validationDefault01">
                                                        Nombre
                                                    </label>
                                                    <input class="form-control form-control-sm" id="" readonly=""  type="text" placeholder=<?php echo "" . $Paciente->getApellido1() . "-" . $Paciente->getApellido2() . "-" . $Paciente->getNombre1() . "-" . $Paciente->getNombre2() . ""; ?>>
                                                </div>
                                                <div class="col-md-4 m-1">
                                                    <label for="validationDefault01">
                                                        Documento
                                                    </label>
                                                    <div class="input-group md-6">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text form-control form-control-sm">
                                                                Nuip
                                                            </div>
                                                        </div>
                                                        <input type="text" readonly="" class="form-control form-control-sm" id="" placeholder=<?php echo "" . $Paciente->getDocumento() . ""; ?> >
                                                    </div>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault02">
                                                        Fecha-Nacimiento
                                                    </label>
                                                   <input class="form-control form-control-sm" id="" type="text" readonly=""  placeholder=<?php echo "" . $Paciente->getFechaNaci() . ""; ?> >
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Genero
                                                    </label>
                                                    <input class="form-control form-control-sm" id="" type="text" readonly="" placeholder=<?php echo "" . $Paciente->getSexo() . ""; ?>  >
                                                </div>
                                                <div class="col-md-4 m-1">
                                                    <label for="validationDefault02">
                                                        Mac del SmartHolter
                                                    </label>
                                                   <input class="form-control form-control-sm" id="" type="text" readonly="" placeholder=<?php echo "" . $Paciente->getIdHolter() . ""; ?>>
                                                </div>
                                            </div>
                                            <h5 class="card-title">
                                                Informacion del responsable
                                            </h5>
                                            <div class="form-row">
                                                <div class="col-md-6 m-1">
                                                    <label for="validationDefault01">
                                                        Nombre del Responsable
                                                    </label>
                                                  <input class="form-control form-control-sm" id="" readonly="" type="text" placeholder=<?php echo "" . $Paciente->getNombres() . "-" . $Paciente->getApellidos() . ""; ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault02">
                                                        Parentesco
                                                    </label>
                                                    <input class="form-control form-control-sm" id="" type="text"  readonly="" placeholder=<?php echo "" . $Paciente->getParentesco() . ""; ?>  >
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        TIPO
                                                    </label>
                                                   <input class="form-control form-control-sm" id="" type="text" readonly="" placeholder=<?php echo $Paciente->getTipoR(); ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault02">
                                                        Documento
                                                    </label>
                                                   <input class="form-control form-control-sm" id="" type="text" readonly="" placeholder=<?php echo "" . $Paciente->getIdResponsable() . ""; ?> >
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Telefono
                                                    </label>
                                                   <input class="form-control form-control-sm" id="" type="text"  readonly=""  placeholder=<?php echo "" . $Paciente->getTelefono() . ""; ?>  >
                                                </div>
                                                <div class="col-md-5 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Correo
                                                    </label>
                                                     <input class="form-control form-control-sm" id="" type="text" readonly="" placeholder=<?php echo "" . $Paciente->getCorreo() . ""; ?> >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="container-fluid m-1">
                                     <div class="card border-info">
                                        <div class="card-body">
                                         <div class="form-row">
                                            <div class="custom-control-inline custom-switch ">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch ">
                                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch ">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch ">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                         </div>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-3 ">
                    <div class="card text-center border-secondary">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title">
                                Registar Atencion
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <form action="php" class="was-validated" method="post">
                                                <div class="form-row">

                                                    <div class="form-group registration-date col-md-4 m-3">
                                                        <label class="control-label col-md-7" for="registration-date">
                                                            Fecha y hora de Atencion
                                                        </label>
                                                        <div class="input-group registration-date-time">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <span aria-hidden="true" class="glyphicon glyphicon-calendar">
                                                                </span>
                                                            </span>
                                                            <input class="form-control" id="registration-date" name="registration_date" required="" type="date"/>
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <span aria-hidden="true" class="glyphicon glyphicon-time">
                                                                </span>
                                                            </span>
                                                            <input class="form-control" id="registration-time" name="registration_time" required="" type="time">
                                                            </input>
                                                        </div>
                                                    </div>
                                                     <div class="form-group col-md-5 m-3">
                                                        <textarea required="" class="form-control is-invalid" id="validationTextarea" type="text"></textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter a message in the textarea.
                                                        </div>
                                                    </div>
                                                    <div class=" form-group col-md-3 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                Causa externa
                                                            </option>
                                                            <option value="1">
                                                                otra
                                                            </option>
                                                            <option value="2">
                                                                Enfermedad general
                                                            </option>
                                                            <option value="3">
                                                                Enfermedad Profesional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-3 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                Finalidad de la Consulta
                                                            </option>
                                                            <option value="1">
                                                                Atencion del Recien nacido
                                                            </option>
                                                            <option value="2">
                                                                No aplica
                                                            </option>
                                                            <option value="3">
                                                                Detencion de enfermedad profecional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-2 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                RIPS
                                                            </option>
                                                            <option value="1">
                                                                Atencion del Recien nacido
                                                            </option>
                                                            <option value="2">
                                                                No aplica
                                                            </option>
                                                            <option value="3">
                                                                Detencion de enfermedad profecional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-success btn-sm m-1" type="submit">
                                                        <span class="icon-floppy-disk">
                                                            Guardar
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
         <div aria-labelledby="profile-tab" class="tab-pane fade" id="ECG-Offline" role="tabpanel">
            <div class="container-fluid mt-3">
                <div class="card border-secondary">
                        <div class="card-body">
                          <div class="row">
                                <div class="col-sm-6">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Electrocardiograma
                                            </h5>
                                            <div id="container2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                Identificacion del paciente
                                            </h5>
                                            <div class="form-row">
                                                <div class="col-md-7 m-1">
                                                    <label for="validationDefault01">
                                                        Nombre
                                                    </label>
                                                    <input class="form-control form-control-sm" id="" readonly=""  type="text" placeholder=<?php echo "" . $Paciente->getApellido1() . "-" . $Paciente->getApellido2() . "-" . $Paciente->getNombre1() . "-" . $Paciente->getNombre2() . ""; ?>>
                                                </div>
                                                <div class="col-md-4 m-1">
                                                    <label for="validationDefault01">
                                                        Documento
                                                    </label>
                                                    <div class="input-group md-6">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text form-control form-control-sm">
                                                                Nuip
                                                            </div>
                                                        </div>
                                                        <input type="text" readonly="" class="form-control form-control-sm" id="" placeholder=<?php echo "" . $Paciente->getDocumento() . ""; ?> >
                                                    </div>
                                               </div>
                                           </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                  <div class="container-fluid m-1">
                                     <div class="card border-info">
                                        <div class="card-body">
                                         <div class="form-row">
                                            <div class="custom-control-inline custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch">
                                                <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                            <div class="custom-control-inline custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                         </div>
                                       </div>
                                      </div>
                                   </div>
                                 </div>
                             </div>
                        </div>
                  </div>
            </div>
            <div class="container-fluid mt-3 ">
                    <div class="card text-center border-secondary">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title">
                                Registar Atencion
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card border-info">
                                        <div class="card-body">
                                            <form action="php" class="was-validated" method="post">
                                                <div class="form-row">
                                                    <div class="form-group registration-date col-md-4 m-3">
                                                        <label class="control-label col-md-7" for="registration-date">
                                                            Fecha y hora de Atencion
                                                        </label>
                                                         <div class="input-group registration-date-time">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <span aria-hidden="true" class="glyphicon glyphicon-calendar">
                                                                </span>
                                                            </span>
                                                            <input class="form-control" id="registration-date" name="registration_date" required="" type="date"/>
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <span aria-hidden="true" class="glyphicon glyphicon-time">
                                                                </span>
                                                            </span>
                                                            <input class="form-control" id="registration-time" name="registration_time" required="" type="time">
                                                            </input>
                                                         </div>
                                                    </div>
                                                     <div class="form-group col-md-5 m-3">
                                                        <textarea required="" class="form-control is-invalid" id="validationTextarea" type="text"></textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter a message in the textarea.
                                                        </div>
                                                    </div>
                                                    <div class=" form-group col-md-3 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                Causa externa
                                                            </option>
                                                            <option value="1">
                                                                otra
                                                            </option>
                                                            <option value="2">
                                                                Enfermedad general
                                                            </option>
                                                            <option value="3">
                                                                Enfermedad Profesional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-3 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                Finalidad de la Consulta
                                                            </option>
                                                            <option value="1">
                                                                Atencion del Recien nacido
                                                            </option>
                                                            <option value="2">
                                                                No aplica
                                                            </option>
                                                            <option value="3">
                                                                Detencion de enfermedad profecional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-2 m-1">
                                                        <select class="custom-select" required="">
                                                            <option value="">
                                                                RIPS
                                                            </option>
                                                            <option value="1">
                                                                Atencion del Recien nacido
                                                            </option>
                                                            <option value="2">
                                                                No aplica
                                                            </option>
                                                            <option value="3">
                                                                Detencion de enfermedad profecional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-outline-success btn-sm m-1" type="submit">
                                                        <span class="icon-floppy-disk">
                                                            Guardar
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
         </div>
         <div aria-labelledby="contact-tab" class="tab-pane fade" id="Atenciones" role="tabpanel">
              <div class="container-fluid mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-secondary">
                                    <div class="card-header bg-info ">
                                        <h5 class="card-title text-white">
                                            Atenciones :
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Numero Consulta
                                                        </th>
                                                        <th scope="col">
                                                            Nombre del  Doctor
                                                        </th>
                                                        <th scope="col">
                                                            Fecha y Hora Registro
                                                        </th>
                                                        <th scope="col">
                                                            Pornostico
                                                        </th>
                                                        <th scope="col">
                                                           Evolucion
                                                        </th>
                                                        <th scope="col">
                                                            Finalidad Consulta
                                                        </th>
                                                        <th scope="col">
                                                            Causa Externa
                                                        </th>
                                                        <th scope="col">
                                                            Rips
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
         <div aria-labelledby="contact-tab" class="tab-pane fade" id="ActuliazarDatos" role="tabpanel">
                <div class="container-fluid mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-secondary">
                                    <div class="card-header bg-info text-white">
                                     Actualizar Información
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Datos del  Paciente
                                        </h5>
                                        <form action="UpdatePaciente.php" autocomplete="OFF" class="was-validated" method="post" name="update">
                                            <div class="form-row">
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Primer Nombre
                                                    </label>
                                                     <input class="form-control form-control-sm" name="Nombre1"  type="text" required="" value=<?php echo "" . $Paciente->getNombre1() . ""; ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Segundo Nombre
                                                    </label>
                                                   <input class="form-control form-control-sm" name="Nombre2" type="text" value=<?php echo "" . $Paciente->getNombre2() . ""; ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Primer Apellido
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Apellido1"  type="text" required="" value=<?php echo "" . $Paciente->getApellido1() . ""; ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Segundo Apellido
                                                    </label>
                                                   <input class="form-control form-control-sm" name="Apellido2" type="text"  value=<?php echo "" . $Paciente->getApellido2() . ""; ?>>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Documento
                                                    </label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text form-control form-control-sm">
                                                                Nuip
                                                            </div>
                                                        </div>
                                                      <input type="tel" class="form-control form-control-sm" name="Documento" minlength="11" maxlength="12" readonly=""  value=<?php echo "" . $Paciente->getDocumento() . ""; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Fecha de nacimiento
                                                    </label>
                                                    <div class="input-group registration-date-time">
                                                       <input class="form-control form-control-sm"  name="FechaNac" required="" type="date" value=<?php echo "" . $Paciente->getFechaNaci() . ""; ?>>
                                                            <span class="input-group-addon" id="basic-addon1">
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Genero
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Genero" required="">
                                                         <option value=<?php echo "" . $Paciente->getSexo() . ""; ?>>
                                                         <?php echo "" . $Paciente->getSexo() . ""; ?>
                                                         </option>
                                                         <option value="Masculino">
                                                            Masculino
                                                         </option>
                                                         <option value="Femenino">
                                                            Femenino
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Mac del SmartHolter
                                                    </label>
                                                    <input class="form-control form-control-sm" name="MacHolter"  type="text" required="" value=<?php echo "" . $Paciente->getIdHolter() . ""; ?> >
                                                </div>
                                            </div>
                                            <h5 class="card-title">
                                                Datos del Responsable
                                            </h5>
                                            <div class="form-row">
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault01">
                                                        Nombres
                                                    </label>
                                                   <input class="form-control form-control-sm" name="NombreResp"  type="text" required="" value=<?php echo "" . $Paciente->getNombres() . ""; ?>>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault01">
                                                        Apellidos
                                                    </label>
                                                   <input class="form-control form-control-sm" name="ApellidosResp"  type="text" required="" value=<?php echo "" . $Paciente->getApellidos() . ""; ?>>
                                                </div>
                                                  <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Documento
                                                    </label>
                                                   <input class="form-control form-control-sm" name="DocumentoRes"  type="tel" readonly=""  minlength="7" maxlength="12" value=<?php echo "" . $Paciente->getIdResponsable() . ""; ?>>
                                                </div>
                                                   <div class="col-md-1 m-1">
                                                    <label for="validationDefault02">
                                                        TIPO
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Tipo" required="">
                                                        <option value=<?php echo "" . $Paciente->getTipoR() . ""; ?>>
                                                          <?php echo "" . $Paciente->getTipoR() . ""; ?>
                                                        </option>
                                                        <option value="C.C">
                                                            C.C
                                                        </option>
                                                        <option value="TI">
                                                            TI
                                                        </option>
                                                        <option value="NUIP">
                                                            NUIP
                                                        </option>
                                                        <option value="PA">
                                                            PA
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 m-1">
                                                    <label for="validationDefault02">
                                                        Parentesco
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Parentesco" required="">
                                                        <option value=<?php echo "" . $Paciente->getParentesco() . ""; ?>>
                                                          <?php echo "" . $Paciente->getParentesco() . ""; ?>
                                                        </option>
                                                        <option value="Mama">
                                                            Mamá
                                                        </option>
                                                        <option value="Papa">
                                                            Papá
                                                        </option>
                                                        <option value="Hermano(a)">
                                                            Hermano(a)
                                                        </option>
                                                        <option value="Abuelo(a)">
                                                            Abuelo(a)
                                                        </option>
                                                        <option value="Tio(a)">
                                                            Tio(a)
                                                        </option>
                                                    </select>
                                                </div>
                                               <div class="col-md-2 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Telefono
                                                    </label>
                                                  <input class="form-control form-control-sm" name="NoContacto"  type="tel" required="" minlength="7" maxlength="10" value=<?php echo "" . $Paciente->getTelefono() . ""; ?>>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Correo
                                                    </label>
                                                   <input class="form-control form-control-sm" name="Correo"  type="correo" required="" value=<?php echo "" . $Paciente->getCorreo() . ""; ?>>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-success btn-md m-2" type="submit">
                                                <span class="icon-floppy-disk ">
                                                    Guardar
                                                </span>
                                            </button>
                                        </form>
                                        <div name="mensaje">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
         </div>
         <div aria-labelledby="contact-tab" class="tab-pane fade" id="Crearhistoria" role="tabpanel">
                <div class="container-fluid mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-secondary">
                                    <div class="card-header bg-info text-white">
                                        Registrar Datos
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Datos del  Paciente
                                        </h5>
                                        <form action="InsertPaciente.php" autocomplete="OFF" class="was-validated" method="post" name="insert">
                                            <div class="form-row">
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Primer Nombre
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Nombre1" required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Segundo Nombre
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Nombre2" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Primer Apellido
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Apellido1" required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Segundo Apellido
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Apellido2" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-3 m-1">
                                                    <label for="validationDefault01">
                                                        Documento
                                                    </label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text form-control form-control-sm">
                                                                Nuip
                                                            </div>
                                                        </div>
                                                        <input class="form-control form-control-sm" maxlength="12" minlength="10" name="Documento" required="" type="tel">
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Fecha de nacimiento
                                                    </label>
                                                    <div class="input-groupregistration-date-time">
                                                        <input class="form-control form-control-sm" name="FechaNac" required="" type="date"/>
                                                        <span class="input-group-addon" id="basic-addon1">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Genero
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Genero" required="">
                                                        <option>
                                                        </option>
                                                        <option value="Masculino">
                                                            Masculino
                                                        </option>
                                                        <option value="Femenino">
                                                            Femenino
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Mac del SmartHolter
                                                    </label>
                                                    <input class="form-control form-control-sm" name="MacHolter" required="" type="text">
                                                    </input>
                                                </div>
                                            </div>
                                            <h5 class="card-title">
                                                Datos del Responsable
                                            </h5>
                                            <div class="form-row">
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault01">
                                                        Nombres
                                                    </label>
                                                    <input class="form-control form-control-sm" name="NombreResp" required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault01">
                                                        Apellidos
                                                    </label>
                                                    <input class="form-control form-control-sm" name="ApellidosResp" required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefault02">
                                                        Documento
                                                    </label>
                                                    <input class="form-control form-control-sm" maxlength="12" minlength="7" name="DocumentoRes" required="" type="tel">
                                                    </input>
                                                </div>
                                                <div class="col-md-1 m-1">
                                                    <label for="validationDefault02">
                                                        TIPO
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Tipo" required="">
                                                        <option>
                                                        </option>
                                                        <option value="C.C">
                                                            C.C
                                                        </option>
                                                        <option value="TI">
                                                            TI
                                                        </option>
                                                        <option value="NUIP">
                                                            NUIP
                                                        </option>
                                                        <option value="PA">
                                                            PA
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 m-1">
                                                    <label for="validationDefault02">
                                                        Parentesco
                                                    </label>
                                                    <select class="form-control form-control-sm" name="Parentesco" required="">
                                                        <option>
                                                        </option>
                                                        <option value="Mama">
                                                            Mamá
                                                        </option>
                                                        <option value="Papa">
                                                            Papá
                                                        </option>
                                                        <option value="Hermano(a)">
                                                            Hermano(a)
                                                        </option>
                                                        <option value="Abuelo(a)">
                                                            Abuelo(a)
                                                        </option>
                                                        <option value="Tio(a)">
                                                            Tio(a)
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefaultUsername">
                                                        No de Contacto
                                                    </label>
                                                    <input class="form-control form-control-sm" maxlength="10" minlength="7" name="NoContacto" required="" type="tel">
                                                    </input>
                                                </div>
                                                <div class="col-md-2 m-1">
                                                    <label for="validationDefaultUsername">
                                                        Correo
                                                    </label>
                                                    <input class="form-control form-control-sm" name="Correo" required="" type="email">
                                                    </input>
                                                </div>
                                            </div>
                                             <button class="btn btn-outline-success btn-md m-2" type="submit">
                                                <span class="icon-floppy-disk ">
                                                    Guardar
                                                </span>
                                            </button>
                                        </form>
                                        <div name="mensaje">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
      </div>
    </body>
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script crossorigin="anonymous" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js">
    </script>
    <script crossorigin="anonymous" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js">
    </script>
    <script src="https://code.highcharts.com/highcharts.js">
    </script>
    <script src="https://code.highcharts.com/modules/exporting.js">
    </script>
    <script src="https://code.highcharts.com/modules/export-data.js">
    </script>
    <script src="../js/functions.js">
    </script>

</html>