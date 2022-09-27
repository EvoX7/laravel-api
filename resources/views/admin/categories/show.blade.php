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

        @extends('layouts.app')


@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card text-center pb-5">
            <div class="card-header py-5">
                <h3 class="card-title font-weight-bold">{{ $post->title }}</h3>
                <img class="w-50 rounded-4 py-4" src="{{ $post->post_img }}" alt="Image_url">
                <p>Category: <span class="badge badge-pill text-light"
                        @if (isset($post->category)) style="background-color: {{ $post->category->color }} "> {{ $post->category->name }} 
                    @else 
                    style="background-color: grey"
                    Unlisted @endif
                        </span>
                </p>
                <p>tags: 
                    @forelse ($post->tags as $tag)
                    <strong>#{{ $tag->name }} </strong>
                    @empty
                        No tags selected
                    @endforelse

                </p>
            </div>
            <div class="card-body">
                <p class="card-text fst-italic">{{ $post->post_content }}</p>
                <p class="card-text font-weight-bold">Author: {{ $post->user->name }}</p>
                <p class="card-text fst-italic">Posted: {{ $post->post_date }}</p>
            </div>
        </div>
    </div>
@endsection


    </div>
@endsection
