<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Helper\ResponseHelper;
use App\Service\GlobalService;
use App\Service\RoomService;
use App\Entity\Room;
use App\Entity\RoomStatus;
use Symfony\Component\Security\Http\Attribute\IsGranted;



final class RoomController extends AbstractController
{

    public function __construct(RoomService $roomService , EntityManagerInterface $entityManager )
    {
        $this->roomService = $roomService;   
        $this->entityManager= $entityManager;
    }
    
    #[Route('/message', name: 'message_from_service' , methods: ['GET'])]
    public function getRooms(): JsonResponse
    {
        $data =  $this->roomService->getMessage();
        
        return ResponseHelper::success('success' , 'Receive Service', $data);

    }

    #[Route('/room/create', name: 'create_room', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function createRoom(Request $request): JsonResponse
    {
        $user = $this->getUser();

        $status = $this->entityManager->getRepository(RoomStatus::class)->find(1);

        $data = json_decode($request->getContent(), true);

        $room = new Room();

        $room->setName($data['name']);
        $room->setDescription($data['description']);
        $room->setBasePrice($data['base_price']);
        $room->setMaxGuests($data['max_guests']);
        $room->setBedCount($data['bed_count']);
        $room->setSize($data['size']);
        $room->setCreatedAt(new \DateTime());
        $room->setUserCreated($user);
        $room->setStatus($status);
        $room->setActive(1);

        $this->entityManager->persist($room);
        $this->entityManager->flush();

        return ResponseHelper::success('success' , 'Room Inserted SuccessFully');

    }



}
