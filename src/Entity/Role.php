<?php
declare(strict_types=1);

namespace App\Role;
use MyCLabs\Enum\Enum;

/**
 * Role enum
 */
class Role extends Enum
{
    private const ROLE_ADMIN = 'ROLE_ADMIN';
    private const USER = 'ROLE_USER';
    private const PROJECT_ADMIN = 'ROLE_PROJECT_ADMIN';
    private const PROJECT_VIEWER = 'ROLE_PROJECT_VIEWER';
}   