@extends('layout.master')

@section('content')
<div class="container mt-20 card p-4">
    <h2 class="card-header mb-4">Add New Product</h2>
    <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="row pb-2 ps-2">
                    <x-forms.input-text name="name" label="Product Name" />
                </div>
                <div class="row pb-2 ps-2">
                    <x-forms.textarea name="description" label="Description" rows="3" />
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="price" label="Price"  allow-float/>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="discount" label="Discount" nullable="true" allow-float/>
                </div>

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center">
                        <x-forms.input-label text="Category"/>
                    </div>
                    <div class="col-9">
                        <select class="form-control form-select" id="category_id" name="category_id"></select>
                    </div>
                </div>                             

                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center">
                        <x-forms.input-label text="Brand"/>
                    </div>
                    <div class="col-9">
                        <select class="form-control form-select" id="brand_id" name="brand_id"></select>
                    </div>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.input-numeric name="stock" label="Stock"/>
                </div>

                <div class="row pb-2 ps-2">
                    <x-forms.select name="status" label="Status">
                        <option value="AVAILABLE">Available</option>
                        <option value="UNAVAILABLE">Unavailable</option>
                    </x-forms.select>
                </div>
                <div class="row pb-2 ps-2">
                    <div class="col-3 d-flex align-items-center ">
                        <x-forms.input-label text="Image"/>
                    </div>
                    <div class="col-9">
                        <label for="image" class="btn btn-secondary">
                            <i class="fas fa-camera"></i> Upload Image
                        </label>
                        <input type="file" class="form-control-file d-none" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div id="imagePreview" class="border p-2 mb-2" style="display: none;">
                    <img id="uploadedImage" src="" alt="Uploaded Image" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary m-auto">Add Product</button>
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
    handleSelect2('#category_id', '/api/v1/category', "Category");
    handleSelect2('#brand_id', '/api/v1/brand', 'Brand');
   });
</script>
@endpush