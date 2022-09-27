@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">

                <h1 class="mt-3 mb-5 text-center">Tags List</h1>

                @if (session('deleted'))
                <div class="alert alert-danger">
                    "{{ session('deleted') }}" - has been removed successfully.
                </div>
            @elseif (session('created'))
                <div class="alert alert-success">
                    "{{ session('created') }}" - has been created successfully.
                </div>
            @elseif (session('updated'))
                <div class="alert alert-warning">
                    "{{ session('updated') }}" - has been updated successfully.
                </div>
            @endif

                <a class="navbar-brand btn btn-success float-right mb-2" href="{{ route('admin.tags.create') }}">
                    New tag</a>
                <table class="table table-info table-striped">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>

                    </thead>
                    <tbody>

                        @forelse ($tags as $tag)
                            <tr>
                                <td class="fw-bold">{{ $tag->id }}</td>
                                <td class="font-weight-bold">#{{ $tag->name }}</td>
                                <td>
                                    <a class="btn btn-info font-weight-bold"
                                        href="{{ route('admin.tags.show', $tag->id) }}">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary font-weight-bold"
                                        href="{{ route('admin.tags.edit', $tag->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form class="text-white" action="{{ route('admin.tags.destroy', $tag->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h3 class="fs-1 mt-5">No tags available</h3>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
