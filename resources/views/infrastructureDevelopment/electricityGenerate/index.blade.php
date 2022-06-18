@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण
                    (कि.मि.)</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $electricityGenerate->id ? route('elecricity-generate.update', $electricityGenerate) : route('elecricity-generate.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($electricityGenerate->id)
                        @method('PUT')
                    @endisset

                   
                    <div class="form-group">
                        <label for="select-province-id">प्रदेश</label>
                        <select id="select-province-id" name="province" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @isset($electricityGenerate->id)
                                <option value="{{$electricityGenerate->province}}" selected>{{$electricityGenerate->province}}</option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-name">आर्थिक वर्ष</label>
                        <select id="select-province-id" name="fiscal_year" class="custom-select">
                            <option value="">आर्थिक वर्ष छान्नुहोस्</option>
                            @isset($electricityGenerate->id)
                                <option value="{{$electricityGenerate->fiscal_year}}" selected>{{$electricityGenerate->fiscal_year}}</option>
                            @endisset
                            @foreach ($fiscalYears as $fiscalYear)
                                <option value="{{ $fiscalYear->name }}">{{ $fiscalYear->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-fiscal-year-start">बिजुली को मात्रा (मे.वा.)</label>
                        <input type="text" name="quantity" class="form-control"
                            value="{{ old('quantity', $electricityGenerate->quantity) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $electricityGenerate->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण (कि.मि.)  </h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश</th>
                            <th>आर्थिक वर्ष</th>
                            <th>बिजुली को मात्रा (मे.वा.)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($electricityGenerates as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->fiscal_year}}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('elecricity-generate.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('elecricity-generate.destroy', $item) }}" method="post"
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
