<?php
require_once 'config/config.php';
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
    $doctor->setGender($gender);
    $doctor->setSpecialty($specialty);
    $doctor->setPhone($phone);
    $doctor->setAddress($address);
    $doctor->setPassword($pass);

    $doctorDao->add($doctor);
    $_SESSION['alert'] = 'Usuário cadastrado com sucesso';
    header("location: login.php?type=doctor");
    exit();
} else{
   
    $_SESSION['alert'] = 'Não foi possível cadastrar';
    header("location: register.php?type=doctor");
    exit();
}