<?php

declare(strict_types=1);

namespace Modules\Auth\Support;

enum Permissions: string
{
    case LIST_USERS = 'ALL-list-users';
    case VIEW_USERS = 'ALL-view-users';
    case CREATE_USERS = 'ALL-create-users';
    case EDIT_USERS = 'ALL-edit-users';
    case DELETE_USERS = 'ALL-delete-users';

    case EDIT_USERS_STATUS = 'ALL-edit-users-status';
    case EDIT_USERS_PASSWORDS = 'ALL-edit-users-passwords';

    case INTEGRATE_USERS = 'ALL-integrate-users';

    case LIST_USER_ROLES = 'ALL-list-user-roles';
    case EDIT_USER_ROLES = 'ALL-edit-user-roles';

    case LIST_ROLES = 'ALL-list-roles';
    case VIEW_ROLES = 'ALL-view-roles';
    case CREATE_ROLES = 'ALL-create-roles';
    case EDIT_ROLES = 'ALL-edit-roles';
    case DELETE_ROLES = 'ALL-delete-roles';

    case LIST_ROLE_PERMISSIONS = 'ALL-list-role-permissions';
    case EDIT_ROLE_PERMISSIONS = 'ALL-edit-role-permissions';

    case LIST_PERMISSIONS = 'ALL-list-permissions';

    case IMPERSONATE = 'ALL-impersonate';
    case BE_IMPERSONATED = 'ALL-be-impersonated';

    case VIEW_AUTH_SETTINGS = 'ALL-view-auth-settings';
    case EDIT_AUTH_SETTINGS = 'ALL-edit-auth-settings';

    case VIEW_PORTAL_SETTINGS = 'PORTAL-view-portal-settings';
    case EDIT_PORTAL_SETTINGS = 'PORTAL-edit-portal-settings';

    case DELETE_MEDIA = 'ALL-delete-media';

    case LIST_STUDENTS = 'ALL-list-students';
    case VIEW_STUDENT_RESUME = 'ALL-view-student-resume';

    case LIST_ADS_ITEMS = 'ALL-list-ads';
    case VIEW_ADS_ITEMS = 'ALL-view-ads';
    case CREATE_ADS_ITEMS = 'ALL-create-ads';
    case EDIT_ADS_ITEMS = 'ALL-edit-ads';
    case DELETE_ADS_ITEMS = 'ALL-delete-ads';

    case LIST_THEMES_ITEMS = 'ALL-list-themes';
    case VIEW_THEMES_ITEMS = 'ALL-view-themes';
    case CREATE_THEMES_ITEMS = 'ALL-create-themes';
    case EDIT_THEMES_ITEMS = 'ALL-edit-themes';
    case DELETE_THEMES_ITEMS = 'ALL-delete-themes';

    case LIST_POPUPS = 'PORTAL-list-popups';
    case VIEW_POPUPS = 'PORTAL-view-popups';
    case CREATE_POPUPS = 'PORTAL-create-popups';
    case EDIT_POPUPS = 'PORTAL-edit-popups';
    case DELETE_POPUPS = 'PORTAL-delete-popups';

    case LIST_PAGES = 'PORTAL-list-pages';
    case VIEW_PAGES = 'PORTAL-view-pages';
    case CREATE_PAGES = 'PORTAL-create-pages';
    case EDIT_PAGES = 'PORTAL-edit-pages';
    case DELETE_PAGES = 'PORTAL-delete-pages';

    case LIST_NAV_ITEMS = 'PORTAL-list-nav-items';
    case VIEW_NAV_ITEMS = 'PORTAL-view-nav-items';
    case CREATE_NAV_ITEMS = 'PORTAL-create-nav-items';
    case EDIT_NAV_ITEMS = 'PORTAL-edit-nav-items';
    case DELETE_NAV_ITEMS = 'PORTAL-delete-nav-items';

    case LIST_SLIDER_ITEMS = 'PORTAL-list-slider-items';
    case VIEW_SLIDER_ITEMS = 'PORTAL-view-slider-items';
    case CREATE_SLIDER_ITEMS = 'PORTAL-create-slider-items';
    case EDIT_SLIDER_ITEMS = 'PORTAL-edit-slider-items';
    case DELETE_SLIDER_ITEMS = 'PORTAL-delete-slider-items';

    case LIST_CONTENTS = 'LMS-list-contents';
    case VIEW_CONTENTS = 'LMS-view-contents';
    case CREATE_CONTENTS = 'LMS-create-contents';
    case EDIT_CONTENTS = 'LMS-edit-contents';
    case DELETE_CONTENTS = 'LMS-delete-contents';

