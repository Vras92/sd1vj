<?php

namespace App\Http\Controllers;

use App\Utils\UserDatabase;
use Faker\Factory as FakerFactory;

class AdminController extends Controller
{
    public function adminUser(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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

            session(['users_generated' => true]);
        }

        $allUsers = UserDatabase::getUsers();

        return view('adminUser', ['allUsers' => $allUsers]);
    }

    public function adminUserManagement(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('adminUserManagement');
    }

}
