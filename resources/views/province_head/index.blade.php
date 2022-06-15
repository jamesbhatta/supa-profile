@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">हालसम्म भएका प्रदेश प्रमुखहरुको नामावली र मिति</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$provinceHead->id? route('province-head.update',$provinceHead):route('province-head.store')}}" method="POST" class="form">
                @csrf
                @isset($provinceHead->id)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="input-name">प्रदेश प्रमुख</label>
                    <input type="text" id="input-name" name="province_head" class="form-control" autocomplete="off" value="{{old('province_head',$provinceHead->province_head)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">देखि</label>
                    <input type="text" name="from" id="input-fiscal-year-start" class="form-control fiscal-year-date" value="{{old('from',$provinceHead->from)}}" placeholder="Nepali YYYY-MM-DD">
                </div>
                
                <div class="form-group">
                    <label for="input-name">सम्म</label>
                    <input type="text" name="to" id="input-fiscal-year-start" class="form-control fiscal-year-date" value="{{old('to',$provinceHead->to)}}" placeholder="Nepali YYYY-MM-DD">
                </div>
               
               
              
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$provinceHead->id? 'Update':'सेभ गर्नुहोस्'}} </button>
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
                        <td>{{ $item->province_head}}</td>
                        <td>{{ $item->from}}</td>
                        <td>{{$item->to}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('province-head.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('province-head.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
        if ($('.fiscal-year-date')[0]) {
            $('.fiscal-year-date').nepaliDatePicker({});
        }

    })
</script>
@endpush



