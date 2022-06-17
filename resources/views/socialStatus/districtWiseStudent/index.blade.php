@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">राजश्व बाँडफाँड (रु.दश लाखमा)</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $districtStudent->id ? route('district-student.update', $districtStudent) : route('district-student.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($districtStudent->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-12">
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
                        <div class="form-group col-12">
                            <label for="select-district-id">जिल्ला</label>
                            <select name="district" id="select-district-id" class="custom-select">
                                @isset($districtStudent->id)
                                    <option value="{{ $districtStudent->district }}" selected>{{ $districtStudent->district }}
                                    </option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach ($provinces as $province)
                                    @foreach ($province->districts as $district)
                                        <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="select-district-id">कक्षा</label>
                            <select name="class" class="custom-select">

                                @isset($districtStudent->id)
                                    <option value="{{ $districtStudent->class }}" selected>
                                        {{ $districtStudent->class}}</option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                <option value="१–१२ कक्षा">१–१२ कक्षा</option>
                                <option value="१–१२ कक्षा">१–५ कक्षा</option>
                                <option value="१–१२ कक्षा">६–८ कक्षा</option>
                                <option value="१–१२ कक्षा">९–१० कक्षा</option>
                                <option value="१–१२ कक्षा">११–१२ कक्षा</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-name">छात्रा</label>
                            <input type="text" id="input-name" name="female" class="form-control"
                                autocomplete="off"
                                value="{{ old('female', $districtStudent->female) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">छात्र</label>
                            <input type="text" id="input-name" name="male" class="form-control"
                                autocomplete="off"
                                value="{{ old('male', $districtStudent->male) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $districtStudent->id ? 'Update' : 'सेभ गर्नुहोस्' }}
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
                            <th>राजश्व बाँडफाँड (रु.दश लाखमा)</th>
                            <th>प्रतिशत</th>
                            <th>स्थानीय तह</th>
                            <th>स्थानीय तहमा राजश्व बाँडफाँड (रु.दश लाखमा)</th>
                            <th>स्थानीय तहमा राजश्व बाँडफाँड प्रतिशत</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($districtStudents as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->class }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->male }}</td>
                                <td>{{ $item->female }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('district-student.edit', $item) }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('district-student.destroy', $item) }}" method="post"
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
