@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">बजेटको स्रोतको अवस्था</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$budgetResource->id? route('budget-resource.update',$budgetResource):route('budget-resource.store')}}" method="POST" class="form">
                @csrf
               @isset($budgetResource->id)
                   @method('PUT')
               @endisset
               
                <div class="form-group">
                    <label for="input-name">आय तथा राजश्व</label>
                    <input type="text" id="input-name" name="income" class="form-control" autocomplete="off" value="{{old('income',$budgetResource->income)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">रकम (रु.हजारमा)</label>
                    <input type="text" id="input-name" name="price" class="form-control" autocomplete="off" value="{{old('price',$budgetResource->price)}}">
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$budgetResource->id? 'Update':'सेभ गर्नुहोस्'}} </button>
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
                        <th>विवरण</th>
                        <th>सूचक (प्रतिशत)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($budgetResources as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->income}}</td>
                        <td>{{ $item->price}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('budget-resource.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('budget-resource.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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








