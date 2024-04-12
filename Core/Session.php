<?php

namespace TCG\Core;

class Session
{

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    // Get the user from the session.
    public function getSessionUser()
    {
        return $this->get('user');
    }

    // Set a session variable.
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    // Get a session variable.
    public function get(string $key)
    {
        return $_SESSION[$key] ?? false;
    }

    // Remove a session variable.
    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    // Clean up the session when the object is destroyed.
    public function __destruct()
    {
        session_write_close();
    }

    // Set flash messages.
    public function setFlash(string $key, string $message): void
    {
        if (!isset($_SESSION['flash'][$key])) {
            $_SESSION['flash'][$key] = [];
        }
        $_SESSION['flash'][$key][] = $message;
    }

    // Get flash messages.
    public function getFlash($key)
    {
        if (isset($_SESSION['flash'][$key])) {
            $messages = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $messages;
        }
        return null;
    }
}