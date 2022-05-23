@extends('layouts.app')

@push('styles')
<style>
    select {
        height: calc(1.5em + 1rem + 4px) !important;
    }

</style>
@endpush

@section('content')
<div class="container">
    <div class="my-4"></div>

    @include('alerts.success')

    <form action="{{ route('settings.sync') }}" method="POST" class="form font-noto">
        @csrf

        @component('settings.group', [
        'title' => 'Application Settings',
        'description' => 'General application setting'
        ])
        <div>
            @component('settings.input', [
            'label' => 'App Name',
            'name' => 'app_name',
            'description' => 'The application name in Nepali'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'App Name (English)',
            'name' => 'app_name_en',
            'description' => 'The application name in English'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Auto Increment Registration Prefix',
            'name' => 'registration_auto_increment_prefix',
            'description' => 'This value holds the prefix for next registration number. It will auto increment after registration. Its often only required to change this during new fiscal year. Make sure this field is an english integer value.',
            'type' => 'number'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Registration Number Suffix',
            'name' => 'registration_number_suffix',
            'description' => 'The value to appended to the generated registration number. Its often only required to change this during new fiscal year.'
            ])
            @endcomponent
        </div>
        @endcomponent

        {{-- Municipality Letter Section --}}
        @component('settings.group', [
        'title'=> 'Municipality Letter',
        'description' => 'The values to be used in the letters written by municipality'
        ])
        <div>
            @component('settings.input', [
            'label' => 'Municipality Name',
            'name' => 'municipality_name',
            'description' => 'The name of municipality to we written in letter head'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Municipality Tagline',
            'name' => 'municipality_tagline',
            'description' => 'The tagline will be used in letter head below municipality name'
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Address Line One',
            'name' => 'municipality_address_line_one',
            'description' => ''
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Address Line Two',
            'name' => 'municipality_address_line_two',
            'description' => ''
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Municipality Phone',
            'name' => 'municipality_phone',
            'description' => ''
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Municipality E-mail',
            'name' => 'municipality_email',
            'description' => ''
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Municipality Website',
            'name' => 'municipality_website',
            'description' => ''
            ])
            @endcomponent
            <div class="my-3"></div>
            @component('settings.input', [
            'label' => 'Note below certificate',
            'name' => 'registration_certificate_note',
            'description' => '',
            'type' => 'textarea'
            ])
            @endcomponent
        </div>
        @endcomponent

        {{-- Form Defaults Section --}}
        @component('settings.group', [
        'title'=> 'Form Defaults',
        'description' => 'The following vales will be automatically filled in a new form'
        ])
        {{-- State --}}
        <label class="font-weight-bolder">प्रदेश</label>
        <select name="default_province_id" class="custom-select">
            <option value="">OFF</option>
            @foreach ($provinces as $province)
            <option value="{{ $province->id }}" @if($province->id == settings()->get('default_province_id')) selected @endif>
                {{ $province->name }}
            </option>
            @endforeach
        </select>
        <div class="my-3"></div>
        {{-- District --}}
        <div>
            <label class="font-weight-bolder">जिल्ला</label>
            <select name="default_district_id" class="custom-select">
                <option value="">OFF</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" @if($district->id == settings()->get('default_district_id')) selected @endif>
                    {{ $district->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="my-3"></div>
        {{-- Municipality --}}
        <div>
            <label class="font-weight-bolder">न.पा./गा.वि.स.</label>
            <select name="default_municipality_id" class="custom-select">
                <option value="">OFF</option>
                @foreach ($municipalities as $municipality)
                <option value="{{ $municipality->id }}" @if($municipality->id == settings()->get('default_municipality_id')) selected @endif>
                    {{ $municipality->name }}
                </option>
                @endforeach
            </select>
        </div>
        @endcomponent

        @component('settings.group', [
        'title'=> 'Letter Settings',
        'description' => ''
        ])
        @component('settings.input', [
        'label' => 'Font Size in pixels',
        'name' => 'letter_font_size',
        'description' => ''
        ])
        @endcomponent
        <div class="my-3"></div>
        @component('settings.input', [
        'label' => 'Additional Head Scripts',
        'name' => 'letter_head_scripts',
        'description' => '',
        'type' => 'textarea'
        ])
        @endcomponent
        @endcomponent

        <div class="form-group">
            <button type="submit" class="btn btn-indigo font-17px font-noto z-depth-0">Save</button>
        </div>

    </form>
</div>

@endsection
