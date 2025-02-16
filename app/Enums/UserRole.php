<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRole extends Enum
{
    const ADMIN =   'ADMIN';
    const MODERATOR =   'MODERATOR';
    const EDITOR = 'EDITOR';

    const USER = 'USER';

    public static function getValues(array|string|null $keys = null): array
    {
        return [
            self::ADMIN,
            self::EDITOR,
            self::MODERATOR,
            self::USER,
        ];
    }
}
