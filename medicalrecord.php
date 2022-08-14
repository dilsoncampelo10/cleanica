<?php
$log = 'médico';
$url = 'medicalrecord.php';

require_once 'config/config.php';
require_once 'templates/header.php';
require_once 'templates/navlog.php';
require_once 'dao/MedicalrecordDaoMysql.php';

$medicalrecord = new MedicalrecordDaoMysql($pdo);

$data = $medicalrecord->findAll();

if($_SESSION['doctor']):
?>

<section>
    <div class="container">
        <h1>Bem-vindo <?=$_SESSION['doctor']?></h1>
    </div>
    <div class="container">
        <h2>Crie seu prontuário</h2>
    </div>
    <secton class="section-main">
        <form action="medicalrecord_process.php" method="post" class="mb-3 form-main">
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
            </div>
            <button type="submit" class="btn btn-primary" name="ok">Criar prontuário</button>
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


<?php else:

header('location: login.php?type=doctor');
exit();

endif?>