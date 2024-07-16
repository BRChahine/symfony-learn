<?php
 
namespace App\Entity;

class Dog{
    private int $id; 
    private string $name;
    private string $breed;
    private \DateTime $birthdate;

    public function __construct(int $id, string $na, string $bre, \DateTime $bir){
        $this->id  = $id;
        $this->name = $na;
        $this->breed = $bre;
        $this->birthdate = $bir;
    }

    public function getId():int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getName():string{
        return $this->name;
    }

    public function setName(string $na){
        $this->name = $na;
    }

    public function getBreed():string{
        return $this->breed;
    }

    public function setBreed(string $bre){
        $this->breed = $bre;
    }

    public function getBirthDate():\DateTime{
        return $this->birthdate;
    }

    public function setBirthDate(\DateTime $bir){
        $this->birthdate = $bir;
    }

}