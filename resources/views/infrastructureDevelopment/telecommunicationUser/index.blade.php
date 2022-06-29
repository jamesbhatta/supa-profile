@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा सञ्चार सेवा उपभोगकर्ताका संख्याविवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">पूर्वाधार विकास</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा सञ्चार सेवा उपभोगकर्ताका संख्याविवरण
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
                            <h4>सुदूरपश्चिममा सञ्चार सेवा उपभोगकर्ताका संख्याविवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $telecomunication->id ? route('telecomunication.update', $telecomunication) : route('telecomunication.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($telecomunication->id)
                        @method('PUT')
                    @endisset




                    <div class="form-group">
                        <label for="input-fiscal-year-start">विवरण</label>
                        <input type="text" name="detail" class="form-control"
                            value="{{ old('detail', $telecomunication->detail) }}">
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        मिति
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">सुरुको मिति</label>
                            <input type="text" name="date_from" id="input-fiscal-year-start"
                                class="form-control fiscal-year-date"
                                value="{{ old('date_from', $telecomunication->date_from) }}"
                                placeholder="Nepali YYYY-MM-DD">


                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">अन्तिम मिति</label>
                            <input type="text" name="date_to" id="input-fiscal-year-end"
                                class="form-control fiscal-year-date"
                                value="{{ old('date_to', $telecomunication->date_to) }}" placeholder="Nepali YYYY-MM-DD">

                        </div>
                    </div>

                    <div class="alert alert-secondary" role="alert">
                        सञ्चार सेवा उपभोगकर्ताका संख्या
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">From</label>
                            <input type="text" name="users_from" class="form-control"
                                value="{{ old('users_from', $telecomunication->users_from) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-fiscal-year-start">To</label>
                            <input type="text" name="users_to" class="form-control"
                                value="{{ old('users_to', $telecomunication->users_to) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $telecomunication->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा सञ्चार सेवा उपभोगकर्ताका संख्या विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>विवरण</th>
                            <th>From</th>
                            <th>To</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($telecomunications as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->detail }}</td>
                                <td>{{ $item->users_from }}</td>
                                <td>{{ $item->users_to }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('telecomunication.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('telecomunication.destroy', $item) }}" method="post"
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
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush
