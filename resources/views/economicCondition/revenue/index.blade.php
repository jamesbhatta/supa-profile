@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$revenue->id? route('revenue.update',$revenue):route('revenue.store')}}" method="POST" class="form">
                @csrf
               @isset($revenue->id)
                   @method('PUT')
               @endisset
               
                <div class="form-group">
                    <label for="input-name">शिर्षक</label>
                    <input type="text" id="input-name" name="title" class="form-control" autocomplete="off" value="{{old('title',$revenue->title)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">रकम</label>
                    <input type="text" id="input-name" name="price" class="form-control" autocomplete="off" value="{{old('price',$revenue->price)}}">
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$revenue->id? 'Update':'सेभ गर्नुहोस्'}} </button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">प्रदेशमा प्राप्त हुने राजश्वको शिर्षकगत विवरण</h1>
            {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>शिर्षक</th>
                        <th>रकम</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($revenues as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title}}</td>
                        <td>{{ $item->price}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('revenue.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('revenue.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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








