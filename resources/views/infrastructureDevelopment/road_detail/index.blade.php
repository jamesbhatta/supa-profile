@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण (कि.मि.)
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण (कि.मि.)
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
                            <h4>प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण (कि.मि.)
                            </h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $roadDetail->id ? route('road-detail.update', $roadDetail) : route('road-detail.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($roadDetail->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="select-province-id">सडकको विवरण</label>
                            <input type="text" name="road_detail" class="form-control"
                                value="{{ old('road_detail', $roadDetail->road_detail) }}">
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">प्रदेश १</label>
                            <input type="text" name="province_1" class="form-control"
                                value="{{ old('province_1', $roadDetail->province_1) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">मधेश</label>
                            <input type="text" name="province_2" class="form-control"
                                value="{{ old('province_2', $roadDetail->province_2) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">बागमती</label>
                            <input type="text" name="province_3" class="form-control"
                                value="{{ old('province_3', $roadDetail->province_3) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">गण्डकी</label>
                            <input type="text" name="province_4" class="form-control"
                                value="{{ old('province_4', $roadDetail->province_4) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">लुम्बीनी</label>
                            <input type="text" name="province_5" class="form-control"
                                value="{{ old('province_5', $roadDetail->province_5) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">कर्णाली</label>
                            <input type="text" name="province_6" class="form-control"
                                value="{{ old('province_6', $roadDetail->province_6) }}">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="input-fiscal-year-start">सुदूरपश्चिम</label>
                            <input type="text" name="province_7" class="form-control"
                                value="{{ old('province_7', $roadDetail->province_7) }}">
                        </div>


                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $roadDetail->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">प्रदेश अनुसार प्रदेश र स्थानीय तहको सडक विवरण (कि.मि.)
                    </h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>सडकको विवरण</th>
                                <th>प्रदेश १</th>
                                <th>मधेश</th>
                                <th>बागमती</th>
                                <th>गण्डकी</th>
                                <th>लुम्बीनी</th>
                                <th>कर्णाली</th>
                                <th>सुदूरपश्चिम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roadDetails as $item)
                                <tr>
                                    <td>{{ $item->road_detail }}</td>
                                    <td>{{ $item->province_1 }}</td>
                                    <td>{{ $item->province_2 }}</td>
                                    <td>{{ $item->province_3 }}</td>
                                    <td>{{ $item->province_4 }}</td>
                                    <td>{{ $item->province_5 }}</td>
                                    <td>{{ $item->province_6 }}</td>
                                    <td>{{ $item->province_7 }}</td>
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary" href="{{ route('road-detail.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('road-detail.destroy', $item) }}" method="post"
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
