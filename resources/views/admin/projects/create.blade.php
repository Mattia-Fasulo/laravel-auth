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
    <div class="container mt-3 px-5">
        <h1>Create Project</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="POST" class="p-4">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <button type="reset" class="btn btn-light border-dark">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection



