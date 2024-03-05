<?php

namespace App\Enums;

enum RolesEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
    case WRITER = 'writer';

// extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
        {
            return match ($this) {
                static::SUPER_ADMIN => 'Owner',
                static::ADMIN => 'Admins',
                static::WRITER => 'Writers',
        };
    }
}
