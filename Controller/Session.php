<?php
class Session
{
    public static function runSession()
    {
        session_start();
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function quitSession()
    {
        session_destroy();
    }
    public static function unset($key)
    {
        session_unset($key);
    }

    public  static function getSesion($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSesstion()
    {
        self::runSession();
        if (self::getSesion('login') == false) {
            self::quitSession();
            $msg['msg'] = "Phải đăng nhập trước ";
            header("Location:" . BASE_URL . "login/login?msg=" . urldecode(serialize($msg)));
        } else {
        }
    }
}
