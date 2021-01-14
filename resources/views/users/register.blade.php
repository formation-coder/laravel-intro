@extends('layouts.app')


@section('content')
    <form action="" method="POST">
        @csrf
        <label for="pseudo">{{__('Name')}}</label>
        <input type="text" name="pseudo" id="pseudo" value="{{ old('pseudo')}}"><br>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{ old('email')}}"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <label for="">{{__('Password')}}</label>
        <input type="password" name="password" id="password"><br>
        <label for="password-confirmation">Confirm password</label>
        <input type="password" name="password-confirmation" id="password-confirmation"><br>
        <button type="submit">Register</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection