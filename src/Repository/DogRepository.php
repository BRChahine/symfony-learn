<?php
 
namespace App\Repository;

use App\Entity\Dog; 
class DogRepository{
 
    private \PDO $connection;

    public function __construct(){
        $this->connection = new \PDO(
            'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'],
            $_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASSWORD'] 
        );
    }

    public function findAll(): array {
        $query = $this->connection->prepare('SELECT * FROM dog ');
        $query->execute();
        $results = $query->fetchAll();

        $list = [];
        foreach($results as $line){
            $list[] = new Dog(
                $line['id'],
                $line['name'],
                $line['breed'],
                new \DateTime($line['birthdate'])
            );
     
        }
        return $list;
    }

    public function persist(Dog $dog){
        $query = $this->connection->prepare('INSERT INTO dog (name,breed,birthdate) VALUES(:name, :breed, :birthdate)');
        $query->bindValue(':name', $dog->getName());
        $query->bindValue(':breed', $dog->getBreed());
        $query->bindValue(':birthdate', $dog->getBirthdate()->format('Y-m-d'));
        $query->execute();
        //On récupère l'id auto incrémenté pour l'assigner au chien qu'on vient de faire persister
        $dog->setId($this->connection->lastInsertId());
    }
    public function findByid(int $id):?Dog{
        $query = $this->connection->prepare('SELECT * FROM dog WHERE id = :id ');
        $query->bindValue(":id",$id);
        $query->execute();
        if($line = $query->fetch()){
            return new Dog(
                $line['id'],
                $line['name'],
                $line['breed'],
                new \DateTime($line['birthdate'])
            );
        }
        return null;
    }

    public function remove(int $id):void{
        $query = $this->connection->prepare('DELETE FROM dog WHERE id = :id ');
        $query->bindValue(":id",$id);
        $query->execute();
    }

    public function update(Dog $dog):void{
        $query = $this->connection->prepare('UPDATE dog SET name = :name, breed = :breed, birthdate = :birthdate WHERE id = :id');
        $query->bindValue(':name', $dog->getName());
        $query->bindValue(':breed', $dog->getBreed());
        $query->bindValue(':birthdate', $dog->getBirthdate()->format('Y-m-d'));
        $query->bindValue(':id', $dog->getId());
        $query->execute();
    }
}
