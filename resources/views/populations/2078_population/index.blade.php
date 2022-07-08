@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">२०७८ को प्रारम्भिक तथ्यांक अनुसार स्थानीय तहको जनसंख्या</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसांख्यिक स्थिति</li>
                <li class="breadcrumb-item active" aria-current="page">२०७८ को प्रारम्भिक तथ्यांक अनुसार स्थानीय तहको जनसंख्या</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="card z-depth-0">
           
            <div class="card-body">

                <form action="{{ route('population.store') }}" method="POST" class="form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="input-name">जिल्ला को नाम</label>
                            <select name="district_id" class="form-control" id="">
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @foreach ($districts as $item)
                                    <option value="{{ $item->id }}" data-province-id="">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-name">न.पा./गा.वि.स. को नाम</label>
                            <select name="municipality_id" class="form-control" id="">
                                <option value="">न.पा./गा.पा छान्नुहोस्</option>

                                @foreach ($municipalities as $item)
                                    <option value="{{ $item->id }}" data-province-id="">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="input-name ">घरपरिवार संख्या</label>
                            <input type="number" id="input-name" name="family_num" class="form-control" autocomplete="off"
                                value="{{ old('house_number') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">पुरुष</label>
                            <input type="number" id="input-name" name="male_num" class="form-control" autocomplete="off"
                                value="{{ old('male_number') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-name">महिला</label>
                            <input type="number" id="input-name" name="female_num" class="form-control" autocomplete="off"
                                value="{{ old('female_number') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>


        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">२०७८ को प्रारम्भिक तथ्यांक अनुसार स्थानीय तहको जनसंख्या विवरण</h1>
                <small>(हाल {{ count($population) }} विवरण {{ count($population) > 1 ? 'हरु छन्' : 'छ' }} )</small>

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>न.पा./गा.पा.</th>
                            <th>घर संख्या</th>
                            <th>जम्मा</th>
                            <th>पुरुष</th>
                            <th>महिला</th>

                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($population as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->districts->name }}</td>
                                <td>{{ $item->municipalities->name }}</td>
                                <td>{{ $item->family_num }}</td>
                                <td>{{ $item->female_num + $item->male_num }}</td>
                                <td>{{ $item->male_num }}</td>
                                <td>{{ $item->female_num }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('population.edit', $item->id) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('population.destroy', $item->id) }}" method="post"
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
