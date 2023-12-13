<?php

namespace App\Services;

class AuthSimulator
{
    public static function simulateAuthenticatedUser()
    {
        $user = ['name' => 'Vygantas Jonaitis'];
        app()->instance('user', $user);
    }
}
