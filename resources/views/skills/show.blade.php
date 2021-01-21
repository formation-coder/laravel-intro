@extends('layouts.app')


@section('content')
<p>{{$skill->label}}</p>
<a href="{{route('skills.index')}}">Voir tous les skills</a>

@endsection