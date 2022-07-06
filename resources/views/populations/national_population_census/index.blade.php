@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत जनसंख्या विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसांख्यिक स्थिति</li>
                <li class="breadcrumb-item active" aria-current="page">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत जनसंख्या विवरण</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="card z-depth-0">
            <div class="card-header">
                <div style="overflow: auto;scrollbar-width: none;">
                    <div>
                        <nav class="nav nav-pills" id="pills-tab" role="tablist">
                            <h4>राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत जनसंख्या विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $nationalPopulationCensus->id ? route('national-population-census.update', $nationalPopulationCensus) : route('national-population-census.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($nationalPopulationCensus->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                                @isset($municipality->district->province)
                                    <option value="{{ $municipality->district->province->id }}" selected>
                                        {{ $municipality->district->province->name }}</option>
                                @else
                                    <option value="">प्रदेश छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($nationalPopulationCensus->id)
                                    <option value="{{ $nationalPopulationCensus->district }}" selected>
                                        {{ $nationalPopulationCensus->district }}</option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">कुल जनसंख्या</label>
                            <input type="number" name="population" class="form-control"
                                value="{{ old('population', $nationalPopulationCensus->population) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनगणना घरसंख्या</label>
                            <input type="number" name="census_house_number" class="form-control"
                                value="{{ old('census_house_number', $nationalPopulationCensus->census_house_number) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">घरपरिवार संख्या</label>
                            <input type="number" name="house_number" class="form-control"
                                value="{{ old('house_number', $nationalPopulationCensus->house_number) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">पुरुष</label>
                            <input type="number" name="male" class="form-control"
                                value="{{ old('male', $nationalPopulationCensus->male) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">महिला</label>
                            <input type="number" name="female" class="form-control"
                                value="{{ old('female', $nationalPopulationCensus->female) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">लैंगिक अनुपात</label>
                            <input type="number" name="ratio" class="form-control"
                                value="{{ old('ratio', $nationalPopulationCensus->ratio) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">औषत परिवार आकार</label>
                            <input type="number" name="avg_family_size" class="form-control"
                                value="{{ old('avg_family_size', $nationalPopulationCensus->avg_family_size) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">वार्षिक वृद्धिदर(%)</label>
                            <input type="number" name="increase_rate" class="form-control"
                                value="{{ old('increase_rate', $nationalPopulationCensus->increase_rate) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनघनत्व र(प्रतिवग कि.मि.)</label>
                            <input type="number" name="dencity" class="form-control"
                                value="{{ old('dencity', $nationalPopulationCensus->dencity) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $nationalPopulationCensus->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत
                        जनसंख्या विवरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="4"></th>
                                <th colspan="3" style="background: gray" class="text-white text-center">प्रारम्भिक
                                    जनसंख्या</th>
                            </tr>
                            <tr>
                                <th>क्षेत्र</th>
                                <th>कुल जनसंख्या</th>
                                <th>जनगणना घरसंख्या</th>
                                <th>घरपरिवार संख्या</th>
                                <th>जम्मा</th>
                                <th>पुरुष</th>
                                <th>महिला</th>
                                <th>लैंगिक अनुपात</th>
                                <th>औषत परिवार आकार </th>
                                <th>वार्षिक वृद्धिदर(%)</th>
                                <th>जनघनत्व र(प्रतिवग कि.मि.)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nationalPopulationCensuss as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->population }}</td>
                                    <td>{{ $item->census_house_number }}</td>
                                    <td>{{ $item->house_number }}</td>
                                    <td>{{ $item->male + $item->female }}</td>
                                    <td>{{ $item->male }}</td>
                                    <td>{{ $item->female }}</td>
                                    <td>{{ $item->ratio }}</td>
                                    <td>{{ $item->avg_family_size }}</td>
                                    <td>{{ $item->increase_rate }}</td>
                                    <td>{{ $item->dencity }}</td>

                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('national-population-census.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('national-population-census.destroy', $item) }}"
                                            method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
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
