<?php

declare(strict_types=1);

namespace App\Core;

class Booking
{
    private RoomId $roomId;
    private DateTimeRange $date;
    private bool $conflicted;
    private BookingStatus $status;

    public function __construct(
        RoomId $roomId,
        DateTimeRange $date,
        bool $conflicted,
        BookingStatus $status
    )
    {
        $this->roomId = $roomId;
        $this->date = $date;
        $this->conflicted = $conflicted;
        $this->status = $status;
    }

    public function getRoomId(): RoomId
    {
        return $this->roomId;
    }

    public function getDate(): DateTimeRange
    {
        return $this->date;
    }

    public function isConflicted(): bool
    {
        return $this->conflicted;
    }

    public function getStatus(): BookingStatus
    {
        return $this->status;
    }

    public function overlaps(Booking $booking): bool
    {
        if ($this->roomId != $booking->roomId) {
            return false;
        }

        if ($this->date->overlaps($booking->date)) {
            return true;
        }
        return false;
    }

    public function markConflicted(): void
    {
        $this->conflicted = true;
    }

    public function unmarkConflicted(): void
    {
        $this->conflicted = false;
    }



}