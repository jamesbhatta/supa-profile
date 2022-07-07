@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">बैंक तथा वित्तिय संस्थाहरुका धेरै भएका प्रमुख स्थानीय</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('local-bank.store')}}" method="POST" class="form">
                @csrf
                
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
                    <label for="select-district-id">न.पा./गा.वि.स. को नाम</label>
                    <select name="municipalities_id" id="select-municipality-id" class="custom-select">
                        <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                        @foreach ($municipalities as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                   
                    </select>
                </div>

                <div class="form-group">
                    <label for="select-district-id">बैंक तथा वित्तिय संस्था</label>
                    <select name="banks_id" id="select-bank-id" class="custom-select">
                        <option value="">बैंक तथा वित्तिय संस्था छान्नुहोस्</option>
                        @foreach ($banks as $item)
                            <option value="{{$item->id}}">{{$item->bank}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था संख्या</label>
                    <input type="number" id="input-name" name="bank_number" class="form-control" autocomplete="off" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">सेभ गर्नुहोस्</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">बैंक तथा वित्तिय संस्थाहरुका धेरै भएका प्रमुख स्थानीय विवरण हरु</h1>
            <small>(हाल {{ count($local_banks)  }}  विवरण {{ count($local_banks) > 1 ? 'हरु छन्' : 'छ' }} )</small>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>जिल्ला</th>
                        <th>न.पा./गा.वि.स.</th>
                        <th>बैंक तथा वित्तिय संस्था</th>
                        <th>बैंक तथा वित्तिय संस्था</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($local_banks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name }}</td>
                        <td>{{ $item->municipality->name }}</td>
                        <td>{{ $item->banks->bank }}</td>
                        <td>{{ $item->bank_number}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('local-bank.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('local-bank.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
