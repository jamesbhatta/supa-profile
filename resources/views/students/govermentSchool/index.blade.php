@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">सामूदायिक विद्यालयमा विद्यार्थीको जिल्लागत संख्या विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('goverment-student.store')}}" method="POST" class="form">
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
                    <label for="select-district-id">कक्षा</label>
                    <select name="class"  class="custom-select">
                        <option value="">कक्षा छान्नुहोस्</option>
                        <option value="१–१२ कक्षा" >१–१२ कक्षा</option>
                        <option value="१–५ कक्षा" >१–५ कक्षा</option>
                        <option value="६–८ कक्षा" >६–८ कक्षा</option>
                        <option value="९–१० कक्षा" >९–१० कक्षा</option>
                        <option value="११–१२ कक्षा" >११–१२ कक्षा</option>
                        
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="input-name">छात्र संख्या</label>
                    <input type="text" id="input-name" name="boys_num" class="form-control" autocomplete="off" value="">
                </div>
                <div class="form-group">
                    <label for="input-name">छात्रा संख्या</label>
                    <input type="text" id="input-name" name="girl_num" class="form-control" autocomplete="off" value="">
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
                        <th>कक्षा</th>
                        <th>छात्र संख्या</th>
                        <th>छात्रा संख्या</th>
                        <th>जम्मा</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($govermentstudent as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name}}</td>
                        <td>{{$item->class}}</td>
                        <td>{{$item->boys_num}}</td>
                        <td>{{$item->girl_num}}</td>
                        <td>{{$item->boys_num+$item->girl_num}}</td>
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








