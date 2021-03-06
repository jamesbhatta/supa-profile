@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेशको आर्थिक सूचकहरु</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">आर्थिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेशको आर्थिक सूचकहरु</li>
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
                            <h4>प्रदेशको आर्थिक सूचकहरु थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $economicIndicator->id ? route('economic-indicator.update', $economicIndicator) : route('economic-indicator.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($economicIndicator->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="input-name">विवरण</label>
                            <input type="text" id="input-name" name="detail" class="form-control" autocomplete="off"
                                value="{{ old('detail', $economicIndicator->detail) }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="input-name">सूचक (प्रतिशत)</label>
                            <input type="text" id="input-name" name="indicator" class="form-control" autocomplete="off"
                                value="{{ old('indicator', $economicIndicator->indicator) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $economicIndicator->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">प्रदेशको आर्थिक सूचकहरु</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>विवरण</th>
                            <th>सूचक (प्रतिशत)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($economicindicators as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->detail }}</td>
                                <td>{{ $item->indicator }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('economic-indicator.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('economic-indicator.destroy', $item) }}" method="post"
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
