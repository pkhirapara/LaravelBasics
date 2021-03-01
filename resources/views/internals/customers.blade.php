@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customer" method="POST" class="pb-5">
    @csrf
        <div class="input-group">
            <input type="text" name="name">
        </div>

        <button type="submit">Add Customer</button>
    </from>

    <ul>
        @foreach($customer1 as $customer)
            <li>{{ $customer->name }}</li>
        @endforeach
    </ul>
@endsection
