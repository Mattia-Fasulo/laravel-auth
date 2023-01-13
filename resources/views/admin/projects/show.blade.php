@extends('layouts.admin')

@section('content')



    <div class="mt-3 px-5">
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
        @if ($project->cover_image)
        <div>
            <img width="300" src="{{ asset('storage/' . $project->cover_image) }}">
        </div>
        @endif

        @if ($project->tag && count($projects->tag) > 0)

        @endif

        <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-light border-dark">Edit</a>
    </div>

@endsection
