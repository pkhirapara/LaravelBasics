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

                <label for="email">Email</label>
                <div class="form-group">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div> {{  $errors->first('email') }} </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </from>
        </div>
    </div>
    
    <hr>

    <div class="row">
        <div class="col-12">
            <ul>
                @foreach($customer1 as $customer)
                    <li>{{ $customer->name }} <span class="muted">({{ $customer->email }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
