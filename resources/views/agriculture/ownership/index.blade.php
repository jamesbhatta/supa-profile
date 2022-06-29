@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेशमा भू – स्वामित्वको अवस्था</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेशमा भू – स्वामित्वको अवस्था
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
                            <h4>प्रदेशमा भू – स्वामित्वको अवस्था</h4>
                        </nav>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form action="{{ $ownership->id ? route('ownership.update', $ownership) : route('ownership.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($ownership->id)
                        @method('PUT')
                    @endisset



                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">जग्गाको स्वामित्व सम्बन्धि विवरण</label>
                            <input type="text" name="ownership_detail" class="form-control"
                                value="{{ old('ownership_detail', $ownership->ownership_detail) }}">
                        </div>
    
                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">घरपरिवार संख्या</label>
                            <input type="text" name="family_number" class="form-control"
                                value="{{ old('family_number', $ownership->family_number) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $ownership->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेशमा भू – स्वामित्वको अवस्था</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>जग्गाको स्वामित्व सम्बन्धि विवरण</th>
                            <th>घरपरिवार संख्या</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ownerships as $item)
                            <tr>
                                <td>{{ $item->ownership_detail }}</td>
                                <td>{{ $item->family_number }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('ownership.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('ownership.destroy', $item) }}" method="post"
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
