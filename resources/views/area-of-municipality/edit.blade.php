@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container-fluid">
    <div class="card z-depth-0">
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <div class="col-12">
                        <label class="col-12 text-center font-weight-bold h4 my-5">पालिकहरुको क्षेत्रफल र वडा संख्या विवरण अपडेट</label>
                        <hr>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('area.update',$municipalities_area[0]['id'])}}" method="POST" class="form">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district_name" id="select-district-id" class="custom-select">
                                @isset($municipalities_area)
                                <option value="{{ $municipalities_area[0]['district_name']}}" selected>{{ $municipalities_area[0]['district_name']}}</option>
                                @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                @foreach($province->districts as $district)
                                <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select-province-id">गा.पा./गा.वि.स. को नाम</label>
                            <select id="select-province-id" class="custom-select" name="municipalitiy_id">
                                @isset($municipalities_area)

                                <option value="{{ $municipalities_area[0]['municipalities']['id']}}" selected>{{ $municipalities_area[0]['municipalities']['name']}}</option>
                                @else
                                <option value="">गा.पा./गा.वि.स. छान्नुहोस्</option>
                                @endisset
                                @foreach($municipalities as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="input-name-en">न.पा./गा.वि.स. को छेत्रफल</label>
                            <input type="text" id="input-name-en" name="muncipality_area" class="form-control" autocomplete="off" value="{{$municipalities_area[0]['muncipality_area']}}">
                        </div>
                        <div class="form-group">
                            <label for="input-name-en">न.पा./गा.वि.स. को वार्ड सांख्य</label>
                            <input type="text" id="input-name-en" name="ward_count" class="form-control" autocomplete="off" value="{{$municipalities_area[0]['ward_count']}}">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
    </div>

    <div class="my-4"></div>

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
