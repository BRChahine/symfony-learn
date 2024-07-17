<?php
 
namespace App\Entity;

class Dog{
    private ?int $id; 
    private string $name;
    private string $breed;
    private \DateTime $birthdate;

    public function __construct(?int  $id = null, string $name, string $breed, \DateTime $birthdate){
        $this->id  = $id;
        $this->name = $name;
        $this->breed = $breed;
        $this->birthdate = $birthdate;
    }

    public function getId():?int{
        return $this->id;
    }

    public function setId(?int $id){
        $this->id = $id;
    }

    public function getName():string{
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getBreed():string{
        return $this->breed;
    }

    public function setBreed(string $breed){
        $this->breed = $breed;
    }

    public function getBirthDate():\DateTime{
        return $this->birthdate;
    }

    public function setBirthDate(\DateTime $birthdate){
        $this->birthdate = $birthdate;
    }

}