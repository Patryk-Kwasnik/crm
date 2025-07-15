<?php

namespace App\Enums;

enum TaskPriorityEnum implements EnumInterface
{
    const LOW = '1';
    const NORMAL = '2';
    const HIGH = '3';

    public static function getList($id = null)
    {
        $items = [
            self::LOW => 'Niski',
            self::NORMAL => 'Normalny',
            self::HIGH => 'Wysoki',
        ];
        if (isset($id)) {
            return $items[$id] ?? null;
        }

        return $items;
    }
}
