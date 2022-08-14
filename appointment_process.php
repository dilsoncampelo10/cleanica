<?php
require_once 'config/config.php';
require_once 'dao/AppointmentDaoMysql.php';
$appointmentDao = new AppointmentDaoMysql($pdo);

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