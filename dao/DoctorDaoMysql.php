<?php
require_once 'models/Doctor.php';



class DoctorDaoMysql implements DoctorDao{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;        
    }
    public function add(Doctor $d){
        $sql = $this->pdo->prepare("INSERT INTO medicos (crm,nome,sexo,especialidade,telefone,endereco,senha) VALUES (:crm,:nome,:sexo,:especialidade,:telefone,:endereco,:senha)");

      
        $sql->bindValue(":crm",$d->getCrm());
        $sql->bindValue(":nome",$d->getName());
        $sql->bindValue(":sexo",$d->getGender());
        $sql->bindValue(":especialidade",$d->getSpecialty());
        $sql->bindValue(":telefone",$d->getPhone());
        $sql->bindValue(":endereco",$d->getAddress());
        $newPass = password_hash($d->getPassword(),PASSWORD_DEFAULT);
        $sql->bindValue(":senha",$newPass);

        $sql->execute();
        
    }

    public function findAll(){

    }

    public function findByCrm($crm){
        
        // $sql = $this->pdo->prepare("SELECT * FROM medicos WHERE crm = :crm");
        // $sql->bindValue("crm",$crm);
        // echo "SELECT * FROM medicos WHERE crm = :crm";
        //$sql->execute();
        //$doctor = new Doctor();
       // if($sql->rowCount()>0){
            // $data = $sql->fetch(PDO::FETCH_ASSOC);
            // $doctor->setCrm($data['crm']);
            // $doctor->setName($data['name']);
            // $doctor->setGender($data['sexo']);
            // $doctor->setSpecialty($data['especialidade']);
            // $doctor->setPhone($data['telefone']);
            // $doctor->setAddress($data['endereco']);
            // $doctor->setPassword($data['senha']);
            //var_dump($doctor);

            //return $doctor;

       // }
    }

    public function update(Doctor $d){

    }

    public function delete($crm){

    }
}