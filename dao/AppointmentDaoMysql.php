<?php 
require_once 'models/Appointment.php';

class AppointmentDaoMysql implements AppointmentDao{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Appointment $a){
        $sql = $this->pdo->prepare("INSERT INTO consultas (data,hora,paciente,medico) VALUES (:data,:hora,:paciente,:medico)");
      
        $sql->bindValue(":data",$a->getDate());
        $sql->bindValue(":hora",$a->getTime());
        $sql->bindValue(":paciente",$a->getPatient());
        $sql->bindValue(":medico",$a->getDoctor());

        $sql->execute();
    }

    public function findAll(){
        $sql = $this->pdo->query("SELECT * FROM consultas");
        $array = [];
        if($sql->rowCount()>0){
           
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($data as $d){
                $a = new Appointment();
                $a->setId($d['id']);
                $a->setDate($d['data']);
                $a->setTime($d['hora']);
                $a->setPatient($d['paciente']);
                $a->setDoctor($d['medico']);
                array_push($array, $a);
            }
        
        } 
        return $array;
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM consultas WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        if($sql->rowCount()>0){
            $a = new Appointment();
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $a->setId($data['id']);
            $a->setDate($data['data']);
            $a->setTime($data['hora']);
            $a->setPatient($data['paciente']);
            $a->setDoctor($data['medico']);

            return $a;
        } else{
            return false;
        }
    }

    public function update(Appointment $a){
        $sql = $this->pdo->prepare("UPDATE consultas SET data = :data, hora=:hora,paciente=:paciente,medico=:medico WHERE id = :id");
        $sql->bindValue(":id",$a->getId());
        $sql->bindValue(":data",$a->getDate());
        $sql->bindValue(":hora",$a->getTime());
        $sql->bindValue(":paciente",$a->getPatient());
        $sql->bindValue(":medico",$a->getDoctor());
        $sql->execute();
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM consultas WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

    }
}