<?php

namespace App\Models;

use CodeIgniter\Events\Events;
use stdClass;
// use CodeIgniter\Model;

class Auth
{
    static $SESSION_KEY = 'current_user';
    static $BACKEND_PERMISSION = 'access_backend';
    static $LOGIN_EVENTS = 'login';
    static $REDIRECT = '/';

    public static function id()
    {
        $user =  static::user(true);
        if (!$user) return null;
        return intval($user->id);
    }

    // public static function name()
    // {
    //     $user =  static::user(true);
    //     if (!$user) return null;
    //     return $user->name;
    // }

    // public static function role()
    // {
    //     $user = static::user(true);
    //     if (!$user) return null;
    //     return $user->role;
    // }

    public static function user($plain = false)
    {
        if (!session()->has(static::$SESSION_KEY)) return NULL;
        $loggedin_user =  session()->get(static::$SESSION_KEY);
        if (!$loggedin_user) return null;
        if ($plain) return static::make_object($loggedin_user);
        return model('User')->asObject()->find($loggedin_user['id']);
    }

    public function __get($name)
    {
        $user = $this->user(true);
        if (property_exists($user, $name)) return $user->{$name};
        return NULL;
    }

    public static function __callStatic($name, $arguments)
    {
        if (!static::isLoggedIn()) return null;
        $user = static::user(true);
        if (property_exists($user, $name)) return $user->{$name};
        return null;
    }

    public static function make_object($data, $skip = ['password'])
    {
        if (!$data) return null;
        $user = new stdClass();
        foreach (array_diff_key($data, $skip) as $key => $value) {
            if ($key !== 'password') $user->{$key} = $value;
        }
        return $user;
    }

    public static function login_using(int $id): Auth
    {
        helper('auth');
        static::logout();
        set_signin(model('User')->find($id));
        return self;
    }

    public static function isLoggedIn(): bool
    {
        return session()->has(static::$SESSION_KEY);
    }

    public static function ability(string $name = null): bool
    {
        $user = static::user(true);
        return in_array($user->role, ['admin', 'superadmin']) ?: in_array($name, $user->permissions);
    }

    public static function isAdmin(): bool
    {
        return session()->has(static::$SESSION_KEY) && static::ability(static::$BACKEND_PERMISSION);
    }

    public static function logout(): bool
    {
        if (session()->has(static::$SESSION_KEY)) {
            Events::trigger('logout', static::user(true));
            session()->remove(static::$SESSION_KEY);
            return true;
        }
        return false;
    }

    public  static function attempt($user)
    {
        if (!isset($user)) return false;
        try {
            static::logout();

            session()->set(static::$SESSION_KEY, [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'image' => $user['image'],
                'role' => $user['role'],
                'active' => $user['active'],
                'permissions' => $user['permissions'] ?? [],
            ]);

            Events::trigger(static::$LOGIN_EVENTS, $user);
            return true;
        } catch (\Throwable $th) {
            Events::trigger('loginFailed', $th->getMessage());
            return false;
        }
    }
}
