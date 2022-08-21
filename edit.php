<?php
require_once 'config/config.php';
require_once 'templates/header.php';
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
        
                      <li><a href="<?=BASE_URL?>/appointment.php?desconnect">Desconectar <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      
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
                  <h1 class="animated fadeInDown">Faça a edição!</h1>
                  <p class="animated fadeInUp delay-05s">Logo abaixo poderá alerar as informações</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="#edit_a" class="learn-more-btn">Edite os dados</a>
                </div>
              </div>
            </div>
          </section>
        </header>


<?php
if(isset($_GET['edit_ap'])):?>

<?php 

$id = $_GET['edit_ap'];

require_once 'dao/AppointmentDaoMysql.php';
$ap = new AppointmentDaoMysql($pdo); 
$obj = $ap->findById($id);
?>

<form action="appointment_process.php" method="post" class="mb-3 container form-main" id="edit_a">
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
            </div> <br> <br>
            <button type="submit" class="btn btn-primary">Editar consulta</button>
        </form>

<?php elseif($_GET['edit_mr']): ?>

    <?php 
         $id = $_GET['edit_mr'];
         require_once 'config/config.php';
         require_once 'dao/MedicalrecordDaoMysql.php';
         $md = new MedicalrecordDaoMysql($pdo); 
         $obj = $md->findById($id);
?>

    <form action="medicalrecord_process.php" method="post" class="mb-3 form-main container">
            <input type="hidden" name="type" value="medicalrecord">
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
            <div class="mb-3">
                    <label for="hypothesis" class="form-label">Hipótese</label>
                    <input type="text" name="hypothesis" class="form-control" placeholder="Digite a hipótese" id="hypothesis" value="<?=$obj->getHypothesis()?>">
            </div>
            <div class="mb-3">
                    <label for="medicines" class="form-label">Medicações</label>
                    <input type="text" name="medicines" class="form-control" placeholder="Digite as medicações" id="medicines" value="<?=$obj->getMedicines()?>">
            </div>
            <div class="mb-3">
                    <label for="exam" class="form-label">Exame</label>
                    <input type="text" name="exam" class="form-control" placeholder="Digite o exame" id="exam" value="<?=$obj->getExam()?>">
            </div> <br> <br>
            <button type="submit" class="btn btn-primary">Editar prontuário</button>
        </form>

<?php elseif ($_GET['edit_hi']): ?>

        <?php 
         $id = $_GET['edit_hi'];
         require_once 'config/config.php';
         require_once 'dao/HealthinsuranceDaoMysql.php';
         $hi = new HealthinsuranceDaoMysql($pdo); 
         $obj = $hi->findById($id);
        ?>

        <form action="healthinsurance_process.php" method="post" class="mb-3 form-main container">
            <input type="hidden" name="type" value="healthinsurance">
            <input type="hidden" name="id" value="<?=$obj->getId()?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="<?=$obj->getName()?>">
            </div>
            <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="<?=$obj->getPhone()?>">
            </div> <br><br>
             
            <button type="submit" class="btn btn-primary">Editar convênio</button>
        </form>




<?php
endif;

require_once 'templates/footer.php';
?>