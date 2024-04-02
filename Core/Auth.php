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
        return Application::$app->user->role === 'student';
    }

    public static function isAdmin(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'beheerder';
    }

    public static function isTeacher(): bool
    {
        if (self::isGuest()) {
            return false;
        }
        return Application::$app->user->role === 'docent';
    }

    public static function login(UserModel $user)
    {
        App::$app->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        App::$app->session->set('user', $primaryValue);
    }
}