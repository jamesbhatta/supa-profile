@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">व्यवसायिक उत्पादनमा अगाडी बढेका बाली र पकेट क्षेत्रहरुको जिल्लागत विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">उद्योग ब्यवसाय</li>
                <li class="breadcrumb-item active" aria-current="page">व्यवसायिक उत्पादनमा अगाडी बढेका बाली र पकेट क्षेत्रहरुको जिल्लागत विवरण
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
                            <h4>व्यवसायिक उत्पादनमा अगाडी बढेका बाली र पकेट क्षेत्रहरुको जिल्लागत विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $crop->id ? route('crop.update', $crop) : route('crop.store') }}" method="POST"
                    class="form">
                    @csrf
                    @isset($crop->id)
                        @method('PUT')
                    @endisset




                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                                @isset($municipality->district->province)
                                <option value="{{ $municipality->district->province->id }}" selected>{{ $municipality->district->province->name }}</option>
                                @else
                                <option value="">प्रदेश छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district_id" id="select-district-id" class="custom-select">
                                @isset($crop->district)
                                <option value="{{ $crop->district->id }}" selected>{{ $crop->district->name }}</option>
                                @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                @foreach($province->districts as $district)
                                <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">बालीको नाम</label>
                            <input type="text" name="crops" class="form-control"
                                value="{{ old('crops', $crop->crops) }}">
                        </div>
                       

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">स्थानीय तह, क्षेत्र</label>
                            <input type="text" name="area" class="form-control"
                                value="{{ old('area', $crop->area) }}">
                        </div>
                        
                    </div>
                   
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $crop->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>

                    

                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">व्यवसायिक उत्पादनमा अगाडी बढेका बाली र पकेट क्षेत्रहरुको जिल्लागत विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>बालीको नाम</th>
                            <th>स्थानीय तह, क्षेत्र</th>
                           
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($crops as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->crops}}</td>
                                <td>{{ $item->area}}</td>
                                
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('crop.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('crop.destroy', $item) }}" method="post"
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