    case CLONE_LEARNINGS = 'LMS-clone-learnings';

    case CLONE_SURVEYS = 'LMS-clone-surveys';

    case LIST_SURVEYS = 'LMS-list-surveys';
    case VIEW_SURVEYS = 'LMS-view-surveys';
    case CREATE_SURVEYS = 'LMS-create-surveys';
    case EDIT_SURVEYS = 'LMS-edit-surveys';
    case DELETE_SURVEYS = 'LMS-delete-surveys';

    case LIST_SECTIONS = 'LMS-list-sections';
    case VIEW_SECTIONS = 'LMS-view-sections';
    case CREATE_SECTIONS = 'LMS-create-sections';
    case EDIT_SECTIONS = 'LMS-edit-sections';
    case DELETE_SECTIONS = 'LMS-delete-sections';

    case LIST_QUESTIONS = 'LMS-list-questions';
    case VIEW_QUESTIONS = 'LMS-view-questions';
    case CREATE_QUESTIONS = 'LMS-create-questions';
    case EDIT_QUESTIONS = 'LMS-edit-questions';
    case DELETE_QUESTIONS = 'LMS-delete-questions';

    case LIST_CHOICES = 'LMS-list-choices';
    case VIEW_CHOICES = 'LMS-view-choices';
    case CREATE_CHOICES = 'LMS-create-choices';
    case EDIT_CHOICES = 'LMS-edit-choices';
    case DELETE_CHOICES = 'LMS-delete-choices';

    case LIST_ENTRIES = 'LMS-list-entries';
    case VIEW_ENTRIES = 'LMS-view-entries';
    case CREATE_ENTRIES = 'LMS-create-entries';
    case EDIT_ENTRIES = 'LMS-edit-entries';
    case DELETE_ENTRIES = 'LMS-delete-entries';

    case LIST_ANSWERS = 'LMS-list-answers';
    case VIEW_ANSWERS = 'LMS-view-answers';
    case CREATE_ANSWERS = 'LMS-create-answers';
    case EDIT_ANSWERS = 'LMS-edit-answers';
    case DELETE_ANSWERS = 'LMS-delete-answers';

    case LIST_TAGS = 'LMS-list-tags';
    case VIEW_TAGS = 'LMS-view-tags';
    case CREATE_TAGS = 'LMS-create-tags';
    case EDIT_TAGS = 'LMS-edit-tags';
    case DELETE_TAGS = 'LMS-delete-tags';

