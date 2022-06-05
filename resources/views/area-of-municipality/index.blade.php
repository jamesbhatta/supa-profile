@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>

    <div class="container-fluid">

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदुरपस्चिमक जिल्ला अन्तर्गत पालिकहरुको क्षेत्रफल र वडा संख्या </h1>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>न.पा./गा.वि.स.</th>
                            <th>न.पा./गा.वि.स. को छेत्रफल</th>
                            <th>न.पा./गा.वि.स. वार्ड सांख्य</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($municipalities_area as $municipality)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $municipality->district_name }}</td>
                            <td>{{ $municipality->municipalities->name }}</td>
                            <td>{{ $municipality->muncipality_area }}</td>
                            <td>{{ $municipality->ward_count }}</td>
                            <td>
                                <a class="action-btn text-primary" href="{{ route('area.edit', $municipality) }}"><i
                                        class="far fa-edit"></i></a>
                                <form action="{{ route('area.destroy', $municipality) }}" method="post"
                                    onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <tr>

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
