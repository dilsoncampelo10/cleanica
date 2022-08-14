<?php
require_once 'config/config.php';
require_once 'dao/MedicalrecordDaoMysql.php';
$type = filter_input(INPUT_POST,'type');
$medicalrecordDao = new MedicalrecordDaoMysql($pdo);
$id_delet = filter_input(INPUT_GET,'delete');
$id_edit = filter_input(INPUT_GET,'edit');

if(isset($_POST['ok'])){
    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $patient = filter_input(INPUT_POST,'patient');
    $doctor = filter_input(INPUT_POST,'doctor');
    $hypothesis = filter_input(INPUT_POST,'hypothesis');
    $medicines = filter_input(INPUT_POST,'medicines');
    $exam = filter_input(INPUT_POST,'exam');
    
    if($date && $time && $patient && $doctor){
        $medicalrecord = new Medicalrecord();
        $medicalrecord->setDate($date);
        $medicalrecord->setTime($time);
        $medicalrecord->setPatient($patient);
        $medicalrecord->setDoctor($doctor);
        $medicalrecord->setHypothesis($hypothesis);
        $medicalrecord->setMedicines($medicines);
        $medicalrecord->setExam($exam);

    
        $medicalrecordDao->add($medicalrecord);
    
        $_SESSION['alert'] = 'Prontuário criado';
        header("location:".BASE_URL."/medicalrecord.php");
        exit();
    } else{
        $_SESSION['alert'] = 'Não foi possível criar prontuário';
        header("location:".BASE_URL."/medicalrecord.php");
        exit();
    }
    
}

//Delete

if($_GET['delete']){
   
    $medicalrecordDao->delete($id_delet);
 
   
    header("location: ".BASE_URL."/medicalrecord.php");
    exit();
}

//Edit
if($type=='medicalrecord'){
    $id = filter_input(INPUT_POST,'id');
    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $patient = filter_input(INPUT_POST,'patient');
    $doctor = filter_input(INPUT_POST,'doctor');
    $hypothesis = filter_input(INPUT_POST,'hypothesis');
    $medicines = filter_input(INPUT_POST,'medicines');
    $exam = filter_input(INPUT_POST,'exam');

    $medicalrecord = new Medicalrecord();
    $medicalrecord->setId($id);
    $medicalrecord->setDate($date);
    $medicalrecord->setTime($time);
    $medicalrecord->setPatient($patient);
    $medicalrecord->setDoctor($doctor);
    $medicalrecord->setHypothesis($hypothesis);
    $medicalrecord->setMedicines($medicines);
    $medicalrecord->setExam($exam);

    $medicalrecordDao->update($medicalrecord);

    header("location: ".BASE_URL."/medicalrecord.php");
    exit();
}