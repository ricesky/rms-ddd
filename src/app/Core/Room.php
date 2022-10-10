<?php

declare(strict_types=1);

namespace App\Core;

class Room
{
    private RoomId $id;
    private string $code;
    private string $description;
    private RoomType $type;

    public function __construct(
        RoomId $id,
        string $code,
        ?string $description = null,
        RoomType $type
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->description = $description;
        $this->type = $type;
    }

    public function getId(): RoomId
    {
        return $this->id;
    }

    
}