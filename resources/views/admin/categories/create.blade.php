@extends('layouts.app')


@section('content')
    <div class="container mb-4 mt-2">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="mt-3 mb-3 text-center">Create new category</h1>
                <form class="font-weight-bold" action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    @include('admin.categories.includes.form')
                    <button type="submit" class="btn btn-primary font-weight-bold">Add new</button>
                </form>
            </div>
        </div>
    </div>
@endsection
