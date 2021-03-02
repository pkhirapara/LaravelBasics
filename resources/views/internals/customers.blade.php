@extends('layout')

@section('title', 'Customers')   

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>        
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customer" method="POST" class="pb-5">
                @csrf
                <label for="name">Name</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div> {{  $errors->first('name') }} </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    <div> {{  $errors->first('email') }} </div>
                </div>

                <div class="form-group">
                <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select Customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </from>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                @foreach($activeCustomers as $activeCustomers)
                    <li>{{ $activeCustomers->name }} <span class="muted">({{ $activeCustomers->company->name }})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                @foreach($inactiveCustomers as $inactiveCustomers)
                    <li>{{ $inactiveCustomers->name }} <span class="muted">({{ $inactiveCustomers->company->name }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>

    
    <div class="row">
        <div class="col-12">
            @foreach($companies as $company)
                <h3>{{  $company->name }} </h3>

                <ul>
                    @foreach($company->customers as $customer)
                        <li>{{ $customer->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
    
@endsection
