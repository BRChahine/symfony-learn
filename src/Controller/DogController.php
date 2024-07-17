<?php

namespace App\Controller;

use App\Repository\DogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dog; 

class DogController extends AbstractController{
    #[Route("/api/dog", methods:'GET')]
    public function listDog(){
        $dog = new DogRepository();
        return $this->json($dog->findAll());
    }

    #[Route("/api/dog/{id}", methods:'GET')]
    public function one(int $id){
        $repo = new DogRepository();
        $dog = $repo->findByid($id);
        if(!$dog){
            throw new NotFoundHttpException("Dog not found");
        }
        return $this->json($dog);
    }


    #[Route("/api/dog", methods:'POST')]
    public function newdog(#[MapRequestPayload] Dog $dog){
        $repo = new DogRepository(); 
        $repo->persist($dog);
        return $this->json($dog, 201);
    }

    #[Route("/api/dog/{id}", methods:'DELETE')]
    public function delete(int $id){
        $repo = new DogRepository();
        $this->one($id);
        $repo->remove($id);
        return $this->json(null, 204);
    }
    #[Route("/api/dog/{id}", methods:'PUT')]
    public function put(int $id, #[MapRequestPayload] Dog $dog){
        $this->one($id);
        $dog->setId($id);
        $repo = new DogRepository(); 
        $repo->update($dog);
        return $this->json($dog); 

    }
}    