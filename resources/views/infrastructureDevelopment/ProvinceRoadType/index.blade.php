@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेश अनुसार सडकको प्रकार विवरण (कि.मि.)</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">पूर्वाधार विकास</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेश अनुसार सडकको प्रकार विवरण (कि.मि.)
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
                            <h4>प्रदेश अनुसार सडकको प्रकार विवरण (कि.मि.)</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $provinceRoadType->id ? route('province-road-type.update', $provinceRoadType) : route('province-road-type.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($provinceRoadType->id)
                        @method('PUT')
                    @endisset


                    <div class="form-group">
                        <label for="select-province-id">प्रदेश</label>
                        <select id="select-province-id" name="province" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @isset($provinceRoadType->id)
                                <option value="{{ $provinceRoadType->province }}" selected>{{ $provinceRoadType->province }}
                                </option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">धुले/कच्ची</label>
                            <input type="number" name="normal_road" class="form-control"
                                value="{{ old('normal_road', $provinceRoadType->normal_road) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">ग्राबेल</label>
                            <input type="number" name="garvel_road" class="form-control"
                                value="{{ old('garvel_road', $provinceRoadType->garvel_road) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">कालोपत्रे</label>
                            <input type="number" name="black_road" class="form-control"
                                value="{{ old('black_road', $provinceRoadType->black_road) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">जम्मा सडक</label>
                            <input type="number" name="total_road" class="form-control"
                                value="{{ old('total_road', $provinceRoadType->total_road) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">प्रदेशको हिस्सा प्रतिशत</label>
                            <input type="number" name="province_percentage" class="form-control"
                                value="{{ old('province_percentage', $provinceRoadType->province_percentage) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">सडक घनत्व</label>
                            <input type="number" name="road_density" class="form-control"
                                value="{{ old('road_density', $provinceRoadType->road_density) }}">
                        </div>

                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $provinceRoadType->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेश अनुसार सडकको प्रकार विवरण (कि.मि.)</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश</th>
                            <th>धुले/कच्ची</th>
                            <th>ग्राबेल</th>
                            <th>कालोपत्रे</th>
                            <th>जम्मा सडक</th>
                            <th>प्रदेशको हिस्सा प्रतिशत</th>
                            <th>सडक घनत्व</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinceRoadTypes as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->normal_road }}</td>
                                <td>{{ $item->garvel_road }}</td>
                                <td>{{ $item->black_road }}</td>
                                <td>{{ $item->total_road }}</td>
                                <td>{{ $item->province_percentage }}</td>
                                <td>{{ $item->road_density }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('province-road-type.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('province-road-type.destroy', $item) }}" method="post"
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
