<?php  

class Patient{
    private $cpf;
    private $name;
    private $gender;
    private $phone;
    private $address;
    private $password;

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
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

interface PatientDao{
    public function add(Patient $p);

    public function findAll();

    public function findByCpf($cpf);

    public function update(Patient $p);

    public function delete($cpf);
}