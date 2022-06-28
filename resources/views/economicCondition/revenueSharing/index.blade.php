@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container-fluid">
        <h3 class="font-weight-bold">राजश्व बाँडफाँड (रु.दश लाखमा)</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">आर्थिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">राजश्व बाँडफाँड (रु.दश लाखमा)</li>
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
                            <h4>राजश्व बाँडफाँड (रु.दश लाखमा)</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $revenueSharing->id ? route('revenue-sharing.update', $revenueSharing) : route('revenue-sharing.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($revenueSharing->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-name ">प्रदेश</label>
                            <select name="province" class="form-control" id="">
                                <option value="">कृपया प्रदेश चयन गर्नुहोस्</option>
                                @isset($revenueSharing->id)
                                    <option value="{{ $revenueSharing->province }}" selected>{{ $revenueSharing->province }}
                                    </option>
                                @endisset
                                @foreach ($province as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">राजश्व बाँडफाँड (रु.दश लाखमा)</label>
                            <input type="text" id="input-name" name="province_revenue" class="form-control"
                                autocomplete="off"
                                value="{{ old('province_revenue', $revenueSharing->province_revenue) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">प्रतिशत </label>
                            <input type="text" id="input-name" name="province_revenue_percentage" class="form-control"
                                autocomplete="off"
                                value="{{ old('province_revenue_percentage', $revenueSharing->province_revenue_percentage) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">स्थानीय तह</label>
                            <input type="text" id="input-name" name="local_level" class="form-control" autocomplete="off"
                                value="{{ old('local_level', $revenueSharing->local_level) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">स्थानीय तहमा राजश्व बाँडफाँड (रु.दश लाखमा)</label>
                            <input type="text" id="input-name" name="local_level_revenue" class="form-control"
                                autocomplete="off"
                                value="{{ old('local_level_revenue', $revenueSharing->local_level_revenue) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">स्थानीय तहमा राजश्व बाँडफाँड प्रतिशत</label>
                            <input type="text" id="input-name" name="local_level_revenue_percentage" class="form-control"
                                autocomplete="off"
                                value="{{ old('local_level_revenue_percentage', $revenueSharing->local_level_revenue_percentage) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $revenueSharing->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">राजश्व बाँडफाँड (रु.दश लाखमा)</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश</th>
                            <th>राजश्व बाँडफाँड (रु.दश लाखमा)</th>
                            <th>प्रतिशत</th>
                            <th>स्थानीय तह</th>
                            <th>स्थानीय तहमा राजश्व बाँडफाँड (रु.दश लाखमा)</th>
                            <th>स्थानीय तहमा राजश्व बाँडफाँड प्रतिशत</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($revenueSharings as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->province_revenue }}</td>
                                <td>{{ $item->province_revenue_percentage }}</td>
                                <td>{{ $item->local_level }}</td>
                                <td>{{ $item->local_level_revenue }}</td>
                                <td>{{ $item->local_level_revenue_percentage }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('revenue-sharing.edit', $item) }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('revenue-sharing.destroy', $item) }}" method="post"
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
