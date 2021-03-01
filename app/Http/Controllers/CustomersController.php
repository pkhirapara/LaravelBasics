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
        // check available validation rules in doc
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->save();

        return back();
    }
}
