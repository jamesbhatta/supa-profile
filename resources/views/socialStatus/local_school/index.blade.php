@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा रहेका स्थानीय तहको विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा रहेका स्थानीय तहको विवरण</li>
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
                            <h4>सुदूरपश्चिममा रहेका स्थानीय तहको विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $localSchool->id ? route('local-school.update',$localSchool) : route('local-school.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($localSchool->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-12">
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
                        <div class="form-group col-12">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district_id" id="select-district-id" class="custom-select">
                                @isset($localSchool->id)
                                <option value="{{ $localSchool->district->id }}" selected>{{ $localSchool->district->name }}</option>
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
                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">विद्यालयको नाम</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $localSchool->name) }}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">सञ्चालित कार्यक्रम</label>
                            <input type="text" name="program" class="form-control"
                                value="{{ old('program', $localSchool->program) }}">
                        </div>

                        
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $localSchool->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा रहेका स्थानीय तहको विवरण</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>जिल्ला</th>
                                <th>नमूना विद्यालयको नाम</th>
                                <th>सञ्चालित कार्यक्रम</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($localSchools as $item)
                                <tr>
                                    <td>{{ $item->district->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->program }}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('local-school.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('local-school.destroy', $item) }}" method="post"
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
