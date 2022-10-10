<?php

declare(strict_types=1);

namespace App\Core;

use DateTime;

class DateTimeRange
{
    private DateTime $start;
    private DateTime $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function overlaps(DateTimeRange $date): bool
    {
        // TODO: implement overlaps method
        return false;
    }

}