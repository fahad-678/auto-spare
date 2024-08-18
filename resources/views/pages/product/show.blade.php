@extends('layout.master')

@section('content')
    <div class="container mt-20 card p-4 mb-3">
        <div class="row">
            <div class="col-6 card">
                <h2 class="card-header my-4">{{ $product->name }}</h2>
                <div class="row pb-2 ps-2">
                    <strong>Description:</strong>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Price:</strong>
                    <p>
                        @if ($product->price > 0)
                            ${{ number_format($product->price, 2) }}
                        @else
                            N/A
                        @endif
                    </p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Discount:</strong>
                    <p>{{ $product->discount ? $product->discount . '%' : 'No Discount' }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Category:</strong>
                    <p>{{ $product->category?->name }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Brand:</strong>
                    <p>{{ $product->brand?->name }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Stock:</strong>
                    <p>{{ $product->stock }}</p>
                </div>
                <div class="row pb-2 ps-2">
                    <strong>Status:</strong>
                    <p>{{ $product->status }}</p>
                </div>
            </div>
            <div class="col-6 card">
                <div class="p-2 mb-2">
                    <img src="{{ asset('storage/products/' . basename($product->image)) }}" alt="{{ $product->name }}"
                        class="img-fluid">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            @if (Auth::check())
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
            @endif
        </div>
    </div>
@endsection
