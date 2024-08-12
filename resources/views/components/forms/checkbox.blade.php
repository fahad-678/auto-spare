@props([
    'name',
    'label' => null,
    'checked' => null,
    'id' => null,
    'nullable' => false,
    'hide_label'
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

<div class="form-check">
    <input type="hidden" name="{{ $name }}" value="0" />
    <input 
        type="checkbox" 
        class="form-check-input @error($name) is-invalid @enderror" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        @checked(old($name, $checked))
        value="1" 
        {{ $attributes }}
        />
        @if (!$attributes->has('hide-label'))
        <label class="form-check-label" for="{{ $id }}">
           {{ _($label) }}
        </label>
        @endif
    
</div

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Input-->