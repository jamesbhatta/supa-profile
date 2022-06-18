@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="col-12">
                <label class="col-12 text-center font-weight-bold h4 my-5">प्रेस काउन्सिलमा दर्ता भएका सुदूरपश्चिमका
                    पत्रपत्रिकाहरु</label>
                <hr>
            </div>
            <div class="card-body">
                <form
                    action="{{ $radio->id ? route('radio.update', $radio) : route('radio.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($radio->id)
                        @method('PUT')
                    @endisset


                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" class="custom-select">
                            @isset($municipality->district->province)
                                <option value="{{ $municipality->district->province->id }}" selected>
                                    {{ $municipality->district->province->name }}</option>
                            @else
                                <option value="">प्रदेश छान्नुहोस्</option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district" id="select-district-id" class="custom-select">
                            @isset($radio->id)
                                <option value="{{ $radio->district }}" selected>
                                    {{ $radio->district }}</option>
                            @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                            @endisset
                            @foreach ($provinces as $province)
                                @foreach ($province->districts as $district)
                                    <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">
                                        {{ $district->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group ">
                        <label for="input-fiscal-year-start">एफएम रेडियोको संख्या</label>
                        <input type="text" name="number" class="form-control"
                            value="{{ old('number', $radio->number) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $radio->id ? 'Update' : 'सेभ गर्नुहोस्' }}
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
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>दैनिक</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($radios as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->district}}</td>
                                <td>{{ $item->number}}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('radio.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('radio.destroy', $item) }}" method="post"
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
