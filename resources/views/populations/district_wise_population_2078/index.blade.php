@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत जनसंख्या विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार
                    जिल्लागत जनसंख्या विवरण
                </li>
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
                    action="{{ $districtWisePopulation->id ? route('district-wise-population.update', $districtWisePopulation) : route('district-wise-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($districtWisePopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-12">
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
                        <div class="form-group col-12">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($districtWisePopulation->id)
                                    <option value="{{ $districtWisePopulation->district}}" selected>
                                        {{ $districtWisePopulation->district}}</option>
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
                            <label for="input-fiscal-year-start">पुरुष</label>
                            <input type="text" name="male" class="form-control"
                                value="{{ old('male', $districtWisePopulation->male) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">महिला</label>
                            <input type="text" name="female" class="form-control"
                                value="{{ old('female', $districtWisePopulation->female) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रतिशत</label>
                            <input type="text" name="percentage" class="form-control"
                                value="{{ old('percentage', $districtWisePopulation->percentage) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $districtWisePopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार जिल्लागत जनसंख्या विवरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th colspan="1"></th>
                                <th colspan="3" style="background: gray" class="text-white text-center">अनुपस्थित जनसंख्या ( प्रारम्भिक)</th>
                            </tr>
                            <tr>
                                <th>क्षेत्र</th>
                                <th>जम्मा</th>
                                <th>पुरुष</th>
                                <th>महिला</th>
                                <th>प्रतिशत</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($districtWisePopulations as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->male+$item->male }}</td>
                                    <td>{{ $item->male }}</td>
                                    <td>{{ $item->female }}</td>
                                    <td>{{ $item->percentage }}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('district-wise-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('district-wise-population.destroy', $item) }}" method="post"
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
