@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रेस काउन्सिलमा दर्ता भएका सुदूरपश्चिमका पत्रपत्रिकाहरु</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">पूर्वाधार विकास</li>
                <li class="breadcrumb-item active" aria-current="page">प्रेस काउन्सिलमा दर्ता भएका सुदूरपश्चिमका पत्रपत्रिकाहरु
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
                            <h4>प्रेस काउन्सिलमा दर्ता भएका सुदूरपश्चिमका पत्रपत्रिकाहरु</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ $newsPaper->id ? route('news-paper.update', $newsPaper) : route('news-paper.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($newsPaper->id)
                        @method('PUT')
                    @endisset


                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district" id="select-district-id" class="custom-select">
                            @isset($newsPaper->id)
                                <option value="{{ $newsPaper->district }}" selected>
                                    {{ $newsPaper->district }}</option>
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
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">दैनिक</label>
                            <input type="text" name="daily" class="form-control"
                                value="{{ old('daily', $newsPaper->daily) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">अर्ध साप्ताहिक </label>
                            <input type="text" name="half_weakly" class="form-control"
                                value="{{ old('half_weakly', $newsPaper->half_weakly) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">साप्ताहिक</label>
                            <input type="text" name="weakly" class="form-control"
                                value="{{ old('weakly', $newsPaper->weakly) }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-fiscal-year-start">पाक्षिक</label>
                            <input type="text" name="fortnightly" class="form-control"
                                value="{{ old('fortnightly', $newsPaper->fortnightly) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">मासिक</label>
                            <input type="text" name="monthly" class="form-control"
                                value="{{ old('monthly', $newsPaper->monthly) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">द्धैमासिक</label>
                            <input type="text" name="monthly_twise" class="form-control"
                                value="{{ old('monthly_twise', $newsPaper->monthly_twise) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">त्रैमासिक</label>
                            <input type="text" name="monthly_thirds" class="form-control"
                                value="{{ old('monthly_thirds', $newsPaper->monthly_thirds) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $newsPaper->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रेस काउन्सिलमा दर्ता भएका सुदूरपश्चिमका पत्रपत्रिकाहरु</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>दैनिक</th>
                            <th>अर्ध साप्ताहिक</th>
                            <th>साप्ताहिक</th>
                            <th>पाक्षिक</th>
                            <th>मासिक</th>
                            <th>द्धैमासिक</th>
                            <th>त्रैमासिक</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($newsPapers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->daily }}</td>
                                <td>{{ $item->half_weakly }}</td>
                                <td>{{ $item->weakly }}</td>
                                <td>{{ $item->fortnightly }}</td>
                                <td>{{ $item->monthly }}</td>
                                <td>{{ $item->monthly_twise }}</td>
                                <td>{{ $item->monthly_thirds }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('news-paper.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('news-paper.destroy', $item) }}" method="post"
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
