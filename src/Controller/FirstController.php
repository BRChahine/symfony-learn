<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController{
    #[Route("/hello")]
    public function hello(){
        return $this->json([
          "message" => 'Coucou tout le monde'
        ]);
    }
    #[Route("/hello/{name}")]
    public function helloSomeone(string $name){
        return $this->json("Coucou " .$name);
    }
}