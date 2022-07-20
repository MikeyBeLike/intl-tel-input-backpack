<!-- intl-tel-input -->

@php
    $defaultOptions = ['initialCountry' => config('mikeybelike.intl-tel-input-backpack.initialCountry')];
    $options = array_merge($defaultOptions, ($field['options'] ?? []));
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    <input
        type="tel"
        name="{{ $field['name'] }}_input"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        data-init-function="bpFieldInitIntlTelInputElement"
        @include('crud::fields.inc.attributes')
        data-options='@json($options)'
    >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/css/intlTelInput.min.css">
        <style>
            .iti {
                display: block;
            }
        </style>
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/intlTelInput.min.js"></script>
        <script>
            function bpFieldInitIntlTelInputElement(input) {
                const inputEle = input[0]
                const options = JSON.parse(inputEle.dataset.options)
                window.intlTelInput(inputEle, {
                  utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@17/build/js/utils.min.js',
                  ...options,
                  hiddenInput: @json($field['name']),
                });
            }
        </script>
    @endpush
@endif
