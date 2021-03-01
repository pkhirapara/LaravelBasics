<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {

        $customers = [
            'John Doe',
            'Jane Doe',
            'Bob The Builder',
        ];

        return view('internals.customers', ['customer1' => $customers]);
    }
}
