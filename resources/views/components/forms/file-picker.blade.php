@props([
    'name',
    'id',
    'label' => null,
    'nullable',
    'defaultFile' => null,
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $required = !isset($nullable);
@endphp

<!--begin::Image input-->
<x-forms.input-label :text="$label" :for="$name" :required="$required" />

<!--begin::Input-->
<div {{ $attributes->class([ 'position-relative', 'file-picker', 'w-100' ]) }} >

    <div class="d-flex justify-content-center align-items-center file-picker-controls">
        <button class="btn btn-light rounded-circle preview @if(!$defaultFile) d-none @endif" type="button" data-source="{{ $defaultFile }}">
            <i class="fas fa-eye p-0"></i>
        </button>
        <button class="btn btn-light rounded-circle ms-2 upload" type="button">
            <i class="fas fa-upload p-0"></i>
        </button>
        @if (!$required)
            <button class="btn btn-light rounded-circle ms-2 remove @if(!$defaultFile) d-none @endif" type="button">
                <i class="fas fa-trash-alt p-0"></i>
            </button>
        @endif
    </div>

    <object data="{{ $defaultFile ?? '/assets/img/image-placeholder.jpeg' }}" data-default-thumbnail="/assets/img/image-placeholder.jpeg"  class="w-100 h-100 thumbnail">
    </object>

    <input 
        type="file" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        class="form-control form-control-solid-dis @error($name) is-invalid @enderror d-none"
        @if ($required) required @endif
        {{ $attributes }}
        />

    <input type="hidden" name="{{ $name }}_remove" value="0" />
</div>

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Image input-->

