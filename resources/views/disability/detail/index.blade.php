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
            <form action="{{route('disability-detail.store')}}" method="POST" class="form">
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
                    <label for="">अपाङ्गता प्रकार</label>
                    <select name="disability_id" class="custom-select">
                        <option value="">अपाङ्गता प्रकार छान्नुहोस्</option>
                        @foreach ($disability as $item)
                            <option value="{{$item->id}}">{{$item->disability}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">अपाङ्ग पुरुष संख्या </label>
                    <input type="text" id="input-name" name="male_num" class="form-control" autocomplete="off" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="input-name">महिला महिला संख्या </label>
                    <input type="text" id="input-name" name="female_num" class="form-control" autocomplete="off" value="{{ old('name') }}">
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
            <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा अपांगताको संख्यात्मक विवरण हरु</h1>
            {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>जिल्ला</th>
                        <th>अपाङ्गता प्रकार</th>
                        <th>अपाङ्ग पुरुष संख्या</th>
                        <th>महिला महिला संख्या</th>
                        <th>जम्मा</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($disability_details as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name }}</td>
                        <td>{{ $item->disibilities[0]->disability }}</td>
                        <td>{{ $item->male_num }}</td>
                        <td>{{ $item->female_num}}</td>
                        <td>{{$item->male_num+$item->female_num}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('disability-detail.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('disability-detail.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
