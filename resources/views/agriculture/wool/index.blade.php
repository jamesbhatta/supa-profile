@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा बार्षिक उन उत्पादनको अवस्था ०७७/०७८</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा बार्षिक उन उत्पादनको अवस्था ०७७/०७८</li>
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
                            <h4>सुदूरपश्चिममा बार्षिक उन उत्पादनको अवस्था ०७७/०७८</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $wool->id ? route('wool-production.update', $wool) : route('wool-production.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($wool->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">

                                <option value="" selected>प्रदेश छान्नुहोस्</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($wool->id)
                                    <option value="{{ $wool->district }}" selected>
                                        {{ $wool->district }}</option>
                                @else
                                    <option value="" selected>जिल्ला छान्नुहोस्</option>
                                @endisset

                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">भेडा</label>
                            <input type="text" name="sheep" class="form-control"
                                value="{{ old('sheep', $wool->sheep) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">उन उत्पादन किले</label>
                            <input type="text" name="wool" class="form-control"
                                value="{{ old('wool', $wool->wool) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $wool->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">

            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा बार्षिक उन उत्पादनको अवस्था ०७७/०७८</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>जिल्ला</th>
                                <th>भेडा</th>
                                <th>उन उत्पादन किले</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wools as $item)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->sheep }}</td>
                                    <td>{{ $item->wool }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('wool-production.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('wool-production.destroy', $item) }}" method="post"
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
