<?php

class Appointment{
    private $date;
    private $time;
    private $patient;
    private $doctor;

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
}

interface AppointmentDao{
    public function add(Appointment $a);

    public function findAll();

    public function findById();

    public function update(Appointment $a);

    public function delete($id);
}