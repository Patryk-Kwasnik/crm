<?php

namespace App\Enums;

enum TaskStatusEnum implements EnumInterface
{
    const NEW = '1';
    const IN_PROGRESS = '2';

    const CLOSED = '3';

    const CANCELED = '99';

    public static function getList($id = null)
    {
        $items = [
            self::NEW => 'Nowe',
            self::IN_PROGRESS => 'W trakcie',
            self::CLOSED => 'Zamknięte',
            self::CANCELED => 'Anulowane',
        ];
        if (isset($id)) {
            return $items[$id] ?? null;
        }

        return $items;
    }
}
