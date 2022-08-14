<?php
require_once 'config/config.php';
require_once 'dao/PatientDaoMysql.php';
$patientDao = new PatientDaoMysql($pdo);

$cpf = filter_input(INPUT_POST,'cpf');
$name = filter_input(INPUT_POST,'name');
$gender = filter_input(INPUT_POST,'gender');
$phone = filter_input(INPUT_POST,'phone');
$address = filter_input(INPUT_POST,'address');
$pass = filter_input(INPUT_POST,'pass');

if($cpf && $name && $pass){
    $patient = new Patient();

    $patient->setCpf($cpf);
    $patient->setName($name);
    $patient->setGender($gender);
    $patient->setPhone($phone);
    $patient->setAddress($address);
    $patient->setPassword($pass);

    $patientDao->add($patient);
    $_SESSION['alert'] = 'Usuário cadastrado com sucesso';
    header("location: login.php?type=patient");
    exit();
} else{
    $_SESSION['alert'] = 'Não foi possível cadastrar';
    header("location: register.php?type=patient");
    exit();
}