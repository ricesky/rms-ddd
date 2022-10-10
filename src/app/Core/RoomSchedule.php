<?php

declare(strict_types=1);

namespace App\Core;

class RoomSchedule
{
    private RoomId $roomId;
    private DateTimeRange $dateRange;
    private array $bookings;
   
    public function __construct(
        RoomId $roomId,
        DateTimeRange $dateRange,
        array $bookings
    )
    {
        $this->roomId = $roomId;
        $this->dateRange = $dateRange;
        $this->bookings = $bookings;
    }

    public function isAvailable(Booking $booking): bool
    {
        foreach ($this->bookings as $existingBooking) {
            if ($existingBooking->overlaps($booking)) {
                return false;
            }
        }
        return true;
    }

    public function book(DateTimeRange $date): Booking
    {
        $newBooking = new Booking($this->roomId, $date, false, BookingStatus::inConfirmation());

        if (!$this->isAvailable($newBooking)) {
            //throw new Exception
        }

        $this->bookings[] = $newBooking;

        $this->markConflictedBookings($newBooking);

        return $newBooking;
    }

    private function markConflictedBookings(Booking $booking): void
    {
        foreach ($this->bookings as $existingBooking) {
            if ($existingBooking != $booking && $existingBooking->overlaps($booking)) {
                $existingBooking->markConflicted();
                $booking->markConflicted();
            }
        }
    }

}