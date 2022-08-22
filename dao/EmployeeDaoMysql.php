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
        $sql = $this->pdo->prepare("SELECT * FROM funcionarios WHERE cpf = :cpf");
        $sql->bindValue("cpf",$cpf);
        $sql->execute();
        $employee = new Employee();
        if($sql->rowCount()>0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $employee->setCpf($data['cpf']);
            $employee->setName($data['nome']);
            $employee->setGender($data['sexo']);
            $employee->setPhone($data['telefone']);
            $employee->setAddress($data['endereco']);
            $employee->setOffice($data['cargo']);
            $employee->setPassword($data['senha']);


            return $employee;
        } else{
            return false;
        }
    }

    public function update(Employee $e){

    }

    public function delete($cpf){
        $sql = $this->pdo->prepare("DELETE FROM funcionarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf",$cpf);
        $sql->execute();

    }
}