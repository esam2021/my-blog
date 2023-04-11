@extends('layouts.app')
@section('title', 'Edit Post' . $post->title)

@section('content')
    <div class="container">
        <h2 class="text-center"> Edit Post ( <span class="text-danger"> {{ $post->slug }} </span> ) </h2>
        <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label"> Title </label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    placeholder="Enter Your Name" value="{{ $post->title }}">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content" class="form-label"> Content </label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30"
                    rows="10" placeholder="Entet Your Content"> {{ $post->content }}</textarea>
                @error('content')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo" class="form-label"> Photo </label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                    id="photo" class="photo" value="{{ $post->photo }}">
                @error('photo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary rounded" value="Update Post">
        </form>

    </div>
@endsection
