@extends('layouts.app')

@section('content')
    <div class="container-fluied">
        <h3 class="font-weight-bold">स्थानिय तह को जनसंख्या</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसांख्यिक स्थिति</li>
                <li class="breadcrumb-item active" aria-current="page">स्थानिय तह को जनसंख्या</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="card z-depth-0">
            
            <div class="card-body">

                <form action="{{ route('local-population.update', $populations[0]->id) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')


                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="input-name">जिल्ला को नाम</label>
                            <select name="district" class="form-control" id="">

                                <option value="{{ $populations[0]->district }}" selected>{{ $populations[0]->district }}
                                </option>
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach ($district as $district)
                                    <option value="{{ $district->id }}" data-province-id="">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-name">न.पा./गा.वि.स. को नाम</label>
                            <select name="municipality_name" class="form-control" id="">
                                @isset($populations[0]->municipality_name)
                                    <option value="{{ $populations[0]->municipality_name }}">
                                        {{ $populations[0]->municipality_name }}</option>
                                @else
                                    <option value="">न.पा./गा.पा छान्नुहोस्</option>
                                @endisset

                                @foreach ($municipality as $item)
                                    <option value="{{ $item->name }}" data-province-id="">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="input-name ">घरपरिवार संख्या</label>
                            <input type="number" id="input-name" name="house_number" class="form-control"
                                autocomplete="off" value="{{ old('house_number', $populations[0]->house_number) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">पुरुष</label>
                            <input type="number" id="input-name" name="male_number" class="form-control" autocomplete="off"
                                value="{{ old('male_number', $populations[0]->male_number) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">महिला</label>
                            <input type="number" id="input-name" name="female_number" class="form-control"
                                autocomplete="off" value="{{ old('female_number', $populations[0]->female_number) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">औषत घरपरिवार सदस्य संख्या</label>
                            <input type="number" id="input-name" name="avg_house_number" class="form-control"
                                autocomplete="off" value="{{ old('avg_house_number', $populations[0]->avg_house_number) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">लैगिंक अनुपात</label>
                            <input type="text" id="input-name" name="anupat" class="form-control" autocomplete="off"
                                value="{{ old('anupat', $populations[0]->anupat) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">महिला साक्षरता (प्रतिशत)</label>
                            <input type="text" id="input-name" name="fml_edu_percentage" class="form-control"
                                autocomplete="off"
                                value="{{ old('fml_edu_percentage', $populations[0]->fml_edu_percentage) }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-name">पुरुष साक्षरता (प्रतिशत)</label>
                            <input type="text" id="input-name" name="ml_edu_percentage" class="form-control"
                                autocomplete="off"
                                value="{{ old('ml_edu_percentage', $populations[0]->ml_edu_percentage) }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">Update</button>
                        </div>
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
