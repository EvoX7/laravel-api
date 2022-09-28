@extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card text-center w-75">
            <div class="card-header">
                <h1>Category</h1>
                <h3 class="card-title font-weight-bold w-100" style="background-color:{{ $category->color }}">
                    {{ $category->name }}</h3>
                @forelse ($category->posts as $post)
            </div>
            <div class="card">
                <p> <a href="{{ route('admin.posts.show', $post->id) }}">
                        {{ $post->title }}</a></p>
            @empty
                <p>No category available</p>
                @endforelse

            </div>
        </div>
    </div>
    @endsection
