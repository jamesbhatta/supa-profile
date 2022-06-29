@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">कृषि बालीको जिल्लागत उत्पादन अवस्था</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">कृषि बालीको जिल्लागत उत्पादन अवस्था
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
                            <h4>कृषि बालीको जिल्लागत उत्पादन अवस्था</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $agriculturalProduction->id ? route('agricultural-production.update', $agriculturalProduction) : route('agricultural-production.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($agriculturalProduction->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">

                                <option value="" selected>प्रदेश छान्नुहोस्</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($agriculturalProduction->id)
                                    <option value="{{ $agriculturalProduction->district }}" selected>
                                        {{ $agriculturalProduction->district }}</option>
                                @else
                                    <option value="" selected>जिल्ला छान्नुहोस्</option>
                                @endisset

                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 border">
                            <label style="position: relative;top:-10px" class="bg-white px-4">क्षेत्रफल (हेक्टर)</label>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">खाद्य तथा अन्य बाली हे.</label>
                                    <input type="text" name="food_area" class="form-control"
                                        value="{{ old('food_area', $agriculturalProduction->food_area) }}">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="vegetable_area" class="form-control"
                                        value="{{ old('vegetable_area', $agriculturalProduction->vegetable_area) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="fruits_area" class="form-control"
                                        value="{{ old('fruits_area', $agriculturalProduction->fruits_area) }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 border mt-3">
                            <label style="position: relative;top:-10px" class="bg-white px-4">हिस्सा (प्रतिशत)</label>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">खाद्य तथा अन्य बाली हे.</label>
                                    <input type="text" name="food_percentage" class="form-control"
                                        value="{{ old('food_percentage', $agriculturalProduction->food_percentage) }}">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="vegetable_percentage" class="form-control"
                                        value="{{ old('vegetable_percentage', $agriculturalProduction->vegetable_percentage) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="fruits_percentage" class="form-control"
                                        value="{{ old('fruits_percentage', $agriculturalProduction->fruits_percentage) }}">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $agriculturalProduction->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">कृषि बालीको जिल्लागत उत्पादन अवस्था</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="thead-light">
                                <th colspan="8" class="text-center">कृषि बालीको जिल्लागत उत्पादन अवस्था</th>
                            </tr>
                            <tr class="thead-light">
                                <th colspan="1"></th>
                                <th colspan="3">उत्पादन (मे. ट.) </th>
                                <th colspan="4">हिस्सा (प्रतिशत)</th>
                            </tr>
                            <tr>
                                <th>जिल्ला</th>
                                <th>खाद्य तथा अन्य बाली हे.</th>
                                <th>तरकारी तथा बागवानी</th>
                                <th>फलफुल तथा मसला</th>
                                <th>खाद्य तथा अन्य बाली हे.</th>
                                <th>तरकारी तथा बागवानी</th>
                                <th>फलफुल तथा मसला</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agriculturalProductions as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->food_area }}</td>
                                    <td>{{ $item->vegetable_area }}</td>
                                    <td>{{ $item->fruits_area }}</td>
                                    <td>{{ $item->food_percentage }}</td>
                                    <td>{{ $item->vegetable_percentage }}</td>
                                    <td>{{ $item->fruits_percentage }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('agricultural-production.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('agricultural-production.destroy', $item) }}"
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
