<?php

namespace App\Enums;

enum UserTypes:string {
    case USER = "user";
    case ADMIN = "admin";
    case DOCTOR = "doctor";

    public static function toArray(): array {
        return array_column(UserTypes::cases(), 'value');
    }
}
