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
        Customer::create($this->validateRequest());

        return redirect('customers');
    }

    public function create()
    {

        $companies = Company::all();
        $customer = new Customer();
 
        return view('customers.create', compact('companies', 'customer'));

    }

    public function show(Customer $customer)
    {
        //route model binding example we do not need to write below line
        //if we pass Customer in argument above
        //Laravel does it for us automatically

        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
        
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/'.$customer->id);
    }

    public function validateRequest()
    {
        // check available validation rules in doc
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }

}
