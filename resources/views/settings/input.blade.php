<div>
    <label class="font-weight-bolder mdb-color-text mb-0">{{ $label ?? '' }}</label>
    <small class="form-text text-muted mt-0 mb-2">{{ $description ?? '' }}</small>
    @isset($type)
    @component('settings.' . $type, ['name' => $name])@endcomponent
    @else
    <input type="text" name="{{ $name }}" class="form-control {{ invalid_class($name) }}" value="{{ old($name, settings()->get($name)) }}">
    @endisset
    <x-invalid-feedback field="{{ $name }}"></x-invalid-feedback>
</div>
