@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="card-body">
                <form action="{{ $districtNationalCensus->id ? route('district-national-census.update', $districtNationalCensus) : route('district-national-census.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($districtNationalCensus->id)
                        @method('put')
                    @endisset
                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="secctor" id="select-district-id" class="custom-select">
                            {{-- @isset($municipality->district)
                        <option value="{{ $municipality->district->id }}" selected>{{ $municipality->district->name }}</option>
                        @else --}}
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @isset($districtNationalCensus->id)
                                <option value="{{ $districtNationalCensus->secctor }}" selected>{{ $districtNationalCensus->secctor }}</option>
                            @endisset
                            {{-- @endisset --}}
                            @foreach ($provinces as $province)
                                @foreach ($province->districts as $district)
                                    <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                        {{ $district->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="input-name-en"> कुल जनसंख्या</label>
                            <input type="text" id="input-name-en" name="population" class="form-control" autocomplete="off"
                                value="{{ old('population', $districtNationalCensus->population) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name-en"> जनगणना घरसंख्या</label>
                            <input type="text" id="input-name-en" name="house_number" class="form-control" autocomplete="off"
                                value="{{ old('house_number', $districtNationalCensus->house_number) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-name-en"> घरपरिवार संख्या	</label>
                            <input type="text" id="input-name-en" name="family_number" class="form-control" autocomplete="off"
                                value="{{ old('family_number', $districtNationalCensus->family_number) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name-en"> पुरुष</label>
                            <input type="text" id="input-name-en" name="male" class="form-control" autocomplete="off"
                                value="{{ old('male', $districtNationalCensus->male) }}">
                        </div>

                        <div class="form-group col-md-4 ">
                            <label for="input-name-en"> महिला</label>
                            <input type="text" id="input-name-en" name="female" class="form-control" autocomplete="off"
                                value="{{ old('female', $districtNationalCensus->female) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name-en">लैंगिक अनुपात</label>
                            <input type="text" id="input-name-en" name="ratio" class="form-control" autocomplete="off"
                                value="{{ old('ratio', $districtNationalCensus->ratio) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-name-en"> औषत परिवार आकार	</label>
                            <input type="text" id="input-name-en" name="family_size" class="form-control" autocomplete="off"
                                value="{{ old('family_size', $districtNationalCensus->family_size) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name-en"> वार्षिक वृद्धिदर(%)	</label>
                            <input type="text" id="input-name-en" name="increase_rate" class="form-control" autocomplete="off"
                                value="{{ old('increase_rate', $districtNationalCensus->increase_rate) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name-en">जनघनत्व र(प्रतिवग कि.मि.)</label>
                            <input type="text" id="input-name-en" name="density" class="form-control" autocomplete="off"
                                value="{{ old('density', $districtNationalCensus->density) }}">
                        </div>
                    </div>

                   

                    
                  
                   
                  


                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $districtNationalCensus->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">विमानस्थल हरु</h1>
                {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>कुल जनसंख्या</th>
                            <th>जनगणना घरसंख्या</th>
                            <th>घरपरिवार संख्या</th>
                            <th>पुरुष</th>
                            <th>महिला</th>
                            <th>लैंगिक अनुपात</th>
                            <th>औषत परिवार आकार</th>
                            <th>वार्षिक वृद्धिदर(%)</th>
                            <th>जनघनत्व र(प्रतिवग कि.मि.)</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($districtNationalCensuses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->secctor }}</td>
                                <td>{{ $item->population }}</td>
                                <td>{{ $item->house_number }}</td>
                                <td>{{ $item->family_number }}</td>
                                <td>{{ $item->male }}</td>
                                <td>{{ $item->female }}</td>
                                <td>{{ $item->ratio }}</td>
                                <td>{{ $item->family_size }}</td>
                                <td>{{ $item->increase_rate }}</td>
                                <td>{{ $item->density }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('district-national-census.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('district-national-census.destroy', $item) }}" method="post"
                                        onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                        class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i
                                                class="far fa-trash-alt"></i></button>
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
