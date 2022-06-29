@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">जिल्ला अनुसार खाद्यान्न उत्पादन तथा आवश्यकताको स्थितिको जिल्लागत विवरण, आर्थिक वर्ष २०७६/०७७ (प्रारम्भिक अनुमान (मे. टन))</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">जिल्ला अनुसार खाद्यान्न उत्पादन तथा आवश्यकताको स्थितिको जिल्लागत विवरण, आर्थिक वर्ष २०७६/०७७ (प्रारम्भिक अनुमान (मे. टन))</li>
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
                            <h4>जिल्ला अनुसार खाद्यान्न उत्पादन तथा आवश्यकताको स्थितिको जिल्लागत विवरण, आर्थिक वर्ष २०७६/०७७ (प्रारम्भिक अनुमान (मे. टन))</h4>
                        </nav>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form
                    action="{{ $requireFood->id ? route('required-food.update', $requireFood) : route('required-food.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($requireFood->id)
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
                                @isset($requireFood->id)
                                    <option value="{{ $requireFood->district }}" selected>
                                        {{ $requireFood->district }}</option>
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
                            <label for="input-fiscal-year-start">जनसंख्या</label>
                            <input type="text" name="population" class="form-control"
                                value="{{ old('population', $requireFood->population) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">चामल</label>
                            <input type="text" name="rice" class="form-control"
                                value="{{ old('rice', $requireFood->rice) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">मकै</label>
                            <input type="text" name="maize" class="form-control"
                                value="{{ old('maize', $requireFood->maize) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">कोदो</label>
                            <input type="text" name="kodo" class="form-control"
                                value="{{ old('kodo', $requireFood->kodo) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">फापर</label>
                            <input type="text" name="phppar" class="form-control"
                                value="{{ old('phppar', $requireFood->phppar) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">गहुँ</label>
                            <input type="text" name="wheat" class="form-control"
                                value="{{ old('wheat', $requireFood->wheat) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जौ</label>
                            <input type="text" name="Barley" class="form-control"
                                value="{{ old('Barley', $requireFood->Barley) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उपभोग्य खाद्यान्न उत्पादन</label>
                            <input type="text" name="production" class="form-control"
                                value="{{ old('production', $requireFood->production) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">आवश्यक खाद्यान्न</label>
                            <input type="text" name="required_food" class="form-control"
                                value="{{ old('required_food', $requireFood->required_food) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">बचत वा न्यून</label>
                            <input type="text" name="saving" class="form-control"
                                value="{{ old('saving', $requireFood->saving) }}">
                        </div>
                    </div>








                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $requireFood->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">जिल्ला अनुसार खाद्यान्न उत्पादन तथा आवश्यकताको स्थितिको
                        जिल्लागत विवरण, आर्थिक वर्ष २०७६/०७७ (प्रारम्भिक अनुमान (मे. टन))</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>जिल्ला</th>
                                <th> जनसंख्या</th>
                                <th>चामल</th>
                                <th>मकै</th>
                                <th>कोदो</th>
                                <th>फापर</th>
                                <th>गहुँ</th>
                                <th>जौ</th>
                                <th>उपभोग्य खाद्यान्न उत्पादन</th>
                                <th>आवश्यक खाद्यान्न</th>
                                <th>बचत वा न्यून</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requireFoods as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->population }}</td>
                                    <td>{{ $item->rice }}</td>
                                    <td>{{ $item->maize }}</td>
                                    <td>{{ $item->kodo }}</td>
                                    <td>{{ $item->phppar }}</td>
                                    <td>{{ $item->wheat }}</td>
                                    <td>{{ $item->Barley }}</td>
                                    <td>{{ $item->production }}</td>
                                    <td>{{ $item->required_food }}</td>
                                    <td>{{ $item->saving }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('required-food.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('required-food.destroy', $item) }}" method="post"
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