    public static function all(): array
    {
        return [
            self::LIST_USERS,
            self::VIEW_USERS,
            self::CREATE_USERS,
            self::EDIT_USERS,
            self::DELETE_USERS,

            self::EDIT_USERS_STATUS,
            self::EDIT_USERS_PASSWORDS,

            self::INTEGRATE_USERS,

            self::LIST_USER_ROLES,
            self::EDIT_USER_ROLES,

            self::LIST_ROLES,
            self::VIEW_ROLES,
            self::CREATE_ROLES,
            self::EDIT_ROLES,
            self::DELETE_ROLES,

            self::LIST_ROLE_PERMISSIONS,
            self::EDIT_ROLE_PERMISSIONS,

            self::LIST_PERMISSIONS,

            self::IMPERSONATE,
            self::BE_IMPERSONATED,

            self::VIEW_AUTH_SETTINGS,
            self::EDIT_AUTH_SETTINGS,

            self::VIEW_PORTAL_SETTINGS,
            self::EDIT_PORTAL_SETTINGS,

            self::DELETE_MEDIA,

            self::LIST_STUDENTS,
            self::VIEW_STUDENT_RESUME,

            self::LIST_ADS_ITEMS,
            self::VIEW_ADS_ITEMS,
            self::CREATE_ADS_ITEMS,
            self::EDIT_ADS_ITEMS,
            self::DELETE_ADS_ITEMS,

            self::LIST_THEMES_ITEMS,
            self::VIEW_THEMES_ITEMS,
            self::CREATE_THEMES_ITEMS,
            self::EDIT_THEMES_ITEMS,
            self::DELETE_THEMES_ITEMS,

            self::LIST_POPUPS,
            self::VIEW_POPUPS,
            self::CREATE_POPUPS,
            self::EDIT_POPUPS,
            self::DELETE_POPUPS,

            self::LIST_PAGES,
            self::VIEW_PAGES,
            self::CREATE_PAGES,
            self::EDIT_PAGES,
            self::DELETE_PAGES,

            self::LIST_NAV_ITEMS,
            self::VIEW_NAV_ITEMS,
            self::CREATE_NAV_ITEMS,
            self::EDIT_NAV_ITEMS,
            self::DELETE_NAV_ITEMS,

            self::LIST_SLIDER_ITEMS,
            self::VIEW_SLIDER_ITEMS,
            self::CREATE_SLIDER_ITEMS,
            self::EDIT_SLIDER_ITEMS,
            self::DELETE_SLIDER_ITEMS,

            self::LIST_CONTENTS,
            self::VIEW_CONTENTS,
            self::CREATE_CONTENTS,
            self::EDIT_CONTENTS,
            self::DELETE_CONTENTS,

            self::CLONE_LEARNINGS,

            self::CLONE_SURVEYS,

            self::LIST_SURVEYS,
            self::VIEW_SURVEYS,
            self::CREATE_SURVEYS,
            self::EDIT_SURVEYS,
            self::DELETE_SURVEYS,

            self::LIST_SECTIONS,
            self::VIEW_SECTIONS,
            self::CREATE_SECTIONS,
            self::EDIT_SECTIONS,
            self::DELETE_SECTIONS,

            self::LIST_QUESTIONS,
            self::VIEW_QUESTIONS,
            self::CREATE_QUESTIONS,
            self::EDIT_QUESTIONS,
            self::DELETE_QUESTIONS,

            self::LIST_CHOICES,
            self::VIEW_CHOICES,
            self::CREATE_CHOICES,
            self::EDIT_CHOICES,
            self::DELETE_CHOICES,

            self::LIST_ENTRIES,
            self::VIEW_ENTRIES,
            self::CREATE_ENTRIES,
            self::EDIT_ENTRIES,
            self::DELETE_ENTRIES,

            self::LIST_ANSWERS,
            self::VIEW_ANSWERS,
            self::CREATE_ANSWERS,
            self::EDIT_ANSWERS,
            self::DELETE_ANSWERS,

            self::LIST_TAGS,
            self::VIEW_TAGS,
            self::CREATE_TAGS,
            self::EDIT_TAGS,
            self::DELETE_TAGS,

        ];
    }

