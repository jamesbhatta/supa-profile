@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>

    <div class="container">
        <div class="card z-depth-0">
            <div class="card-body">
                <div class="col-12">
                    <label class="col-12 text-center font-weight-bold h4 my-5">सुदूरपश्चिममा रहेका कूल विद्यार्थी संख्या विवरण</label>
                    <hr>
                </div>
                <form
                    action="{{ $totalStudent->id ? route('total-student.update', $totalStudent) : route('total-student.store') }}"
                    method="POST" class="form">
                    @csrf
                    @if ($totalStudent->id)
                        @method('put')
                    @endif
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="input-fiscal-year">कक्षा</label>

                            <select name="class" class="form-control" id="">
                                <option value="">कृपया कक्षा चयन गर्नुहोस्</option>
                                @if ($totalStudent->id)
                                    <option value="{{ $totalStudent->class }}">{{ $totalStudent->class }}</option>
                                @endif
                                <option value="०–१ कक्षा">०–१ कक्षा</option>
                                <option value="१–५ कक्षा">१–५ कक्षा</option>
                                <option value="६–८ कक्षा">६–८ कक्षा</option>
                                <option value="९–१० कक्षा">९–१० कक्षा</option>
                                <option value="११–१२ कक्षा">११–१२ कक्षा</option>
                            </select>
                        </div>


                        <div class="alert alert-secondary col-12" role="alert">
                            सामूदायिक विद्यालय
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">छात्रा </label>
                            <input type="text" id="input-fiscal-year" name="g_fmale" class="form-control font-roboto"
                                value="{{ old('g_fmale', $totalStudent->g_fmale) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">छात्र</label>
                            <input type="text" id="input-fiscal-year" name="g_male" class="form-control font-roboto"
                                value="{{ old('g_male', $totalStudent->g_male) }}">
                        </div>



                        <div class="alert alert-secondary col-12" role="alert">
                            संस्थागत विद्यालय
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">छात्रा </label>
                            <input type="text" id="input-fiscal-year" name="p_fmale" class="form-control font-roboto"
                                value="{{ old('p_fmale', $totalStudent->p_fmale) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">छात्र</label>
                            <input type="text" id="input-fiscal-year" name="p_male" class="form-control font-roboto"
                                value="{{ old('p_male', $totalStudent->p_male) }}">
                        </div>



                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $totalStudent->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">आर्थिक वर्षहरु</h1>
                {{-- <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>कक्षा</th>
                            <th>छात्रा</th>
                            <th>छात्र</th>
                            <th>छात्रा</th>
                            <th>छात्र</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($totalStudents as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-roboto">{{ $item->class }}</td>
                                <td class="font-roboto">{{ $item->g_fmale }}</td>
                                <td class="font-roboto">{{ $item->g_male }}</td>
                                <td class="font-roboto">{{ $item->p_fmale }}</td>
                                <td class="font-roboto">{{ $item->p_male }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('total-student.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('total-student.destroy', $item) }}" method="post"
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

        })
    </script>
@endpush
