@props([
    'name',
    'id' => null,
    'label' => null,
    'checked' => null,
    'nullable' => false,
    'hide_label'
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

<div class="col-9">
    <div class="form-check form-switch form-check-custom form-check-solid">
        <input type="hidden" name="{{ $name }}" value="0" />
        <input class="form-check-input @error($name) is-invalid @enderror"
            type="checkbox" 
            value="1" 
            name="{{ $name }}" 
            id="{{ $id }}" 
            @checked(old($name, $checked))
            {{ $attributes }}  />
        @if (!$attributes->has('hide-label'))
        <label class="form-check-label" for="{{ $id }}">
            {{ __($label) }}
        </label>
        @endif
    </div>
</div>

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Input-->