@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">जातजाती आधारमा रहेको जनसंख्या</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">जनसांख्यिक स्थिति</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिम प्रदेश र अन्य प्रदेशमा रहेको जनसांख्यिक
                    स्थिति</li>
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
                            <h4>जातजाती आधारमा रहेको जनसंख्या</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $castPopulation->id ? route('cast-population.update',$castPopulation) : route('cast-population.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($castPopulation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="select-province-id">जातजाती</label>
                            <input type="text" name="cast" class="form-control"
                                value="{{ old('cast', $castPopulation->cast) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनसङ्ख्या</label>
                            <input type="number" name="population" class="form-control"
                                value="{{ old('population', $castPopulation->population) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रतिशत</label>
                            <input type="text" name="percentage" class="form-control"
                                value="{{ old('percentage', $castPopulation->percentage) }}">
                        </div>

                      

                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $castPopulation->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">जातजाती आधारमा रहेको जनसंख्या</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                           <tr>
                                <th>जातजाती</th>
                                <th>जनसङ्ख्या</th>
                                <th>प्रतिशत</th>
                               
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($castPopulations as $item)
                                <tr>
                                    <td>{{ $item->cast }}</td>
                                    <td>{{ $item->population }}</td>
                                    <td>{{ $item->percentage }}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('cast-population.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('cast-population.destroy', $item) }}" method="post"
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
