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

    }

    public function findById(){

    }

    public function update(Appointment $a){

    }

    public function delete($id){

    }
}