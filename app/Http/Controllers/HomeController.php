<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $customers = [
            'John Doe',
            'Jane Doe',
            'Bob The Builder',
        ];

        return view('home', ['customer1' => $customers]);
    }
}
