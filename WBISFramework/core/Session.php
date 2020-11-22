<?php


namespace app\core;


class Session
{
    protected const FLASH_KEY = 'flash_messages';
    protected const USER_KEY = 'user';

    public function __construct()
    {
        session_start();

        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];

        foreach ($flashMessages as $key => &$flashMessage)
        {
            $flashMessage['remove'] = true;
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key]= [
            'remove' => false,
            'value' => $message
        ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function setAuth($key, $user)
    {
        $_SESSION[$key] = $user;
        $_SESSION['is_ulogovan']=1;
    }

    public function getAuth($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
        unset($_SESSION['is_ulogovan']);
    }

    public function __destruct()
    {
       $flashMessages =  $_SESSION[self::FLASH_KEY] ?? [];

       foreach ($flashMessages as $key => &$flashMessage)
       {
           if ($flashMessage['remove']){
               unset($flashMessages[$key]);
           }
       }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}