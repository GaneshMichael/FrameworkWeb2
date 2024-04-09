<?php

namespace TCG\Core;

use TCG\Models\UserModel;
class Auth
{
    public static function isGuest(): bool
    {
        return !Application::$app->user;
    }

    public static function isStudent(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'free';
    }

    public static function isAdmin(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'premium';
    }

    public static function isTeacher(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'admin';
    }

    public static function login(UserModel $user)
    {
        Application::$app->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        Application::$app->session->set('user', $primaryValue);
    }
}