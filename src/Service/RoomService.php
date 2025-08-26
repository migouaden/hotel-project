<?php
namespace App\Service;


class RoomService
{


    public function __construct()
    {

    }

    public function getMessage(): string
    {
        $message = "This is Message from Room Service";
        return  $message ;
    }
}