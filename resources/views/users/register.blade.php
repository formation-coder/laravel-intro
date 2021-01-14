@extends('layouts.app')


@section('content')
    <form action="" method="POST">
        @csrf
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email"><br>
        <label for="">password</label>
        <input type="password" name="password" id="password"><br>
        <label for="password-confirmation">Confirm password</label>
        <input type="password" name="password-confirmation" id="password-confirmation"><br>
        <button type="submit">Register</button>
    </form>


@endsection