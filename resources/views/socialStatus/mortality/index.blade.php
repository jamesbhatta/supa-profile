@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">कूल प्रजनन् दर, जन्मको अबस्थाको सरदर आयु,मृत्यूदर (Mortality) बारे मा संक्षिप्त विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">सामाजिक विकास</li>
                <li class="breadcrumb-item active" aria-current="page">कूल प्रजनन् दर, जन्मको अबस्थाको सरदर आयु,मृत्यूदर (Mortality) बारे मा संक्षिप्त विवरण
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
                            <h4>कूल प्रजनन् दर, जन्मको अबस्थाको सरदर आयु,मृत्यूदर (Mortality) बारे मा संक्षिप्त विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form
                    action="{{ $mortality->id ? route('mortality.update', $mortality) : route('mortality.store') }}"
                    method="POST" class="form">
                    @csrf
                    @if ($mortality->id)
                        @method('put')
                    @endif
                    


                    

                    <div class="row">
                        
                        
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">विवरण</label>
                            <input type="text" id="input-fiscal-year" name="detail" class="form-control font-roboto"
                                value="{{ old('detail', $mortality->detail) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">राष्ट्रिय अबस्था</label>
                            <input type="text" id="input-fiscal-year" name="national" class="form-control font-roboto"
                                value="{{ old('national', $mortality->national) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">प्रदेश अबस्था</label>
                            <input type="text" id="input-fiscal-year" name="provincenal" class="form-control font-roboto"
                                value="{{ old('provincenal', $mortality->provincenal) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">सूचनाको श्रोत</label>
                            <input type="text" id="input-fiscal-year" name="source" class="form-control font-roboto"
                                value="{{ old('source', $mortality->source) }}">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $mortality->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>

                </form>

            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">कूल प्रजनन् दर, जन्मको अबस्थाको सरदर आयु,मृत्यूदर (Mortality) बारे मा संक्षिप्त विवरण</h1>
                {{-- <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="1"></th>
                            <th colspan="2" class="border">अबस्था</th>
                        </tr>
                        <tr>
                            <th>विवरण</th>
                            <th>राष्ट्रिय</th>
                            <th>प्रदेश</th>
                            <th>सूचनाको श्रोत</th>
                            <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @forelse ($mortalitys as $item)
                            <tr>
                                <td class="font-roboto">{{ $item->detail }}</td>
                                <td class="font-roboto">{{ $item->national }}</td>
                                <td class="font-roboto">{{ $item->provincenal }}</td>
                                <td class="font-roboto">{{ $item->source }}</td>
                                 <td>
                                    <a class="action-btn text-primary" href="{{ route('mortality.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('mortality.destroy', $item) }}" method="post"
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
