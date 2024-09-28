<?php

declare(strict_types=1);

namespace Modules\Auth\Support;

enum DefaultRoles: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
    case STUDENT = 'student';

    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::STUDENT,
        ];
    }

    public static function hidden(): array
    {
        return [
            self::SUPER_ADMIN,
        ];
    }

    public static function protected(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::STUDENT,
        ];
    }

    public function description(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Administrador',
            self::ADMIN => 'Administrador',
            self::STUDENT => 'Estudante',
        };
    }

    public function permissions(): array
    {
        return match ($this) {
            self::ADMIN => [
                Permissions::LIST_USERS,
                Permissions::VIEW_USERS,
                Permissions::CREATE_USERS,
                Permissions::EDIT_USERS,
                Permissions::DELETE_USERS,

                Permissions::EDIT_USERS_STATUS,
                Permissions::EDIT_USERS_PASSWORDS,

                Permissions::INTEGRATE_USERS,

                Permissions::LIST_USER_ROLES,
                Permissions::EDIT_USER_ROLES,

                Permissions::LIST_ROLES,
                Permissions::CREATE_ROLES,
                Permissions::EDIT_ROLES,
                Permissions::DELETE_ROLES,

                Permissions::LIST_ROLE_PERMISSIONS,
                Permissions::EDIT_ROLE_PERMISSIONS,

                Permissions::LIST_PERMISSIONS,

                Permissions::IMPERSONATE,

                Permissions::VIEW_AUTH_SETTINGS,
                Permissions::EDIT_AUTH_SETTINGS,

                Permissions::VIEW_PORTAL_SETTINGS,
                Permissions::EDIT_PORTAL_SETTINGS,

                Permissions::DELETE_MEDIA,

                Permissions::LIST_STUDENTS,
                Permissions::VIEW_STUDENT_RESUME,

                Permissions::LIST_POPUPS,
                Permissions::VIEW_POPUPS,
                Permissions::CREATE_POPUPS,
                Permissions::EDIT_POPUPS,
                Permissions::DELETE_POPUPS,

                Permissions::LIST_PAGES,
                Permissions::VIEW_PAGES,
                Permissions::CREATE_PAGES,
                Permissions::EDIT_PAGES,
                Permissions::DELETE_PAGES,

                Permissions::LIST_NAV_ITEMS,
                Permissions::VIEW_NAV_ITEMS,
                Permissions::CREATE_NAV_ITEMS,
                Permissions::EDIT_NAV_ITEMS,
                Permissions::DELETE_NAV_ITEMS,

                Permissions::LIST_SLIDER_ITEMS,
                Permissions::VIEW_SLIDER_ITEMS,
                Permissions::CREATE_SLIDER_ITEMS,
                Permissions::EDIT_SLIDER_ITEMS,
            ],
            self::STUDENT => [
                Permissions::BE_IMPERSONATED,

                Permissions::VIEW_PORTAL_SETTINGS,

                Permissions::VIEW_POPUPS,

                Permissions::VIEW_PAGES,
            ],
        };
    }
}
