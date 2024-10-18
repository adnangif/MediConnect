<?php

namespace App\Enums;

enum AppointmentStatusTypes:string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case CANCELLED = 'cancelled';
    case FINISHED = 'finished';
    case ONGOING = 'ongoing';

    public static function toArray(): array {
        return array_column(AppointmentStatusTypes::cases(), 'value');
    }
}
