@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>

    <div class="container">
        <div class="card">
            <div class="card-head">
                <div class="col-12">
                    <label class="col-12 text-center font-weight-bold h4 my-5">पालिकहरुको क्षेत्रफल र वडा संख्या विवरण
                        अपडेट</label>
                    <hr>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ $updateMode ? route('area.update', $municipalityArea->id) : route('area.store') }}"
                    method="POST" class="form">
                    @csrf
                    @if($updateMode)
                    @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district_name" id="select-district-id" class="custom-select">
                            {{-- @isset($municipalityArea)
                                <option value="{{ $municipalityArea->district_name }}" selected>
                                    {{ $municipalityArea->district_name }}</option>
                            @else
                            @endisset --}}
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @foreach ($provinces as $province)
                                @foreach ($province->districts as $district)
                                    <option value="{{ $district->name }}" data-province-id="{{ $province->id }}" @if (old('district_name', $municipalityArea->district_name) == $district->name ) selected @endif>
                                        {{ $district->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-province-id">गा.पा./गा.वि.स. को नाम</label>
                        {{ $municipalityArea->municipalitiy_id }}
                        <select id="select-province-id" class="custom-select" name="municipalitiy_id">
                            {{-- @isset($municipalityArea) --}}
                            {{-- <option value="{{ $municipalityArea->municipalities->id }}" selected>{{ $municipalityArea->municipalities->name }}</option> --}}
                            {{-- @else --}}
                            <option value="">गा.पा./गा.वि.स. छान्नुहोस्</option>
                            {{-- @endisset --}}
                            @foreach ($municipalities as $item)
                                <option value="{{ $item->id }}" @if (old('municipalitiy_id', $municipalityArea->municipalitiy_id) == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="input-name-en">न.पा./गा.वि.स. को छेत्रफल</label>
                        <input type="text" id="input-name-en" name="muncipality_area" class="form-control"
                            autocomplete="off" value="{{ old('muncipality_area', $municipalityArea->muncipality_area) }}">
                    </div>
                    <div class="form-group">
                        <label for="input-name-en">न.पा./गा.वि.स. को वार्ड सांख्य</label>
                        <input type="text" id="input-name-en" name="ward_count" class="form-control" autocomplete="off" value="{{ old('ward_count', $municipalityArea->ward_count) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success z-depth-0">{{ $updateMode ? 'Update' : 'Create' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush
