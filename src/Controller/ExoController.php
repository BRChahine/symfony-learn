<?php

namespace App\Controller;
use App\Entity\Dog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExoController extends AbstractController{
    #[Route("/calcul")]
    public function calcul(){
        return $this->json([
          "message" => 'Coucou tout le monde'
        ]);
    }
    #[Route("/calcul/{nb1}/{nb2}")]
    public function somme(int $nb1, int $nb2){
        return $this->json("La somme de vos 2 nombres est : " .$nb1 + $nb2);
    }
    #[Route("/test-dog")]
    public function testDog(){
        $dog = new Dog(1,"Fido","Corgi",new \DateTime());
        return $this->json($dog);
    }
}