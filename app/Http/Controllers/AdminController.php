<?php

namespace App\Http\Controllers;

use Faker\Factory as FakerFactory;
use App\Utils\UserDatabase;

class AdminController extends Controller
{
    public function adminConference() {
        return view('adminConference');
    }
    public function adminUser()
    {
        if (!session()->has('users_generated')) {
            $faker = FakerFactory::create();

            for ($i = 0; $i < 10; $i++) {
                $user = [
                    'id' => $i,
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt('password'),
                ];

                UserDatabase::addUser($user);
            }

            // Set the flag in the session
            session(['users_generated' => true]);
        }

        $allUsers = UserDatabase::getUsers();

        return view('adminUser', ['allUsers' => $allUsers]);
    }

    public function adminUserManagement() {
        return view('adminUserManagement');
    }

}
