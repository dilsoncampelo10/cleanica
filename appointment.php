<?php
$log = 'paciente';
$url = 'appointment.php';
$status = 'active';
require_once 'config/config.php';

require_once 'dao/AppointmentDaoMysql.php';

$appointmentDao = new AppointmentDaoMysql($pdo);

$data = $appointmentDao->findAll();

if($_SESSION['patient']):

    if($_SESSION['alert']){
        echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
        $_SESSION['alert'] = '';
    }
?>
<?php require_once 'config/config.php'?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/public/css/colorido.css">
    <title>CleaNika</title>
    <link rel="shortcut icon" href="<?=BASE_URL?>/public/img/logocleaNika.png" type="image/x-icon">
<body>

    <div class="global-div">

        <div class="topo-div"></div>
        <center>
            <img src="<?=BASE_URL?>/public/img/CleaNika2.png">
        </center>
        
        <div class="menu-div">
            <ul>
                <li><a href="<?=BASE_URL?>/" title="Home">Início</a></li>
             
               
                <li><a href="Galeria.html" href="#"> Quem Somos</a></li>
                 <li><a href="#">Fale conosco</a></li>
                 <li><a href="#" title="Exposição">Doe</a></li>
                <li><a href="Galeria.html" href="#"> Serviços</a></li>
                <li> Você está logado como <?=$log?></li>
            </ul>
        </div>
<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['patient']?></h1>
    </div>
    <div class="container">
        <h2>Marque uma consulta</h2>
    </div>
    <section class="section-main">
        <form action="appointment_process.php" method="post" class="mb-3  form-main">
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
            <button type="submit" class="btn btn-primary" name="ok">Marcar consulta</button>
        </form>
        <div>
            <h1>Confira consultas já marcadas</h1>
            <div>
            <button class="btn btn-dark" onclick="displayTable()">
                Vizualizar
            </button>
            <table class="table table-success table-striped" id="table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item):?>
                    <tr>
                        <td><?=$item->getDate()?></td>
                        <td><?=$item->getTime()?></td>
                        <td><?=$item->getPatient()?></td>
                        <td><?=$item->getDoctor()?></td>
                        <td>
                            <a href="<?=BASE_URL?>/edit.php?edit_ap=<?=$item->getId()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?=BASE_URL?>/appointment_process.php?delete=<?=$item->getId()?>"><i class="fa-solid fa-delete-left"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
       
    </section>
</section>


<?php else:

header('location: login.php?type=patient');
exit();

endif?>