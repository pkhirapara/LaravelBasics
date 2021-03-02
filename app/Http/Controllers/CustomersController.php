<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        $activeCustomers = Customer::where('active', 1)->get();
        $inactiveCustomers = Customer::where('active', 0)->get();

        $customers = Customer::all();

        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
    }

    public function store()
    {
        // check available validation rules in doc
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();

        return back();
    }
}
