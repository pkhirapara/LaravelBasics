<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;
use Intervention\Image\Facades\Image as Image;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $customers = Customer::with('company')->paginate(15);

        return view('customers.index', compact('customers'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

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

        $this->storeImage($customer);

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    public function validateRequest()
    {
        // check available validation rules in doc

        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }

    public function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            //$image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300, null, 'top-left');
            //$image->save();

        }
    }

}
