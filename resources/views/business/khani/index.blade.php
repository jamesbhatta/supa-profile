@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा रहेका मुख्य खानीको विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">उद्योग ब्यवसाय</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा रहेका मुख्य खानीको विवरण
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
                            <h4>सुदूरपश्चिममा रहेका मुख्य खानीको विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ $miles->id ? route('miles.update', $miles) : route('miles.store') }}" method="POST"
                    class="form">
                    @csrf
                    @isset($miles->id)
                        @method('PUT')
                    @endisset




                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जिल्ला</label>
                            <input type="text" name="miles" class="form-control"
                                value="{{ old('miles', $miles->miles) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">खानी</label>
                            <input type="text" name="district" class="form-control"
                                value="{{ old('district', $miles->district) }}">
                        </div>
                       

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">अवस्था</label>
                            <input type="text" name="status" class="form-control"
                                value="{{ old('status', $miles->status) }}">
                        </div>
                        
                    </div>
                   
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $miles->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>

                    

                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा रहेका मुख्य खानीको विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>खानी</th>
                            <th>जिल्ला</th>
                            <th>अवस्था</th>
                           
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($miless as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->miles }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->status }}</td>
                                
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('miles.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('miles.destroy', $item) }}" method="post"
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
    $('select').selectpicker();
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endpush
