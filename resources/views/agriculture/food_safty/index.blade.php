@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा खाद्य सुरक्षाको अवस्था</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा खाद्य सुरक्षाको अवस्था</li>
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
                            <h4>सुदूरपश्चिममा खाद्य सुरक्षाको अवस्था</h4>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <form action="{{ $foodSafty->id ? route('food-safety.update', $foodSafty) : route('food-safety.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($foodSafty->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                                @isset($municipality->district->province)
                                    <option value="{{ $municipality->district->province->id }}" selected>
                                        {{ $municipality->district->province->name }}</option>
                                @else
                                    <option value="">प्रदेश छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($foodSafty->district)
                                    <option value="{{ $foodSafty->district }}" selected>
                                        {{ $foodSafty->district }}</option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उपभोग्य खाद्यान्न</label>
                            <input type="number" name="usable_food" class="form-control"
                                value="{{ old('usable_food', $foodSafty->usable_food) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">आवश्यक खाद्यान्न</label>
                            <input type="number" name="required_food" class="form-control"
                                value="{{ old('required_food', $foodSafty->required_food) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">वचत वा न्यून</label>
                            <input type="number" name="safe_food" class="form-control"
                                value="{{ old('safe_food', $foodSafty->safe_food) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $foodSafty->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा खाद्य सुरक्षाको अवस्था</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>जिल्ला</th>
                                <th>प्उपभोग्य खाद्यान्न</th>
                                <th>आवश्यक खाद्यान्न</th>
                                <th>वचत वा न्यून</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($foodSaftys as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->usable_food }}</td>
                                    <td>{{ $item->required_food }}</td>
                                    <td>{{ $item->safe_food }}</td>
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('food-safety.edit', $item) }}"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('food-safety.destroy', $item) }}" method="post"
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
