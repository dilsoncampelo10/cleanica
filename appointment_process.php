<?php
require_once 'config/config.php';
require_once 'dao/AppointmentDaoMysql.php';
$type = filter_input(INPUT_POST,'type');
$appointmentDao = new AppointmentDaoMysql($pdo);
$id_delet = filter_input(INPUT_GET,'delete');
$id_edit = filter_input(INPUT_GET,'edit');

if(isset($_POST['ok'])){
    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $patient = filter_input(INPUT_POST,'patient');
    $doctor = filter_input(INPUT_POST,'doctor');
    
    if($date && $time && $patient && $doctor){
        $appointment = new Appointment();
        $appointment->setDate($date);
        $appointment->setTime($time);
        $appointment->setPatient($patient);
        $appointment->setDoctor($doctor);
    
        $appointmentDao->add($appointment);
    
        $_SESSION['alert'] = 'Consulta agendada';
        header("location:".BASE_URL."/appointment.php");
        exit();
    } else{
        $_SESSION['alert'] = 'Não foi possível marcar consulta';
        header("location:".BASE_URL."/appointment.php");
        exit();
    }
    
}

//Delete appointment

if($_GET['delete']){
   
    $appointmentDao->delete($id);
 
    header("location: ".BASE_URL."/appointment.php");
    exit();
}

//Edit appointment
if($type=='appointment'){
    $id = filter_input(INPUT_POST,'id');
    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $patient = filter_input(INPUT_POST,'patient');
    $doctor = filter_input(INPUT_POST,'doctor');

    $appointment = new Appointment();
    $appointment->setId($id);
    $appointment->setDate($date);
    $appointment->setTime($time);
    $appointment->setPatient($patient);
    $appointment->setDoctor($doctor);

    $appointmentDao->update($appointment);

    header("location: ".BASE_URL."/appointment.php");
    exit();
}