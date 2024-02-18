@extends('backend.layouts.app')

@section('title', 'Wallet')

@section('content')

    <form action="{{ route('frontend.wallet.store') }}" method="post">
        @csrf
        <input type="text" name="full_name" placeholder="Enter your full name"required>
        <br>

        <input type="email" name="email_add" placeholder="Enter your email"required>
        <br>

        <input type="text" name="amount"required>
        <br>

        <input type="submit" name="submit" value="Pay Now">
    </form>

@endsection
