@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार
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
                            <h4>राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $nationalPopulation->id ? route('national-population.update', $nationalPopulation) : route('national-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($nationalPopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">क्षेत्र</label>
                            <input type="text" name="area" class="form-control"
                                value="{{ old('area', $nationalPopulation->area) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">नयाँ जनसंख्या</label>
                            <input type="text" name="new_population" class="form-control"
                                value="{{ old('new_population', $nationalPopulation->new_population) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">पुरानो जनसंख्या</label>
                            <input type="text" name="old_population" class="form-control"
                                value="{{ old('old_population', $nationalPopulation->old_population) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $nationalPopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">राष्ट्रिय जनगणना २०७८ को प्रारम्भिक तथ्याङ्क अनुसार</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>क्षेत्र</th>
                                <th>2078</th>
                                <th>2068</th>
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nationalPopulations as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->area }}</td>
                                    <td>{{ $item->new_population }}</td>
                                    <td>{{ $item->old_population }}</td>
                                    
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('national-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('national-population.destroy', $item) }}" method="post"
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
