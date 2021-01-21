@extends('layouts.app')


@section('content')
<p> Ici on va afficher la liste des compétences </p>
    <ol>
    @foreach($skills as $skill)
        <li>{{$skill->label}}</li>
    @endforeach
    </ol>
@endsection