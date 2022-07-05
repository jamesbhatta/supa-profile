@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">धर्मावलम्वीका आधारमा जिल्लागत विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">धर्मावलम्वीका आधारमा जिल्लागत विवरण
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
                            <h4>धर्मावलम्वीका आधारमा जिल्लागत विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $religionPopulation->id ? route('religion-population.update', $religionPopulation) : route('religion-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($religionPopulation->id)
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
                                @isset($religionPopulation->id)
                                    <option value="{{ $religionPopulation->district}}" selected>
                                        {{ $religionPopulation->district}}</option>
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
                            <label for="input-fiscal-year-start">हिन्दु</label>
                            <input type="number" name="hindu" class="form-control"
                                value="{{ old('hindu', $religionPopulation->hindu) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">बौद्ध</label>
                            <input type="number" name="baudha" class="form-control"
                                value="{{ old('baudha', $religionPopulation->baudha) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">इश्लाम</label>
                            <input type="number" name="islam" class="form-control"
                                value="{{ old('islam', $religionPopulation->islam) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">किराँत</label>
                            <input type="number" name="kirat" class="form-control"
                                value="{{ old('kirat', $religionPopulation->kirat) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">क्रिश्चियन</label>
                            <input type="number" name="christian" class="form-control"
                                value="{{ old('christian', $religionPopulation->christian) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रकृति</label>
                            <input type="number" name="prakirty" class="form-control"
                                value="{{ old('prakirty', $religionPopulation->prakirty) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">अन्य</label>
                            <input type="number" name="other" class="form-control"
                                value="{{ old('other', $religionPopulation->other) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $religionPopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">धर्मावलम्वीका आधारमा जिल्लागत विवरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                           <tr>
                                <th>जिल्ला</th>
                                <th>जम्मा</th>
                                <th>हिन्दु</th>
                                <th>बौद्ध</th>
                                <th>इश्लाम</th>
                                <th>किराँत</th>
                                <th>क्रिश्चियन</th>
                                <th>प्रकृति</th>
                                <th>अन्य</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($religionPopulations as $item)
                                <tr>
                                    <td>{{ $item->district }}</td>
                                    <td>{{$item->hindu+$item->baudha+$item->islam+$item->kirat+$item->christian+$item->prakirty+$item->other}}</td>
                                    <td>{{ $item->hindu }}</td>
                                    <td>{{ $item->baudha }}</td>
                                    <td>{{ $item->islam }}</td>
                                    <td>{{ $item->kirat }}</td>
                                    <td>{{ $item->christian }}</td>
                                    <td>{{ $item->prakirty }}</td>
                                    <td>{{ $item->other }}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('religion-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('religion-population.destroy', $item) }}" method="post"
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
