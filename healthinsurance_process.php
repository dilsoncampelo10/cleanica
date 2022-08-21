<?php
require_once 'config/config.php';
require_once 'dao/HealthinsuranceDaoMysql.php';

$type = filter_input(INPUT_POST,'type');
$health = new HealthinsuranceDaoMysql($pdo);
$id_delet = filter_input(INPUT_GET,'delete');
$id_edit = filter_input(INPUT_GET,'edit');

if(isset($_POST['ok'])){
    $name = filter_input(INPUT_POST,'name');
    $phone = filter_input(INPUT_POST,'phone');
    
   
    
    if($name && $phone){
        $h = new Healthinsurance();
        $h->setName($name);
        $h->setPhone($phone);
          
        $health->add($h);
    
        $_SESSION['alert'] = 'Convênio realizado';
        header("location:".BASE_URL."/healthinsurance.php");
        exit();
    } else{
        $_SESSION['alert'] = 'Não foi possível realizar convênio';
        header("location:".BASE_URL."/healthinsurance.php");
        exit();
    }
    
}

//Delete

if($_GET['delete']){
   
    $health->delete($id_delet);
    $_SESSION['alert'] = 'Convênio cancelado';
    header("location: ".BASE_URL."/healthinsurance.php");
    exit();
}

//Edit
if($type=='healthinsurance'){
    $id = filter_input(INPUT_POST,'id');
    $name = filter_input(INPUT_POST,'name');
    $phone = filter_input(INPUT_POST,'phone');
 
  
    $h = new Healthinsurance();

    

    $h->setId($id);
    
    $h->setName($name);
    $h->setPhone($phone);

    $health->update($h);

    $_SESSION['alert'] = 'Convênio alterado';

    header("location: ".BASE_URL."/healthinsurance.php");
    exit();
}