@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">ठूला तथा मझौला उद्योगहरुको प्रदेशगत विवरण</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $provinceBusiness->id ? route('province-business.update',$provinceBusiness) : route('province-business.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($provinceBusiness->id)
                        @method('PUT')
                    @endisset


                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" name="province" class="custom-select">
                            @isset($provinceBusiness->id)
                                <option value="{{ $provinceBusiness->province}}" selected>
                                    {{ $provinceBusiness->province}}</option>
                            @else
                                <option value="">प्रदेश छान्नुहोस्</option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">कृषि र वन</label>
                            <input type="text" name="agriculture" class="form-control"
                                value="{{ old('agriculture', $provinceBusiness->agriculture) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">निर्माण</label>
                            <input type="text" name="construction" class="form-control"
                                value="{{ old('construction', $provinceBusiness->construction) }}">
                        </div>
    
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">उर्जा</label>
                            <input type="text" name="energy" class="form-control"
                                value="{{ old('energy', $provinceBusiness->energy) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">सञ्चार</label>
                            <input type="text" name="communication" class="form-control"
                                value="{{ old('communication', $provinceBusiness->communication) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">उत्पादनमा आधारित</label>
                            <input type="text" name="production" class="form-control"
                                value="{{ old('production', $provinceBusiness->production) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">खानी</label>
                            <input type="text" name="mine" class="form-control"
                                value="{{ old('mine', $provinceBusiness->mine) }}">
                        </div>
    
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">सेवा</label>
                            <input type="text" name="service" class="form-control"
                                value="{{ old('service', $provinceBusiness->service) }}">
                        </div>
    
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">पर्यटन</label>
                            <input type="text" name="tourism" class="form-control"
                                value="{{ old('tourism', $provinceBusiness->tourism) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">उद्योगका संख्या</label>
                            <input type="text" name="business" class="form-control"
                                value="{{ old('business', $provinceBusiness->business) }}">
                        </div>
    
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">कूल लगानी (रु.दश लाखमा)</label>
                            <input type="text" name="investment" class="form-control"
                                value="{{ old('investment', $provinceBusiness->investment) }}">
                        </div>
    
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">रोजगारी</label>
                            <input type="text" name="employeement" class="form-control"
                                value="{{ old('employeement', $provinceBusiness->employeement) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $provinceBusiness->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश</th>
                            <th>कृषि र वन</th>
                            <th>निर्माण</th>
                            <th>उर्जा</th>
                            <th>सञ्चार</th>
                            <th>उत्पादनमा आधारित</th>
                            <th>खानी</th>
                            <th>सेवा</th>
                            <th>पर्यटन</th>
                            <th>उद्योगका संख्या</th>
                            <th>कूल लगानी (रु.दश लाखमा)</th>
                            <th>रोजगारी</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinceBusinesses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province}}</td>
                                <td>{{ $item->agriculture}}</td>
                                <td>{{ $item->construction}}</td>
                                <td>{{ $item->energy}}</td>
                                <td>{{ $item->communication}}</td>
                                <td>{{ $item->production}}</td>
                                <td>{{ $item->mine}}</td>
                                <td>{{ $item->service}}</td>
                                <td>{{ $item->tourism}}</td>
                                <td>{{ $item->business}}</td>
                                <td>{{ $item->investment}}</td>
                                <td>{{ $item->employeement}}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('province-business.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('province-business.destroy', $item) }}" method="post"
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
