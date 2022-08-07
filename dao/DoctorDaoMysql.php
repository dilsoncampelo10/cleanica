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
        $sql->bindValue(":senha",$d->getPassword());

        $sql->execute();
        
    }

    public function findAll(){

    }

    public function findByCrm($crm){

    }

    public function update(Doctor $d){

    }

    public function delete($crm){

    }
}