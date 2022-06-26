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
                    action="{{ $agricultureProduce->id ? route('land-uses.update', $agricultureProduce) : route('land-uses.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($agricultureProduce->id)
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
                            <select name="district_id" id="select-district-id" class="custom-select">
                                @isset($municipality->district)
                                    <option value="{{ $municipality->district->id }}" selected>
                                        {{ $municipality->district->name }}</option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">
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
                                    <input type="text" name="sector" class="form-control"
                                        value="{{ old('sector', $agricultureProduce->sector) }}">
                                </div>
        
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="npl_area" class="form-control"
                                        value="{{ old('npl_area', $agricultureProduce->npl_area) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="supa_area" class="form-control"
                                        value="{{ old('supa_area', $agricultureProduce->supa_area) }}">
                                </div>
                            </div>
                           
                        </div>

                        <div class="col-lg-12 border">
                            <h5 class="py-4">हिस्सा (प्रतिशत)</h5>
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">खाद्य तथा अन्य बाली हे.</label>
                                    <input type="text" name="sector" class="form-control"
                                        value="{{ old('sector', $agricultureProduce->sector) }}">
                                </div>
        
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">तरकारी तथा बागवानी </label>
                                    <input type="text" name="npl_area" class="form-control"
                                        value="{{ old('npl_area', $agricultureProduce->npl_area) }}">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-fiscal-year-start">फलफुल तथा मसला</label>
                                    <input type="text" name="supa_area" class="form-control"
                                        value="{{ old('supa_area', $agricultureProduce->supa_area) }}">
                                </div>
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
