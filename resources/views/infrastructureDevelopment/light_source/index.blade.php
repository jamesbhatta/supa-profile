@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">घरपरिवारमा उज्यालोका लागि प्रयोग हुने स्रोत

        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">घरपरिवारमा उज्यालोका लागि प्रयोग हुने स्रोत

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
                            <h4>घरपरिवारमा उज्यालोका लागि प्रयोग हुने स्रोत

                            </h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $lightSource->id ? route('light-source.update', $lightSource) : route('light-source.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($lightSource->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                                @isset($municipality->district->province)
                                <option value="{{ $municipality->district->province->id }}" selected>{{ $municipality->district->province->name }}</option>
                                @else
                                <option value="">प्रदेश छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district_id" id="select-district-id" class="custom-select">
                                @isset($lightSource->district)
                                <option value="{{ $lightSource->district->id }}" selected>{{ $lightSource->district->name }}</option>
                                @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                @foreach($province->districts as $district)
                                <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="select-district-id">न.पा./गा.वि.स. को नाम</label>
                            <select name="municipality_id"class="custom-select">
                               @foreach ($municipalities as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">विजुली</label>
                            <input type="text" name="electricity" class="form-control"
                                value="{{ old('electricity', $lightSource->electricity) }}">
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">मट्टितेल</label>
                            <input type="text" name="kerosene" class="form-control"
                                value="{{ old('kerosene', $lightSource->kerosene) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">ब्यायो ग्यास</label>
                            <input type="text" name="bio_gas" class="form-control"
                                value="{{ old('bio_gas', $lightSource->bio_gas) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">सोलार</label>
                            <input type="text" name="solar" class="form-control"
                                value="{{ old('solar', $lightSource->solar) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">अन्य</label>
                            <input type="text" name="other" class="form-control"
                                value="{{ old('other', $lightSource->other) }}">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $lightSource->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">घरपरिवारमा उज्यालोका लागि प्रयोग हुने स्रोत

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
                                <th>विजुली</th>
                                <th>मट्टितेल</th>
                                <th>बायोग्यास</th>
                                <th>सोलार</th>
                                <th>अन्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lightSources as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->district->name}}</td>
                                    <td>{{ $item->municipality->name }}</td>
                                    <td>{{ $item->electricity}}</td>
                                    <td>{{ $item->kerosene }}</td>
                                    <td>{{ $item->bio_gas }}</td>
                                    <td>{{ $item->solar }}</td>
                                   
                                    <td>{{ $item->other }}</td>
                                    
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('light-source.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('light-source.destroy', $item) }}" method="post"
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
