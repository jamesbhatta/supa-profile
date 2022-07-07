@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा बार्षिक मासु उत्पादनको अवस्था मे.ट. ०७७/०७८</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा बार्षिक मासु उत्पादनको अवस्था मे.ट. ०७७/०७८</li>
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
                            <h4>सुदूरपश्चिममा बार्षिक मासु उत्पादनको अवस्था मे.ट. ०७७/०७८</h4>
                        </nav>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form
                    action="{{ $meatProduction->id ? route('meat-production.update', $meatProduction) : route('meat-production.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($meatProduction->id)
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
                                @isset($meatProduction->district)
                                    <option value="{{ $meatProduction->district }}" selected>
                                        {{ $meatProduction->district }}</option>
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
                            <label for="input-fiscal-year-start">बफ</label>
                            <input type="number" name="buff" class="form-control"
                                value="{{ old('buff', $meatProduction->buff) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">मटन</label>
                            <input type="number" name="mutton" class="form-control"
                                value="{{ old('mutton', $meatProduction->mutton) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">चेवन</label>
                            <input type="number" name="chewan" class="form-control"
                                value="{{ old('chewan', $meatProduction->chewan) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">पोर्क</label>
                            <input type="number" name="pork" class="form-control"
                                value="{{ old('pork', $meatProduction->pork) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">चिकेन</label>
                            <input type="number" name="chicken" class="form-control"
                                value="{{ old('chicken', $meatProduction->chicken) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">डक मिट</label>
                            <input type="number" name="duck" class="form-control"
                                value="{{ old('duck', $meatProduction->duck) }}">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $meatProduction->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा बार्षिक मासु उत्पादनको अवस्था मे.ट. ०७७/०७८</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th> जिल्ला</th>
                            <th>बफ</th>
                            <th>मटन</th>
                            <th>चेवन</th>
                            <th>पोर्क</th>
                            <th>चिकेन</th>
                            <th>डक मिट</th>
                            <th>जम्मा मासु</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($meatProductions as $item)
                            <tr>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->buff }}</td>
                                <td>{{ $item->mutton }}</td>
                                <td>{{ $item->chewan }}</td>
                                <td>{{ $item->pork }}</td>
                                <td>{{ $item->chicken }}</td>
                                <td>{{ $item->duck }}</td>
                                <td>{{ $item->duck+$item->buff+$item->mutton+$item->chewan+$item->pork+$item->chicken+$item->duck   }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('meat-production.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('meat-production.destroy', $item) }}" method="post"
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
