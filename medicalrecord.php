<?php

require_once 'config/config.php';
require_once 'dao/MedicalrecordDaoMysql.php';

if(!isset($_COOKIE['user'])&& !isset($_COOKIE['check'])){
    session_destroy();
}




$medicalrecord = new MedicalrecordDaoMysql($pdo);

$data = $medicalrecord->findAll();

if($_SESSION['doctor']):
?>
<?php 

    if($_SESSION['alert']){
      echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
    $_SESSION['alert'] = '';
  }
      require_once 'templates/header.php';

      if(isset($_GET['desconnect'])){
        session_destroy();
     
        header('location: login.php?type=doctor');
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
                  <p class="animated fadeInUp delay-05s">Logo abaixo poderá analisar os prontuários</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="#medi" class="learn-more-btn">Analise o prontuário</a>
                </div>
              </div>
            </div>
          </section>
        </header>
<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['doctor']?></h1>
    </div>
    <div class="container">
        <h2>Crie seu prontuário</h2>
    </div>
    <secton class="section-main ">
        <form action="medicalrecord_process.php" method="post" class="mb-3 form-main container">
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
            <div class="mb-3">
                    <label for="exam" class="form-label">Exame</label>
                    <input type="text" name="exam" class="form-control" placeholder="Digite o exame" id="exam">
            </div> <br> <br>
            <button type="submit" class="btn btn-primary" name="ok">Criar prontuário</button>
        </form>
        <div class="container" id="medi">
                <h1>Confira prontuários já criados</h1>
                <div>
                
                <table class="table table-success table-striped" id="table">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Hipótese</th>
                            <th>Medicações</th>
                            <th>Exame</th>
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
                            <td><?=$item->getHypothesis()?></td>
                            <td><?=$item->getMedicines()?></td>
                            <td><?=$item->getExam()?></td>
                            <td>
                                <a href="<?=BASE_URL?>/edit.php?edit_mr=<?=$item->getId()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?=BASE_URL?>/medicalrecord_process.php?delete=<?=$item->getId()?>"><i class="fa-solid fa-delete-left"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
    </secton>
</section>


<?php 
require_once 'templates/footer.php';
else:

header('location: login.php?type=doctor');
exit();

endif?>