    public function description(): string
    {
        return match ($this) {
            self::LIST_USERS => 'Listar usuários',
            self::VIEW_USERS => 'Visualizar usuários',
            self::CREATE_USERS => 'Criar usuários',
            self::EDIT_USERS => 'Editar usuários',
            self::DELETE_USERS => 'Deletar usuários',

            self::EDIT_USERS_STATUS => 'Editar status de usuários',
            self::EDIT_USERS_PASSWORDS => 'Editar senhas de usuários',

            self::INTEGRATE_USERS => 'Integrar usuários',

            self::LIST_USER_ROLES => 'Listar grupos de usuários',
            self::EDIT_USER_ROLES => 'Editar grupos de usuários',

            self::LIST_ROLES => 'Listar grupos',
            self::VIEW_ROLES => 'Visualizar grupos',
            self::CREATE_ROLES => 'Criar grupos',
            self::EDIT_ROLES => 'Editar grupos',
            self::DELETE_ROLES => 'Deletar grupos',

            self::LIST_ROLE_PERMISSIONS => 'Listar permissões de grupos',
            self::EDIT_ROLE_PERMISSIONS => 'Editar permissões de grupos',

            self::LIST_PERMISSIONS => 'Listar permissões',

            self::IMPERSONATE => 'Impersonar',
            self::BE_IMPERSONATED => 'Ser impersonado',

            self::VIEW_AUTH_SETTINGS => 'Visualizar configurações de autenticação',
            self::EDIT_AUTH_SETTINGS => 'Editar configurações de autenticação',

            self::VIEW_PORTAL_SETTINGS => 'Visualizar configurações do portal',
            self::EDIT_PORTAL_SETTINGS => 'Editar configurações do portal',

            self::DELETE_MEDIA => 'Deletar mídias',

            self::LIST_STUDENTS => 'Listar estudantes',
            self::VIEW_STUDENT_RESUME => 'Visualizar resumos de estudantes',

            self::LIST_ADS_ITEMS => 'Listar banners de login',
            self::VIEW_ADS_ITEMS => 'Visualizar banners de login',
            self::CREATE_ADS_ITEMS => 'Criar banners de login',
            self::EDIT_ADS_ITEMS => 'Editar banners de login',
            self::DELETE_ADS_ITEMS => 'Deletar banners de login',

            self::LIST_THEMES_ITEMS => 'Listar themas',
            self::VIEW_THEMES_ITEMS => 'Visualizar themas',
            self::CREATE_THEMES_ITEMS => 'Criar themas',
            self::EDIT_THEMES_ITEMS => 'Editar themas',
            self::DELETE_THEMES_ITEMS => 'Deletar themas',

            self::LIST_POPUPS => 'Listar popups',
            self::VIEW_POPUPS => 'Visualizar popups',
            self::CREATE_POPUPS => 'Criar popups',
            self::EDIT_POPUPS => 'Editar popups',
            self::DELETE_POPUPS => 'Deletar popups',

            self::LIST_PAGES => 'Listar páginas',
            self::VIEW_PAGES => 'Visualizar páginas',
            self::CREATE_PAGES => 'Criar páginas',
            self::EDIT_PAGES => 'Editar páginas',
            self::DELETE_PAGES => 'Deletar páginas',

            self::LIST_NAV_ITEMS => 'Listar itens de navegação',
            self::VIEW_NAV_ITEMS => 'Visualizar itens de navegação',
            self::CREATE_NAV_ITEMS => 'Criar itens de navegação',
            self::EDIT_NAV_ITEMS => 'Editar itens de navegação',
            self::DELETE_NAV_ITEMS => 'Deletar itens de navegação',

            self::LIST_SLIDER_ITEMS => 'Listar itens de slider',
            self::VIEW_SLIDER_ITEMS => 'Visualizar itens de slider',
            self::CREATE_SLIDER_ITEMS => 'Criar itens de slider',
            self::EDIT_SLIDER_ITEMS => 'Editar itens de slider',
            self::DELETE_SLIDER_ITEMS => 'Deletar itens de slider',

            self::LIST_CONTENTS => 'Listar conteúdos',
            self::VIEW_CONTENTS => 'Visualizar conteúdos',
            self::CREATE_CONTENTS => 'Criar conteúdos',
            self::EDIT_CONTENTS => 'Editar conteúdos',
            self::DELETE_CONTENTS => 'Deletar conteúdos',

            self::CLONE_LEARNINGS => 'Clonar unidades',

            self::CLONE_SURVEYS => 'Clonar questionários',

            self::LIST_SURVEYS => 'Listar questionários',
            self::VIEW_SURVEYS => 'Visualizar questionários',
            self::CREATE_SURVEYS => 'Criar questionários',
            self::EDIT_SURVEYS => 'Editar questionários',
            self::DELETE_SURVEYS => 'Deletar questionários',

            self::LIST_SECTIONS => 'Listar sessões',
            self::VIEW_SECTIONS => 'Visualizar sessões',
            self::CREATE_SECTIONS => 'Criar sessões',
            self::EDIT_SECTIONS => 'Editar sessões',
            self::DELETE_SECTIONS => 'Deletar sessões',

            self::LIST_QUESTIONS => 'Listar questões',
            self::VIEW_QUESTIONS => 'Visualizar questões',
            self::CREATE_QUESTIONS => 'Criar questões',
            self::EDIT_QUESTIONS => 'Editar questões',
            self::DELETE_QUESTIONS => 'Deletar questões',

            self::LIST_CHOICES => 'Listar alternativas',
            self::VIEW_CHOICES => 'Visualizar alternativas',
            self::CREATE_CHOICES => 'Criar alternativas',
            self::EDIT_CHOICES => 'Editar alternativas',
            self::DELETE_CHOICES => 'Deletar alternativas',

            self::LIST_ENTRIES => 'Listar entradas',
            self::VIEW_ENTRIES => 'Visualizar entradas',
            self::CREATE_ENTRIES => 'Criar entradas',
            self::EDIT_ENTRIES => 'Editar entradas',
            self::DELETE_ENTRIES => 'Deletar entradas',

            self::LIST_ANSWERS => 'Listar respostas',
            self::VIEW_ANSWERS => 'Visualizar respostas',
            self::CREATE_ANSWERS => 'Criar respostas',
            self::EDIT_ANSWERS => 'Editar respostas',
            self::DELETE_ANSWERS => 'Deletar respostas',

            self::LIST_TAGS => 'Listar etiquetas',
            self::VIEW_TAGS => 'Visualizar etiquetas',
            self::CREATE_TAGS => 'Criar etiquetas',
            self::EDIT_TAGS => 'Editar etiquetas',
            self::DELETE_TAGS => 'Deletar etiquetas',
        };
    }
}
