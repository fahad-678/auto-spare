@props([
    'name',
    'label' => null,
    'id' => null,
    'type' => 'text',
    'nullable' => false,
    'placeholder' => null,
    'class' => null,
    'labelClass' => null,
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

<div class="col-md-3 d-flex align-items-center">
    <x-forms.input-label :name :text="$label" :required="$required" :class="$labelClass" :for="$id"/>
</div>
<!--begin::Input-->
<div class="col-md-9">
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}"
        class="form-control form-control-solid-dis {{ $class }} @error($name) is-invalid @enderror"
        @if ($required) required @endif
        @if (old($name)) value="{{ old($name) }}" @endif
        {{ $attributes }} 
        />

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <!--end::Input-->
</div>