@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">भौगोलिक तथा राजनीतिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति</li>
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
                            <h4>प्रदेश प्रमुखहरुको नामावली र मिति थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $provinceHead->id ? route('province-head.update', $provinceHead) : route('province-head.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($provinceHead->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-name">प्रदेश प्रमुख</label>
                            <input type="text" id="input-name" name="province_head" class="form-control"
                                autocomplete="off" value="{{ old('province_head', $provinceHead->province_head) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">देखि</label>
                            <input type="text" name="from" id="input-fiscal-year-start"
                                class="form-control fiscal-year-date" value="{{ old('from', $provinceHead->from) }}"
                                placeholder="Nepali YYYY-MM-DD">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-name">सम्म</label>
                            <input type="text" name="to" id="input-fiscal-year-second"
                                class="form-control fiscal-year-date" value="{{ old('to', $provinceHead->to) }}"
                                placeholder="Nepali YYYY-MM-DD">
                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $provinceHead->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश प्रमुख</th>
                            <th>देखि</th>
                            <th>सम्म</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($provinceheads as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province_head }}</td>
                                <td>{{ $item->from }}</td>
                                <td>{{ $item->to }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('province-head.edit', $item->id) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('province-head.destroy', $item) }}" method="post"
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
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush
