@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिम प्रदेशका भौगोलिक क्षेत्रगत जनसंख्या तथा जनघनत्व विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसंख्या</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिम प्रदेशका भौगोलिक क्षेत्रगत जनसंख्या तथा
                    जनघनत्व विवरण</li>
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
                            <h4>भौगोलिक क्षेत्रगत जनसंख्या थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $geographicalPopulation->id ? route('geographical-population.update', $geographicalPopulation) : route('geographical-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($geographicalPopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="input-name">क्षेत्र</label>
                            <select name="sector" id="" class="form-control">
                                <option value="">कृपया क्षेत्र चयन गर्नुहोस्</option>
                                @isset($geographicalPopulation->id)
                                    <option value="{{ $geographicalPopulation->sector }}" selected>
                                        {{ $geographicalPopulation->sector }}</option>
                                @endisset
                                <option value="हिमाली">हिमाली</option>
                                <option value="पहाडी">पहाडी</option>
                                <option value="तराई">तराई</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-name">जनसङ्ख्या</label>
                            <input type="number" id="input-name" name="population" class="form-control" autocomplete="off"
                                value="{{ old('population', $geographicalPopulation->population) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-name">क्षेत्रफल (वर्ग कि.मि.)</label>
                            <input type="number" id="input-name" name="area" class="form-control" autocomplete="off"
                                value="{{ old('area', $geographicalPopulation->area) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-name">जनघनत्व(जना/वर्ग कि.मि.)</label>
                            <input type="number" id="input-name" name="density" class="form-control" autocomplete="off"
                                value="{{ old('density', $geographicalPopulation->density) }}">
                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $geographicalPopulation->id ? 'update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशका भौगोलिक क्षेत्रगत जनसंख्या तथा जनघनत्व विवरण
                </h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>क्षेत्र</th>
                            <th>जनसङ्ख्या</th>
                            <th>क्षेत्रफल (वर्ग कि.मि.)</th>
                            <th>जनघनत्व(जना/वर्ग कि.मि.)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($geographicalpopulations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sector }}</td>
                                <td>{{ $item->population }}</td>
                                <td>{{ $item->area }}</td>
                                <td>{{ $item->density }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('geographical-population.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('geographical-population.destroy', $item) }}" method="post"
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
