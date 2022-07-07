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
            <form action="{{route('local-bank.update',$local_banks[0]->id)}}" method="POST" class="form">
                @csrf
                @method('PUT')
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
                        @isset($local_banks[0]->districts->name)
                        <option value="{{$local_banks[0]->districts->id}}" selected>{{$local_banks[0]->districts->name}}</option>
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
                        @isset($local_banks[0]->municipality->name)
                            <option value="{{$local_banks[0]->municipality->id}}" selected>{{$local_banks[0]->municipality->name}}</option>
                        @else
                            <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                        @endisset
                       
                        @foreach ($municipalities as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                   
                    </select>
                </div>

                <div class="form-group">
                    <label for="select-district-id">बैंक तथा वित्तिय संस्था</label>
                    <select name="banks_id" id="select-bank-id" class="custom-select">
                        @isset($local_banks[0]->banks->bank)
                            <option value="{{$local_banks[0]->banks->id}}" selected>{{$local_banks[0]->banks->bank}}</option>
                        @else
                            <option value="">बैंक तथा वित्तिय संस्था छान्नुहोस्</option>
                        @endisset
                        @foreach ($banks as $item)
                            <option value="{{$item->id}}">{{$item->bank}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था संख्या</label>
                    <input type="number" id="input-name" name="bank_number" class="form-control" autocomplete="off" value="{{$local_banks[0]->bank_number}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">Update</button>
                </div>
            </form>
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
