@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा दुधालु पशु र दुग्ध उत्पादनको अवस्था (मे.ट. ०७७/०७८)</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा दुधालु पशु र दुग्ध उत्पादनको अवस्था (मे.ट. ०७७/०७८)</li>
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
                            <h4>सुदूरपश्चिममा दुधालु पशु र दुग्ध उत्पादनको अवस्था (मे.ट. ०७७/०७८)</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $milkProduction->id ? route('milk-production.update', $milkProduction) : route('milk-production.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($milkProduction->id)
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
                                @isset($milkProduction->id)
                                    <option value="{{ $milkProduction->district}}" selected>
                                        {{ $milkProduction->district}}</option>
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
                            <label for="input-fiscal-year-start">	दुधालु गाइ सख्या</label>
                            <input type="number" name="cow" class="form-control"
                                value="{{ old('cow', $milkProduction->cow) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">गाइको दुध</label>
                            <input type="text" name="cow_milk" class="form-control"
                                value="{{ old('cow_milk', $milkProduction->cow_milk) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">	दुधालु भैसी सख्या</label>
                            <input type="number" name="buffalo" class="form-control"
                                value="{{ old('buffalo', $milkProduction->buffalo) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">भैसीको दुध</label>
                            <input type="text" name="buffalo_milk" class="form-control"
                                value="{{ old('buffalo_milk', $milkProduction->buffalo_milk) }}">
                        </div>

                      
                    </div>








                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $milkProduction->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा दुधालु पशु र दुग्ध उत्पादनको अवस्था (मे.ट. ०७७/०७८)</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                           
                          
                            <tr>
                                <th>#</th>
                                <th>जिल्ला</th>
                                <th>दुधालु गाइ सख्या</th>
                                <th>गाइको दुध</th>
                                <th>दुधालु भैसी सख्या</th>
                                <th>भैसीको दुध</th>
                                <th>जम्मा दुध उत्पादन</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($milkProductions as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->cow }}</td>
                                    <td>{{ $item->cow_milk }}</td>
                                    <td>{{ $item->buffalo}}</td>
                                    <td>{{ $item->buffalo_milk}}</td>
                                    <td>{{ $item->cow_milk+$item->buffalo_milk}}</td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('milk-production.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('milk-production.destroy', $item) }}" method="post"
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
