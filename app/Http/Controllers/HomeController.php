<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function client()
    {
        return view('client');
    }

    public function employee()
    {
        return view('employee');
    }

    public function admin()
    {
        return view('admin');
    }

}
