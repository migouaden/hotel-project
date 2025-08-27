<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Helper\ResponseHelper;
use App\Service\GlobalService;
use App\Service\RoomService;


final class RoomController extends AbstractController
{

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;   
    }
    
    #[Route('/room', name: 'app_room')]
    public function getRooms(): JsonResponse
    {
        $data =  $this->roomService->getMessage();
        
        return ResponseHelper::success('success' , 'Receive Service', $data);

    }

    #[Route('/room/create', name: 'create_room')]
    public function createRoom():JsonResponse
    {
        $data =  $this->roomService->createRoom();
        return ResponseHelper::sendResponse('success' , 'Send Data', $data);
    }
}
