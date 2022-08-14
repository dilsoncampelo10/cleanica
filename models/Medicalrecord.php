<?php

class Medicalrecord{
    private $id;
    private $date;
    private $time;
    private $patient;
    private $doctor;
    private $hypothesis;
    private $medicines;
    private $exam;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getDate(){
        return $this->date;
    }
    public function setDate($d){
        $this->date = $d;
    }
    public function getTime(){
        return $this->time;
    }
    public function setTime($t){
        $this->time = $t;
    }
    public function getPatient(){
        return $this->patient;
    }
    public function setPatient($p){
        $this->patient = $p;
    }
    public function getDoctor(){
        return $this->doctor;
    }
    public function setDoctor($d){
        $this->doctor = $d;
    }
    public function getHypothesis(){
        return $this->hypothesis;
    }
    public function setHypothesis($h){
        $this->hypothesis = $h;
    }
    public function getMedicines(){
        return $this->medicines;
    }
    public function setMedicines($m){
        $this->medicines = $m;
    }
    public function getExam(){
        return $this->exam;
    }
    public function setExam($e){
        $this->exam = $e;
    }
}

interface MedicalrecordDao{
    public function add(Medicalrecord $m);

    public function findAll();

    public function findById($id);

    public function update(Medicalrecord $m);

    public function delete($id);
}