<?php require_once 'config/config.php'?>


<?php
$log = 'funcionário';
$url = 'healthinsurance.php';
$status = 'active';
require_once 'config/config.php';
require_once 'dao/AppointmentDaoMysql.php';

if(!isset($_COOKIE['user'])&& !isset($_COOKIE['check'])){
    session_destroy();
}

$appointmentDao = new AppointmentDaoMysql($pdo);

$data = $appointmentDao->findAll();

if($_SESSION['employee']):

    if($_SESSION['alert']){
        echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
        $_SESSION['alert'] = '';
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
                      <li><a href="<?=BASE_URL?>/appointment.php">Realizar cadastro<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
        
                      <li><a href="<?=BASE_URL?>/medicalrecord.php?desconnect">Desconectar <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      
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
                  <h1 class="animated fadeInDown"><?=$_SESSION['doctor']?></h1>
                  <p class="animated fadeInUp delay-05s">Logo abaixo poderá inscrever um convênio</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="#medi" class="learn-more-btn">Inscreva o convênio</a>
                </div>
              </div>
            </div>
          </section>
        </header>

<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['patient']?></h1>
    </div>
    <div class="container">
        <h2>Inscreva um convênio</h2>
    </div>
    <section class="section-main">
        <form action="appointment_process.php" method="post" class="mb-3  form-main">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome">
            </div>
            <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Digite o telefone">
            </div>
           
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

header('location: login.php?type=employee');
exit();

endif?>