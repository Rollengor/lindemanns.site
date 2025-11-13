<?php

namespace App\Enums;

enum RolesEnum: string
{
    case SUPERADMIN = 'super-admin';
    case ADMIN = 'admin';
    case MANAGER = 'manager';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::SUPERADMIN => 'Super Admin',
            static::ADMIN => 'Admin',
            static::MANAGER => 'Global manager',
        };
    }
}
