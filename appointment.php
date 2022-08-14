<?php
$log = 'paciente';
$url = 'appointment.php';
require_once 'config/config.php';
require_once 'templates/header.php';
require_once 'templates/navlog.php';

if($_SESSION['patient']):

    if($_SESSION['alert']){
        echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
        $_SESSION['alert'] = '';
    }
?>

<section class="section-main">
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['patient']?></h1>
    </div>
    <div class="container">
        <h2>Marque uma consulta</h2>
    </div>
    <form action="appointment_process.php" method="post" class="mb-3 container">
        <div class="mb-3">
            <label for="date" class="form-label">Insira data da consulta</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>
        <div class="mb-3">
                <label for="time" class="form-label">Insira horário da consulta</label>
                <input type="time" name="time" class="form-control" id="time">
        </div>
        <div class="mb-3">
                <label for="patient" class="form-label">Nome do paciente</label>
                <input type="text" name="patient" class="form-control" placeholder="Digite nome do paciente" id="patient">
        </div>
        <div class="mb-3">
                <label for="doctor" class="form-label">Nome do médico</label>
                <input type="text" name="doctor" class="form-control" placeholder="Digite nome do médico" id="doctor">
        </div>
        <button type="submit" class="btn btn-primary">Marcar consulta</button>
    </form>
    <div>
        <h1>Oi</h1>
    </div>
</section>


<?php else:

header('location: login.php?type=patient');
exit();

endif?>