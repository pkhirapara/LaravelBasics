@extends('layouts.app')

@section('title', 'Add NewCustomers')   

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add New Customer</h1>
        </div>        
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST">
                @include('customers.form')
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </from>
        </div>
    </div>
@endsection
