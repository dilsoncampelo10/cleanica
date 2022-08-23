<?php
require_once 'config/config.php';


$type = filter_input(INPUT_POST,'type');
$login = filter_input(INPUT_POST,'login');
$pass = filter_input(INPUT_POST,'pass');
$check = filter_input(INPUT_POST,'con');

if($login && $pass){

    
    if($type === 'patient'){
        require_once 'dao/PatientDaoMysql.php';
        $patientDao = new PatientDaoMysql($pdo);

        $patient = $patientDao->findByCpf($login);

        //logar
        if($patient!=false){
            if($patient->getCpf()===$login && password_verify($pass,$patient->getPassword())){
                setcookie('check','online',time()+13000);
                if($check === 'on'){
                    setcookie('user',$patient->getCpf(),time()+3600*24*30*12*5);
                    setcookie('pass',$patient->getPassword(),time()+3600*24*30*12*5);
                } else{
                    setcookie('check','online',time()+600);
                }
                $_SESSION['patient'] = $patient->getName();
                header("location: ".BASE_URL."/appointment.php");
                exit();
               
            } else{
                $_SESSION['alert'] = 'Dados incorretos';
                header("location: ".BASE_URL."/login.php?type=patient");
                exit();
            }
        } else{
            $_SESSION['alert'] = 'Usuário não encontrado';
            header("location: ".BASE_URL."/login.php?type=patient");
            exit();
        }
        
    
    
    } else if ($type === 'doctor'){
        require_once 'dao/DoctorDaoMysql.php';
        $doctortDao = new DoctorDaoMysql($pdo);

        $doctor = $doctortDao->findByCrm($login);
     
   
        //logar
        if($doctor!=false){
            if($doctor->getCrm()===$login && password_verify($pass,$doctor->getPassword())){
                
                if($check === 'on'){
                    setcookie('user',$doctor->getCrm(),time()+time()+3600*24*30*12*5);
                    setcookie('pass',$doctor->getPassword(),time()+3600*24*30*12*5);
                } else{
                    setcookie('check','online',time()+600);
                }
                $_SESSION['doctor'] = $doctor->getName();
                header("location: ".BASE_URL."/medicalrecord.php");
                exit();
            } else{
                $_SESSION['alert'] = 'Dados incorretos';
                header("location: ".BASE_URL."/login.php?type=doctor");
                exit();
            }
        } else{
            $_SESSION['alert'] = 'Usuário não encontrado';
            header("location: ".BASE_URL."/login.php?type=doctor");
            exit();
        }
        
    
    } else if($type === 'employee'){
        require_once 'dao/EmployeeDaoMysql.php';
        $employeeDao = new EmployeeDaoMysql($pdo);

        $employee = $employeeDao->findByCpf($login);

        //logar
        if($employee!=false){
            if($employee->getCpf()===$login && password_verify($pass,$employee->getPassword())){
                setcookie('check','online',time()+13000);
                if($check === 'on'){
                    setcookie('user',$employee->getCpf(),time()+time()+3600*24*30*12*5);
                    setcookie('pass',$employee->getPassword(),time()+time()+3600*24*30*12*5);
                } else{
                    setcookie('check','online',time()+600);
                }
                $_SESSION['employee'] = $employee->getName();
                header("location: ".BASE_URL."/healthinsurance.php");
                exit();
            } else{
                $_SESSION['alert'] = 'CPF e/ou Senha incorreto(s)';
                header("location: ".BASE_URL."/login.php?type=employee");
                exit();
            }
        } else{
            $_SESSION['alert'] = 'Usuário não encontrado';
            header("location: ".BASE_URL."/login.php?type=employee");
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
