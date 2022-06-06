@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">बैंक तथा वित्तिय संस्था विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('bank-detail.store')}}" method="POST" class="form">
                @csrf
                <div class="form-group">
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
                <div class="form-group">
                    <label for="select-district-id">जिल्लाको नाम</label>
                    <select name="district_id" id="select-district-id" class="custom-select">
                        @isset($disability_details[0]->districts->name)
                        <option value="{{ $disability_details->districts->id }}" selected>{{ $disability_details->districts->name }}</option>
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
                <div class="form-group">
                    <label for="select-district-id">बैंक तथा वित्तिय संस्था प्रकार</label>
                    <select name="bank_type" class="custom-select">
                        <option value="">बैंक तथा वित्तिय संस्था प्रकार छान्नुहोस्</option>
                        <option value="बाणिज्य बैंक">बाणिज्य बैंक</option>
                        <option value="विकास बैंक">विकास बैंक</option>
                        <option value="वित्त कम्पनी">वित्त कम्पनी</option>
                        <option value="लघुवित्त संस्था">लघुवित्त संस्था</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था संख्या </label>
                    <input type="text" id="input-name" name="bank_number" class="form-control" autocomplete="off" value="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">Save</button>
                </div>
            </form>
        </div>
        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा अपांगताको संख्यात्मक विवरण हरु</h1>
                {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>जिल्ला</th>
                            <th>बैंक तथा वित्तिय संस्था प्रकार</th>
                            <th>बैंक तथा वित्तिय संस्था संख्या</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bank_details as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->districts->name }}</td>
                            <td>{{$item->bank_type}}</td>
                            <td>{{$item->bank_number}}</td>
                            <td>
                                <a class="action-btn text-primary" href="{{ route('bank-detail.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                                <form action="{{ route('bank-detail.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
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
