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
        <h1>Edit project: {{ $project->title }}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="p-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $project->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea class="form-control" id="content" name="content">{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        @if ($project->cover_image)
                            <div class="media me-4">
                                <img class="shadow" width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt="{{ $project->title }}">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Replace project image</label>
                            <input type="file" name="cover_image" id="cover_image"
                                class="form-control  @error('cover_image') is-invalid @enderror">
                            @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 w-25">
                        <label for="category_id" class="form-label">Select Category</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 w-25">
                        <label for="tags" class="form-label">Tags</label>
                        <select multiple class="form-select" name="tags[]" id="tags">
                            <option value="">Seleziona tag</option>
                            @forelse ($tags as $tag)
                            @if($errors->any())
                            <option value="{{$tag->id}}" {{in_array($tag->id , old('tags[]')) ? 'selected': ''}}>{{$tag->name}}</option>
                            @else
                            <option value="{{$tag->id}}" {{$project->tags->contains($tag->id) ? 'selected': ''}}>{{$tag->name}}</option>
                            @endif
                            @empty
                                <option value="">No tag</option>
                            @endforelse

                        </select>

                    <button type="submit" class="btn btn-dark mt-3">Submit</button>
                    <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
      bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
