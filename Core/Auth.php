<?php

namespace TCG\Core;

use TCG\Models\UserModel;
class Auth
{
    public static function isGuest(): bool
    {
        return !Application::$app->user;
    }

    public static function isFree(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Free';
    }

    public static function isPremium(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Premium';
    }

    public static function isAdmin(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Beheerder';
    }

    public static function login(UserModel $user)
    {
        Application::$app->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        Application::$app->session->set('user', $primaryValue);
    }
}