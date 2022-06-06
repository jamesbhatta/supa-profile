@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">बैंक तथा वित्तिय संस्था विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('bank-detail.update',$bank_details[0]->id)}}" method="POST" class="form">
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
                        @isset($bank_details[0]->districts->name)
                        <option value="{{$bank_details[0]->districts->id}}" selected>{{$bank_details[0]->districts->name}}</option>
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
                    <label for="select-district-id">बैंक तथा वित्तिय संस्था प्रकार</label>
                    <select name="bank_type" class="custom-select">
                        @isset($bank_details[0]->bank_type)
                            <option value="{{$bank_details[0]->bank_type}}">{{$bank_details[0]->bank_type}}</option>
                        @else
                            <option value="">बैंक तथा वित्तिय संस्था प्रकार छान्नुहोस्</option>
                        @endisset
                        <option value="बाणिज्य बैंक">बाणिज्य बैंक</option>
                        <option value="विकास बैंक">विकास बैंक</option>
                        <option value="वित्त कम्पनी">वित्त कम्पनी</option>
                        <option value="लघुवित्त संस्था">लघुवित्त संस्था</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था संख्या </label>
                    <input type="text" id="input-name" name="bank_number" class="form-control" autocomplete="off" value="{{$bank_details[0]->bank_number}}">
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
