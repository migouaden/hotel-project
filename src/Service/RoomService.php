<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;


class RoomService
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager= $entityManager;
    }

    public function getMessage(): string
    {
        $message = "This is Message from Room Service";
        return  $message ;
    }

    public function createRoom():Room
    {
        $room = new Room();
        $room->setName('Room1');
        $room->setDescription('text');
        $room->setBasePrice(100);
        $room->setMaxGuests(2);
        $room->setBedCount(2);
        $room->setSize(15);
        $room->setCreatedAt(new \DateTime());
        $room->setActive(1);

        $this->entityManager->persist($room);
        $this->entityManager->flush();

        return $room;
    }
}