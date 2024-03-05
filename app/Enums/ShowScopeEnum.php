<?php

namespace App\Enums;

enum ShowScopeEnum: string
{
    case GLOBAL = "global";
    case ADMINS = 'admins';
    case WRITERS = "writers";

    public function label(): string
    {
        return match ($this) {
            static::GLOBAL => "Everyone!",
            static::ADMINS => "Admins Only!",
            static::WRITERS => "Writers Only!",
        };
    }
}
