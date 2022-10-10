<?php

declare(strict_types=1);

namespace App\Core;

use Ramsey\Uuid\Uuid;

class RoomId
{
    private $id;

    public function __construct(string $id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() : string
    {
        return $this->id;
    }

    public function equals(RoomId $roomId) : bool
    {
        return $this->id === $roomId->id;
    }
}