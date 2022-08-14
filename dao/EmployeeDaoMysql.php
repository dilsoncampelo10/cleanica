<?php
require_once 'models/Employee.php';

class EmployeeDaoMysql implements EmployeeDao{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo; 
    }
    public function add(Employee $e){
        $sql = $this->pdo->prepare("INSERT INTO funcionarios (cpf, nome, sexo, telefone, endereco, cargo, senha) VALUES (:cpf, :nome, :sexo, :telefone, :endereco, :cargo, :senha)");

     
        $sql->bindValue(":cpf",$e->getCpf());
        $sql->bindValue(":nome",$e->getName());
        $sql->bindValue(":sexo",$e->getGender());
        $sql->bindValue(":telefone",$e->getPhone());
        $sql->bindValue(":endereco",$e->getAddress());
        $sql->bindValue(":cargo",$e->getOffice());
         $newPass = password_hash($e->getPassword(),PASSWORD_DEFAULT);
        $sql->bindValue(":senha",$newPass);
        
        $sql->execute();
    }

    public function findAll(){

    }

    public function findByCpf($cpf){

    }

    public function update(Employee $e){

    }

    public function delete($cpf){

    }
}