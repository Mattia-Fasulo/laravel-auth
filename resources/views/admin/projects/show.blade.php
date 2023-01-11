@extends('layouts.app')

@section('content')



    <div class="container mt-5 px-5">
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
        <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-light border-dark">Edit</a>
    </div>

@endsection
