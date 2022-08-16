<?php

class Healthinsurance{
    private $id;
    private $name;
    private $phone;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = trim($id);
    }

    public function getName(){
        return $this->name;
    }
    public function setName($n){
        $this->name = ucwords(trim($n));
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($p){
        $this->phone = $p;
    }
   
}

interface  HealthinsuranceDao{
    public function add(Healthinsurance $h);

    public function findAll();

    public function findById($id);

    public function update(Healthinsurance $h);

    public function delete($id);
}