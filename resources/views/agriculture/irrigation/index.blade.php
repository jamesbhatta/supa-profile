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
                    action="{{ $irrigation->id ? route('irrigation.update', $irrigation) : route('irrigation.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($irrigation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                               
                                    <option value="" selected>प्रदेश छान्नुहोस्</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($irrigation->id)
                                    <option value="{{ $irrigation->district}}" selected>
                                        {{ $irrigation->district}}</option>
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
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">कूल क्षेत्रफल (हे.)</label>
                            <input type="text" name="area" class="form-control"
                                value="{{ old('area', $irrigation->area) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">खेतीयोग्य जमिन (हे.)</label>
                            <input type="text" name="arable_land" class="form-control"
                                value="{{ old('arable_land', $irrigation->arable_land) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">खेती गरिएको जमिन (हे.)</label>
                            <input type="text" name="cultivated_land" class="form-control"
                                value="{{ old('cultivated_land', $irrigation->cultivated_land) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">बर्षभरि सिंचित (हे.)</label>
                            <input type="text" name="yearly" class="form-control"
                                value="{{ old('yearly', $irrigation->yearly) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">आंशिक सिंचित (हे.)</label>
                            <input type="text" name="half_yearly" class="form-control"
                                value="{{ old('half_yearly', $irrigation->half_yearly) }}">
                        </div>

                       
                    </div>








                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $irrigation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
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
                                <th colspan="5"></th>
                                <th colspan="3" class="border-left border-white">सिंचित (हे.)</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>जिल्ला</th>
                                <th>कूल क्षेत्रफल (हे.)</th>
                                <th>खेतीयोग्य जमिन (हे.)</th>
                                <th>खेती गरिएको जमिन (हे.)</th>
                                <th>बर्षभरि</th>
                                <th>आंशिक</th>
                                <th>जम्मा</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($irrigations as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->area }}</td>
                                    <td>{{ $item->arable_land }}</td>
                                    <td>{{ $item->cultivated_land }}</td>
                                    <td>{{ $item->yearly }}</td>
                                    <td>{{ $item->half_yearly }}</td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('irrigation.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('irrigation.destroy', $item) }}" method="post"
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
