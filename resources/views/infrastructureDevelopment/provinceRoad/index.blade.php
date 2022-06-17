@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण
                    (कि.मि.)</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $provinceRoad->id ? route('province-road.update', $provinceRoad) : route('province-road.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($provinceRoad->id)
                        @method('PUT')
                    @endisset

                    <div class="form-group">
                        <label for="input-name">सडकको विवरण</label>
                        <input type="text" name="road_detail" class="form-control"
                            value="{{ old('road_detail', $provinceRoad->road_detail) }}">
                    </div>
                    <div class="form-group">
                        <label for="select-province-id">प्रदेश</label>
                        <select id="select-province-id" name="province" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @isset($provinceRoad->id)
                                <option value="{{$provinceRoad->province}}" selected>{{$provinceRoad->province}}</option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-fiscal-year-start">लम्बाइ</label>
                        <input type="text" name="lenght" class="form-control"
                            value="{{ old('lenght', $provinceRoad->lenght) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $provinceRoad->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>सडकको विवरण</th>
                            <th>प्रदेश</th>
                            <th>लम्बाइ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinceRoads as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->road_detail }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->lenght }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('province-road.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('province-road.destroy', $item) }}" method="post"
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
