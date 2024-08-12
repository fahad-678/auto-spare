@props([
    'name',
    'id',
    'label' => null,
    'accept' => 'image/jpg,image/jpeg,image/png',
    'nullable' => false,
    'defaultImage' => null,
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $required = !$nullable;
@endphp

<!--begin::Image input-->
<x-forms.input-label :text="$label" :for="$name" :required="$required" />

 <div>
    <div {{ $attributes->class([ 'image-input', 'image-input-empty', 'bg-gray-200' ]) }} data-kt-image-input="true"
        style="background-repeat: no-repeat; background-position: center; background-size: contain; background-image: url({{ $defaultImage ?? '/assets/img/image-placeholder.jpeg' }})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-100 h-100"></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit">
            <i class="bi bi-pencil-fill fs-7"></i>

            <!--begin::Inputs-->
            <input 
                type="file" 
                name="{{ $name }}"
                id="{{ $id }}"
                accept="{{ $accept }}" 
                @if($defaultImage) value={{ $defaultImage }} @endif 
                {{ $attributes}} />

            <input type="hidden" name="{{ $name }}_remove" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove">
            <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove">
            <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove button-->
    </div>
</div>

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Image input-->
