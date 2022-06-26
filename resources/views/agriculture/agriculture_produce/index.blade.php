@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">सुदूरपश्चिममा कृषि उपजले ढाकेको जिल्लागत भू –
                    क्षेत्र</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $agricultureProduce->id ? route('agriculture-produce.update', $agricultureProduce) : route('agriculture-produce.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($agricultureProduce->id)
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
                                @isset($agricultureProduce->id)
                                    <option value="{{ $agricultureProduce->district}}" selected>
                                        {{ $agricultureProduce->district}}</option>
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
                            <h5 class="py-4">क्षेत्रफल (हेक्टर)</h5>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">खाद्य तथा अन्य बाली हे.</label>
                                    <input type="text" name="food_area" class="form-control"
                                        value="{{ old('food_area', $agricultureProduce->food_area) }}">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="vegetable_area" class="form-control"
                                        value="{{ old('vegetable_area', $agricultureProduce->vegetable_area) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="fruits_area" class="form-control"
                                        value="{{ old('fruits_area', $agricultureProduce->fruits_area) }}">
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 border">
                            <h5 class="py-4">हिस्सा (प्रतिशत)</h5>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">खाद्य तथा अन्य बाली हे.</label>
                                    <input type="text" name="food_percentage" class="form-control"
                                        value="{{ old('food_percentage', $agricultureProduce->food_percentage) }}">
                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="vegetable_percentage" class="form-control"
                                        value="{{ old('vegetable_percentage', $agricultureProduce->vegetable_percentage) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="fruits_percentage" class="form-control"
                                        value="{{ old('fruits_percentage', $agricultureProduce->fruits_percentage) }}">
                                </div>
                            </div>

                        </div>
                    </div>








                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $agricultureProduce->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा कृषि उपजले ढाकेको जिल्लागत भू – क्षेत्र</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="thead-light">
                                <th colspan="7" class="text-center">कृषि उपजले ढाकेको भू – क्षेत्र</th>
                            </tr>
                            <tr class="thead-light">
                                <th colspan="1"></th>
                                <th colspan="3">क्षेत्रफल (हेक्टर)</th>
                                <th colspan="3">हिस्सा (प्रतिशत)</th>
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
                            @forelse ($agricultureProduces as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->food_area }}</td>
                                    <td>{{ $item->vegetable_area }}</td>
                                    <td>{{ $item->fruits_area }}</td>
                                    <td>{{ $item->food_percentage }}</td>
                                    <td>{{ $item->vegetable_percentage }}</td>
                                    <td>{{ $item->fruits_percentage }}</td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('agriculture-produce.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('agriculture-produce.destroy', $item) }}" method="post"
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
