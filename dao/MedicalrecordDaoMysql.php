<?php 
require_once 'models/Medicalrecord.php';

class MedicalrecordDaoMysql implements MedicalrecordDao{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Medicalrecord $m){
        $sql = $this->pdo->prepare("INSERT INTO prontuarios (data,hora,paciente,medico,hipotese,medicacoes,exames) VALUES (:data,:hora,:paciente,:medico,:hipotese,:medicacoes,:exames)");
      
        $sql->bindValue(":data",$m->getDate());
        $sql->bindValue(":hora",$m->getTime());
        $sql->bindValue(":paciente",$m->getPatient());
        $sql->bindValue(":medico",$m->getDoctor());
        $sql->bindValue(":hipotese",$m->getHypothesis());
        $sql->bindValue(":medicacoes",$m->getMedicines());
        $sql->bindValue(":exames",$m->getExam());

        $sql->execute();
    }

    public function findAll(){
        $sql = $this->pdo->query("SELECT * FROM prontuarios");
        $array = [];
        if($sql->rowCount()>0){
           
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($data as $d){
                $a = new Medicalrecord();
                $a->setId($d['id']);
                $a->setDate($d['data']);
                $a->setTime($d['hora']);
                $a->setPatient($d['paciente']);
                $a->setDoctor($d['medico']);
                $a->setHypothesis($d['hipotese']);
                $a->setMedicines($d['medicacoes']);
                $a->setExam($d['exames']);
                array_push($array, $a);
            }
        
        } 
        return $array;
    }

    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM prontuarios WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        if($sql->rowCount()>0){
            $m = new Medicalrecord();
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $m->setId($data['id']);
            $m->setDate($data['data']);
            $m->setTime($data['hora']);
            $m->setPatient($data['paciente']);
            $m->setDoctor($data['medico']);
            $m->setHypothesis($data['hipotese']);
            $m->setMedicines($data['medicacoes']);
            $m->setExam($data['exames']);

            return $m;
        } else{
            return false;
        }
    }

    public function update(Medicalrecord $m){
        $sql = $this->pdo->prepare("UPDATE prontuarios SET data = :data, hora=:hora,paciente=:paciente,medico=:medico,hipotese=:hipotese,medicacoes=:medicacoes,exames=:exames WHERE id = :id");
        $sql->bindValue(":id",$m->getId());
        $sql->bindValue(":data",$m->getDate());
        $sql->bindValue(":hora",$m->getTime());
        $sql->bindValue(":paciente",$m->getPatient());
        $sql->bindValue(":medico",$m->getDoctor());
        $sql->bindValue(":hipotese",$m->getHypothesis());
        $sql->bindValue(":medicacoes",$m->getMedicines());
        $sql->bindValue(":exames",$m->getExam());
        $sql->execute();
    }

    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM prontuarios WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

    }
}