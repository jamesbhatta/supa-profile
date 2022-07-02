@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">आर्थिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</li>
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
                            <h4>प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $sahakari->id ? route('sahakari.update', $sahakari) : route('sahakari.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($sahakari->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-name">जिल्ला</label>
                            <select name="district" class="form-control" id="">
                                <option value="">कृपया जिल्ला चयन गर्नुहोस्</option>
                                @isset($sahakari->id)
                                    <option value="{{ $sahakari->district }}" selected>{{ $sahakari->district }}
                                    </option>
                                @endisset
                                @foreach ($districts as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        {{-- <div class="form-group col-lg-4">
                            <label for="input-name">बेरोजगारी</label>
                            <input type="number" name="bahu_udesye" class="form-control"
                                value="{{ old('bahu_udesye', $sahakari->bahu_udesye) }}">
                        </div> --}}
                        <div class="form-group col-lg-4">
                            <label for="input-name">बहुउद्देश्यीय</label>
                            <input type="number" name="bahu_udesye" class="form-control"
                                value="{{ old('bahu_udesye', $sahakari->bahu_udesye) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">कृषि</label>
                            <input type="number" name="agriculture" class="form-control"
                                value="{{ old('agriculture', $sahakari->agriculture) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">ऋण तथा बचत</label>
                            <input type="number" name="loan" class="form-control"
                                value="{{ old('loan', $sahakari->loan) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">स्वास्थ्य</label>
                            <input type="number" name="helth" class="form-control"
                                value="{{ old('helth', $sahakari->helth) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">सञ्चार</label>
                            <input type="number" name="tele_comunication" class="form-control"
                                value="{{ old('tele_comunication', $sahakari->tele_comunication) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">विधुत</label>
                            <input type="number" name="electricity" class="form-control"
                                value="{{ old('electricity', $sahakari->electricity) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">जडिबुटी</label>
                            <input type="number" name="jadibuti" class="form-control"
                                value="{{ old('jadibuti', $sahakari->jadibuti) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">वतावरण संरक्षण</label>
                            <input type="number" name="batabaran" class="form-control"
                                value="{{ old('batabaran', $sahakari->batabaran) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">प्रकाशन</label>
                            <input type="number" name="prakasan" class="form-control"
                                value="{{ old('prakasan', $sahakari->prakasan) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">अन्य</label>
                            <input type="number" name="other" class="form-control"
                                value="{{ old('other', $sahakari->other) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $sahakari->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>बहुउद्देश्यीय</th>
                            <th>कृषि</th>
                            <th>ऋण तथा बचत</th>
                            <th>स्वास्थ्य</th>
                            <th>सञ्चार</th>
                            <th>विधुत</th>
                            <th>जडिबुटी</th>
                            <th>वतावरण संरक्षण</th>
                            <th>प्रकाशन</th>
                            <th>अन्य</th>
                            <th>जम्मा</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sahakaris as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->bahu_udesye}}</td>
                                <td>{{ $item->agriculture }}</td>
                                <td>{{ $item->loan }}</td>
                                <td>{{ $item->helth }}</td>
                                <td>{{ $item->tele_comunication }}</td>
                                <td>{{ $item->electricity }}</td>
                                <td>{{ $item->jadibuti }}</td>
                                <td>{{ $item->batabaran }}</td>
                                <td>{{ $item->prakasan }}</td>
                                <td>{{ $item->other }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('sahakari.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('sahakari.destroy', $item) }}" method="post"
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
