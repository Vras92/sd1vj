<?php

namespace App\Utils;

use Illuminate\Support\Facades\Session;


class UserDatabase
{
    public static function addUser($user): void
    {
        $users = Session::get('users', []);
        $users[] = $user;
        Session::put('users', $users);
    }

    public static function getUsers()
    {
        return Session::get('users', []);
    }

    public static function getUserById($id)
    {
        $users = self::getUsers();

        foreach ($users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }

        return null;
    }

    public static function updateUser($id, $userData): void
    {
        $users = self::getUsers();

        foreach ($users as &$user) {
            if ($user['id'] == $id) {
                if (!empty($userData['password'])) {
                    $userData['password'] = bcrypt($userData['password']);
                }

                $user = array_merge($user, $userData);
                break;
            }
        }

        session(['users' => $users]);
    }
}
