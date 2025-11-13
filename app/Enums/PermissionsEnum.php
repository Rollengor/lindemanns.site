<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case CANALL = 'all';
    case CANCREATE = 'create';
    case CANEDIT = 'edit';
    case CANDELETE = 'delete';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::CANALL => 'Can all',
            static::CANCREATE => 'Can create',
            static::CANEDIT => 'Can edit',
            static::CANDELETE => 'Can delete',
        };
    }
}
