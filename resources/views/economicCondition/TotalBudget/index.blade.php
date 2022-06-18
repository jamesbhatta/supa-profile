@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>

    <div class="container">
        <div class="card z-depth-0">
            <div class="card-body">
                <div class="col-12">
                    <label class="col-12 text-center font-weight-bold h4 my-5">सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था</label>
                    <hr>
                </div>
                <form
                    action="{{ $totalBudget->id ? route('total-budget.update', $totalBudget) : route('total-budget.store') }}"
                    method="POST" class="form">
                    @csrf
                    @if ($totalBudget->id)
                        @method('put')
                    @endif
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="input-fiscal-year">आर्थिक वर्ष</label>
                            <select name="fiscal_year" class="form-control" id="">
                                <option value=""></option>
                                @isset($totalBudget->id)
                                    <option value="{{$totalBudget->fiscal_year}}" selected>{{$totalBudget->fiscal_year}}</option>
                                @endisset
                                @foreach ($fiscalYear as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="alert alert-secondary col-12" role="alert">
                            बजेट (रु. हजारमा)
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">चालु</label>
                            <input type="text" id="input-fiscal-year" name="running_budget" class="form-control font-roboto"
                                value="{{ old('running_budget', $totalBudget->running_budget) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">पुँजीगत</label>
                            <input type="text" id="input-fiscal-year" name="capitalize_budget" class="form-control font-roboto"
                                value="{{ old('capitalize_budget', $totalBudget->capitalize_budget) }}">
                        </div>


                        <div class="alert alert-secondary col-12" role="alert">
                            खर्च (रु. हजारमा)
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">चालु</label>
                            <input type="text" id="input-fiscal-year" name="running_expenses" class="form-control font-roboto"
                                value="{{ old('running_expenses', $totalBudget->running_expenses) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">चालु प्रतिशत</label>
                            <input type="text" id="input-fiscal-year" name="running_expenses_percentage" class="form-control font-roboto"
                                value="{{ old('running_expenses_percentage', $totalBudget->running_expenses_percentage) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">पुँजीगत</label>
                            <input type="text" id="input-fiscal-year" name="capitalize_expenses" class="form-control font-roboto"
                                value="{{ old('capitalize_expenses', $totalBudget->capitalize_expenses) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">पुँजीगत प्रतिशत</label>
                            <input type="text" id="input-fiscal-year" name="capitalize_expenses_percentage" class="form-control font-roboto"
                                value="{{ old('capitalize_expenses_percentage', $totalBudget->capitalize_expenses_percentage) }}">
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $totalBudget->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशको कूल बजेट र खर्चको अवस्था</h1>
                {{-- <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>आर्थिक वर्ष</th>
                            <th>चालु</th>
                            <th>पुँजीगत</th>
                            <th>चालु</th>
                            <th>चालु प्रतिशत</th>
                            <th>पुँजीगत</th>
                            <th>पुँजीगत प्रतिशत</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($totalBudgets as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-roboto">{{ $item->fiscal_year }}</td>
                                <td class="font-roboto">{{ $item->running_budget }}</td>
                                <td class="font-roboto">{{ $item->capitalize_budget }}</td>
                                <td class="font-roboto">{{ $item->running_expenses }}</td>
                                <td class="font-roboto">{{ $item->running_expenses_percentage }}</td>
                                <td class="font-roboto">{{ $item->capitalize_expenses }}</td>
                                <td class="font-roboto">{{ $item->capitalize_expenses_percentage }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('total-budget.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('total-budget.destroy', $item) }}" method="post"
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
