@extends('layouts.app')

@section('content')

<div class="container flex-column d-flex justify-content-center align-items-center">
    <a href="{{route('admin.projects.create')}}" class="mt-3 d-block btn btn-dark">Add New Project</a>
    <ul id="my-ul" class="mt-5">
        @foreach ($projects as $project)
            <li class="list-group-item mb-2"><a class="btn btn-dark text-white btn-sm" href="{{route('admin.projects.show', $project->slug)}}" title="View Post">{{$project->title}}</a></li>

        @endforeach
    </ul>
</div>

@endsection
