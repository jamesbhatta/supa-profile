@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">खानेपानीका मुख्य श्रोत अनुसार स्थानीय तहगत घरपरिवार संख्या

        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">खानेपानीका मुख्य श्रोत अनुसार स्थानीय तहगत घरपरिवार
                    संख्या

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
                            <h4>खानेपानीका मुख्य श्रोत अनुसार स्थानीय तहगत घरपरिवार संख्या

                            </h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $water->id ? route('water.update', $water) : route('water.store') }}" method="POST"
                    class="form">
                    @csrf
                    @isset($water->id)
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
                                @isset($water->id)
                                    <option value="{{ $water->district->id }}" selected>{{ $water->district->name }}
                                    </option>
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
                        <div class="form-group col-lg-3">
                            <label for="select-district-id">न.पा./गा.वि.स. को नाम</label>
                            <select name="municipality_id"class="custom-select">
                                @isset($water->id)
                                <option value="{{$water->municipality->id}}" selected>{{$water->municipality->name}}</option>
                                @else
                                    <option value="" selected>न.पा./गा.वि.स. छान्नुहोस्</option>
                                @endisset

                                @foreach ($municipalities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">धारा</label>
                            <input type="number" name="tap" class="form-control"
                                value="{{ old('tap', $water->tap) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">ट्युबेल</label>
                            <input type="number" name="tubwell" class="form-control"
                                value="{{ old('tubwell', $water->tubwell) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">संरक्षित कुवा</label>
                            <input type="number" name="protected_well" class="form-control"
                                value="{{ old('protected_well', $water->protected_well) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">असंरक्षित कुवा</label>
                            <input type="number" name="unprotected_well" class="form-control"
                                value="{{ old('unprotected_well', $water->unprotected_well) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">थोपा पानी</label>
                            <input type="number" name="drop_water" class="form-control"
                                value="{{ old('drop_water', $water->drop_water) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">नदीको धारा </label>
                            <input type="number" name="river_tap" class="form-control"
                                value="{{ old('river_tap', $water->river_tap) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">अन्य</label>
                            <input type="number" name="other" class="form-control"
                                value="{{ old('other', $water->other) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $water->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">खानेपानीका मुख्य श्रोत अनुसार स्थानीय तहगत घरपरिवार संख्या

                    </h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th> क्रस</th>
                                <th>जिल्ला</th>
                                <th>न.पा./गा.वि.स.</th>
                                <th> धारा</th>
                                <th>ट्युबेल</th>
                                <th>संरक्षित कुवा</th>
                                <th>असंरक्षित कुवा</th>
                                <th>थोपा पानी</th>
                                <th>नदीको धारा</th>
                                <th>अन्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($waters as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->district->name }}</td>
                                    <td>{{ $item->municipality->name }}</td>
                                    {{-- <td>{{ $item->to }}</td> --}}
                                    <td>{{ $item->tap }}</td>
                                    <td>{{ $item->tubwell }}</td>
                                    <td>{{ $item->protected_well }}</td>
                                    <td>{{ $item->unprotected_well }}</td>
                                    <td>{{ $item->drop_water }}</td>
                                    <td>{{ $item->river_tap }}</td>
                                    <td>{{ $item->other }}</td>

                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('water.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('water.destroy', $item) }}" method="post"
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
