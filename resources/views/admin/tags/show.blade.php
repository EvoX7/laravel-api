@extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card text-center w-75">

            <div class="card-header">

                <h1>TAG</h1>
                <h3>#{{ $tag->name }}</h3>
                @forelse ($tag->posts as $post)
            </div>

            <div class="card">
                <p><a href="{{ route('admin.posts.show', $post->id) }}">
                        {{ $post->title }}</a></p>
            @empty
                <p>No tag available</p>
                @endforelse

            </div>
        </div>

    </div>
@endsection
