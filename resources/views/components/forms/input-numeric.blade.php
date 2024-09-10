@props([
    'name',
    'label' => null,
    'id' => null,
    'nullable' => false,
    'placeholder' => null,
    'allow_float',
    'allow_negative',
    'hide_label',
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

@if (!$attributes->has('hide-label'))
    <div class="col-md-3 d-flex align-items-center">
        <x-forms.input-label :name :text="$label" :required="$required" :for="$id"/>
    </div>
@endif

<div class="col-md-9">
    <!--begin::Input-->
    <input 
        type="text" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}"
        data-type="numeric"
        data-allow-float="{{ $attributes->has('allow-float') }}"
        data-allow-negative="{{ $attributes->has('allow-negative') }}"
        class="form-control form-control-solid-dis @error($name) is-invalid @enderror"
        @if ($required) required @endif
        @if (old($name)) value="{{ old($name) }}" @endif
        {{ $attributes }} 
        />

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <!--end::Input-->
</div>