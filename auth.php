<?php
require_once 'config/config.php';

$type = filter_input(INPUT_POST,'type');
$login = filter_input(INPUT_POST,'login');
$pass = filter_input(INPUT_POST,'pass');


if($login && $pass){
    if($type === 'patient'){
        require_once 'dao/PatientDaoMysql.php';
        $patientDao = new PatientDaoMysql($pdo);

        $patient = $patientDao->findByCpf($login);

        //logar
        if($patient->getCpf()===$login && password_verify($pass,$patient->getPassword())){
            $_SESSION['patient'] = $patient->getName();
            header("location: ".BASE_URL."/appointment.php");
            exit();
           
        } else{
            $_SESSION['alert'] = 'Usuário não encontrado';
            header("location: ".BASE_URL."/login.php?type=patient");
            exit();
        }
    
    
    } else if ($type === 'doctor'){
        require_once 'dao/DoctorDaoMysql.php';
        $doctortDao = new DoctorDaoMysql($pdo);
     
   
        //logar
        if($doctor->getCrm()===$login && password_verify($pass,$doctor->getPassword())){
            $_SESSION['doctor'] = $doctor->getName();
            header("location: ".BASE_URL."medicalrecord.php");
            exit();
        } else{
            $_SESSION['alert'] = 'Usuário não encontrado';
            header("location: ".BASE_URL."login.php?type=doctor");
            exit();
        }
    
    } else if($type === 'employee'){
        require_once 'dao/EmployeeDaoMysql.php';
        $employeetDao = new EmployeeDaoMysql($pdo);

        $employee = $employeeDao->findByCpf($login);

        //logar
        if($employee->getCrm()===$login && password_verify($pass,$employee->getPassword())){
            $_SESSION['employee'] = $employee->getName();
            header("location: ".BASE_URL."medicalrecord.php");
            exit();
        }
    
    } else{
        $_SESSION['alert'] = 'Usuário não encontrado';
        header("location: login.php?type=employee");
        exit();
    }
} else{
    header("location:".BASE_URL."/");
    exit();
}
