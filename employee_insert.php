<?php
require_once 'config/config.php';
require_once 'dao/EmployeeDaoMysql.php';
$employeeDao = new EmployeeDaoMysql($pdo);

$cpf = filter_input(INPUT_POST,'cpf');
$name = filter_input(INPUT_POST,'name');
$gender = filter_input(INPUT_POST,'gender');
$phone = filter_input(INPUT_POST,'phone');
$address = filter_input(INPUT_POST,'address');
$office = filter_input(INPUT_POST,'office');
$pass = filter_input(INPUT_POST,'pass');

if($cpf && $name && $office && $pass){
    $employee = new Employee();
    $employee->setCpf($cpf);
    $employee->setName($name);
    $employee->setGender($gender);
    $employee->setPhone($phone);
    $employee->setAddress($address);
    $employee->setOffice($office);
    $employee->setPassword($pass);

    $employeeDao->add($employee);

    $_SESSION['alert'] = 'Usuário cadastrado com sucesso';
    header("location: login.php?type=employee");
    exit();
} else{
    $_SESSION['alert'] = 'Não foi possível cadastrar';
    header("location: register.php?type=employee");
    exit();
}