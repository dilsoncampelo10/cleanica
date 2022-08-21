<?php 
require_once 'models/Healthinsurance.php';

class HealthinsuranceDaoMysql implements HealthinsuranceDao{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Healthinsurance $h){
        $sql = $this->pdo->prepare("INSERT INTO convenios (nome,telefone) VALUES (:nome,:telefone)");
      
        $sql->bindValue(":nome",$h->getName());
        $sql->bindValue(":telefone",$h->getPhone());

        $sql->execute();
    }

    public function findAll(){
        $sql = $this->pdo->query("SELECT * FROM convenios");
        $array = [];
        if($sql->rowCount()>0){
           
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($data as $d){
                $h = new Healthinsurance();
                $h->setId($d['id']);
                $h->setName($d['nome']);
                $h->setPhone($d['telefone']);
                
                array_push($array, $h);
            }
        
        } 
        return $array;
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM convenios WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        if($sql->rowCount()>0){
            $a = new Healthinsurance();
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $a->setId($data['id']);
            $a->setName($data['nome']);
            $a->setPhone($data['telefone']);

            return $a;
        } else{
            return false;
        }
    }

    public function update(Healthinsurance $h){
        $sql = $this->pdo->prepare("UPDATE convenios SET nome = :nome, telefone=:telefone WHERE id = :id");
        $sql->bindValue(":id",$h->getId());
        $sql->bindValue(":nome",$h->getName());
        $sql->bindValue(":telefone",$h->getPhone());
     
        $sql->execute();
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM convenios WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }
}