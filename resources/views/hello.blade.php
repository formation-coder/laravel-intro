@extends('layouts.app')
@section('title', 'Hello')

@section('sidebar')
    @parent
    <p>C'est ajouté à la barre principale </p>
@endsection
    

@section('content')

        <h1>Hello {{ $name }}</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, dolorem unde fugit deleniti dignissimos, maiores repellat quisquam sequi ab at fugiat. Consectetur error necessitatibus laboriosam fugit reiciendis a id nam.</p> 
@endsection    
