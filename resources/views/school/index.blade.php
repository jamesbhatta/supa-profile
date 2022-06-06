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
            <form action="{{route('school.store')}}" method="POST" class="form">
                @csrf
                @isset($municipality->id)
                @method('put')
                @endisset
               
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
                    <label for="select-district-id">विद्यालय प्राकार</label>
                    <select name="school_type"  class="custom-select">
                        <option value="">विद्यालय प्राकार छान्नुहोस्</option>
                        <option value="सामुदाययक विद्यालय" >सामुदाययक विद्यालय</option>
                        <option value="संस्थागत विद्यालय" >संस्थागत विद्यालय</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-district-id">विद्यालय तह</label>
                    <select name="school_level"  class="custom-select">
                        <option value="">विद्यालय तह छान्नुहोस्</option>
                        <option value="आधारभूत(1-5)" >आधारभूत(1-5)</option>
                        <option value="आधारभूत(1-8)" >आधारभूत(1-8)</option>
                        <option value="माध्यमिक (1-10)">माध्यमिक (1-10)</option>
                        <option value="माध्यमिक (1-12)">माध्यमिक (1-12)</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">विद्यालय संख्या</label>
                    <input type="text" id="input-name" name="school_number" class="form-control" autocomplete="off" value="">
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
            <h1 class="h3-responsive d-inline-block">न.पा./गा.वि.स. हरु</h1>
            {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>जिल्ला</th>
                        <th>विद्यालय प्रकार </th>
                        <th>विद्यालय तह</th>
                        <th>विद्यालय संख्या</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schools as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name}}</td>
                        <td>{{$item->school_type}}</td>
                        <td>{{$item->school_level}}</td>
                        <td>{{$item->school_number}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('school.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('school.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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








