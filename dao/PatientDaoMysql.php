<?php
require_once 'models/Patient.php';

class PatientDaoMysql implements PatientDao{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;        
    }

    public function add(Patient $p){
        $sql = $this->pdo->prepare("INSERT INTO pacientes (cpf,nome,sexo,telefone,endereco,senha) VALUES (:cpf,:nome,:sexo,:telefone,:endereco,:senha)");

        $sql->bindValue(":cpf",$p->getCpf());
        $sql->bindValue(":nome",$p->getName());
        $sql->bindValue(":sexo",$p->getGender());
        $sql->bindValue(":telefone",$p->getPhone());
        $sql->bindValue(":endereco",$p->getAddress());
        $newPass = password_hash($p->getPassword(),PASSWORD_DEFAULT);
        $sql->bindValue(":senha",$newPass);

        $sql->execute();

    }

    public function findAll(){

    }

    public function findByCpf($cpf){
        $sql = $this->pdo->prepare("SELECT * FROM pacientes WHERE cpf = :cpf");
        $sql->bindValue("cpf",$cpf);
        $sql->execute();
        $patient = new Patient();
        if($sql->rowCount()>0){
            $data = $sql->fetch();
            $patient->setCpf($data['cpf']);
            $patient->setName($data['nome']);
            $patient->setGender($data['sexo']);
            $patient->setPhone($data['telefone']);
            $patient->setAddress($data['endereco']);
            $patient->setPassword($data['senha']);

            return $patient;
        }
    }

    public function update(Patient $p){

    }

    public function delete($cpf){

    }
}