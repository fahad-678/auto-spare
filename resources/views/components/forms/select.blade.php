@props([
    'name',
    'label' => null,
    'id' => null,
    'placeholder' => null,
    'nullable' => false,
    'value' => null,
    'autocompleteApi' => null
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', str_replace('_id', '', $name))));
    $placeholder = $placeholder ?? _('Select ') . $label;
    $required = !$nullable;
@endphp

<div class="col-md-3 d-flex align-items-center">
    <x-forms.input-label :name :text="$label" :required="$required" :for="$id"/>
</div>

<div class="col-md-9">
    <select class="form-select @error($name) is-invalid @enderror"
        data-control="select2" name="{{ $name }}"
        @if ($value) data-autocomplete-value="{{ $autocompleteApi ? json_encode($value) : $value }}" @endif
        @if ($autocompleteApi) data-autocomplete-api="{{ $autocompleteApi }}" @endif
        data-placeholder="{{ _($placeholder) }}" id="{{ $id }}">
        {{ $slot }}
    </select>


    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <!--end::Input-->
</div>