@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $district->id ? route('district.update', $district) : route('district.store') }}" method="POST" class="form">
                @csrf
                @isset($district->id)
                @method('put')
                @endisset
                <div class="form-group">
                    <label for="input-name">जिल्लाको नाम</label>
                    <input type="text" id="input-name" name="name" class="form-control" autocomplete="off" value="{{ old('name', $district->name) }}">
                </div>
                <div class="form-group">
                    <label for="input-name-en">जिल्लाको नाम (In English)</label>
                    <input type="text" id="input-name-en" name="name_en" class="form-control" autocomplete="off" value="{{ old('name_en', $district->name_en) }}">
                </div>
                <div class="form-group">
                    <label for="select-province-id">प्रदेशको नाम</label>
                    <select name="province_id" id="select-province-id" class="custom-select">
                        @isset($district->province)
                        <option value="{{ $district->province->id }}" selected>{{ $district->province->name }}</option>
                        @else
                        <option value="">प्रदेश छान्नुहोस्</option>
                        @endisset
                        @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{ $district->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">जिल्लाहरु</h1>
            <small>(हाल {{ $districts->count() }} जिल्लाहरु छन्)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>जिल्ला</th>
                        <th>जिल्ला (English)</th>
                        <th>प्रदेश</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($districts as $district)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $district->name }}</td>
                        <td>{{ $district->name_en }}</td>
                        <td>{{ $district->province->name ?? '' }}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('district.edit', $district) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('district.destroy', $district) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
