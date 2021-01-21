@extends('layouts.app')


@section('content')
    <form action="{{ route('skills.store')}}" method="POST">
        @csrf
        <label for="label">label</label>
        <input type="text" name="label" id="label" value="{{ old('label')}}"><br>
        @error('label')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="logo">{{__('Logo')}}</label>
        <input type="file" name="logo" id="logo" value="{{ old('logo')}}"><br>
        
        <button type="submit">Create new skill</button>
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