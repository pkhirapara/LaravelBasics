@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customer" method="POST" class="pb-5">
    @csrf
        <p>Name:</p>
        <div class="input-group">
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div> {{  $errors->first('name') }} </div>


        <p>Email:</p>
        <div class="input-group">
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        <div> {{  $errors->first('email') }} </div>

        <button type="submit">Add Customer</button>
    </from>

    <ul>
        @foreach($customer1 as $customer)
            <li>{{ $customer->name }} <span class="muted">({{ $customer->email }})</span></li>
        @endforeach
    </ul>
@endsection
