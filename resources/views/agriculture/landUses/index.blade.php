@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">भू – उपयोगको अवस्था</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">भौगोलिक तथा राजनीतिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">भू – उपयोगको अवस्था</li>
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
                            <h4> नयाँ भू – उपयोगको अवस्था थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ $landUses->id ? route('land-uses.update', $landUses) : route('land-uses.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($landUses->id)
                        @method('PUT')
                    @endisset



                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">क्षेत्र</label>
                            <input type="text" name="sector" class="form-control"
                                value="{{ old('sector', $landUses->sector) }}">
                        </div>
    
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">नेपालको क्षेत्रफल (हे. हजारमा) </label>
                            <input type="number" name="npl_area" class="form-control"
                                value="{{ old('npl_area', $landUses->npl_area) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">सुदूरपश्चिमको क्षेत्रफल(हे.हजारमा)</label>
                            <input type="text" name="supa_area" class="form-control"
                                value="{{ old('supa_area', $landUses->supa_area) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $landUses->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">भू – उपयोगको अवस्था</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्षेत्र</th>
                            <th>नेपालको क्षेत्रफल (हे. हजारमा)</th>
                            <th>सुदूरपश्चिमको क्षेत्रफल(हे.हजारमा)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($landUsess as $item)
                            <tr>
                                <td>{{ $item->sector }}</td>
                                <td>{{ $item->npl_area }}</td>
                                <td>{{ $item->supa_area }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('land-uses.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('land-uses.destroy', $item) }}" method="post"
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
