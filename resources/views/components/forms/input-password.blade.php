@props([
    'name',
    'label' => null,
    'id' => null,
    'nullable' => false,
    'placeholder' => null,
])

@php
    $id = $id ?? $name;
    $label = $label ?? ucwords(strtolower(str_replace('_', ' ', $name)));
    $placeholder = $placeholder ?? _('Enter ') . $label;
    $required = !$nullable;
@endphp

<x-forms.input-label :name :text="$label" :required="$required" :for="$id"/>

<!--begin::Input wrapper-->
<div class="position-relative mb-3" data-kt-password-meter="false">
    <input class="form-control form-control-lg form-control-solid"
        type="password" placeholder="{{ $placeholder }}" id="{{ $id }}" name="{{ $name }}" autocomplete="off" />

    <!--begin::Visibility toggle-->
    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
        data-kt-password-meter-control="visibility">
            <i class="ki-duotone ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
            <i class="ki-duotone ki-eye d-none fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    </span>
    <!--end::Visibility toggle-->
</div>
<!--end::Input wrapper-->

@error($name)
    <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
<!--end::Input-->