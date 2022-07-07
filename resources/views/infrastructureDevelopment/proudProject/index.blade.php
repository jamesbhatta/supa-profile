@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेश गौरबका आयोजाहरु</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">पूर्वाधार विकास</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेश गौरबका आयोजाहरु</li>
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
                            <h4>प्रदेश गौरबका आयोजाहरु</h4>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <form
                    action="{{ $proudProject->id ? route('proud-project.update', $proudProject) : route('proud-project.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($proudProject->id)
                        @method('PUT')
                    @endisset

                    <div class="form-group">
                        <label for="input-name">सडक</label>
                        <input type="text" name="road" class="form-control"
                            value="{{ old('road', $proudProject->road) }}">
                    </div>
                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" class="custom-select">
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-district-id">जिल्लाको नाम</label>
                        <select name="district" id="select-district-name" class="custom-select">
                            @isset($proudProject->id)
                                <option value="{{ $proudProject->district }}" selected>{{ $proudProject->district }}</option>
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
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="input-name">ठेक्का लागेको लम्बाइ</label>
                            <input type="text" name="lenght" class="form-control"
                                value="{{ old('lenght', $proudProject->lenght) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-name">रकम (रु.लाखमा)</label>
                            <input type="text" name="price" class="form-control"
                                value="{{ old('price', $proudProject->price) }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="input-fiscal-year-start">सम्पन्न हुने अवधि</label>
                            <input type="text" name="finishing_date" id="input-fiscal-year-start"
                                class="form-control fiscal-year-date"
                                value="{{ old('finishing_date', $proudProject->finishing_date) }}"
                                placeholder="Nepali YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $proudProject->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेश गौरबका आयोजाहरु</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>सडक</th>
                            <th>जिल्ला</th>
                            <th>ठेक्का लागेको लम्बाइ</th>
                            <th>रकम (रु.लाखमा)</th>
                            <th>सम्पन्न हुने अवधि</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proudProjects as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->road }}</td>
                                <td>{{ $item->district }}</td>
                                <td>{{ $item->lenght }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->finishing_date }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('proud-project.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('proud-project.destroy', $item) }}" method="post"
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
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }
        });
    </script>
@endpush
