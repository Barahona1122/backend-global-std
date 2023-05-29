<?php
namespace App\Objects\ValuesObject;

class ShiftValues{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    const STATUS_TEXT = [
        self::STATUS_INACTIVE => "text.inactive",
        self::STATUS_ACTIVE => "text.active",
        self::STATUS_DELETED => "text.deleted",
    ];
}
