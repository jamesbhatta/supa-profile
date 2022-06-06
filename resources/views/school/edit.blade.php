@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">जम्मा विद्यालय वििरण २०७७</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('school.update',$schools[0]->id)}}" method="POST" class="form">
                @csrf

                @method('put')
                
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
                        @isset($schools[0]->districts->name)
                        <option value="{{ $schools[0]->districts->id}}" selected>{{ $schools[0]->districts->name}}</option>
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
                    <label for="select-district-id">विद्यालय प्राकार</label>
                    <select name="school_type"  class="custom-select">
                        @isset($schools[0]->school_type)
                        <option value="{{$schools[0]->school_type}}">{{$schools[0]->school_type}}</option>
                        @else
                            <option value="">विद्यालय प्राकार छान्नुहोस्</option>
                        @endisset
                        
                        <option value="सामुदाययक विद्यालय" >सामुदाययक विद्यालय</option>
                        <option value="संस्थागत विद्यालय" >संस्थागत विद्यालय</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-district-id">विद्यालय तह</label>
                    <select name="school_level"  class="custom-select">
                        @isset($schools[0]->school_level)
                            <option value="{{$schools[0]->school_level}}">{{$schools[0]->school_level}}</option>
                        @else
                            <option value="">विद्यालय तह छान्नुहोस्</option>
                        @endisset
                        
                        <option value="आधारभूत(1-5)" >आधारभूत(1-5)</option>
                        <option value="आधारभूत(1-8)" >आधारभूत(1-8)</option>
                        <option value="माध्यमिक (1-10)">माध्यमिक (1-10)</option>
                        <option value="माध्यमिक (1-12)">माध्यमिक (1-12)</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">विद्यालय संख्या</label>
                    <input type="text" id="input-name" name="school_number" class="form-control" autocomplete="off" value="{{$schools[0]->school_number}}">
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








