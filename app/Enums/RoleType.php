<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Administrador()
 * @method static static Usuario()
 * @method static static OptionThree()
 */
final class RoleType extends Enum
{
    const ADMINISTRADOR = 'Administrador';
    const USUARIO = 'Usuario';
}
