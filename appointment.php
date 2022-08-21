<?php
// $log = 'paciente';
// $url = 'appointment.php';
// $status = 'active';
require_once 'config/config.php';
require_once 'dao/AppointmentDaoMysql.php';


if(!isset($_COOKIE['user']) && !isset($_COOKIE['check'])){
    session_destroy();
}


$appointmentDao = new AppointmentDaoMysql($pdo);

$data = $appointmentDao->findAll();

if($_SESSION['patient']):

    if($_SESSION['alert']){
        echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
        $_SESSION['alert'] = '';
    }
?>
<?php require_once 'config/config.php';
      require_once 'templates/header.php';

      if(isset($_GET['desconnect'])){
        session_destroy();
     
        header('location: login.php?type=patient');
        exit();
    }
   
?>


<header id="home">
          <nav>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                  <nav class="pull">
                    <ul class="top-nav">
                      <li><a href="<?=BASE_URL?>">Inicio <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                     
                      <li><a href="<?=BASE_URL?>/appointment.php?desconnect">Desconectar <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      
                      <li><a href="#">Você está logado como paciente <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </nav>
          <section class="hero" id="hero">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center inner">
                  <h1 class="animated fadeInDown"><?=$_SESSION['patient']?></h1>
                  <p class="animated fadeInUp delay-05s">Logo abaixo poderá marcar sua consulta</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="#appoint" class="learn-more-btn">Marque sua consulta</a>
                </div>
              </div>
            </div>
          </section>
        </header>
<!-- <!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/colorido.css">
    <title>CleaNika</title>
    <link rel="shortcut icon" href="/public/img/logocleaNika.png" type="image/x-icon">
<body> -->

    
       
        
  
<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['patient']?></h1>
    </div>
    <div class="container" id="appoint">
        <h2>Marque uma consulta</h2>
    </div>
    <section class="section-main container">
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
            </div> <br> <br>
            <button type="submit" class="btn btn-primary" name="ok">Marcar consulta</button>
        </form>
        <div>
            <h1>Confira consultas já marcadas</h1>
            <div>
            
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
                            <a href="<?=BASE_URL?>/appointment_process.php?delete=<?=$item->getId()?>" onclick="return confirm('Deseja mesmo cancelar essa consulta?')"><i class="fa-solid fa-delete-left"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
       
    </section>
</section>


<?php 
require_once 'templates/footer.php';

else:

header('location: login.php?type=patient');
exit();

endif?>