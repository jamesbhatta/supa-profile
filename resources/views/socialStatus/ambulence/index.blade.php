@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">एम्बुलेन्स विवरण
</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">कृषि क्षेत्र</li>
                <li class="breadcrumb-item active" aria-current="page">एम्बुलेन्स विवरण
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
                            <h4>एम्बुलेन्स विवरण
</h4>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form
                    action="{{ $ambulence->id ? route('ambulence.update',$ambulence) : route('ambulence.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($ambulence->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="select-province-id">प्रदेशको नाम</label>
                            <select id="select-province-id" class="custom-select">
                                @isset($municipality->district->province)
                                <option value="{{ $municipality->district->province->id }}" selected>{{ $municipality->district->province->name }}</option>
                                @else
                                <option value="">प्रदेश छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="select-district-id">जिल्लाको नाम</label>
                            <select name="district_id" id="select-district-id" class="custom-select">
                                @isset($ambulence->id)
                                <option value="{{ $ambulence->district->id }}" selected>{{ $ambulence->district->name }}</option>
                                @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach($provinces as $province)
                                @foreach($province->districts as $district)
                                <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">स्थानीय तह /निकाय</label>
                            <input type="text" name="local_level" class="form-control"
                                value="{{ old('local_level', $ambulence->local_level) }}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">संचालन गने संस्थाको नाम</label>
                            <input type="text" name="org" class="form-control"
                                value="{{ old('org', $ambulence->org) }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">संचालन गने संस्थाको सम्पर्क नम्बर</label>
                            <input type="text" name="org_phone" class="form-control"
                                value="{{ old('org_phone', $ambulence->org_phone) }}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="input-fiscal-year-start">एम्बुलेन्स चालकको सम्पर्क नम्बर</label>
                            <input type="text" name="driver_phone" class="form-control"
                                value="{{ old('driver_phone', $ambulence->driver_phone) }}">
                        </div>

                        
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $ambulence->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>
        <div class="container-fluid">
            <div class="card z-depth-0">
                <div class="card-header">
                    <h1 class="h3-responsive d-inline-block">एम्बुलेन्स विवरण
</h1>
                    {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>सिन</th>
                                <th>जिल्ला</th>
                                <th>स्थानीय तह /निकाय</th>
                                <th>संचालन गने संस्थाको नाम</th>
                                <th>संचालन गने संस्थाको सम्पर्क नम्बर</th>
                                <th>एम्बुलेन्स चालकको सम्पर्क नम्बर</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ambulences as $item)
                                <tr>
                                    <td>{{ $item->district->name }}</td>
                                    <td>{{ $item->district->name }}</td>
                                    <td>{{ $item->local_level}}</td>
                                    <td>{{ $item->org}}</td>
                                    <td>{{ $item->org_phone}}</td>
                                    <td>{{ $item->driver_phone}}</td>
                                   
                                    <td></td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('ambulence.edit', $item) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('ambulence.destroy', $item) }}" method="post"
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
