<?php
$log = 'médico';
$url = 'medicalrecord.php';

require_once 'config/config.php';
require_once 'templates/header.php';
require_once 'templates/navlog.php';

if($_SESSION['doctor']):
?>

<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['doctor']?></h1>
    </div>
    <div class="container">
        <h2>Crie seu prontuário</h2>
    </div>
    <form action="" method="post" class="mb-3 container">
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
        <div class="mb-3">
                <label for="hypothesis" class="form-label">Hipótese</label>
                <input type="text" name="hypothesis" class="form-control" placeholder="Digite a hipótese" id="hypothesis">
        </div>
        <div class="mb-3">
                <label for="medicines" class="form-label">Medicações</label>
                <input type="text" name="medicines" class="form-control" placeholder="Digite as medicações" id="medicines">
        </div>
        <button type="submit" class="btn btn-primary">Marcar consulta</button>
    </form>
</section>


<?php else:

header('location: login.php?type=doctor');
exit();

endif?>