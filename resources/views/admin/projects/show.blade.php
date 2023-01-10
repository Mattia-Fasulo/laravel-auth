@extends('layouts.app')

@section('content')

    <div class="container mt-5 px-5">
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
    </div>

@endsection
