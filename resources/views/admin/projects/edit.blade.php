@extends('layouts.admin')

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
        <div class="mt-3 mx-4">
            <h1>Edit project: {{$project->title}}</h1>
            <div class="row bg-white">
                <div class="col-12">
                    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" class="p-4" enctype="multipart/form-data">
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
                          <div class="d-flex align-items-center">
                            @if ($project->cover_image)
                            <div class="media me-4">
                                <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
                            </div>
                            @endif

                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Replace project image</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                                @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                          <button type="submit" class="btn btn-success mt-3">Submit</button>
                          <button type="reset" class="btn btn-primary mt-3">Reset</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
