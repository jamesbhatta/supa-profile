@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">उपभोग्य खाद्यान्नको स्थिति प्रदेशगत विवरण प्रक्षेपित जनसंख्यामा (मे.ट.) २०७५/२०७६</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">उपभोग्य खाद्यान्नको स्थिति प्रदेशगत विवरण प्रक्षेपित जनसंख्यामा (मे.ट.) २०७५/२०७६</li>
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
                            <h4>उपभोग्य खाद्यान्नको स्थिति प्रदेशगत विवरण प्रक्षेपित जनसंख्यामा (मे.ट.) २०७५/२०७६</h4>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <form
                    action="{{ $consumableFood->id ? route('consumable-food.update', $consumableFood) : route('consumable-food.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($consumableFood->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" name="province" class="custom-select">
                                @isset($consumableFood->id)
                                    <option value="{{ $consumableFood->province }}" selected>
                                        {{ $consumableFood->province }}</option>
                                @else
                                    <option value="" selected>प्रदेश छान्नुहोस्</option>
                                @endisset

                                @foreach ($provinces as $province)
                                    <option value="{{ $province->name }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जनसंख्या</label>
                            <input type="text" name="population" class="form-control"
                                value="{{ old('population', $consumableFood->population) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">चामल</label>
                            <input type="text" name="rice" class="form-control"
                                value="{{ old('rice', $consumableFood->rice) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">मकै</label>
                            <input type="text" name="maize" class="form-control"
                                value="{{ old('maize', $consumableFood->maize) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">कोदो</label>
                            <input type="text" name="kodo" class="form-control"
                                value="{{ old('kodo', $consumableFood->kodo) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">फापर</label>
                            <input type="text" name="phppar" class="form-control"
                                value="{{ old('phppar', $consumableFood->phppar) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">गहुँ</label>
                            <input type="text" name="wheat" class="form-control"
                                value="{{ old('wheat', $consumableFood->wheat) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">जौ</label>
                            <input type="text" name="Barley" class="form-control"
                                value="{{ old('Barley', $consumableFood->Barley) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">उपभोग्य खाद्यान्न उत्पादन</label>
                            <input type="text" name="production" class="form-control"
                                value="{{ old('production', $consumableFood->production) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-fiscal-year-start">आवश्यक खाद्यान्न</label>
                            <input type="text" name="required_food" class="form-control"
                                value="{{ old('required_food', $consumableFood->required_food) }}">
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="input-fiscal-year-start">बचत वा न्यून</label>
                            <input type="text" name="saving" class="form-control"
                                value="{{ old('saving', $consumableFood->saving) }}">
                        </div>
                    </div>








                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $consumableFood->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">उपभोग्य खाद्यान्नको स्थिति प्रदेशगत विवरण प्रक्षेपित जनसंख्यामा
                        (मे.ट.) २०७५/२०७६</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>

                            <tr>
                                <th>प्रदेश</th>
                                <th> जनसंख्या</th>
                                <th>चामल</th>
                                <th>मकै</th>
                                <th>कोदो</th>
                                <th>फापर</th>
                                <th>गहुँ</th>
                                <th>जौ</th>
                                <th>उपभोग्य खाद्यान्न उत्पादन</th>
                                <th>आवश्यक खाद्यान्न</th>
                                <th>बचत वा न्यून</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consumableFoods as $item)
                                <tr>
                                    <td>{{ $item->province }}</td>
                                    <td>{{ $item->population }}</td>
                                    <td>{{ $item->rice }}</td>
                                    <td>{{ $item->maize }}</td>
                                    <td>{{ $item->kodo }}</td>
                                    <td>{{ $item->phppar }}</td>
                                    <td>{{ $item->wheat }}</td>
                                    <td>{{ $item->Barley }}</td>
                                    <td>{{ $item->production }}</td>
                                    <td>{{ $item->required_food }}</td>
                                    <td>{{ $item->saving }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('consumable-food.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('consumable-food.destroy', $item) }}" method="post"
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
