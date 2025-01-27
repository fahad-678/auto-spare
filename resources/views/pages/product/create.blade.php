@extends('layout.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-style-old.css') }}">
@endpush

@section('content')
    <div class="container mt-md-20 mt-10 card p-4">
        <h2 class="card-header mb-4">Add New Product</h2>
        <form action="{{ route('products.store') }}" id="productFrom" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row pb-2">
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
                            <label for="image" id="addImage" class="btn btn-secondary">
                                <i class="fas fa-camera"></i> Upload Image
                            </label>
                            <input type="file" class="d-none" id="imageUpload" name="images[]" multiple>
                            <small class="form-text text-muted">Max 5 images
                                allowed.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="swiper mySwiper2" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff">
                        <div class="swiper-wrapper" id="main-slider"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper" id="thumbnail-slider"></div>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        let images = [];
        const maxImages = 5;
        let mainSlider, thumbnailSlider;

        function initializeSwipers() {

            thumbnailSlider = new Swiper('.mySwiper', {
                spaceBetween: 10,
                slidesPerView: 5,
                freeMode: true,
                watchSlidesProgress: true,
            });
            mainSlider = new Swiper('.mySwiper2', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: thumbnailSlider,
                },
            });
        }

        function updateSwipers() {
            mainSlider.update();
            thumbnailSlider.update();
        }

        function addImages(files) {
            const remainingSlots = maxImages - images.length;
            const filesToAdd = Array.from(files).slice(0, remainingSlots);

            filesToAdd.forEach(file => {
                const fileReader = new FileReader();
                fileReader.onload = function(e) {
                    images.push(file);

                    const mainSlide = `<div class="swiper-slide">
                <img class="swiper-main-img" src="${e.target.result}" alt="Product Image">
                <button type="button" class="btn btn-danger btn-sm remove-slide" data-index="${images.length - 1}">Remove</button>
            </div>`;
                    const thumbnailSlide = `<div class="swiper-slide">
                <img class="swiper-thumb-img" src="${e.target.result}" alt="Product Thumbnail">
            </div>`;

                    document.getElementById('main-slider').insertAdjacentHTML('beforeend', mainSlide);
                    document.getElementById('thumbnail-slider').insertAdjacentHTML('beforeend', thumbnailSlide);

                    updateSwipers();
                };
                fileReader.readAsDataURL(file);
            });

            if (filesToAdd.length < files.length) {
                alert(`Only ${filesToAdd.length} images were added. Maximum of 5 images allowed.`);
            }
        }

        function removeImage(index) {
            images.splice(index, 1);

            document.getElementById('main-slider').innerHTML = '';
            document.getElementById('thumbnail-slider').innerHTML = '';

            images.forEach((image, i) => {
                const fileReader = new FileReader();
                fileReader.onload = function(e) {
                    const mainSlide = `<div class="swiper-slide">
                <img class="swiper-main-img" src="${e.target.result}" alt="Product Image">
                <button type="button" class="btn btn-danger btn-sm remove-slide" data-index="${i}">Remove</button>
            </div>`;
                    const thumbnailSlide = `<div class="swiper-slide">
                <img class="swiper-thumb-img" src="${e.target.result}" alt="Product Thumbnail">
            </div>`;

                    document.getElementById('main-slider').insertAdjacentHTML('beforeend', mainSlide);
                    document.getElementById('thumbnail-slider').insertAdjacentHTML('beforeend', thumbnailSlide);

                    updateSwipers();
                };
                fileReader.readAsDataURL(image);
            });
        }


        document.getElementById('addImage').addEventListener('click', () => {
            if (images.length >= maxImages) {
                alert('You can only upload up to 5 images.');
                return;
            }

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.multiple = true;

            fileInput.addEventListener('change', (event) => {
                const files = event.target.files;
                if (files.length > 0) {
                    addImages(files);
                }
            });

            fileInput.click();
        });

        document.getElementById('main-slider').addEventListener('click', (event) => {
            if (event.target.classList.contains('remove-slide')) {
                const index = parseInt(event.target.getAttribute('data-index'));
                removeImage(index);
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            initializeSwipers();
        });
    </script>
    <script>
        function prepareFormData(event) {
            event.preventDefault();

            const form = document.getElementById('productFrom');
            const dataTransfer = new DataTransfer();

            images.forEach(file => {
                dataTransfer.items.add(file);
            });

            let fileInput = form.querySelector('input[name="images[]"]');

            fileInput.files = dataTransfer.files;
            form.submit();
        }

        document.getElementById('productFrom').addEventListener('submit', prepareFormData);
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
