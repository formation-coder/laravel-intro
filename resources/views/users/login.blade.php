@extends('layouts.app')


@section('content')
    <form action="" method="POST">
        @csrf
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{ old('email')}}"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="">{{__('Password')}}</label>
        <input type="password" name="password" id="password"><br>
        
        <button type="submit">Login</button>
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