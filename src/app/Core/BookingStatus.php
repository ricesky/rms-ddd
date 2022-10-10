<?php

declare(strict_types=1);

namespace App\Core;

use InvalidArgumentException;

class BookingStatus
{
    const CONFIRMED = 1;
    const CANCELLED = 2;
    const IN_CONFIRMATION = 3;
   
    private int $status;

    public function __construct(int $status)
    {
        if ($status != self::CONFIRMED & 
            $status != self::CANCELLED &
            $status != self::IN_CONFIRMATION) {
            throw new InvalidArgumentException('invalid_booking_status');
        }

        $this->status = $status;
    }

    public function getStatus() : int
    {
        return $this->status;
    }

    public function equals(BookingStatus $bookingStatus) : bool
    {
        return $this->status === $bookingStatus->getStatus();
    }

    public function isConfirmed(): bool
    {
        return $this->status === self::CONFIRMED;
    }

    public function isCancelled(): bool
    {
        return $this->status === self::CANCELLED;
    }

    public function isInConfirmation(): bool
    {
        return $this->status === self::IN_CONFIRMATION;
    }

    public static function confirmed(): BookingStatus
    {
        return new BookingStatus(self::CONFIRMED);
    }

    public static function cancelled(): BookingStatus
    {
        return new BookingStatus(self::CANCELLED);
    }

    public static function inConfirmation(): BookingStatus
    {
        return new BookingStatus(self::IN_CONFIRMATION);
    }

}