@extends('layout.master')

@section('content')
    <div class="container mt-md-20 mt-10 card p-4">
        <h2 class="card-header mb-4">Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row pb-2 ps-2">
                        <x-forms.input-text name="name" label="Product Name" />
                    </div>
                    <div class="row pb-2 ps-2">
                        <x-forms.input-text name="part_number" label="Part Number" nullable="true" />
                    </div>

                    <div class="row pb-2 ps-2">
                        <x-forms.input-text name="oem" label="OEM" nullable="true" />
                    </div>
                    <div class="row pb-2 ps-2">
                        <x-forms.textarea name="description" label="Description" nullable="true" rows="3" />
                    </div>
                    <div class="row pb-2 ps-2">
                        <x-forms.input-numeric name="price" label="Price" nullable="true" allow-float />
                    </div>
                    <div class="row pb-2 ps-2">
                        <x-forms.input-numeric name="discount" label="Discount" nullable="true" allow-float />
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-md-3 d-flex align-items-center">
                            <x-forms.input-label text="Category" required="" />
                        </div>
                        <div class="col-md-9">
                            <select class="form-control form-select" id="category_id" name="category_id"></select>
                        </div>
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-md-3 d-flex align-items-center">
                            <x-forms.input-label text="Subcategory" required="" />
                        </div>
                        <div class="col-md-9">
                            <select class="form-control form-select" id="sub_category_id" name="sub_category_id"></select>
                        </div>
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-md-3 d-flex align-items-center">
                            <x-forms.input-label text="Brand" required="" />
                        </div>
                        <div class="col-md-9">
                            <select class="form-control form-select" id="brand_id" name="brand_id"></select>
                        </div>
                    </div>
                    <div class="row pb-2 ps-2">
                        <x-forms.input-numeric name="stock" label="Stock" nullable="true" />
                    </div>

                    <div class="row pb-2 ps-2">
                        <x-forms.select name="status" label="Status" nullable="true">
                            <option value="AVAILABLE">Available</option>
                            <option value="UNAVAILABLE">Unavailable</option>
                        </x-forms.select>
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-3 d-flex align-items-center">
                            <x-forms.input-label text="Image" required="" />
                        </div>
                        <div class="col-md-9">
                            <label for="image" class="btn btn-secondary">
                                <i class="fas fa-camera"></i> Upload Image
                            </label>
                            <input type="file" class="form-control-file d-none" id="image" name="image"
                                accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-1 order-lg-2" id="imagePreviewSection">
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
            handleSelect2('#category_id', "{{ route('category.index') }}", "Category", null, false);
            handleSelect2('#brand_id', "{{ route('brand.index') }}", 'Brand');

            var $categorySelect = $('select[name="category_id"]');
            var $subCategorySelect = $('select[name="sub_category_id"]');
            var subCategoryUrl = "{{ route('sub-category.index') }}";

            populateSubCategory($categorySelect, $subCategorySelect, subCategoryUrl);

            $('#sub_category_id').select2();
        });
    </script>
@endpush
