<?php

namespace App\Enums;

enum OfferStatusEnum implements EnumInterface
{
    const PROJECT = '1';
    const SENT = '2';

    const ACCEPTED = '3';

    const REJECTED = '99';

    public static function getList($id = null)
    {
        $items = [
            self::PROJECT => 'Projekt',
            self::SENT => 'Wysłana',
            self::ACCEPTED => 'Zaakceptowana',
            self::REJECTED => 'Odrzucona',
        ];
        if (isset($id)) {
            return $items[$id] ?? null;
        }

        return $items;
    }
}
