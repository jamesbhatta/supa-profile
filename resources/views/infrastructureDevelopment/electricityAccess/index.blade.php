@extends('layouts.app')

@section('content')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="container">
        <div class="card z-depth-0">
            <div class="card-body">
                <div class="col-12">
                    <label class="col-12 text-center font-weight-bold h4 my-5">विधुत सेवामा पहुँचको प्रदेशगत अवस्था</label>
                    <hr>
                </div>
                <form action="{{ $electricityAccess->id ? route('electricity-access.update', $electricityAccess) : route('electricity-access.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($electricityAccess->id)
                        @method('put')
                    @endisset
                    <div class="form-group">
                        <label for="select-province-id">प्रदेशको नाम</label>
                        <select id="select-province-id" name="province" class="custom-select">
                            
                            @isset($electricityAccess->id)
                            <option value="{{$electricityAccess->province}}">{{$electricityAccess->province}}</option>
                            @else
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @endisset
                            @foreach ($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input-name-en"> पहुँच (प्रतिशत)</label>
                        <input type="text" id="input-name-en" name="accessability" class="form-control" autocomplete="off"
                            value="{{ old('accessability', $electricityAccess->accessability) }}">
                    </div>



                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $electricityAccess->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">विधुत सेवामा पहुँचको प्रदेशगत अवस्था</h1>
                {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>प्रदेश</th>
                            <th>पहुँच (प्रतिशत)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($electricityAccesses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->accessability}}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('electricity-access.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('electricity-access.destroy', $item) }}" method="post"
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
