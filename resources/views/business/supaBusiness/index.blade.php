@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">सुदूरपश्चिमका दर्ता भएका कूल साना उद्योगहरुको
                    विवरण</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $supaBusiness->id ? route('supa-business.update', $supaBusiness) : route('supa-business.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($supaBusiness->id)
                        @method('PUT')
                    @endisset

                    <div class="form-group">
                        <label for="input-fiscal-year-start">वर्गिकरण</label>
                        <input type="text" name="type" class="form-control"
                            value="{{ old('type', $supaBusiness->type) }}">
                    </div>

                    <div class="row">
                        <div class="col-md-4 border">
                            <h5 class="text-center p-3 font-weight-bold border-bottom">लघु</h5>
                            <div class="form-group">
                                <label for="input-fiscal-year-start">संख्या</label>
                                <input type="text" name="laghu_quantity" class="form-control"
                                    value="{{ old('laghu_quantity', $supaBusiness->laghu_quantity) }}">
                            </div>

                            <div class="form-group">
                                <label for="input-fiscal-year-start">कुलपुँजी</label>
                                <input type="text" name="laghu_capital" class="form-control"
                                    value="{{ old('laghu_capital', $supaBusiness->laghu_capital) }}">
                            </div>
                        </div>
                        <div class="col-md-4 border">
                            <h5 class="text-center p-3 font-weight-bold border-bottom">घरेलु</h5>
                            <div class="form-group">
                                <label for="input-fiscal-year-start">संख्या</label>
                                <input type="text" name="gahrelu_quantity" class="form-control"
                                    value="{{ old('gahrelu_quantity', $supaBusiness->gahrelu_quantity) }}">
                            </div>

                            <div class="form-group">
                                <label for="input-fiscal-year-start">कुलपुँजी</label>
                                <input type="text" name="gharelu_capital" class="form-control"
                                    value="{{ old('gharelu_capital', $supaBusiness->gharelu_capital) }}">
                            </div>
                        </div>
                        <div class="col-md-4 border">
                            <h5 class="text-center p-3 font-weight-bold border-bottom">साना</h5>
                            <div class="form-group">
                                <label for="input-fiscal-year-start">संख्या</label>
                                <input type="text" name="sana_quantity" class="form-control"
                                    value="{{ old('sana_quantity', $supaBusiness->sana_quantity) }}">
                            </div>

                            <div class="form-group">
                                <label for="input-fiscal-year-start">कुलपुँजी</label>
                                <input type="text" name="sana_capital" class="form-control"
                                    value="{{ old('sana_capital', $supaBusiness->sana_capital) }}">
                            </div>
                        </div>




                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $supaBusiness->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="thead-light">
                            <th colspan="2"></th>
                            <th colspan="2">लघु</th>
                            <th colspan="2">घरेलु</th>
                            <th colspan="2">साना</th>
                            <th colspan="1"></th>
                        </tr>
                        <tr>
                            <th>क्र.स.</th>
                            <th>वर्गिकरण</th>
                            <th>संख्या</th>
                            <th>कुलपुँजी</th>
                            <th>संख्या</th>
                            <th>कुलपुँजी</th>
                            <th>संख्या</th>
                            <th>कुलपुँजी</th>
                           
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supaBusinesses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->laghu_quantity }}</td>
                                <td>{{ $item->laghu_capital }}</td>
                                <td>{{ $item->gahrelu_quantity }}</td>
                                <td>{{ $item->gharelu_capital }}</td>
                                <td>{{ $item->sana_quantity }}</td>
                                <td>{{ $item->sana_capital }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('supa-business.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('supa-business.destroy', $item) }}" method="post"
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
