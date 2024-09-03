@extends('layout.master')

@section('content')
    <div class="container mt-20 card p-4">
        <h2 class="card-header mb-4">Add New Category</h2>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="row pb-2 ps-2">
                        <x-forms.input-text name="name" label="Category Name" />
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-3 d-flex align-items-center">
                            <x-forms.input-label text="Hot Item" required=""/>
                        </div>
                        <x-forms.switch name="hot_item" label="hot_item" hide-label />
                    </div>

                    <div class="row pb-2 ps-2">
                        <div class="col-3 d-flex align-items-center">
                            <x-forms.input-label text="Image" required="" />
                        </div>
                        <div class="col-9">
                            <label for="image" class="btn btn-secondary">
                                <i class="fas fa-camera"></i> Upload Image
                            </label>
                            <input type="file" class="form-control-file d-none" id="image" name="image"
                                accept="image/*" onchange="previewImage(event)">
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
                <button type="submit" class="btn btn-primary m-auto">Add Category</button>
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
