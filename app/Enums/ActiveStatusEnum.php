<?php

namespace App\Enums;

class ActiveStatusEnum implements EnumInterface
{
    const ACTIVE = '1';
    const INACTIVE = '0';

    public static function getList($id = null)
    {
        $items = [
            self::ACTIVE => 'Aktywny',
            self::INACTIVE => 'Nieaktywny',
        ];
        if (isset($id)) {
            return $items[$id] ?? null;
        }

        return $items;
    }


}