@extends('layout.master')

@section('content')
    <div class="container mt-20 card p-4 mb-3">
        <div class="row">
            <div class="col-6 card">
                <h2 class="card-header my-4">{{ $category->name }}</h2>
                <div class="row pb-2 ps-2">
                    <strong>Name</strong>
                    <p>{{ $category->name }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Hot Item:</strong>
                    <p>{{ $category->hot_item ? 'Yes' : 'No' }}</p>
                </div>
            </div>
            <div class="col-6 card">
                <div class="p-2 mb-2">
                    <img src="{{ asset('storage/products/' . basename($category->image)) }}" alt="{{ $category->name }}"
                        class="img-fluid">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Category</a>
            @if (Auth::check())
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit Category</a>
            @endif
        </div>
    </div>
@endsection
