@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="{{ $fiscalYear->id ? route('fiscal-year.update', $fiscalYear) : route('fiscal-year.store') }}" method="POST" class="form">
                        @csrf
                        @if($fiscalYear->id)
                        @method('put')
                        @endif
                        <div class="form-group">
                            <label for="input-fiscal-year">आर्थिक वर्ष</label>
                            <input type="text" id="input-fiscal-year" name="name" class="form-control font-roboto" value="{{ old('name', $fiscalYear->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="input-fiscal-year-start">सुरु मिति</label>
                            <input type="text" name="start" id="input-fiscal-year-start" class="form-control fiscal-year-date" value="{{ old('start', $fiscalYear->start) }}" placeholder="Nepali YYYY-MM-DD">
                        </div>
                        <div class="form-group">
                            <label for="input-fiscal-year-end">समाप्त मिति</label>
                            <input type="text" name="end" id="input-fiscal-year-end" class="form-control fiscal-year-date" value="{{ old('end', $fiscalYear->end) }}" placeholder="Nepali YYYY-MM-DD">
                        </div>
                        <div class="form-group">
                            <select name="is_running" id="" class="custom-select">
                                <option value="0" @if(!old('is_running', $fiscalYear->is_running) == 1) selected @endif>निस्क्रिय </option>
                                <option value="1" @if(old('is_running', $fiscalYear->is_running) == 1) selected @endif>सक्रिय</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">{{ $fiscalYear->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">आर्थिक वर्षहरु</h1>
            <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>आर्थिक वर्ष</th>
                        <th>सुरु मिति</th>
                        <th>समाप्त मिति</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fiscalYears as $fiscalYear)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="font-roboto">{{ $fiscalYear->name }}</td>
                        <td class="font-roboto">{{ $fiscalYear->start }}</td>
                        <td class="font-roboto">{{ $fiscalYear->end }}</td>
                        <td class="text-success font-weight-bold">
                            @if($fiscalYear->is_running) सक्रिय @endif
                        </td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('fiscal-year.index', $fiscalYear) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('fiscal-year.destroy', $fiscalYear) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center font-italic">
                        <td colspan="10">
                            <div>
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="40" fill="#fefefe" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" /></svg>
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
