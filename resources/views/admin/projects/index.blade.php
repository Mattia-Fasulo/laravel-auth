@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="m-3">Projects</h1>
        <div class="text-end">
            <a class="btn btn-dark mx-3 mb-3" href="{{ route('admin.projects.create') }}">New Project</a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success my-1 mx-3">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="mx-3">
            <table  class="my-table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td><a href="{{ route('admin.projects.show', $project->slug) }}"
                                    title="View Project">{{ $project->title }}</a></td>
                            <td>{{ Str::limit($project->description, 120) }}</td>
                            <td><a class="link-secondary" href="{{ route('admin.projects.edit', $project->slug) }}"
                                    title="Edit Project"><i class="fa-solid fa-pen"></i></a></td>
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3"
                                        data-item-title="{{ $project->title }}"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('partials.admin.modal-delete')
@endsection
