@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">जिल्लागत जनसंख्या वितरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">जिल्लागत जनसंख्या वितरण</li>
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
                            <h4>जिल्लागत जनसंख्या वितरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $districtPopulation->id ? route('district-population.update', $districtPopulation) : route('district-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($districtPopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
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
                        <div class="form-group col-lg-4">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($districtPopulation->id)
                                    <option value="{{ $districtPopulation->district }}" selected>
                                        {{ $districtPopulation->district }}</option>
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
                            <label for="input-fiscal-year-start">घरपरिवार संख्या</label>
                            <input type="text" name="house_number" class="form-control"
                                value="{{ old('house_number', $districtPopulation->house_number) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">औषत परिवार संख्या</label>
                            <input type="text" name="average_house_number" class="form-control"
                                value="{{ old('average_house_number', $districtPopulation->average_house_number) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">महिला जनसङ्ख्या</label>
                            <input type="text" name="female_number" class="form-control"
                                value="{{ old('female_number', $districtPopulation->female_number) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">पुरुष जनसङ्ख्या</label>
                            <input type="text" name="male_number" class="form-control"
                                value="{{ old('male_number', $districtPopulation->male_number) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रदेशको कुल जनसंख्याका प्रतिशत</label>
                            <input type="text" name="population_percentage" class="form-control"
                                value="{{ old('population_percentage', $districtPopulation->population_percentage) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">लैङ्गिक अनुपात</label>
                            <input type="text" name="laingik_anupat" class="form-control"
                                value="{{ old('laingik_anupat', $districtPopulation->laingik_anupat) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनसंख्या बृद्धिदर</label>
                            <input type="text" name="population_increse_rate" class="form-control"
                                value="{{ old('population_increse_rate', $districtPopulation->population_increse_rate) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनघनत्व( प्रति वग कि.मि.)</label>
                            <input type="text" name="dencity" class="form-control"
                                value="{{ old('dencity', $districtPopulation->dencity) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $districtPopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">जिल्लागत जनसंख्या वितरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="3"></th>
                                <th colspan="3" style="background: gray" class="text-white text-center">जनसंख्या</th>
                            </tr>
                            <tr>
                                <th>क्षेत्र</th>
                                <th>घरपरिवार संख्या</th>
                                <th>औषत परिवार संख्या</th>
                                <th>महिला जनसङ्ख्या</th>
                                <th>पुरुष जनसङ्ख्या</th>
                                <th>जम्मा जनसङ्ख्या</th>
                                <th>प्रदेशको कुल जनसंख्याका प्रतिशत</th>
                                <th>लैङ्गिक अनुपात</th>
                                <th>जनसंख्या बृद्धिदर</th>
                                <th>जनघनत्व( प्रति वग कि.मि.)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($districtPopulations as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->house_number }}</td>
                                    <td>{{ $item->average_house_number }}</td>
                                    <td>{{ $item->female_number }}</td>
                                    <td>{{ $item->male_number }}</td>
                                    <td>{{ $item->female_number+$item->male_number }}</td>
                                    <td>{{ $item->population_percentage }}</td>
                                    <td>{{ $item->laingik_anupat }}</td>
                                    <td>{{ $item->population_increse_rate }}</td>
                                    <td>{{ $item->dencity }}</td>
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('district-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('district-population.destroy', $item) }}"
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
