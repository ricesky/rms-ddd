<?php

declare(strict_types=1);

namespace App\Core;

use Ramsey\Uuid\Uuid;

class BuildingId
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

    public function equals(BuildingId $buildingId) : bool
    {
        return $this->id === $buildingId->id;
    }
}