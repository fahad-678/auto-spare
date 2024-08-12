@props([
    'text',
    'required' => true,
    'class' => null
])

<label class="fs-6 fw-bold form-label mb-2 {{ $class }}" {{ $attributes }}>
    <span class="@if($required) required @endif">{{ __($text) }}</span>
</label>