<?php

namespace TCG\Core;

use TCG\Models\UserModel;
class Auth
{
    // Check if the user is a guest (not logged in).
    public static function isGuest(): bool
    {
        return !Application::$app->user;
    }

    // Check if the user has a free role.
    public static function isFree(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Free';
    }

    // Check if the user has a premium role.
    public static function isPremium(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Premium';
    }

    // Check if the user has a beheerder role.
    public static function isAdmin(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'Beheerder';
    }

    // Log in the user.
    public static function login(UserModel $user)
    {
        Application::$app->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        Application::$app->session->set('user', $primaryValue);
    }
}