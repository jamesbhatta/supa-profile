@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिमका प्रमुख हिउँदे बालीको क्षेत्रफल, उत्पादन र उत्पादकत्व</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिमका प्रमुख हिउँदे बालीको क्षेत्रफल, उत्पादन र उत्पादकत्व
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
                            <h4>सुदूरपश्चिमका प्रमुख हिउँदे बालीको क्षेत्रफल, उत्पादन र उत्पादकत्व</h4>
                        </nav>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form action="{{ $bali->id ? route('winter-crop.update', $bali) : route('winter-crop.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($bali->id)
                        @method('PUT')
                    @endisset



                    <div class="row">
                        <div class="form-group col-12">
                            <label for="input-fiscal-year-start">बाली</label>
                            <input type="text" name="crops" class="form-control"
                                value="{{ old('crops', $bali->crops) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">क्षेत्रफल हे.</label>
                            <input type="text" name="area1" class="form-control"
                                value="{{ old('area1', $bali->area1) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उत्पादन/अनुमानित मे.ट.</label>
                            <input type="text" name="production1" class="form-control"
                                value="{{ old('production1', $bali->production1) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उत्पादकत्व मे.ट.</label>
                            <input type="text" name="productivity1" class="form-control"
                                value="{{ old('productivity1', $bali->productivity1) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">क्षेत्रफल</label>
                            <input type="text" name="area2" class="form-control"
                                value="{{ old('area2', $bali->area2) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उत्पादन/अनुमानित मे.ट.</label>
                            <input type="text" name="production2" class="form-control"
                                value="{{ old('production2', $bali->production2) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उत्पादकत्व मे.ट.</label>
                            <input type="text" name="productivity2" class="form-control"
                                value="{{ old('productivity2', $bali->productivity2) }}">
                        </div>
                        <input type="hidden" name="type" value="hiudeBali">
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $bali->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिमका प्रमुख हिउँदे बालीको क्षेत्रफल, उत्पादन र उत्पादकत्व
                </h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>बाली</th>
                            <th>क्षेत्रफल हे.</th>
                            <th>उत्पादन/अनुमानित मे.ट.</th>
                            <th>उत्पादकत्व मे.ट.</th>
                            <th>क्षेत्रफल हे.</th>
                            <th>उत्पादन/अनुमानित मे.ट.</th>
                            <th>उत्पादकत्व मे.ट.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($balis as $item)
                            <tr>
                                <td>{{ $item->crops }}</td>
                                <td>{{ $item->area1 }}</td>
                                <td>{{ $item->production1 }}</td>
                                <td>{{ $item->productivity1 }}</td>
                                <td>{{ $item->area2 }}</td>
                                <td>{{ $item->production2 }}</td>
                                <td>{{ $item->productivity2 }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('winter-crop.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('winter-crop.destroy', $item) }}" method="post"
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
