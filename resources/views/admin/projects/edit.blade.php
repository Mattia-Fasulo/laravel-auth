@extends('layouts.app')

@section('content')
 {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
        <div class="container px-5 mt-3">
            <h1>Edit project: {{$project->title}}</h1>
            <div class="row bg-white">
                <div class="col-12">
                    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" class="p-4">
                        @csrf
                        @method('PUT')
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="content" class="form-label">Description</label>
                            <textarea class="form-control" id="content" name="content">{{old('description', $project->description)}}</textarea>
                          </div>
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
