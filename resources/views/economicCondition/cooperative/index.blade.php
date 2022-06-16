@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">प्रदेशमा दर्ता भएका सहकारीहरुको विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$cooperative->id? route('cooperative.update',$cooperative):route('cooperative.store')}}" method="POST" class="form">
                @csrf
               @isset($cooperative->id)
                   @method('PUT')
               @endisset
               
                <div class="form-group">
                    <label for="input-name">जिल्ला</label>
                    <select name="district" class="form-control" id="">
                        <option value="">कृपया जिल्ला चयन गर्नुहोस्</option>
                        @isset($cooperative->id)
                        <option value="{{$cooperative->district}}" selected>{{$cooperative->district}}</option>
                    @endisset
                        @foreach ($districts as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">संगठन</label>
                    <select name="org" class="form-control" id="">
                        <option value="">कृपया संगठन चयन गर्नुहोस्</option>
                        @isset($cooperative->id)
                            <option value="{{$cooperative->org}}" selected>{{$cooperative->org}}</option>
                        @endisset
                        <option value="बहुउद्देश्यीय">बहुउद्देश्यीय</option>
                        <option value="कृषि">कृषि</option>
                        <option value="ऋण तथा बचत">ऋण तथा बचत</option>
                        <option value="स्वास्थ्य">स्वास्थ्य</option>
                        <option value="सञ्चार">सञ्चार</option>
                        <option value="विधुत">विधुत</option>
                        <option value="जडिबुटी">जडिबुटी</option>
                        <option value="वतावरण संरक्षण">वतावरण संरक्षण</option>
                        <option value="प्रकाशन">प्रकाशन</option>
                        <option value="अन्य">अन्य</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="input-name">संख्या</label>
                    <input type="number" name="number" class="form-control" value="{{old('number',$cooperative->number)}}">
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$cooperative->id? 'Update':'सेभ गर्नुहोस्'}} </button>
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
                        <th>संगठन</th>
                        <th>संख्या</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cooperatives as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->district}}</td>
                        <td>{{ $item->org}}</td>
                        <td>{{ $item->number}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('cooperative.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('cooperative.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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








