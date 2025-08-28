<?php
namespace App\Service;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\RoomRepository;



class RoomService
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager  )
    {
        $this->entityManager= $entityManager;
    }

    public function getMessage(): string
    {
        $message = "This is Message from Room Service";
        return  $message ;
    }

}