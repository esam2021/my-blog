@extends('layouts.app')
@section('title', 'All My Posts')
@section('content')
    <div class="container">
        <table class="table table-dark table-striped">
            <tr>
                <td> # </td>
                <td> photo </td>
                <td> title </td>
                <td> content </td>
                <td> Created By </td>
                <td> Controlls </td>
            </tr>
            @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                    <tr>
                        <td> {{ $post->id }} </td>
                        <td><img src="{{ $post->photo }}" alt="" width="100"></td>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->content }} </td>
                        <td> {{ ucwords($post->user->name) }} </td>
                        <td class="d-flex">
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-success rounded mx-2"> Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger rounded" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="alert alert-danger"> No Info </div>
            @endif
        </table>

    </div>
@endsection
