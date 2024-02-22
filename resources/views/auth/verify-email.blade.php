@extends('auth.layouts')

@section('title', 'Verify email')

@section('content')

    <p>Verify email</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend confirmation</button>

    </form>
@endsection
