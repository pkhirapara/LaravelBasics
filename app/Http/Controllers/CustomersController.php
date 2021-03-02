<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

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

        Customer::create($data);

        return back();
    }
}
