@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">

                <h1 class="mt-3 mb-5 text-center">List Post</h1>

                @if (session('deleted'))
                    <div class="alert alert-danger">
                        "{{ session('deleted') }}" - has been removed successfully.
                    </div>
                @elseif (session('created'))
                    <div class="alert alert-success">
                        "{{ session('created') }}" - has been created successfully.
                    </div>
                @endif

                <a class="navbar-brand btn btn-success float-right mb-2" href="{{ route('admin.posts.create') }}">
                    New Post</a>
                <table class="table table-info table-striped">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Date</th>


                    </thead>
                    <tbody>

                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td class="font-weight-bold">{{ $post->user->name }}</td>
                                <td class="font-weight-bold"><a class="font-weight-bold"
                                        href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                                </td>
                                <td> <span class="badge badge-pill text-light w-75"
                                        @if (isset($post->category)) style="background-color: {{ $post->category->color }}"> {{ $post->category->name }} 
                                        @else 
                                        style="background-color: grey">
                                        Unlisted 
                                        @endif
                                        </span>
                                </td>
                                <td class="text-center">{{ $post->tag_id }}</td>
                                <td>{{ $post->post_date }}</td>
                                <td>
                                    <a class="btn btn-primary font-weight-bold"
                                        href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form class="text-white" action="{{ route('admin.posts.destroy', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h3 class="fs-1 mt-5">No posts available</h3>
                        @endforelse
                    </tbody>
                </table>

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
