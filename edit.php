<?php
require_once 'templates/header.php';
require_once 'templates/navlog.php';
if($_GET['edit_ap']):?>

<?php 
$id = $_GET['edit_ap'];
require_once 'config/config.php';
require_once 'dao/AppointmentDaoMysql.php';
$ap = new AppointmentDaoMysql($pdo); 
$obj = $ap->findById($id);
?>

<form action="appointment_process.php" method="post" class="mb-3 container form-main">
            <input type="hidden" name="type" value="appointment">
            <input type="hidden" name="id" value="<?=$obj->getId()?>">
            <div class="mb-3">
                <label for="date" class="form-label">Insira data da consulta</label>
                <input type="date" name="date" class="form-control" id="date" value="<?=$obj->getDate()?>">
            </div>
            <div class="mb-3">
                    <label for="time" class="form-label">Insira horário da consulta</label>
                    <input type="time" name="time" class="form-control" id="time" value="<?=$obj->getTime()?>">
            </div>
            <div class="mb-3">
                    <label for="patient" class="form-label">Nome do paciente</label>
                    <input type="text" name="patient" class="form-control" placeholder="Digite nome do paciente" id="patient" value="<?=$obj->getPatient()?>">
            </div>
            <div class="mb-3">
                    <label for="doctor" class="form-label">Nome do médico</label>
                    <input type="text" name="doctor" class="form-control" placeholder="Digite nome do médico" id="doctor" value="<?=$obj->getDoctor()?>">
            </div>
            <button type="submit" class="btn btn-primary" name="ok">Editar consulta</button>
        </form>

<?php endif ?>