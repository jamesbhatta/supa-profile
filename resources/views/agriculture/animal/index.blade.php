@extends('layouts.app')

@section('content')
   
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा पशुपंक्षीजन्य पदार्थको बार्षिक उत्पादनको अवस्था ०७७/०७८</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा पशुपंक्षीजन्य पदार्थको बार्षिक उत्पादनको अवस्था ०७७/०७८</li>
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
                            <h4>सुदूरपश्चिममा पशुपंक्षीजन्य पदार्थको बार्षिक उत्पादनको अवस्था ०७७/०७८</h4>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <form
                    action="{{ $animal->id ? route('animal.update', $animal) : route('animal.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($animal->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उत्पादन</label>
                            <input type="text" name="production" class="form-control"
                                value="{{ old('production', $animal->production) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रादेसिक उत्पादन</label>
                            <input type="text" name="province_production" class="form-control"
                                value="{{ old('province_production', $animal->province_production) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रादेसिक उपलव्धता</label>
                            <input type="text" name="province_availability" class="form-control"
                                value="{{ old('province_availability', $animal->province_availability) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उपलव्धता राष्ट्रिय</label>
                            <input type="text" name="availability" class="form-control"
                                value="{{ old('availability', $animal->availability) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">प्रती व्यक्ति प्रती बर्ष आवश्यकता</label>
                            <input type="text" name="pbr" class="form-control"
                                value="{{ old('pbr', $animal->pbr) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">राष्ट्रिय उत्पादनमा योगदान</label>
                            <input type="text" name="npc" class="form-control"
                                value="{{ old('npc', $animal->npc) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $animal->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा पशुपंक्षीजन्य पदार्थको बार्षिक उत्पादनको अवस्था
                        ०७७/०७८</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                           
                            <tr>
                                <th>#</th>
                                <th>उत्पादन</th>
                                <th>प्रादेसिक उत्पादन</th>
                                <th>प्रादेसिक उपलव्धता</th>
                                <th>उपलव्धता राष्ट्रिय</th>
                                <th>प्रती व्यक्ति प्रती बर्ष आवश्यकता</th>
                                <th>राष्ट्रिय उत्पादनमा योगदान</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($animals as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->production }}</td>
                                    <td>{{ $item->province_production }}</td>
                                    <td>{{ $item->province_availability }}</td>
                                    <td>{{ $item->availability }}</td>
                                    <td>{{ $item->pbr }}</td>
                                    <td>{{ $item->npc }}</td>
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('animal.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('animal.destroy', $item) }}" method="post"
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
