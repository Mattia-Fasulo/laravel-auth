@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <ul class="mt-3">
        @foreach ($projects as $project)
            <li class="list-group-item mb-2"><a class="btn btn-dark text-white btn-sm" href="{{route('admin.projects.show', $project->slug)}}" title="View Post">{{$project->title}}</a></li>

        @endforeach
    </ul>
</div>

@endsection
