@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रमुख खाद्यान्न बालीहरुको तुलनात्मक क्षेत्रफल तथा उत्पादन विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">उद्योग ब्यवसाय</li>
                <li class="breadcrumb-item active" aria-current="page">प्रमुख खाद्यान्न बालीहरुको तुलनात्मक क्षेत्रफल तथा उत्पादन विवरण
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
                            <h4>प्रमुख खाद्यान्न बालीहरुको तुलनात्मक क्षेत्रफल तथा उत्पादन विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $mainCrop->id ? route('main-crop.update', $mainCrop) : route('main-crop.store') }}" method="POST"
                    class="form">
                    @csrf
                    @isset($mainCrop->id)
                        @method('PUT')
                    @endisset




                    <div class="row">
                       
                        <div class="form-group col-lg-12">
                            <label for="input-fiscal-year-start">बाली</label>
                            <input type="text" name="crops" class="form-control"
                                value="{{ old('crops', $mainCrop->crops) }}">
                        </div>
                       
                        <div class="col-lg-6 border">
                            <label style="position: relative;top:-10px" class="bg-white px-4">FROM</label>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                <label for="input-fiscal-year-start">क्षेत्रफल हे.</label>
                                <input type="text" name="from_area" class="form-control"
                                    value="{{ old('from_area', $mainCrop->from_area) }}">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="input-fiscal-year-start">उत्पादन</label>
                                <input type="text" name="from_production" class="form-control"
                                    value="{{ old('from_production', $mainCrop->from_production) }}">
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-6 border">
                            <label style="position: relative;top:-10px" class="bg-white px-4">TO</label>
                            <div class="form-group col-lg-12">
                                <label for="input-fiscal-year-start">क्षेत्रफल हे.</label>
                                <input type="text" name="to_area" class="form-control"
                                    value="{{ old('to_area', $mainCrop->to_area) }}">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="input-fiscal-year-start">उत्पादन</label>
                                <input type="text" name="to_production" class="form-control"
                                    value="{{ old('to_production', $mainCrop->to_production) }}">
                            </div>
                        </div>
                       
                        
                    </div>
                   
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $mainCrop->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>

                    

                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रमुख खाद्यान्न बालीहरुको तुलनात्मक क्षेत्रफल तथा उत्पादन विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>बाली</th>
                            <th>क्षेत्रफल हे.</th>
                            <th>उत्पादन</th>
                            <th>क्षेत्रफल हे.</th>
                           <th>उत्पादन</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mainCrops as $item)
                            <tr>
                                <td>{{ $item->crops }}</td>
                                <td>{{ $item->from_area}}</td>
                                <td>{{ $item->from_production}}</td>
                                <td>{{ $item->to_area}}</td>
                                <td>{{ $item->to_production}}</td>
                                
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('main-crop.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('main-crop.destroy', $item) }}" method="post"
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
