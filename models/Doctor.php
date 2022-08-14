<?php  

class Doctor{
    private $crm;
    private $name;
    private $gender;
    private $specialty;
    private $phone;
    private $address;
    private $password;

    public function getCrm(){
        return $this->crm;
    }
    public function setCrm($crm){
        $this->crm = $crm;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = ucwords(trim($name));
    }
    
    public function getGender(){
        return $this->gender;
    }
    public function setGender($gender){
        $this->gender = strtoupper(trim($gender));
    }

    public function getSpecialty(){
        return $this->specialty;
    }
    public function setSpecialty($s){
        $this->specialty = $s;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address){
        $this->address = ucwords(trim($address));
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($pass){
        $this->password = $pass;
    }


}

interface DoctorDao{
    public function add(Doctor $d);

    public function findAll();

    public function findByCrm($crm);

    public function update(Doctor $d);

    public function delete($crm);
}