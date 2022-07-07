@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सवारी साधनको संख्या विवरण

        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सवारी साधनको संख्या विवरण

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
                            <h4>सवारी साधनको संख्या विवरण

                            </h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $vehicle->id ? route('vehicle.update', $vehicle) : route('vehicle.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($vehicle->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">विवरण</label>
                            <input type="text" name="vehicle" class="form-control"
                                value="{{ old('vehicle', $vehicle->vehicle) }}">
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">२०७७ असार मसान्तसम्म</label>
                            <input type="number" name="from" class="form-control"
                                value="{{ old('from', $vehicle->from) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">२०७८ असार मसान्तसम्म</label>
                            <input type="number" name="to" class="form-control"
                                value="{{ old('to', $vehicle->to) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">बृद्धि प्रतिशत</label>
                            <input type="text" name="increase_rate" class="form-control"
                                value="{{ old('increase_rate', $vehicle->increase_rate) }}">
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $vehicle->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सवारी साधनको संख्या विवरण

                    </h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th> विवरण</th>
                                <th>२०७७ असार मसान्तसम्म</th>
                                <th>२०७८ असार मसान्तसम्म</th>
                                <th>बृद्धि प्रतिशत</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicles as $item)
                                <tr>
                                    <td>{{ $item->vehicle }}</td>
                                    <td>{{ $item->from }}</td>
                                    <td>{{ $item->to }}</td>
                                    <td>{{ $item->increase_rate }}</td>
                                    
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('vehicle.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('vehicle.destroy', $item) }}" method="post"
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
