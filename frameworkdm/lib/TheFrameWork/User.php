<?php

namespace TheFrameWork;

session_start();

class User
{
    public function setAttribute($attr, $value)
    {
        $_SESSION[$attr] = $value;
    }

    public function getAttribute($attr)
    {
        return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
    }

    public function setAuthenticated($authenticated = true)
    {
        if (!is_bool($authenticated))
        {
            throw new \InvalidArgumentException('La valeur spécifiée à la méthode User::setAuthenticated() doit être un boolean');
        }

        $_SESSION['auth'] = $authenticated;
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }

    public function setFlash($value)
    {
        $_SESSION['flash'] = $value;
    }

    public function hasFlash()
    {
        return isset($_SESSION['flash']);
    }

    public function getFlash()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $flash;
    }
}