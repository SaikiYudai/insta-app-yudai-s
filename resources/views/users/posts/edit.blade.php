@extends('layouts.app')

@section('title', 'Edit Post')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">
                Category <span class="text-muted fw-normal">(up to 3)</span>
            </label>
            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">

                    @if (in_array($category->id, $selected_categories))
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" checked
                            value="{{ $category->id }}" class="form-check-input">
                    @else
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}"
                            class="form-check-input">
                    @endif
                    {{-- in_array(a,b) --}}
                    {{-- a = value --}}
                    {{-- b = array --}}

                    {{-- valA= 2 --}}
                    {{-- valB= 15 --}}
                    {{-- valC= 4 --}}
                    {{-- array = [1,2,3,4,5] --}}
                    {{-- example 1 valA = true --}}
                    {{-- example 2 valB = false --}}
                    {{-- example 3 valC = true --}}


                    <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
            @error('category')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="What's on your mind">{{ $post->description }}</textarea>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <img src="{{ $post->image }}" alt="post{{ $post->id }}" class="img-thumbnail w-100">
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
            <div id="image-info" class="form-text">
                The acceptable formats are jpeg, jpg, png, and gif only. <br> Max file size is 1048kb.
            </div>
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit"class="btn btn-warning px-5">Save</button>
    </form>
@endsection
