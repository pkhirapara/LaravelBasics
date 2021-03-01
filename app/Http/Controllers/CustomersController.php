<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {

        $customers = Customer::all();

        return view('internals.customers', [
            'customer1' => $customers]);
    }

    public function store()
    {
        $customer = new Customer();
        $customer->name = request('name');
        $customer->save();

        return back();
    }
}
