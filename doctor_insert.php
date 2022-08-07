<?php
require_once 'config/connect.php';
require_once 'dao/DoctorDaoMysql.php';
$doctorDao = new DoctorDaoMysql($pdo);

$crm = filter_input(INPUT_POST,'crm');
$name = filter_input(INPUT_POST,'name');
$gender = filter_input(INPUT_POST,'gender');
$specialty = filter_input(INPUT_POST,'specialty');
$phone = filter_input(INPUT_POST,'phone');
$address = filter_input(INPUT_POST,'address');
$pass = filter_input(INPUT_POST,'pass');

if($crm && $name && $specialty && $pass){
    $doctor = new Doctor();
    $doctor->setCrm($crm);
    $doctor->setName($name);
    $doctor->setSpecialty($specialty);
    $doctor->setPhone($phone);
    $doctor->setAddress($address);
    $doctor->setPassword($pass);

    $doctorDao->add($doctor);

    header("location: login.php?type=doctor");
    exit();
} else{
    header("location: register.php?type=doctor");
    exit();
}