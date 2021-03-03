<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function store()
    {
        // check available validation rules in doc
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        Customer::create($data);

        return redirect('customers');
    }

    public function create()
    {

        $companies = Company::all();
 
        return view('customers.create', compact('companies'));

    }

    public function show(Customer $customer)
    {
        //route model binding example we do not need to write below line
        //if we pass Customer in argument above
        //Laravel does it for us automatically
        
        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
        
    }
}
