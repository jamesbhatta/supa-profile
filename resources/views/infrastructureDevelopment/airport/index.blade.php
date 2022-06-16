@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="card-body">
                <form action="{{ $airport->id ? route('airport.update', $airport) : route('airport.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($airport->id)
                        @method('put')
                    @endisset
                    <div class="form-group">
                        <label for="input-name">विमानस्थल</label>
                        <input type="text" id="input-name" name="airport" class="form-control" autocomplete="off"
                            value="{{ old('airport', $airport->airport) }}">
                    </div>
                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district" id="select-district-id" class="custom-select">
                            {{-- @isset($municipality->district)
                        <option value="{{ $municipality->district->id }}" selected>{{ $municipality->district->name }}</option>
                        @else --}}
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @isset($airport->id)
                                <option value="{{ $airport->district }}" selected>{{ $airport->district }}</option>
                            @endisset
                            {{-- @endisset --}}
                            @foreach ($provinces as $province)
                                @foreach ($province->districts as $district)
                                    <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                        {{ $district->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-name-en"> पालिका</label>
                        <select name="minicipality" class="form-control" id="">
                            <option value="">पालिका छान्नुहोस्</option>
                            @isset($airport->id)
                                <option value="{{ $airport->minicipality}}" selected>{{ $airport->minicipality}}</option>
                            @endisset
                            @foreach ($municipalities as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-name-en"> स्थान</label>
                        <input type="text" id="input-name-en" name="place" class="form-control" autocomplete="off"
                            value="{{ old('place', $airport->place) }}">
                    </div>
                    <div class="form-group">
                        <label for="input-name-en"> अवस्था</label>
                        <input type="text" id="input-name-en" name="status" class="form-control" autocomplete="off"
                            value="{{ old('status', $airport->status) }}">
                    </div>



                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $airport->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">न.पा./गा.वि.स. हरु</h1>
                {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>विमानस्थल</th>
                            <th>प्रदेशको नाम</th>
                            <th>जिल्लाको नाम</th>
                            <th>पालिका</th>
                            <th>स्थान</th>
                            <th>अवस्था</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($airports as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->airport }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->minicipality }}</td>
                                <td>{{ $item->place }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('airport.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('airport.destroy', $item) }}" method="post"
                                        onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                        class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center font-italic">
                                <td colspan="10">* * डाटाबेसमा कुनै डाटा छैन * *</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {

            $('#select-province-id').change(function() {
                filterOptions($(this).val(), '#select-district-id option', 'province-id');
            });

        });
    </script>
@endpush
