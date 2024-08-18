@extends('layout.master')

@section('content')
<div class="container mt-20 card p-4">
    <h2 class="card-header mb-4">Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @php
        //  dd($product->description);   
        @endphp
        <div class="row">
            <div class="col-6">
                <div class="row pb-2 ps-2">
                    <x-forms.input-text name="name" label="Product Name" :value="$product->name" />
                </div>
                <div class="row pb-2 ps-2">
                    <x-forms.textarea name="description" label="Description" rows="3" :value="$product->description" nullable="true" />           
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="price" label="Price" :value="$product->price" allow-float nullable="true"/>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="discount" label="Discount" :value="$product->discount" nullable="true" allow-float/>
                </div>

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center">
                        <x-forms.input-label text="Category" required=""/>
                    </div>
                    <div class="col-9">
                        <select class="form-control form-select" id="category_id" name="category_id">
                            <!-- Options will be populated by Select2 -->
                        </select>
                    </div>
                </div>                             

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center">
                        <x-forms.input-label text="Brand" required=""/>
                    </div>
                    <div class="col-9">
                        <select class="form-control form-select" id="brand_id" name="brand_id">
                            <!-- Options will be populated by Select2 -->
                        </select>
                    </div>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="stock" label="Stock" :value="$product->stock" nullable="true"/>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.select name="status" label="Status">
                        <option value="AVAILABLE" {{ $product->status == 'AVAILABLE' ? 'selected' : '' }}>Available</option>
                        <option value="UNAVAILABLE" {{ $product->status == 'UNAVAILABLE' ? 'selected' : '' }}>Unavailable</option>
                    </x-forms.select>
                </div>

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center">
                        <x-forms.input-label text="Hot Item" required=""/>
                    </div>
                    <x-forms.switch name="hot_item" label="hot_item" hide-label :checked="$product->hot_item"/>
                </div>

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center ">
                        <x-forms.input-label text="Image" required=""/>
                    </div>
                    <div class="col-9">
                        <label for="image" class="btn btn-secondary">
                            <i class="fas fa-camera"></i> Upload New Image
                        </label>
                        <input type="file" class="form-control-file d-none" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div id="imagePreview" class="border p-2 mb-2" style="display: {{ $product->image ? 'block' : 'none' }};">
                    <img id="uploadedImage" src="{{ asset('storage/products/' . basename($product->image)) }}" alt="Uploaded Image" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary m-auto">Update Product</button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const image = document.getElementById('image').files[0];
        if (image) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('uploadedImage').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(image);
        }
    }
</script>
<script>
   $(document).ready(function() {
    handleSelect2('#category_id', '/api/v1/category', "Category", {{ $product->category_id }});
    handleSelect2('#brand_id', '/api/v1/brand', 'Brand', {{ $product->brand_id }});
   });
</script>
@endpush
