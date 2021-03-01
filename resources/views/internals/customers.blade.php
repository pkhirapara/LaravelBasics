@extends('layout')

@section('content')
    <h1>Customers</h1>

    <ul>

        @foreach($customer1 as $customer)
            <li>{{ $customer }}</li>
        @endforeach

    </ul>
@endsection
