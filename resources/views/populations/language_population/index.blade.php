@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रखुम दश भाषाभाषी विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसांख्यिक स्थिति</li>
                <li class="breadcrumb-item active" aria-current="page">प्रखुम दश भाषाभाषी विवरण</li>
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
                            <h4>प्रखुम दश भाषाभाषी विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $languagePopulation->id ? route('language-population.update',$languagePopulation) : route('language-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($languagePopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">भाषा</label>
                            <input type="text" name="language" class="form-control"
                                value="{{ old('language', $languagePopulation->language) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनसंख्या</label>
                            <input type="number" name="population" class="form-control"
                                value="{{ old('population', $languagePopulation->population) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रतिशत</label>
                            <input type="text" name="percentage" class="form-control"
                                value="{{ old('percentage', $languagePopulation->percentage) }}">
                        </div>

                      

                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $languagePopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">प्रखुम दश भाषाभाषी विवरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                           <tr>
                                <th>भाषा</th>
                                <th>जनसङ्ख्या</th>
                                <th>प्रतिशत</th>
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($languagePopulations as $item)
                                <tr>
                                    <td>{{ $item->language }}</td>
                                    <td>{{ $item->population }}</td>
                                    <td>{{ $item->percentage }}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('language-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('language-population.destroy', $item) }}" method="post"
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
