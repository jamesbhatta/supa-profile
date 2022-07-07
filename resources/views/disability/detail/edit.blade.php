@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">सुदूरपश्चिममा अपांगताको संख्यात्मक विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('disability-detail.update',$disability_details[0]->id)}}" method="POST" class="form">
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
                        @isset($disability_details[0]->districts->name)
                        <option value="{{ $disability_details[0]->districts->id }}" selected>{{ $disability_details[0]->districts->name }}</option>
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
                    <label for="">अपाङ्गता प्रकार</label>
                    <select name="disability_id" class="custom-select">
                        @isset($disability_details[0]->disibilities[0]->disability)
                            <option value="{{$disability_details[0]->disibilities[0]->id}}">{{$disability_details[0]->disibilities[0]->disability}}</option>
                        @else
                            <option value="">अपाङ्गता प्रकार छान्नुहोस्</option>
                        @endisset
                        @foreach ($disability as $item)
                            <option value="{{$item->id}}">{{$item->disability}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">अपाङ्ग पुरुष संख्या </label>
                    <input type="number" id="input-name" name="male_num" class="form-control" autocomplete="off" value="{{ $disability_details[0]->male_num }}">
                </div>

                <div class="form-group">
                    <label for="input-name">अपाङ्ग महिला संख्या </label>
                    <input type="number" id="input-name" name="female_num" class="form-control" autocomplete="off" value="{{ $disability_details[0]->female_num}}">
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
