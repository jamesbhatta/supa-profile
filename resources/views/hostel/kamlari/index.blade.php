@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">मुक्त कमलरी छात्रावास</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$kamlari->id ? route('kamlari-hostel.update',$kamlari->id) : route('kamlari-hostel.store')}}" method="POST" class="form">
                @csrf
               @if ($kamlari->id)
                   @method('PUT')
               @endif
                <div class="form-group">
                    <label for="select-province-id">प्रदेशको नाम</label>
                    <select id="select-province-id" class="custom-select">
                        
                        <option value="">प्रदेश छान्नुहोस्</option>
                        @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-district-id">जिल्लाको नाम</label>
                    <select name="district_id" id="select-district-id" class="custom-select">
                        @isset($kamlari->districts->name)
                            <option value="{{$kamlari->districts->id}}">{{$kamlari->districts->name}}</option>
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
                    <label>न.पा./गा.वि.स.</label>
                    <select name="municipality_id" id="select_municipality_id" class="custom-select">
                        @isset($kamlari->municipalities->name)
                            <option value="{{$kamlari->municipalities->id}}">{{$kamlari->municipalities->name}}</option>
                        @else
                            <option value="">न.पा./गा.वि.स. छान्नुहोस्</option>
                        @endisset
                        
                        @foreach ($municipalities as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">वडाको नाम</label>
                    <select name="ward_id" id="select_municipality_id" class="custom-select">
                        @isset($kamlari->wards->name)
                            <option value="{{$kamlari->wards->id}}">{{$kamlari->wards->name}}</option>
                        @else
                            <option value="">वडाको नाम छान्नुहोस्</option>
                        @endisset
                        
                        @foreach ($wards as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">विद्यालयको नाम</label>
                    <input type="text" id="input-name" name="school_name" class="form-control" autocomplete="off" value="{{old('school_name',$kamlari->school_name)}}">
                </div>
               
                <div class="form-group">
                    <label for="input-name">विद्यार्थी संख्या</label>
                    <input type="text" id="input-name" name="student_num" class="form-control" autocomplete="off" value="{{old('student_num',$kamlari->student_num)}}">
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-success z-depth-0">{{$kamlari->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}} </button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">मुक्त कमलरी छात्रावास विवरणहरु</h1>
            {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>जिल्ला</th>
                        <th>न.पा./गा.वि.स.</th>
                        <th>वडाको नाम</th>
                        <th>विद्यालय</th>
                        <th>विद्यार्थी संख्या</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamlarihostel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name }}</td>
                        <td>{{ $item->municipalities->name}}</td>
                        <td>{{ $item->wards->name}}</td>
                        <td>{{ $item->school_name }}</td>
                       
                        <td>{{$item->student_num}}</td>
                        <td>

                            <a class="action-btn text-primary" href="{{ route('kamlari-hostel.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('kamlari-hostel.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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

        $('#select-district-id').change(function(){
            filterOptions($(this).val(),'#select-municipality-id option', 'fhostels-districts-id')
        })
    });

</script>

@endpush
