@extends('layouts.app')
@section('content')
    @include('customers.form', ['customer' => $customer])
@endsection
