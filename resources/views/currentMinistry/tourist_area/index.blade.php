@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">पर्यटकीय क्षेत्र</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">भौगोलिक तथा राजनीतिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">पर्यटकीय क्षेत्र</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="row">
            <div class="card z-depth-0 col-lg-4">
                <nav class="nav nav-pills p-3" id="pills-tab" role="tablist">
                    <h4> पर्यटकीय क्षेत्र</h4>
                </nav>
                <div class="card-body">
                    <form
                        action="{{ $touristArea->id ? route('tourist-area.update', $touristArea) : route('tourist-area.store') }}"
                        method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @isset($touristArea->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="input-name">नाम</label>
                                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                                    value="{{ old('name', $touristArea ->name) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">ठेगाना</label>
                                <input type="text" id="input-name" name="address" class="form-control" autocomplete="off"
                                    value="{{ old('address', $touristArea ->address) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">फोटो</label>
                                <input type="file" id="input-name" name="image" class="form-control"
                                    autocomplete="off" value="{{ old('image', $touristArea  ->image) }}">
                            </div>
                           
                        </div>


                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $touristArea  ->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card col-lg-7 ml-5 z-depth-0">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>फोटो</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($touristAreas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img class="rounded-circle" src="{{ $item->imageUrl() }}" height="40px" width="40px">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('tourist-area.edit', $item->id) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('tourist-area.destroy', $item->id) }}" method="post"
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
