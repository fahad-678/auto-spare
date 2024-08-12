@props([
    'name',
    'label' => null,
    'id' => null,
    'type' => 'text',
    'nullable' => false,
    'placeholder' => null,
    'defaultDate' => null
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

<x-forms.input-label :name :text="$label" :required="$required" :for="$id"/>

<!--begin::Input-->
<input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $id }}" 
    placeholder="{{ $placeholder }}"
    class="form-control form-control-solid-dis @error($name) is-invalid @enderror"
    @if ($required) required @endif
    @if (old($name)) value="{{ old($name) }}" @endif
    data-type="date"
    data-default-date="{{ $defaultDate }}"
    {{ $attributes }} 
    />

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Input-->