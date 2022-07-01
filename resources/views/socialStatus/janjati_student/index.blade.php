@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">जिल्लागत जनजाती विद्यार्थी संख्या विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">सामाजिक विकास</li>
                <li class="breadcrumb-item active" aria-current="page">जिल्लागत जनजाती विद्यार्थी संख्या विवरण
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
                            <h4>जिल्लागत जनजाती विद्यार्थी संख्या विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form
                    action="{{ $janjatiStudent->id ? route('janjati-student.update', $janjatiStudent) : route('janjati-student.store') }}"
                    method="POST" class="form">
                    @csrf
                    @if ($janjatiStudent->id)
                        @method('put')
                    @endif

                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" class="custom-select">

                            <option value="">प्रदेश छान्नुहोस्</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district" id="select-district-id" class="custom-select">
                            @isset($janjatiStudent->id)
                                <option value="{{ $janjatiStudent->district }}" selected>{{ $janjatiStudent ->district }}</option>
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

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="select-district-id">कक्षा</label>
                            <select name="class" id="" class="custom-select">
                                @isset($janjatiStudent->id)
                                    <option value="{{ $janjatiStudent->class }}" selected>{{ $janjatiStudent->class }}</option>
                                @else
                                    <option value="">कृपया कक्षा चयन गर्नुहोस्</option>
                                @endisset

                                <option value="१–१२ कक्षा">१–१२ कक्षा</option>
                                <option value="१–५ कक्षा">१–५ कक्षा</option>
                                <option value="६–८ कक्षा">६–८ कक्षा</option>
                                <option value="९–१० कक्षा">९–१० कक्षा</option>
                                <option value="११–१२ कक्षा">११–१२ कक्षा</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">छात्रा </label>
                            <input type="text" id="input-fiscal-year" name="female" class="form-control font-roboto"
                                value="{{ old('female', $janjatiStudent->female) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">छात्रा </label>
                            <input type="text" id="input-fiscal-year" name="male" class="form-control font-roboto"
                                value="{{ old('male', $janjatiStudent->male) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $janjatiStudent->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>

                </form>

            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">जिल्लागत जनजाती विद्यार्थी संख्या विवरण</h1>
                {{-- <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>

                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>कक्षा</th>
                            <th>छात्रा</th>
                            <th>छात्र</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($janjatiStudents as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-roboto">{{ $item->district }}</td>
                                <td class="font-roboto">{{ $item->class }}</td>
                                <td class="font-roboto">{{ $item->female }}</td>
                                <td class="font-roboto">{{ $item->male }}</td>

                                <td>
                                    <a class="action-btn text-primary" href="{{ route('janjati-student.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('janjati-student.destroy', $item) }}" method="post"
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
                                <td colspan="10">
                                    <div>
                                        <svg id="Layer_1" enable-background="new 0 0 512 512" height="40"
                                            fill="#fefefe" viewBox="0 0 512 512" width="50"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3">
                                        डाटाबेसमा कुनै डाटा छैन |
                                    </div>
                                </td>

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
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }
            $('#select-province-id').change(function() {
                filterOptions($(this).val(), '#select-district-id option', 'province-id');
            });
        })
    </script>
@endpush
