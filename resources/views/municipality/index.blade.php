@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $municipality->id ? route('municipality.update', $municipality) : route('municipality.store') }}" method="POST" class="form">
                @csrf
                @isset($municipality->id)
                @method('put')
                @endisset
                <div class="form-group">
                    <label for="input-name">न.पा./गा.वि.स. को नाम</label>
                    <input type="text" id="input-name" name="name" class="form-control" autocomplete="off" value="{{ old('name', $municipality->name) }}">
                </div>
                <div class="form-group">
                    <label for="input-name-en">न.पा./गा.वि.स. को नाम (In English)</label>
                    <input type="text" id="input-name-en" name="name_en" class="form-control" autocomplete="off" value="{{ old('name_en', $municipality->name_en) }}">
                </div>
               
                <div class="form-group">
                    <label for="input-name-en">न.पा./गा.वि.स. को छेत्रफल</label>
                    <input type="text" id="input-name-en" name="area" class="form-control" autocomplete="off" value="{{ old('name_en', $municipality->area) }}">
                </div>
                <div class="form-group">
                    <label for="input-name-en">न.पा./गा.वि.स. को वार्ड सांख्य</label>
                    <input type="number" id="input-name-en" name="number" class="form-control" autocomplete="off" value="{{ old('name_en', $municipality->number) }}">
                </div>
                <div class="form-group">
                    <label for="select-province-id">प्रदेशको नाम</label>
                    <select id="select-province-id" class="custom-select">
                        @isset($municipality->district->province)
                        <option value="{{ $municipality->district->province->id }}" selected>{{ $municipality->district->province->name }}</option>
                        @else
                        <option value="">प्रदेश छान्नुहोस्</option>
                        @endisset
                        @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-district-id">जिल्लाको नाम</label>
                    <select name="district_id" id="select-district-id" class="custom-select">
                        @isset($municipality->district)
                        <option value="{{ $municipality->district->id }}" selected>{{ $municipality->district->name }}</option>
                        @else
                        <option value="">जिल्ला छान्नुहोस्</option>
                        @endisset
                        @foreach($provinces as $province)
                        @foreach($province->districts as $district)
                        <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                        @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{ $municipality->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">न.पा./गा.वि.स. हरु</h1>
            <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>न.पा./गा.वि.स.</th>
                        <th>न.पा./गा.वि.स. को छेत्रफल</th>
                        <th>न.पा./गा.वि.स. वार्ड सांख्य</th>
                        <th>जिल्ला</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($municipalities as $municipality)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $municipality->name }}</td>
                        <td>{{ $municipality->area }}</td>
                        <td>{{ $municipality->number }}</td>
                        <td>{{ $municipality->district->name ?? '' }}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('municipality.edit', $municipality) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('municipality.destroy', $municipality) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
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
