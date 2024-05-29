<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
date_default_timezone_set('Asia/Dhaka');

require_once 'vendor/autoload.php';

use phpseclib3\Net\SSH2;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Helper
{
    protected static $onlyInstance;

    protected static function getself()
    {
        if (static::$onlyInstance === null) {
            static::$onlyInstance = new Helper;
        }
        return static::$onlyInstance;
    }

    public static function csrf($form = false)
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];
        if ($form) return "<input type='hidden' name='csrf' value='$token'>";
        return $token;
    }

    public static function verify_csrf()
    {
        if (!empty($_POST['csrf'])) {
            if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "CSRF FOUND EMPTY";
            exit();
        }
    }

    public static function checkLoginStatus()
    {
        if (isset($_SESSION['login']) && (time() - $_SESSION['login'] > $_ENV['LOGIN_TIME'])) {
            static::logout();
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }

    public static function rate_limit()
    {
        $max_calls_limit  = 3;
        $time_period      = 10;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $user_ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $user_ip_address = $_SERVER['REMOTE_ADDR'];
        }

        if (isset($user_ip_address) && !isset($_COOKIE['user_ip'])) {
            setcookie('user_ip', $user_ip_address, time() + 20, "/");
            $_SESSION['total_calls'] = 1;
            $_SESSION['time'] = time() + $time_period;
        } elseif ($_COOKIE['user_ip'] !== $user_ip_address) {
            $_SESSION['total_calls'] = 1;
            $_SESSION['time'] = time() + $time_period;
        } elseif ($_COOKIE['user_ip'] === $user_ip_address && $_SESSION['time'] < time()) {
            if ($_SESSION['total_calls'] > $max_calls_limit) {
                echo "Limit exceeded.";
                echo '<meta http-equiv="refresh" content="20" >';
                exit();
            }
            $_SESSION['total_calls'] += 1;
        }
    }

    public static function login($password)
    {
        if (!empty($_POST['id'])) return 'Sorry! We have nothing to do.';
        if (!static::verify_csrf()) return 'CSRF mismatched';
        static::rate_limit();
        if (password_verify($password, $_ENV['PASSWORD_HASH'])) {
            $_SESSION['login'] = time();
            return null;
        } else {
            return "This is wrong input!";
        }
    }

    public static function reboot()
    {
        if (!empty($_POST['id'])) return 'Sorry! We have nothing to do.';
        if (!static::verify_csrf()) return 'Sorry! CSRF mismatched';
        $ssh = new SSH2($_ENV['HOST_IP']);
        if (!$ssh->login($_ENV['NAME'], $_ENV['PD'])) {
            exit('Login Failed');
        }
        $status = $ssh->exec("shutdown -r");
        $ssh->disconnect();
        unset($ssh);
        return $status;
        // return "System Rebooted Successfully.";
    }
}
