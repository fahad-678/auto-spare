@props([
    'name',
    'label' => null,
    'id' => null,
    'nullable' => false,
    'placeholder' => null,
    'rows' => 5,
    'value' => null,
    'showLabel' => true,
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

@if($showLabel)
    <div class="col-md-3 d-flex align-items-center">
        <x-forms.input-label :name :text="$label" :required="$required" :for="$id" />
    </div>
@endif

<div class="{{ $showLabel ? 'col-md-9' : 'col-md-12'}}">
    <!--begin::Input-->
    <textarea name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
        {{ $attributes->class(['resize-none', 'form-control', 'form-control-solid-dis ' . ($errors->has($name) ? 'is-invalid' : '')]) }}
        @if ($required) required @endif {{ $attributes }} rows="{{ $rows }}">{{ old($name, $value) }}</textarea>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <!--end::Input-->
</div>
